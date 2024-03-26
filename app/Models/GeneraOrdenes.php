<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneraOrdenes extends Model
{
    use HasFactory;

    protected $table = 'ordenes_generadas';
    protected $primaryKey = 'ord_id';
    public $timestamps = false; //QUE NO PIDA LOS CAMPOS OBLIGATORIOS
    protected $fillable = [
        'mat_id', 
        'fecha', 
        'mes', 
        'codigo', 
        'valor', 
        'fecha_pago', 
        'tipo', 
        'estado', 
        'responsable', 
        'obs', 
        'identificador', 
        'motivo', 
        'vpagado', 
        'f_acuerdo', 
        'ac_no', 
        'especial_code', 
        'especial',
        'numero_documento'
    ];
}
