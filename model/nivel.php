<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of nivel
 *
 * @author HERNAN
 */
class nivel {
    //put your code here
    private $id;
    private $descripcion;
    
    
    function __construct() {
        
    }
    
    function getId() {
        return $this->id;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function selectAll(){
        $data_source = new DataSource();

        $data_tabla = $data_source->ejecutarconsulta("SELECT * from nivel;");

        
        $niveles= array();
        foreach ($data_tabla as $clave => $valor) {
            $nivel = new nivel();
            $nivel->setId($data_tabla[$clave]["id"]);
            $nivel->setDescripcion($data_tabla[$clave]["descripcion"]);
      

            array_push($niveles, $nivel);
        }
        return $niveles;
        
    }

}
