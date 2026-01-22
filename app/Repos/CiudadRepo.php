<?php

namespace App\Repos;
use App\Models\Ciudad;



class CiudadRepo {

    public static function listar() { // CiudadRepo::listar()
        $ciudades=Ciudad::all();
        return $ciudades;
    }
    public static function insertar(Ciudad $ciudad):bool {
        $ciudad->save();
        return true;
    }
    public static function actualizar(Ciudad $ciudad):bool {
        $ciudadDesdeBase=Ciudad::find($ciudad->id); // <-- marcado para actualizar
        $ciudadDesdeBase->nombre=$ciudad->nombre;
        $ciudadDesdeBase->poblacion=$ciudad->poblacion;
        $ciudadDesdeBase->save();
        return true;
    }
    public static function eliminar(int $id):bool {
        Ciudad::destroy($id);
        return true;
    }
    public static function obtener(int $id):Ciudad {
        $ciudad = Ciudad::find($id);
        return $ciudad;
    }

}
