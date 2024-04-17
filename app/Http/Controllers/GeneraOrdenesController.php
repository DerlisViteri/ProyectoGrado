<?php

namespace App\Http\Controllers;
use DB;
use App\Models\GeneraOrdenes;
use Illuminate\Http\Request;
use Auth;

class GeneraOrdenesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $rq)
    {
        $periodos=DB::select("SELECT * FROM aniolectivo");
        $jornadas=DB::select("SELECT * FROM jornadas");
        $ordenes=DB::select("SELECT o.especial, o.fecha, j.jor_descripcion, o.mes, a.anl_descripcion
                             FROM ordenes_generadas o 
                             JOIN matriculas m ON m.id=o.mat_id
                             JOIN jornadas j ON j.id=m.jor_id
                             JOIN aniolectivo a ON a.id=m.anl_id
                            GROUP BY o.especial, 
                             o.fecha,
                             j.jor_descripcion,
                             o.mes, 
                             a.anl_descripcion
                             ORDER BY o.especial ");
        $meses=$this->meses();
       return view('generaOrdenes.index')
       ->with('periodos', $periodos)
       ->with('meses', $meses)
       ->with('ordenes', $ordenes)
       ->with('jornadas', $jornadas);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function meses(){
        return[
            '1'=>'Enero',
            '2'=>'Febrero',
            '3'=>'Marzo',
            '4'=>'Abril',
            '5'=>'Mayo',
            '6'=>'Junio',
            '7'=>'Julio',
            '8'=>'Agosto',
            '9'=>'Septiembre',
            '10'=>'Octubre',
            '11'=>'Noviembre',
            '12'=>'Diciembre',
        ];
    }

    public function mesesLetra($nmes){
        $result="";
        $nmes==1?$result="E":"";
        $nmes==2?$result="F":"";
        $nmes==3?$result="M":"";
        $nmes==4?$result="A":"";
        $nmes==5?$result="MY":"";
        $nmes==6?$result="J":"";
        $nmes==7?$result="JL":"";
        $nmes==8?$result="AG":"";
        $nmes==9?$result="S":"";
        $nmes==10?$result="O":"";
        $nmes==11?$result="N":"";
        $nmes==12?$result="D":"";


        // if($nmes==1){
        //     $result="E";

        // }

        return $result;
    }
    public function generarOrdenes(Request $rq){
        $datos=$rq->all();
        $anl_id=$datos["anl_id"]; //AÑO
        $jor_id=$datos["jor_id"]; //JORNADA
        $mes=$datos["mes"]; //MES A GENERAR ORDEN
        $nmes=$this->mesesLetra($mes); //LETRA DEL MES
        $campus="G";

        $validar=DB::select("SELECT * FROM ordenes_generadas o
                             JOIN matriculas m ON m.id=o.mat_id
                             WHERE  m.anl_id=$anl_id
                             AND m.jor_id=$jor_id
                             AND o.mes=$mes ");

        if(empty($validar)){
            $secuenciales=DB::selectone("SELECT max(especial) as secuencial FROM ordenes_generadas");
            $sec=$secuenciales->secuencial+1;
    
            $estudiantes=DB::select("SELECT *, m.id AS mat_id FROM matriculas m 
                                     JOIN estudiantes e ON m.est_id=e.id
                                     JOIN jornadas j ON m.jor_id=j.id
                                     JOIN cursos c ON  m.cur_id=c.id
                                     JOIN especialidades esp ON m.esp_id=esp.id
                                     WHERE m.anl_id=$anl_id 
                                     AND m.jor_id=$jor_id
                                     AND m.mat_estado=1"
                                   );
    
            $valor_pagar=75;
            foreach ($estudiantes as $e)
            {
            $inpu['mat_id']=$e->mat_id;  //ID DE LA MATRICULA 
            $inpu['fecha']=date('Y-m-d'); //CUANDO SE GENERA LA ORDEN
            $inpu['mes']=$mes;
            $inpu['codigo']=$nmes.$campus.$e->jor_obs.$e->cur_obs.$e->esp_obs."-".$e->mat_id; //
            $inpu['valor']=$valor_pagar;// VALOR A PAGAR
            $inpu['fecha_pago']=NULL;// EL BANCO DA LA FECHA DEL PAGO
            $inpu['estado']=0; // PENDIENTE = 0 / PAGADO = 1
            $inpu['responsable']=Auth::user()->usu_nombres; // USUARIO QUE REALIZA LA ORDEN
            $inpu['vpagado']=0;// EL BANCO DA EL VALOR PAGADO 
            $inpu['especial']=$sec;
            $inpu['numero_documento']=NULL; // NUMERO DEL DOCUMENTO QUE PAGO EL USUARIO (CUANDO YA PAGUE)
            GeneraOrdenes::create($inpu);
            }
            return Redirect(route('genera_ordenes.index'));

    
        }else{
           dd("ya existe una orden genrada con estos datos");
        }

   
      
    }
    public function eliminarOrden(Request $rq){
        $dt=$rq->all();
        $secuencial=$dt['secuencial'];
        $ordenes=GeneraOrdenes::where('especial',$secuencial);
        $ordenes->delete();
        return Redirect(route('genera_ordenes.index'));

    }

    public function mostrar($especial){
        // Convertir $especial a una cadena
        $especial = strval($especial);
        
        // Ejecutar la consulta SQL
        $estudiantes=DB::select("SELECT * from ordenes_generadas o 
                                JOIN matriculas m ON m.id=o.mat_id
                                JOIN estudiantes e ON e.id=m.est_id
                                JOIN jornadas j ON m.jor_id=j.id

                                JOIN especialidades esp ON esp.id = m.esp_id
                                JOIN cursos cur ON cur.id = m.cur_id
                                where especial='$especial'  
                                order by e.est_apellidos 
                                LIMIT 50
                                
                                ");
        
        // Retornar la vista con los datos obtenidos
        return view('generaOrdenes.mostrar')
            ->with('estudiantes', $estudiantes);
    }

    public function xls($especial){
       
        return view('generaOrdenes.excel');
          
    }
    public function exportExcel(){
       
        return Excel::download(new GeneraOrdenesExport ,'_excel.xlsx');
        // $response = Http::get('http://192.168.100.92/api/public/api/matriculas/1/16');
        // $data = $response->json();
        // dd($data);
        
        
            }
        
    
}
