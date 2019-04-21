<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class serieProducto {

    private $id;
    private $serie;
    private $idproducto;
    private $cantidad;

    function __construct() {
        
    }

    function getId() {
        return $this->id;
    }

    function getSerie() {
        return $this->serie;
    }

    function getIdproducto() {
        return $this->idproducto;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setSerie($serie) {
        $this->serie = $serie;
    }

    function setIdproducto($idproducto) {
        $this->idproducto = $idproducto;
    }

    function getCantidad() {
        return $this->cantidad;
    }

    function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }

    function select($idprod) {
        $data_source = new DataSource();

        $data_tabla = $data_source->ejecutarconsulta("SELECT * serie_producto where id_producto=?;", array($idprod));


        $series = array();
        foreach ($data_tabla as $clave => $valor) {
            $serie = new serieProducto();
            $serie->setId($data_tabla[$clave]["id"]);
            $serie->setSerie($data_tabla[$clave]["serie"]);
            $serie->setIdproducto($data_tabla[$clave]["id_producto"]);
            $serie->setCantidad($data_tabla[$clave]["cantidad"]);


            array_push($series, $serie);
        }
        return $series;
    }

    function insert(array $series) {

        
        $data_source = new DataSource();
        $filas = 0;

        $filas = $data_source->insertmultiple("insert into serie_producto(serie,id_producto ,cantidad) values(?,?,?)", $series
        );
        return $filas;
    }

}
