<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of categoriaprod
 *
 * @author HERNAN
 */
class categoriaprod {
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

        $data_tabla = $data_source->ejecutarconsulta("select * from categoria order by id desc;");

        $categoria=null;
        $categorias = array();
        foreach ($data_tabla as $clave => $valor) {
            $categoria = new categoriaprod();
            $categoria->setId($data_tabla[$clave]["id"]);
            $categoria->setDescripcion($data_tabla[$clave]["descripcion"]);
            $categoria->setCodigo($data_tabla[$clave]["codigo"]);
            $categoria->setOrden($data_tabla[$clave]["orden"]);
            
      
             array_push($categorias, $categoria);
        }
        return $categorias;
        
    }
    
     function selectOne($id){
        
        $data_source = new DataSource();

        $data_tabla = $data_source->ejecutarconsulta("select * from categoria where id = ? ;",array($id));

        $categoria = new categoriaprod();
        foreach ($data_tabla as $clave => $valor) {
            
            $categoria->setId($data_tabla[$clave]["id"]);
            $categoria->setDescripcion($data_tabla[$clave]["descripcion"]);
            $categoria->setCodigo($data_tabla[$clave]["codigo"]);
            $categoria->setOrden($data_tabla[$clave]["orden"]);
            
      
            
        }
        return $categoria;
        
    }
    
    
    
    
     function insert(categoriaprod $categoria) {
        $data_source = new DataSource();
        $filas = 0;

        $filas = $data_source->ejecutarActualizacion("insert into categoria( descripcion, codigo, orden) values(?,?,?)", array(
            $categoria->getDescripcion(),
            $categoria->getCodigo(),
            $categoria->getOrden()
        ));
        return $filas;
    }
    
       function update(categoriaprod $categoria) {
        $data_source = new DataSource();
        $filas = 0;

        $filas = $data_source->ejecutarActualizacion("update categoria set descripcion=?, codigo=?, orden=? where id=?", array(
            $categoria->getDescripcion(),
            $categoria->getCodigo(),
            $categoria->getOrden(),
            $categoria->getId()
        ));
        return $filas;
    }




    
}
