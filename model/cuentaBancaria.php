<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of cuentaBancaria
 *
 * @author HERNAN
 */
class cuentaBancaria {

    //put your code here
    private $id;
    private $idbanco;
    private $cci;
    private $numero;
    private $titular;
    private $banco;

    function __construct() {
        
    }

    function getId() {
        return $this->id;
    }

    function getIdbanco() {
        return $this->idbanco;
    }
    
    function getBanco() {
        return $this->banco;
    }

    function setBanco($banco) {
        $this->banco = $banco;
    }

    function getCci() {
        return $this->cci;
    }

    function getNumero() {
        return $this->numero;
    }

    function getTitular() {
        return $this->titular;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setIdbanco($idbanco) {
        $this->idbanco = $idbanco;
    }

    function setCci($cci) {
        $this->cci = $cci;
    }

    function setNumero($numero) {
        $this->numero = $numero;
    }

    function setTitular($titular) {
        $this->titular = $titular;
    }

    function selectAll() {
        $data_source = new DataSource();

        $data_tabla = $data_source->ejecutarconsulta("select * from cuenta_bancaria order by id desc;");


        $cuentas = array();
        foreach ($data_tabla as $clave => $valor) {
            $cuenta = new cuentaBancaria();
            $cuenta->setId($data_tabla[$clave]["id"]);
            $cuenta->setIdbanco($data_tabla[$clave]["id_banco"]);
            $cuenta->setCci($data_tabla[$clave]["cci"]);
            $cuenta->setNumero($data_tabla[$clave]["numero"]);
            $cuenta->setTitular($data_tabla[$clave]["titular"]);
            $cuenta->setBanco($data_tabla[$clave]["banco"]);
            


            array_push($cuentas, $cuenta);
        }
        return $cuentas;
    }

    function selectOne($id) {
        $data_source = new DataSource();

        $data_tabla = $data_source->ejecutarconsulta("select * from cuenta_bancaria where id= ? ", array($id));


        $cuenta = new cuentaBancaria();
        foreach ($data_tabla as $clave => $valor) {

            $cuenta->setId($data_tabla[$clave]["id"]);
            $cuenta->setIdbanco($data_tabla[$clave]["id_banco"]);
            $cuenta->setCci($data_tabla[$clave]["cci"]);
            $cuenta->setNumero($data_tabla[$clave]["numero"]);
            $cuenta->setTitular($data_tabla[$clave]["titular"]);
            $cuenta->setBanco($data_tabla[$clave]["banco"]);
        }
        return $cuenta;
    }

    function insert(cuentaBancaria $cuenta) {
       
        $data_source = new DataSource();
        $filas = 0;

        $filas = $data_source->ejecutarActualizacion("insert into cuenta_bancaria (id_banco,cci,numero,titular,banco) values(?,?,?,?,?)",
                array($cuenta->getIdbanco(),$cuenta->getCci(),$cuenta->getNumero(),$cuenta->getTitular(),$cuenta->getBanco()));

        return $filas;
    }

    function update(cuentaBancaria $cuenta) {

        $data_source = new DataSource();
        $filas = 0;

        $filas = $data_source->ejecutarActualizacion("update cuenta_bancaria set id_banco=?, cci=?, numero=?, titular=?, banco=? where id= ?",
                array($cuenta->getIdbanco(),$cuenta->getCci(),$cuenta->getNumero(),$cuenta->getTitular(),$cuenta->getBanco(),$cuenta->getId()));

        return $filas;
    }

}
