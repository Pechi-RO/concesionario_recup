<?php

namespace App;

use PDOException;
use Faker\Factory;
use PDO;

class Marcas extends Conexion
{
    private $id;
    private $nombre;
    private $pais;

    public function __construct()
    {
        parent::__construct();
    }

    //_______________CRUD

    public function create()
    {
        $q="insert into marcas(nombre,pais) values(:n,:p)";
        $stmt=parent::$conexion->prepare($q);
        try{
            $stmt->execute([
                ':n'=>$this->nombre,
                ':p'=>$this->pais
            ]);
        }
        catch(PDOException $ex){
            die('Error al crear en la BBDD: '.$ex->getMessage());
        }
    }

    public function read()
    {
    }
    public function update($id)
    {
    }
    public function delete()
    {
    }

    //__________OTROS METODOS

    public function readAll(){
        $q="select * from marcas";
        $stmt=parent::$conexion->prepare($q);
        try{
            $stmt->execute();
        }
        catch(PDOException $ex){
            die('Error al leer todos los datos de marcas: '.$ex->getMessage());
        }
        parent::$conexion=null;
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function crearMarcas($cant)
    {
        if($this->hayMarcas()){
            return;
        }
        $faker=Factory::create('es_ES');
        for($i=0;$i<$cant;$i++){
        $nombre=$faker->name();
        $pais=$faker->country();
            
        (new Marcas)
        ->setNombre($nombre)
        ->setPais($pais)
        ->create();
    }
    }

    private function hayMarcas()
    {
        $q="select * from marcas";
        $stmt=parent::$conexion->prepare($q);
        try{
            $stmt->execute();
        }
        catch(PDOException $ex){
            die('Error al comprobar hayMarcas(): '.$ex->getMessage());
        }
        parent::$conexion=null;
        //si devuelve 0 s etrata como false
        return ($stmt->rowCount());
    }


    //_____________________SETTERS
    /**
     * Set the value of nombre
     *
     * @return  self
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Set the value of pais
     *
     * @return  self
     */
    public function setPais($pais)
    {
        $this->pais = $pais;

        return $this;
    }
}
