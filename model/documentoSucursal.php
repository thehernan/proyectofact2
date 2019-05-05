<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of documentoSucursal
 *
 * @author HERNAN
 */
class documentoSucursal {

    //put your code here
    private $id;
    private $idsucursal;
    private $sucursal;
    private $tipodoc;
    private $serie;
    private $predeterminado;
    private $modoimpresion;

    function __construct() {
        
    }

    function getId() {
        return $this->id;
    }

    function getIdsucursal() {
        return $this->idsucursal;
    }

    function getSucursal() {
        return $this->sucursal;
    }

    function setSucursal($sucursal) {
        $this->sucursal = $sucursal;
    }

    function getTipodoc() {
        return $this->tipodoc;
    }

    function getSerie() {
        return $this->serie;
    }

    function getPredeterminado() {
        return $this->predeterminado;
    }

    function getModoimpresion() {
        return $this->modoimpresion;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setIdsucursal($idsucursal) {
        $this->idsucursal = $idsucursal;
    }

    function setTipodoc($tipodoc) {
        $this->tipodoc = $tipodoc;
    }

    function setSerie($serie) {
        $this->serie = $serie;
    }

    function setPredeterminado($predeterminado) {
        $this->predeterminado = $predeterminado;
    }

    function setModoimpresion($modoimpresion) {
        $this->modoimpresion = $modoimpresion;
    }

    function selectAll($idsucursal, $tipodoc) {
        $data_source = new DataSource();

        $data_tabla = $data_source->ejecutarconsulta("select doc.id,doc.id_sucursal,s.nombre,doc.tipo_documento,doc.serie,doc.predeterminado,doc.modoimpresion
 from documento_sucursal as doc INNER JOIN sucursal as s on
doc.id_sucursal=s.id  where doc.activo=1 and doc.id_sucursal=? and doc.tipo_documento= ? order by doc.id desc;",array($idsucursal,$tipodoc));

//        $documento = null;
        $documentos = array();
        foreach ($data_tabla as $clave => $valor) {
            $documento = new documentoSucursal();
            $documento->setId($data_tabla[$clave]["id"]);
            $documento->setIdsucursal($data_tabla[$clave]["id_sucursal"]);
            $documento->setSucursal($data_tabla[$clave]["nombre"]);
            $documento->setTipodoc($data_tabla[$clave]["tipo_documento"]);
            $documento->setSerie($data_tabla[$clave]["serie"]);
            $documento->setPredeterminado($data_tabla[$clave]["predeterminado"]);
            $documento->setModoimpresion($data_tabla[$clave]["modoimpresion"]);


            array_push($documentos, $documento);
        }
        return $documentos;
    }
    function select() {
        $data_source = new DataSource();

        $data_tabla = $data_source->ejecutarconsulta("select doc.id,doc.id_sucursal,s.nombre,doc.tipo_documento,doc.serie,doc.predeterminado,doc.modoimpresion
 from documento_sucursal as doc INNER JOIN sucursal as s on
doc.id_sucursal=s.id  where doc.activo=1 order by doc.id desc;");

//        $documento = null;
        $documentos = array();
        foreach ($data_tabla as $clave => $valor) {
            $documento = new documentoSucursal();
            $documento->setId($data_tabla[$clave]["id"]);
            $documento->setIdsucursal($data_tabla[$clave]["id_sucursal"]);
            $documento->setSucursal($data_tabla[$clave]["nombre"]);
            $documento->setTipodoc($data_tabla[$clave]["tipo_documento"]);
            $documento->setSerie($data_tabla[$clave]["serie"]);
            $documento->setPredeterminado($data_tabla[$clave]["predeterminado"]);
            $documento->setModoimpresion($data_tabla[$clave]["modoimpresion"]);


            array_push($documentos, $documento);
        }
        return $documentos;
    }

    function selectOne($id) {
        $data_source = new DataSource();

        $data_tabla = $data_source->ejecutarconsulta("select * from documento_sucursal where activo=1 and id = ? order by id desc;", array($id));

        $documento = new documentoSucursal();
        foreach ($data_tabla as $clave => $valor) {

            $documento->setId($data_tabla[$clave]["id"]);
            $documento->setIdsucursal($data_tabla[$clave]["id_sucursal"]);
            $documento->setTipodoc($data_tabla[$clave]["tipo_documento"]);
            $documento->setSerie($data_tabla[$clave]["serie"]);
            $documento->setPredeterminado($data_tabla[$clave]["predeterminado"]);
            $documento->setModoimpresion($data_tabla[$clave]["modoimpresion"]);
        }
        return $documento;
    }

    function insert(documentoSucursal $documento) {
        $data_source = new DataSource();
        $filas = 0;
//        $cliente = new cliente();
//        $cliente = $objeto;
        $filas = $data_source->ejecutarActualizacion("insert into documento_sucursal (id_sucursal,tipo_documento, serie,"
                . "predeterminado,modoimpresion,activo) values(?,?,?,?,?,?);", array(
            $documento->getIdsucursal(),
            $documento->getTipodoc(),
            $documento->getSerie(),
            $documento->getPredeterminado(),
            $documento->getModoimpresion(),
            TRUE
        ));

        return $filas;
    }

    function update(documentoSucursal $documento) {
        $data_source = new DataSource();
        $filas = 0;
//        $cliente = new cliente();
//        $cliente = $objeto;
        $filas = $data_source->ejecutarActualizacion("update  documento_sucursal set id_sucursal=?, tipo_documento=?, serie=?,"
                . "predeterminado=?,modoimpresion=? where id = ?;", array(
            $documento->getIdsucursal(),
            $documento->getTipodoc(),
            $documento->getSerie(),
            $documento->getPredeterminado(),
            $documento->getModoimpresion(),
            $documento->getId(),
        ));

        return $filas;
    }

    function delete($id) {
        $data_source = new DataSource();
        $filas = 0;
//        $cliente = new cliente();
//        $cliente = $objeto;
        $filas = $data_source->ejecutarActualizacion("update  documento_sucursal set activo=0 where id = ?;", array(
            $id
        ));

        return $filas;
    }

}
