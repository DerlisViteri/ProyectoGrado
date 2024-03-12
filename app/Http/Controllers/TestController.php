<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller

{
     /*public function welcom(){
       // return view('welcom');
    //}

    //public function info(){
       
        return view('test.info');
    }

    public function contacts(){
        return view ('test.contacts');

    }

     public function help(){
        return view ('test.help');

    }*/
    {
    //

    public function info (){
        return view('test.info');
    }

    public function contacts (){
        return view('test.contacts');
    }

    public function help (){
        return view('test.help');
    }

    public function inicio(){
        return view('welcome');
    }
    
}
}
