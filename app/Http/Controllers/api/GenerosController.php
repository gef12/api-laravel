<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Genero;

class GenerosController extends Controller
{
    public function index(){

        return Genero::all();
    }

    public function store(Request $request){
        $genero = Genero::create([
            'name'=>$request->input('name')
        ]);

        return $genero;
    }
    public function update(Request $request, Genero $genero) {
        $genero->name = $request->input('name');
        $genero->save();
        return $genero;
    }
    public function delete(Request $request, Genero $genero) {
        $genero->delete();
        return response()->json(['success'=>true]);
    }
    
    public function show(Genero $genero) {

        return $genero;
        
    }
    
}
