<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of producto
 *
 * @author HERNAN
 */
class producto {

    //put your code here
    private $id;
    private $tipo;
    private $codigo;
    private $codbarra;
    private $marca;
    private $descripcion;
    private $unidmed;
    private $moneda;
    private $precioc;
    private $preciov;
    private $preciovmin;
    private $stock;
    private $peso;
    private $incluir;
    private $nrocuenta;
    private $observacion;
    private $idtipoimpuesto;
    private $prodservi;
    private $idcategoria;
    private $idlinea;
    private $idmarca;
    private $idunidmedida;

    function __construct() {
        
    }

    function getId() {
        return $this->id;
    }

    function getTipo() {
        return $this->tipo;
    }

    function getCodigo() {
        return $this->codigo;
    }

    function getCodbarra() {
        return $this->codbarra;
    }

    function getMarca() {
        return $this->marca;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getUnidmed() {
        return $this->unidmed;
    }

    function getMoneda() {
        return $this->moneda;
    }

    function getPrecioc() {
        return $this->precioc;
    }

    function getPreciov() {
        return $this->preciov;
    }

    function getPreciovmin() {
        return $this->preciovmin;
    }

    function getStock() {
        return $this->stock;
    }

    function getPeso() {
        return $this->peso;
    }

    function getIncluir() {
        return $this->incluir;
    }

    function getNrocuenta() {
        return $this->nrocuenta;
    }

    function getObservacion() {
        return $this->observacion;
    }

    function getIdtipoimpuesto() {
        return $this->idtipoimpuesto;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setCodbarra($codbarra) {
        $this->codbarra = $codbarra;
    }

    function setMarca($marca) {
        $this->marca = $marca;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setUnidmed($unidmed) {
        $this->unidmed = $unidmed;
    }

    function setMoneda($moneda) {
        $this->moneda = $moneda;
    }

    function setPrecioc($precioc) {
        $this->precioc = $precioc;
    }

    function setPreciov($preciov) {
        $this->preciov = $preciov;
    }

    function setPreciovmin($preciovmin) {
        $this->preciovmin = $preciovmin;
    }

    function setStock($stock) {
        $this->stock = $stock;
    }

    function setPeso($peso) {
        $this->peso = $peso;
    }

    function setIncluir($incluir) {
        $this->incluir = $incluir;
    }

    function setNrocuenta($nrocuenta) {
        $this->nrocuenta = $nrocuenta;
    }

    function setObservacion($observacion) {
        $this->observacion = $observacion;
    }

    function setIdtipoimpuesto($idtipoimpuesto) {
        $this->idtipoimpuesto = $idtipoimpuesto;
    }

    function getProdservi() {
        return $this->prodservi;
    }

    function getIdcategoria() {
        return $this->idcategoria;
    }

    function getIdlinea() {
        return $this->idlinea;
    }

    function getIdmarca() {
        return $this->idmarca;
    }

    function getIdunidmedida() {
        return $this->idunidmedida;
    }

    function setProdservi($prodservi) {
        $this->prodservi = $prodservi;
    }

    function setIdcategoria($idcategoria) {
        $this->idcategoria = $idcategoria;
    }

    function setIdlinea($idlinea) {
        $this->idlinea = $idlinea;
    }

    function setIdmarca($idmarca) {
        $this->idmarca = $idmarca;
    }

    function setIdunidmedida($idunidmedida) {
        $this->idunidmedida = $idunidmedida;
    }

    function select($id) {

        $data_source = new DataSource();

        $data_tabla = $data_source->ejecutarconsulta("select * from producto where prod_servi=? and activo=1 order by id desc;", array($id));

        $producto = null;
        $productos = array();
        foreach ($data_tabla as $clave => $valor) {
            $producto = new producto();
            $producto->setId($data_tabla[$clave]["id"]);
            $producto->setTipo($data_tabla[$clave]["tipo"]);
            $producto->setCodigo($data_tabla[$clave]["codigo"]);
            $producto->setCodbarra($data_tabla[$clave]["codigobarra"]);
            $producto->setMarca($data_tabla[$clave]["marca"]);
            $producto->setDescripcion($data_tabla[$clave]["descripcion"]);
            $producto->setUnidmed($data_tabla[$clave]["unidmed"]);
            $producto->setMoneda($data_tabla[$clave]["moneda"]);
            $producto->setPrecioc($data_tabla[$clave]["precioc"]);
            $producto->setPreciov($data_tabla[$clave]["preciov"]);
            $producto->setPreciovmin($data_tabla[$clave]["preciovmin"]);
            $producto->setStock($data_tabla[$clave]["stock"]);
            $producto->setPeso($data_tabla[$clave]["peso"]);
            $producto->setIncluir($data_tabla[$clave]["incluir"]);
            $producto->setNrocuenta($data_tabla[$clave]["nrocuenta"]);
            $producto->setObservacion($data_tabla[$clave]["observacion"]);
            $producto->setIdtipoimpuesto($data_tabla[$clave]["id_tipo_impuesto"]);
            $producto->setProdservi($data_tabla[$clave]["prod_servi"]);
            $producto->setIdcategoria($data_tabla[$clave]["id_categoria"]);
            $producto->setIdlinea($data_tabla[$clave]["id_linea"]);
            $producto->setIdmarca($data_tabla[$clave]["id_marca"]);
            $producto->setIdunidmedida($data_tabla[$clave]["id_unidmedida"]);
            array_push($productos, $producto);
        }
        return $productos;
    }

    function selectone($id) {

        $data_source = new DataSource();

        $data_tabla = $data_source->ejecutarconsulta("select * from producto where id=?;", array($id));

        $producto = new producto();

        foreach ($data_tabla as $clave => $valor) {

            $producto->setId($data_tabla[$clave]["id"]);
            $producto->setTipo($data_tabla[$clave]["tipo"]);
            $producto->setCodigo($data_tabla[$clave]["codigo"]);
            $producto->setCodbarra($data_tabla[$clave]["codigobarra"]);
            $producto->setMarca($data_tabla[$clave]["marca"]);
            $producto->setDescripcion($data_tabla[$clave]["descripcion"]);
            $producto->setUnidmed($data_tabla[$clave]["unidmed"]);
            $producto->setMoneda($data_tabla[$clave]["moneda"]);
            $producto->setPrecioc($data_tabla[$clave]["precioc"]);
            $producto->setPreciov($data_tabla[$clave]["preciov"]);
            $producto->setPreciovmin($data_tabla[$clave]["preciovmin"]);
            $producto->setStock($data_tabla[$clave]["stock"]);
            $producto->setPeso($data_tabla[$clave]["peso"]);
            $producto->setIncluir($data_tabla[$clave]["incluir"]);
            $producto->setNrocuenta($data_tabla[$clave]["nrocuenta"]);
            $producto->setObservacion($data_tabla[$clave]["observacion"]);
            $producto->setIdtipoimpuesto($data_tabla[$clave]["id_tipo_impuesto"]);
            $producto->setProdservi($data_tabla[$clave]["prod_servi"]);
            $producto->setIdcategoria($data_tabla[$clave]["id_categoria"]);
            $producto->setIdlinea($data_tabla[$clave]["id_linea"]);
            $producto->setIdmarca($data_tabla[$clave]["id_marca"]);
            $producto->setIdunidmedida($data_tabla[$clave]["id_unidmedida"]);
        }
        return $producto;
    }

    function insert(producto $producto) {

        $data_source = new DataSource();
        $filas = 0;
//        $cliente = new cliente();
//        $cliente = $objeto;
        var_dump($producto);
        $filas = $data_source->ejecutarActualizacion("insert into producto (tipo, codigo,"
                . "codigobarra,marca,descripcion,unidmed,"
                . "moneda, precioc,preciov,preciovmin,"
                . "stock, peso,incluir,nrocuenta,observacion,"
                . "id_tipo_impuesto,prod_servi,id_categoria,id_linea,"
                . "id_marca,id_unidmedida,activo) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);", array(
            $producto->getTipo(),
            $producto->getCodigo(),
            $producto->getCodbarra(),
            $producto->getMarca(),
            $producto->getDescripcion(),
            $producto->getUnidmed(),
            $producto->getMoneda(),
            $producto->getPrecioc(),
            $producto->getPreciov(),
            $producto->getPreciovmin(),
            $producto->getStock(),
            $producto->getPeso(),
            $producto->getIncluir(),
            $producto->getNrocuenta(),
            $producto->getObservacion(),
            $producto->getIdtipoimpuesto(),
            $producto->getProdservi(),
            $producto->getIdcategoria(),
            $producto->getIdlinea(),
            $producto->getIdmarca(),
            $producto->getIdunidmedida(),
            TRUE
        ));
       
        return $filas;
    }
    
      function update(producto $producto) {

        $data_source = new DataSource();
        $filas = 0;
//        $cliente = new cliente();
//        $cliente = $objeto;
        $filas = $data_source->ejecutarActualizacion("update producto set tipo=?, codigo=?,"
                . "codigobarra=?,marca=?,descripcion=?,unidmed=?,"
                . "moneda=?, precioc=?,preciov=?,preciovmin=?,"
                . "stock=?, peso=?,incluir=?,nrocuenta=?,observacion=?,"
                . "id_tipo_impuesto=?,id_categoria=?,id_linea=?,"
                . "id_marca=?,id_unidmedida=? where id= ?;", array(
            $producto->getTipo(),
            $producto->getCodigo(),
            $producto->getCodbarra(),
            $producto->getMarca(),
            $producto->getDescripcion(),
            $producto->getUnidmed(),
            $producto->getMoneda(),
            $producto->getPrecioc(),
            $producto->getPreciov(),
            $producto->getPreciovmin(),
            $producto->getStock(),
            $producto->getPeso(),
            $producto->getIncluir(),
            $producto->getNrocuenta(),
            $producto->getObservacion(),
            $producto->getIdtipoimpuesto(),
           
            $producto->getIdcategoria(),
            $producto->getIdlinea(),
            $producto->getIdmarca(),
            $producto->getIdunidmedida(),
            $producto->getId()
        ));
       
        return $filas;
    }
      function updatestock(array $producto) {

        $data_source = new DataSource();
//        $filas = 0;
//        $cliente = new cliente();
//        $cliente = $objeto;
        $filas = $data_source->insertmultiple("update producto set "
                . "stock= stock + ? where id= ? and prod_servi = 'producto' and incluir != 'Si' ;", $producto);
       
        return $filas;
    }
    
    
         function delete($id) {

        $data_source = new DataSource();
        $filas = 0;
//        $cliente = new cliente();
//        $cliente = $objeto;
        $filas = $data_source->ejecutarActualizacion("update producto set activo=0 where id= ?;", array(
            $id
        ));
       
        return $filas;
    }
    
        function search($cadena) {

        $data_source = new DataSource();

        $data_tabla = $data_source->ejecutarconsulta("select * from producto where descripcion like concat('%',?,'%') order by id desc;", array($cadena));

        $producto = null;
        $productos = array();
        foreach ($data_tabla as $clave => $valor) {
            $producto = new producto();
            $producto->setId($data_tabla[$clave]["id"]);
            $producto->setTipo($data_tabla[$clave]["tipo"]);
            $producto->setCodigo($data_tabla[$clave]["codigo"]);
            $producto->setCodbarra($data_tabla[$clave]["codigobarra"]);
            $producto->setMarca($data_tabla[$clave]["marca"]);
            $producto->setDescripcion($data_tabla[$clave]["descripcion"]);
            $producto->setUnidmed($data_tabla[$clave]["unidmed"]);
            $producto->setMoneda($data_tabla[$clave]["moneda"]);
            $producto->setPrecioc($data_tabla[$clave]["precioc"]);
            $producto->setPreciov($data_tabla[$clave]["preciov"]);
            $producto->setPreciovmin($data_tabla[$clave]["preciovmin"]);
            $producto->setStock($data_tabla[$clave]["stock"]);
            $producto->setPeso($data_tabla[$clave]["peso"]);
            $producto->setIncluir($data_tabla[$clave]["incluir"]);
            $producto->setNrocuenta($data_tabla[$clave]["nrocuenta"]);
            $producto->setObservacion($data_tabla[$clave]["observacion"]);
            $producto->setIdtipoimpuesto($data_tabla[$clave]["id_tipo_impuesto"]);
            $producto->setProdservi($data_tabla[$clave]["prod_servi"]);
            $producto->setIdcategoria($data_tabla[$clave]["id_categoria"]);
            $producto->setIdlinea($data_tabla[$clave]["id_linea"]);
            $producto->setIdmarca($data_tabla[$clave]["id_marca"]);
            $producto->setIdunidmedida($data_tabla[$clave]["id_unidmedida"]);
            array_push($productos, $producto);
        }
        return $productos;
    }

}
