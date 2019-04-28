<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of documento_guia
 *
 * @author juana
 */
class documentoGuia {
    //put your code here
    private $id;
    private $serienumero;
    private $guiatipo;
    private $iddocumento;
    private $identguia;
    
    function __construct() {
        
    }
    
    function getId() {
        return $this->id;
    }

    function getSerienumero() {
        return $this->serienumero;
    }

    function getGuiatipo() {
        return $this->guiatipo;
    }

    function getIddocumento() {
        return $this->iddocumento;
    }

    function getIdentguia() {
        return $this->identguia;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setSerienumero($serienumero) {
        $this->serienumero = $serienumero;
    }

    function setGuiatipo($guiatipo) {
        $this->guiatipo = $guiatipo;
    }

    function setIddocumento($iddocumento) {
        $this->iddocumento = $iddocumento;
    }

    function setIdentguia($identguia) {
        $this->identguia = $identguia;
    }
    
     function insert(array $guias) {

        
        $data_source = new DataSource();
        $filas = 0;

        $filas = $data_source->insertmultiple("insert into documento_guia(serienumero,guia_tipo ,id_documento) values(?,?,?)", $guias
        );
        return $filas;
    }



}
