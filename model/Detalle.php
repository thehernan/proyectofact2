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
    
    private $igvprod;
    private $valorunitref;
    private $montobaseigv;
    private $montobaseexpo;
    private $montobaseexonarado;
    private $montobaseinafecto;
    private $montobasegratuito;
    private $montobaseivap;
    private $montobaseotrstributos;
    private $tributoventagratuita;
    private $otrostributos;
    private $porcentajaigv;
    private $porcentajeotrstributos;
    private $porcentjetributoventagratuita;
    private $montooriginal;
    private $monedaoriginal;
    private $incluyeserie;
    
         
    
    function __construct() {
        
    }
    
    function getIgvprod() {
        return $this->igvprod;
    }

    function getValorunitref() {
        return $this->valorunitref;
    }

    function getMontobaseigv() {
        return $this->montobaseigv;
    }

    function getMontobaseexpo() {
        return $this->montobaseexpo;
    }

    function getMontobaseexonarado() {
        return $this->montobaseexonarado;
    }

    function getMontobaseinafecto() {
        return $this->montobaseinafecto;
    }

    function getMontobasegratuito() {
        return $this->montobasegratuito;
    }

    function getMontobaseivap() {
        return $this->montobaseivap;
    }

    function getMontobaseotrstributos() {
        return $this->montobaseotrstributos;
    }

    function getTributoventagratuita() {
        return $this->tributoventagratuita;
    }

    function getOtrostributos() {
        return $this->otrostributos;
    }

    function getPorcentajaigv() {
        return $this->porcentajaigv;
    }

    function getPorcentajeotrstributos() {
        return $this->porcentajeotrstributos;
    }

    function getPorcentjetributoventagratuita() {
        return $this->porcentjetributoventagratuita;
    }

    function getMontooriginal() {
        return $this->montooriginal;
    }

    function getMonedaoriginal() {
        return $this->monedaoriginal;
    }

    function getIncluyeserie() {
        return $this->incluyeserie;
    }

    function setIgvprod($igvprod) {
        $this->igvprod = $igvprod;
    }

    function setValorunitref($valorunitref) {
        $this->valorunitref = $valorunitref;
    }

    function setMontobaseigv($montobaseigv) {
        $this->montobaseigv = $montobaseigv;
    }

    function setMontobaseexpo($montobaseexpo) {
        $this->montobaseexpo = $montobaseexpo;
    }

    function setMontobaseexonarado($montobaseexonarado) {
        $this->montobaseexonarado = $montobaseexonarado;
    }

    function setMontobaseinafecto($montobaseinafecto) {
        $this->montobaseinafecto = $montobaseinafecto;
    }

    function setMontobasegratuito($montobasegratuito) {
        $this->montobasegratuito = $montobasegratuito;
    }

    function setMontobaseivap($montobaseivap) {
        $this->montobaseivap = $montobaseivap;
    }

    function setMontobaseotrstributos($montobaseotrstributos) {
        $this->montobaseotrstributos = $montobaseotrstributos;
    }

    function setTributoventagratuita($tributoventagratuita) {
        $this->tributoventagratuita = $tributoventagratuita;
    }

    function setOtrostributos($otrostributos) {
        $this->otrostributos = $otrostributos;
    }

    function setPorcentajaigv($porcentajaigv) {
        $this->porcentajaigv = $porcentajaigv;
    }

    function setPorcentajeotrstributos($porcentajeotrstributos) {
        $this->porcentajeotrstributos = $porcentajeotrstributos;
    }

    function setPorcentjetributoventagratuita($porcentjetributoventagratuita) {
        $this->porcentjetributoventagratuita = $porcentjetributoventagratuita;
    }

    function setMontooriginal($montooriginal) {
        $this->montooriginal = $montooriginal;
    }

    function setMonedaoriginal($monedaoriginal) {
        $this->monedaoriginal = $monedaoriginal;
    }

    function setIncluyeserie($incluyeserie) {
        $this->incluyeserie = $incluyeserie;
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
            
            $detalle->setIgvprod($data_tabla[$clave]["igvprod"]);
            $detalle->setValorunitref($data_tabla[$clave]["valorunitref"]);
            $detalle->setMontobaseigv($data_tabla[$clave]["montobaseigv"]);
            $detalle->setMontobaseexpo($data_tabla[$clave]["montobaseexpo"]);
            $detalle->setMontobaseexonarado($data_tabla[$clave]["montobaseexonarado"]);
            $detalle->setMontobaseinafecto($data_tabla[$clave]["montobaseinafecto"]);
            $detalle->setMontobaseigv($data_tabla[$clave]["montobasegratuito"]);
            $detalle->setMontobaseivap($data_tabla[$clave]["montobaseivap"]);
            $detalle->setMontobaseotrstributos($data_tabla[$clave]["montobaseotrstributos"]);
            $detalle->setTributoventagratuita($data_tabla[$clave]["tributoventagratuita"]);
            $detalle->setOtrostributos($data_tabla[$clave]["otrostributos"]);
            $detalle->setPorcentajaigv($data_tabla[$clave]["porcentajaigv"]);
            $detalle->setPorcentajeotrstributos($data_tabla[$clave]["porcentajeotrstributos"]);
            $detalle->setPorcentjetributoventagratuita($data_tabla[$clave]["porcentjetributoventagratuita"]);
            $detalle->setMontooriginal($data_tabla[$clave]["montooriginal"]);
            $detalle->setMonedaoriginal($data_tabla[$clave]["monedaoriginal"]);
            $detalle->setIncluyeserie($data_tabla[$clave]["incluyeserie"]);
            $detalle->setMontobasegratuito($data_tabla[$clave]["montobasegratuito"]);
            
            
            
            array_push($detalles, $detalle);
   
             
        }
        return $detalles;
        
    }
    
      function insert(array $detalles) {
          
//        var_dump($detalles);
        $data_source = new DataSource();
        $filas = array();

        $filas = $data_source->insertmultiple("insert into detalle (id_producto,codigoprod ,descripcionprod ,id_unidad,"
                . "id_impuesto,cantidad,precio,valor,total,id_documento,igvprod,valorunitref,montobaseigv,montobaseexpo,montobaseexonarado,montobaseinafecto,"
                . "montobasegratuito,montobaseivap,montobaseotrstributos,tributoventagratuita,otrostributos,porcentajaigv,porcentajeotrstributos,porcentjetributoventagratuita,"
                . "montooriginal,monedaoriginal,incluyeserie) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)", $detalles
        );
        
        
        return $filas;
    }
    
    
    

    
}
