<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of serieDetalle
 *
 * @author HERNAN
 */
require_once 'model/serieProducto.php';
class serieDetalle {
    //put your code here
    private $id;
    private $serie;
    private $iddetalle;
    private $cantidad;
    
    function __construct() {
        
    }
    
    function getIddetalle() {
        return $this->iddetalle;
    }

    function setIddetalle($iddetalle) {
        $this->iddetalle = $iddetalle;
    }

        function getId() {
        return $this->id;
    }

    function getSerie() {
        return $this->serie;
    }

    

    function getCantidad() {
        return $this->cantidad;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setSerie($serie) {
        $this->serie = $serie;
    }

   

    function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }
    
    
    function select($iddet) {
        $data_source = new DataSource();

        $data_tabla = $data_source->ejecutarconsulta("SELECT * from detalle_serie where id_detalle=?;", array($iddet));


        $series = array();
        foreach ($data_tabla as $clave => $valor) {
            $serie = new serieDetalle();
            $serie->setId($data_tabla[$clave]["id"]);
            $serie->setSerie($data_tabla[$clave]["serie"]);
            $serie->setIddetalle($data_tabla[$clave]["id_detalle"]);
            $serie->setCantidad($data_tabla[$clave]["cantidad"]);


            array_push($series, $serie);
        }
        return $series;
    }

    function insert(array $series, array $id) {

//        var_dump($id);
        $data_source = new DataSource();
        $filas = 0;
        $serieprod = new serieProducto();
        $serieprod->updatecant($id);
        
        $filas = $data_source->insertmultiple("insert into detalle_serie(serie,id_detalle,cantidad) values(?,?,?)", $series
        );
        return $filas;
    }



}
