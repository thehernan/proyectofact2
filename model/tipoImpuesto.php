<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of tipoImpuesto
 *
 * @author HERNAN
 */
class tipoImpuesto {
    //put your code here
    private $id;
    private $descripcion;
    private $op;
    
    function __construct() {
        
    }
    function getId() {
        return $this->id;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getOp() {
        return $this->op;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setOp($op) {
        $this->op = $op;
    }
    
    function  selectAll(){
        $data_source = new DataSource();

        $data_tabla = $data_source->ejecutarconsulta("select * from tipo_impuesto order by id ASC;");
        $impuestos = array();
        $impuesto = null;
        foreach ($data_tabla as $clave => $valor) {
            $impuesto = new tipoImpuesto();
            $impuesto->setId($data_tabla[$clave]["id"]);
            $impuesto->setDescripcion($data_tabla[$clave]["descripcion"]);
            $impuesto->setOp($data_tabla[$clave]["op"]);
     
            array_push($impuestos, $impuesto);
        }
        return $impuestos;
        
        
    }



}
