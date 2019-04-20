<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of marcaprod
 *
 * @author HERNAN
 */
class marcaprod {

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

    function selectAll() {

        $data_source = new DataSource();

        $data_tabla = $data_source->ejecutarconsulta("select * from marca order by id desc;");

        $marca = null;
        $marcas = array();
        foreach ($data_tabla as $clave => $valor) {
            $marca = new marcaprod();
            $marca->setId($data_tabla[$clave]["id"]);
            $marca->setDescripcion($data_tabla[$clave]["descripcion"]);
            $marca->setCodigo($data_tabla[$clave]["codigo"]);
            $marca->setOrden($data_tabla[$clave]["orden"]);


            array_push($marcas, $marca);
        }
        return $marcas;
    }
    
     function selectOne($id) {
         
         

        $data_source = new DataSource();

        $data_tabla = $data_source->ejecutarconsulta("select * from marca where  id =?;",array($id));
        $marca = new marcaprod();
        foreach ($data_tabla as $clave => $valor) {
            
            $marca->setId($data_tabla[$clave]["id"]);
            $marca->setDescripcion($data_tabla[$clave]["descripcion"]);
            $marca->setCodigo($data_tabla[$clave]["codigo"]);
            $marca->setOrden($data_tabla[$clave]["orden"]);


            
        }
        return $marca;
    }

    function insert(marcaprod $marca) {
        $data_source = new DataSource();
        $filas = 0;

        $filas = $data_source->ejecutarActualizacion("insert into marca( descripcion, codigo, orden) values(?,?,?)", array(
            $marca->getDescripcion(),
            $marca->getCodigo(),
            $marca->getOrden()
        ));
        return $filas;
    }
    
      function update(marcaprod $marca) {
        $data_source = new DataSource();
        $filas = 0;

        $filas = $data_source->ejecutarActualizacion("update marca set descripcion=?, codigo=?, orden=? where id = ?;", array(
            
            $marca->getDescripcion(),
            $marca->getCodigo(),
            $marca->getOrden(),
            $marca->getId()
        ));
        return $filas;
    }

}
