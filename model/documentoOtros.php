<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of documentoOtros
 *
 * @author juana
 */
class documentoOtros {
    //put your code here
    private $id;
    private $iddocumento;
    private $nombre;
    private $descripcion;
    
    function __construct() {
        
    }
    function getId() {
        return $this->id;
    }

    function getIddocumento() {
        return $this->iddocumento;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setIddocumento($iddocumento) {
        $this->iddocumento = $iddocumento;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

     function insert(array $otros) {

        
        $data_source = new DataSource();
        $filas = 0;

        $filas = $data_source->insertmultiple("insert into documento_otros(nombre ,descripcion,id_documento) values(?,?,?)", $otros
        );
        return $filas;
    }

}
