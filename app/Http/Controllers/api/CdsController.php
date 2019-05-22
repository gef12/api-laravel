<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Cd;
use Illuminate\Support\Facades\DB;

class CdsController extends Controller
{
    public function index(){


        
        return Cd::all();
        
        
        /**
         * $result = DB::select('SELECT a.id , a.name, b.name as namegenero, c.name as nameartista, c.cds_id as artista_id, b.cds_id as genero_id FROM cds a INNER JOIN generos b ON a.id = b.cds_id INNER JOIN artistas c ON a.id = c.cds_id', [1]);
         * return response()->json($result);         
         */
        
    }

    public function store(Request $request){
        $cd = Cd::create([
            'name'=>$request->input('name')
        ]);

        return $cd;
    }

    public function update(Request $request, Cd $cd) {
        $cd->name = $request->input('name');
        $cd->save();
        return $cd;
    }
    public function delete(Request $request, Cd $cd) {
        $cd->delete();
        return response()->json(['success'=>true]);
    }

    public function show(Cd $cd) {

        return $cd;
        
    }
    
    public function incluirArtista(Request $request) {


    $result = DB::insert('insert into cd_artista (artista_id, cd_id) values (?, ?)', [$request->idA, $request->idC]);
    
    return response()->json(['success'=>true]);

    }

    public function incluirGenero(Request $request) {


        $result = DB::insert('insert into cd_genero (genero_id, cd_id) values (?, ?)', [$request->idG, $request->idC]);
        
        return response()->json(['success'=>true]);
    
    }

    public function removeArtista(Request $request) {


        $result = DB::delete('DELETE FROM cd_artista
            WHERE artista_id = ? AND cd_id = ?', [$request->idA, $request->idC]);
            
            return response()->json(['success'=>true]);
    
        }
    
        public function removeGenero(Request $request) {
    
    
            $result = DB::delete('DELETE FROM cd_genero
            WHERE genero_id = ? AND cd_id = ?', [$request->idG, $request->idC]);
            
            return response()->json(['success'=>true]);
        
        }

    public function all(){

        return Cd::all();
 
        /** 
         * 
         *$result = DB::select('SELECT c.id , b.name FROM cd_genero as a INNER JOIN generos as b INNER JOIN cds c ON c.id = a.cd_id group by b.id;', [1]);
        
         *return response()->json($result);
        */         
        
    }
    public function allGeneros(Request $request, $id){
 
        $result = DB::select("SELECT DISTINCT
        genero_id,
        generos.name
       FROM
         cds
           INNER JOIN cd_genero ON (cd_id = $request->id)
           INNER JOIN generos ON (generos.id = genero_id)
           group by genero_id", [1]);
        
        return response()->json($result);         
        
    }

    public function allArtistas(Request $request, $id){
 
        $result = DB::select("SELECT DISTINCT
        artista_id,
        artistas.name
       FROM
         cds
           INNER JOIN cd_artista ON (cd_id = $request->id)
           INNER JOIN artistas ON (artistas.id = artista_id)
           group by artista_id", [1]);
        
        return response()->json($result);         
        
    }
    public function pesquisaArtista(Request $request) {

        $result = DB::select("SELECT cd_id FROM cd_artista WHERE cd_id = $request->id", [1]);
        
        return response()->json($result);

    }
    public function pesquisaGenero(Request $request) {
        $result = DB::select("SELECT cd_id FROM cd_genero WHERE cd_id = $request->id", [1]);
        
        return response()->json($result);

    }
    public function pesquisaUltimo(Request $request) {

        $result = DB::select("SELECT id from cds ORDER BY id DESC LIMIT 1", [1]);
        
        return response()->json($result);

    }
    public function artistaRemove(Request $request) {

        $result = DB::select("SELECT id 
                              FROM cds
                              WHERE NOT EXISTS (SELECT * 
                                                FROM cd_artista
                                                WHERE cd_artista.cd_id = cds.id)", [1]);

        return response()->json($result);
    }

    public function generoRemove(Request $request) {

        $result = DB::select("SELECT id 
                              FROM cds
                              WHERE NOT EXISTS (SELECT * 
                                                FROM cd_genero
                                                WHERE cd_genero.cd_id = cds.id)", [1]);

        return response()->json($result);
    }
 
}
