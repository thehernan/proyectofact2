<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of medida
 *
 * @author HERNAN
 */
class unidmedida {

    //put your code here
    private $id;
    private $codigo;
    private $descripcion;
    private $orden;

    function __construct() {
        
    }

    function getId() {
        return $this->id;
    }

    function getCodigo() {
        return $this->codigo;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getOrden() {
        return $this->orden;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setOrden($orden) {
        $this->orden = $orden;
    }

    function selectAll() {

        $data_source = new DataSource();

        $data_tabla = $data_source->ejecutarconsulta("select * from unidmedida order by id desc;");

        $medida = null;
        $medidas = array();
        foreach ($data_tabla as $clave => $valor) {
            $medida = new unidmedida();
            $medida->setId($data_tabla[$clave]["id"]);
            $medida->setDescripcion($data_tabla[$clave]["descripcion"]);
            $medida->setCodigo($data_tabla[$clave]["codigo"]);
            $medida->setOrden($data_tabla[$clave]["orden"]);


            array_push($medidas, $medida);
        }
        return $medidas;
    }

    function selectOne($id) {

        $data_source = new DataSource();

        $data_tabla = $data_source->ejecutarconsulta("select * from unidmedida where id =?", array($id));

        $medida = new unidmedida();
        foreach ($data_tabla as $clave => $valor) {

            $medida->setId($data_tabla[$clave]["id"]);
            $medida->setDescripcion($data_tabla[$clave]["descripcion"]);
            $medida->setCodigo($data_tabla[$clave]["codigo"]);
            $medida->setOrden($data_tabla[$clave]["orden"]);
        }
        return $medida;
    }

    function insert(unidmedida $unid) {
        $data_source = new DataSource();
        $filas = 0;

        $filas = $data_source->ejecutarActualizacion("insert into unidmedida( descripcion, codigo, orden) values(?,?,?)", array(
            $unid->getDescripcion(),
            $unid->getCodigo(),
            $unid->getOrden()
        ));
        return $filas;
    }

    function update(unidmedida $unid) {
        $data_source = new DataSource();
        $filas = 0;

        $filas = $data_source->ejecutarActualizacion("update unidmedida set descripcion=?, codigo=?, orden=? where id=?", array(
            $unid->getDescripcion(),
            $unid->getCodigo(),
            $unid->getOrden(),
            $unid->getId()
        ));
        return $filas;
    }

}
