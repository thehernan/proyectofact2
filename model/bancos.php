<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of bancos
 *
 * @author HERNAN
 */
class bancos {
    //put your code here
    private $id;
    private $nombre;
    
    
    function __construct() {
        
    }
    
    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    
      function selectAll(){
        $data_source = new DataSource();

        $data_tabla = $data_source->ejecutarconsulta("select * from bancos order by id desc;");

   
        $bancos = array();
        foreach ($data_tabla as $clave => $valor) {
            $banco = new bancos();
            $banco->setId($data_tabla[$clave]["id"]);
            $banco->setNombre($data_tabla[$clave]["nombre"]);
    
        
            array_push($bancos, $banco);
        }
        return $bancos;
        
    }
    
        function selectOne($id){
        $data_source = new DataSource();

        $data_tabla = $data_source->ejecutarconsulta("select * from bancos where id= ? ",array($id));

   
        $banco = new bancos();
        foreach ($data_tabla as $clave => $valor) {
            
            $banco->setId($data_tabla[$clave]["id"]);
            $banco->setNombre($data_tabla[$clave]["nombre"]);
    
        
            
        }
        return $banco;
        
    }
    
    function insert(bancos $banco) {

        $data_source = new DataSource();
        $filas = 0;
        
        $filas = $data_source->ejecutarActualizacion("insert into bancos (nombre) values(?)",array($banco->getNombre()));
       
        return $filas;
    }
    
    
     function update(bancos $banco) {

        $data_source = new DataSource();
        $filas = 0;
        
        $filas = $data_source->ejecutarActualizacion("update bancos set nombre=? where id= ?",array($banco->getNombre(), $banco->getId()));
       
        return $filas;
    }



}
