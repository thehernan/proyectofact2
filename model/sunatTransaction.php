<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of sunatTransaction
 *
 * @author HERNAN
 */
class sunatTransaction {

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
    
    function selectAll(){
        $data_source = new DataSource();

        $data_tabla = $data_source->ejecutarconsulta("select * from sunat_transaction order by id ASC;");
        $transactiones = array();
        $transaction = null;
        foreach ($data_tabla as $clave => $valor) {
            $transaction = new sunatTransaction();
            $transaction->setId($data_tabla[$clave]["id"]);
            $transaction->setDescripcion($data_tabla[$clave]["descripcion"]);
            $transaction->setOp($data_tabla[$clave]["op"]);
     
            array_push($transactiones, $transaction);
        }
        return $transactiones;
        
        
    }

}
