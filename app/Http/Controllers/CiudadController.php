<?php

namespace App\Http\Controllers;

use App\Models\Ciudad;
use Illuminate\Http\Request;
use App\Repos\CiudadRepo;

class CiudadController extends Controller
{
    public function Listar() {

        $ciudades=CiudadRepo::listar();
        return view("ciudad.listar",['ciudades'=>$ciudades]);
    }
    public function ListarAPI() {
        $ciudades=CiudadRepo::listar();
        return $ciudades;
    }

    public function Insertar(Request $request) {
        $ciudad=new Ciudad($request->old());
        return view("ciudad.insertar",['ciudad'=>$ciudad,'mensaje'=>'']);

    }
    public function InsertarPost(Request $request) {
        $request->validate([
            'nombre' => 'required|max:30',
            'poblacion' => 'required|integer|min:0|max:100000000',
        ]);
    


        $ciudad=new Ciudad($request->all());        
        try { 
            CiudadRepo::insertar($ciudad);
            $ciudad=new Ciudad();
            return view("ciudad.insertar",[
                'ciudad'=>$ciudad,
                'mensaje'=>'Insertado correctamente'
                ]);
            //return redirect('/ciudad/');
        } catch(\Exception $ex) {
            return view("ciudad.insertar",[
                'ciudad'=>$ciudad,
                'mensaje'=>'No se pudo insertar'
                ]);
        }        
    }
    public function Actualizar($id) {
        $ciudad=CiudadRepo::obtener($id);
        return view("ciudad.modificar",['ciudad'=>$ciudad]);

    }
    public function ActualizarPost($id,Request $request) {
        // $request->all() lee solo los datos llenable, el ID no lo lee ya que no es llenable
        $ciudad=new Ciudad($request->all()); // ciudad es una nueva ciudad -> por lo tanto .save() insertar 
        $ciudad->id=$id;
        CiudadRepo::actualizar($ciudad);
        return redirect('/ciudad/'); 
    }
    public function Eliminar($id) {
        $ciudad=CiudadRepo::obtener($id);
        return view("ciudad.eliminar",['ciudad'=>$ciudad]);
    }
    public function EliminarPost($id,Request $request) {
        CiudadRepo::eliminar($id);
        return redirect('/ciudad/'); 
    }

}
