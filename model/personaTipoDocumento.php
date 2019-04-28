<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class personaTipoDocumento{
    
    private $id;
    private $documento;
    private $op;
    private $abreviatura;
    
    function __construct() {
        
    }
    function getId() {
        return $this->id;
    }

    function getDocumento() {
        return $this->documento;
    }

    function getOp() {
        return $this->op;
    }

    function getAbreviatura() {
        return $this->abreviatura;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setDocumento($documento) {
        $this->documento = $documento;
    }

    function setOp($op) {
        $this->op = $op;
    }

    function setAbreviatura($abreviatura) {
        $this->abreviatura = $abreviatura;
    }
    
       function selectAll() {
        $data_source = new DataSource();

        $data_tabla = $data_source->ejecutarconsulta("select * from persona_tipo_documento;");
        $docs = array();
        $doc = null;
        foreach ($data_tabla as $clave => $valor) {
            $doc= new personaTipoDocumento();
            $doc->setId($data_tabla[$clave]["id"]);
            $doc->setDocumento($data_tabla[$clave]["documento"]);
            $doc->setOp($data_tabla[$clave]["op"]);
            $doc->setAbreviatura($data_tabla[$clave]["abreviatura"]);
            



            array_push($docs, $doc);
        }
        return $docs;
    }
    
    



    
}
