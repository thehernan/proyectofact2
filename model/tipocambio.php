<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of tipocambio
 *
 * @author HERNAN
 */
class tipocambio {
    //put your code here
    private $id;
    private $compra;
    private $venta;
    private $fecha;
    
    function __construct() {
        
    }
    function getId() {
        return $this->id;
    }

    function getCompra() {
        return $this->compra;
    }

    function getVenta() {
        return $this->venta;
    }

    function getFecha() {
        return $this->fecha;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setCompra($compra) {
        $this->compra = $compra;
    }

    function setVenta($venta) {
        $this->venta = $venta;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }
    function selectAll(){
        $data_source = new DataSource();

        $data_tabla = $data_source->ejecutarconsulta("select * from tipo_cambio order by id desc;");

        $cambio = null;
        $cambios = array();
        foreach ($data_tabla as $clave => $valor) {
            $cambio = new tipocambio();
            $cambio->setId($data_tabla[$clave]["id"]);
            $cambio->setCompra($data_tabla[$clave]["compra"]);
            $cambio->setVenta($data_tabla[$clave]["venta"]);
            $cambio->setFecha($data_tabla[$clave]["fecha"]);
        
            array_push($cambios, $cambio);
        }
        return $cambios;
        
    }
    function selectLimit($limit){
        $data_source = new DataSource();

        $data_tabla = $data_source->ejecutarconsulta("select * from tipo_cambio order by id desc limit $limit;");

        $cambio = null;
        $cambios = array();
        foreach ($data_tabla as $clave => $valor) {
            $cambio = new tipocambio();
            $cambio->setId($data_tabla[$clave]["id"]);
            $cambio->setCompra($data_tabla[$clave]["compra"]);
            $cambio->setVenta($data_tabla[$clave]["venta"]);
            $cambio->setFecha($data_tabla[$clave]["fecha"]);
        
            array_push($cambios, $cambio);
        }
        return $cambios;  
    }
    
     function selectMax(){
        $data_source = new DataSource();

        $data_tabla = $data_source->ejecutarconsulta("select id ,compra,venta, fecha from tipo_cambio ORDER BY id DESC LIMIT 1 ;");

        
       $cambio = new tipocambio();
        foreach ($data_tabla as $clave => $valor) {
            
            $cambio->setId($data_tabla[$clave]["id"]);
            $cambio->setCompra($data_tabla[$clave]["compra"]);
            $cambio->setVenta($data_tabla[$clave]["venta"]);
            $cambio->setFecha($data_tabla[$clave]["fecha"]);
        
            
        }
        return $cambio;  
    }
    
        function insert(tipocambio $cambio) {

        $data_source = new DataSource();
        $filas = 0;
//        $cliente = new cliente();
//        $cliente = $objeto;
        $fecha = date('Y-m-d'); 
        
        $filas = $data_source->ejecutarActualizacion("insert into tipo_cambio (compra, venta,"
                . "fecha) values(".$cambio->getCompra().",".$cambio->getVenta().",CURRENT_TIMESTAMP())");
       
        return $filas;
    }
    



}
