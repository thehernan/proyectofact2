<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of tiponota
 *
 * @author HERNAN
 */
class tiponota {
    //put your code here
    private $id;
    private $descripcion;
    private $op;
    private $nota;
    
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

    function getNota() {
        return $this->nota;
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

    function setNota($nota) {
        $this->nota = $nota;
    }
    
        function select($tipo){
        
        $data_source = new DataSource();

        $data_tabla = $data_source->ejecutarconsulta("select * from tipo_de_nota where nota= ? order by id ASC;"
                ,array($tipo));

        
        $notas = array();
        foreach ($data_tabla as $clave => $valor) {
            $nota = new tiponota();
            $nota->setId($data_tabla[$clave]["id"]);
            $nota->setDescripcion($data_tabla[$clave]["descripcion"]);
            $nota->setOp($data_tabla[$clave]["op"]);
            $nota->setNota($data_tabla[$clave]["nota"]);
            
      
             array_push($notas, $nota);
        }
        return $notas;
    }
    
    



    
    
    
}
