<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Detalle
 *
 * @author HERNAN
 */
class Detalle {
    //put your code here
    private $id;
    private $idproducto;
    private $precio;
    private $cantidad;
    private $valor;
    private $descuento;
    private $idimpuesto;
    private $igv;
    private $total;

    private $factor;    
    private $iddocumento;
    private $codigoprod;
    private $descripcionprod;
    private $idunidad;
    
    
    function __construct() {
        
    }
    
    function getIdunidad() {
        return $this->idunidad;
    }

    function setIdunidad($idunidad) {
        $this->idunidad = $idunidad;
    }

        
    function getId() {
        return $this->id;
    }

    function getIdproducto() {
        return $this->idproducto;
    }

    function getPrecio() {
        return $this->precio;
    }

    function getCantidad() {
        return $this->cantidad;
    }

    function getValor() {
        return $this->valor;
    }

    function getDescuento() {
        return $this->descuento;
    }

    function getIdimpuesto() {
        return $this->idimpuesto;
    }

    function getIgv() {
        return $this->igv;
    }

    function getTotal() {
        return $this->total;
    }

//    function getUnidmed() {
//        return $this->unidmed;
//    }

    function getFactor() {
        return $this->factor;
    }

    function getIddocumento() {
        return $this->iddocumento;
    }

    function getCodigoprod() {
        return $this->codigoprod;
    }

    function getDescripcionprod() {
        return $this->descripcionprod;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setIdproducto($idproducto) {
        $this->idproducto = $idproducto;
    }

    function setPrecio($precio) {
        $this->precio = $precio;
    }

    function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }

    function setValor($valor) {
        $this->valor = $valor;
    }

    function setDescuento($descuento) {
        $this->descuento = $descuento;
    }

    function setIdimpuesto($idimpuesto) {
        $this->idimpuesto = $idimpuesto;
    }

    function setIgv($igv) {
        $this->igv = $igv;
    }

    function setTotal($total) {
        $this->total = $total;
    }

//    function setUnidmed($unidmed) {
//        $this->unidmed = $unidmed;
//    }

    function setFactor($factor) {
        $this->factor = $factor;
    }

    function setIddocumento($iddocumento) {
        $this->iddocumento = $iddocumento;
    }

    function setCodigoprod($codigoprod) {
        $this->codigoprod = $codigoprod;
    }

    function setDescripcionprod($descripcionprod) {
        $this->descripcionprod = $descripcionprod;
    }

  function selectOneDoc($id){
        
        $data_source = new DataSource();

        $data_tabla = $data_source->ejecutarconsulta("select * from detalle  where id_documento=?;",array($id));

        
        $detalles = array();
        foreach ($data_tabla as $clave => $valor) {
            $detalle = new Detalle();
            $detalle->setId($data_tabla[$clave]["id"]);
            $detalle->setIdproducto($data_tabla[$clave]["id_producto"]);
            $detalle->setPrecio($data_tabla[$clave]["precio"]);
            $detalle->setCantidad($data_tabla[$clave]["cantidad"]);
            $detalle->setValor($data_tabla[$clave]["valor"]);
            $detalle->setDescuento($data_tabla[$clave]["descuento"]);
            $detalle->setIdimpuesto($data_tabla[$clave]["id_impuesto"]);
            $detalle->setIgv($data_tabla[$clave]["igv"]);
            $detalle->setTotal($data_tabla[$clave]["total"]);
            $detalle->setIdunidad($data_tabla[$clave]["id_unidad"]);
            $detalle->setFactor($data_tabla[$clave]["factor"]);
            $detalle->setIddocumento($data_tabla[$clave]["id_documento"]);
            $detalle->setCodigoprod($data_tabla[$clave]["codigoprod"]);
            $detalle->setDescripcionprod($data_tabla[$clave]["descripcionprod"]);
            
            array_push($detalles, $detalle);
   
             
        }
        return $detalles;
        
    }
    
      function insert(array $detalles) {
          
        var_dump($detalles);
        $data_source = new DataSource();
        $filas = 0;

        $filas = $data_source->insertmultiple("insert into detalle (id_producto,codigoprod ,descripcionprod ,id_unidad,"
                . "id_impuesto,cantidad,precio,valor,total,id_documento) values(?,?,?,?,?,?,?,?,?,?)", $detalles
        );
        return $filas;
    }
    
    
    

    
}
