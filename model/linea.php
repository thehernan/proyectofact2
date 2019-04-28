<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of linea
 *
 * @author HERNAN
 */
class linea {
    //put your code here
    private $id;
    private $descripcion;
    private $codigo;
    private $orden;
    
    function __construct() {
        
    }
    
    function getId() {
        return $this->id;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getCodigo() {
        return $this->codigo;
    }

    function getOrden() {
        return $this->orden;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setOrden($orden) {
        $this->orden = $orden;
    }
    
    function selectAll(){
        
        $data_source = new DataSource();

        $data_tabla = $data_source->ejecutarconsulta("select * from linea  order by id desc;");

        $linea=null;
        $lineas = array();
        foreach ($data_tabla as $clave => $valor) {
            $linea = new linea();
            $linea->setId($data_tabla[$clave]["id"]);
            $linea->setDescripcion($data_tabla[$clave]["descripcion"]);
            $linea->setCodigo($data_tabla[$clave]["codigo"]);
            $linea->setOrden($data_tabla[$clave]["orden"]);
            
      
             array_push($lineas, $linea);
        }
        return $lineas;
        
    }
    
      function selectOne($id){
        
        $data_source = new DataSource();

        $data_tabla = $data_source->ejecutarconsulta("select * from linea  where id =?",array($id));

       $linea = new linea();
        foreach ($data_tabla as $clave => $valor) {
            
            $linea->setId($data_tabla[$clave]["id"]);
            $linea->setDescripcion($data_tabla[$clave]["descripcion"]);
            $linea->setCodigo($data_tabla[$clave]["codigo"]);
            $linea->setOrden($data_tabla[$clave]["orden"]);
            
      
            
        }
        return $linea;
        
    }
    
      function insert(linea $linea) {
        $data_source = new DataSource();
        $filas = 0;

        $filas = $data_source->ejecutarActualizacion("insert into linea( descripcion, codigo, orden) values(?,?,?)", array(
            $linea->getDescripcion(),
            $linea->getCodigo(),
            $linea->getOrden()
        ));
        return $filas;
    }
    
        function update(linea $linea) {
        $data_source = new DataSource();
        $filas = 0;

        $filas = $data_source->ejecutarActualizacion("update linea set descripcion=?, codigo=?, orden=? where id = ?", array(
            $linea->getDescripcion(),
            $linea->getCodigo(),
            $linea->getOrden(),
            $linea->getId()
        ));
        return $filas;
    }



            
            
}
