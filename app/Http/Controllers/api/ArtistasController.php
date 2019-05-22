<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Artista;
use App\Cds;
use Tymon\JWTAuth\JWTAuth;
use Illuminate\Support\Facades\DB;


class ArtistasController extends Controller
{
    private $jwtAuth;

    public function __construct(JWTAuth $jwtAuth)
    {
        $this->jwtAuth = $jwtAuth;
    }

    public function index()
    {
        /*
        *descomentar para precsar passar o token 
        if (! $user = $this->jwtAuth->parseToken()->authenticate()) {
            return response()->json(['error'=>'user_not_found'], 404);
        }
         */

        return Artista::all();
    }
    
    
    
    public function store(Request $request)
    {
        
        // Insere uma nova categoria, de acordo com os dados informados pelo usuário

        $art = Artista::create([
            'name'=>$request->input('name')
        ]);

        return $art;
    }

    public function update(Request $request, Artista $artista) {
        $artista->name = $request->input('name');
        $artista->save();
        return $artista;
    }
    public function delete(Request $request, Artista $artista) {
        $artista->delete();
        return response()->json(['success'=>true]);
    }

    public function me(Request $request, Artista $artista) {

    }

    public function show(Artista $artista) {

        return $artista;
        
    }
}
