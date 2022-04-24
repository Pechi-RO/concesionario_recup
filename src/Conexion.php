<?php
namespace App;

use PDO;
use PDOException;

class Conexion{
    protected static $conexion;

    public function __construct()
    {
        if(self::$conexion==null){
            self::crearConexion();
        }
    }
    private function crearConexion(){
        $fichero=dirname(__DIR__,1)."/.config";
        $parametros=parse_ini_file($fichero);
        $user=$parametros['user'];
        $host=$parametros['host'];
        $pass=$parametros['pass'];
        $bbdd=$parametros['bbdd'];

        $dns="mysql:host=$host;dbname=$bbdd;charset=utf8mb4";

        try{
            $options=[PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION];
            self::$conexion=new PDO($dns,$user,$pass,$options);
        }
        catch(PDOException $ex){
            die('Error al conectar con la BBDD: '.$ex->getMessage());
        }
        
    }
}
//new Conexion();
//echo "Conexion completada";