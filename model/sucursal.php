<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of sucursal
 *
 * @author HERNAN
 */
class sucursal {
    //put your code here
    private $id;
    private $codigo;
    private $nombre;
    private $empresa;
    private $ruc;
    private $slogan;
    private $serieimpresora;
    private $dpto;
    private $provincia;
    private $distrito;
    private $direccion;
    private $telf;
    private $telf1;
    private $telf2;
    private $telf3;
    private $web;
    private $email;
    private $responsable;
    private $mapaid;
    private $imglocal;
    private $imgtoplogo;
    private $imgpie;
    
    function __construct() {
        
    }
    function getId() {
        return $this->id;
    }

    function getCodigo() {
        return $this->codigo;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getEmpresa() {
        return $this->empresa;
    }

    function getRuc() {
        return $this->ruc;
    }

    function getSlogan() {
        return $this->slogan;
    }

    function getSerieimpresora() {
        return $this->serieimpresora;
    }

    function getDpto() {
        return $this->dpto;
    }

    function getProvincia() {
        return $this->provincia;
    }

    function getDistrito() {
        return $this->distrito;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getTelf() {
        return $this->telf;
    }

    function getTelf2() {
        return $this->telf2;
    }

    function getTelf3() {
        return $this->telf3;
    }

    function getWeb() {
        return $this->web;
    }

    function getEmail() {
        return $this->email;
    }

    function getResponsable() {
        return $this->responsable;
    }

    function getMapaid() {
        return $this->mapaid;
    }

    function getImglocal() {
        return $this->imglocal;
    }

    function getImgtoplogo() {
        return $this->imgtoplogo;
    }

    function getImgpie() {
        return $this->imgpie;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setEmpresa($empresa) {
        $this->empresa = $empresa;
    }

    function setRuc($ruc) {
        $this->ruc = $ruc;
    }

    function setSlogan($slogan) {
        $this->slogan = $slogan;
    }

    function setSerieimpresora($serieimpresora) {
        $this->serieimpresora = $serieimpresora;
    }

    function setDpto($dpto) {
        $this->dpto = $dpto;
    }

    function setProvincia($provincia) {
        $this->provincia = $provincia;
    }

    function setDistrito($distrito) {
        $this->distrito = $distrito;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    function setTelf($telf) {
        $this->telf = $telf;
    }
    function getTelf1() {
        return $this->telf1;
    }

    function setTelf1($telf1) {
        $this->telf1 = $telf1;
    }

    
    function setTelf2($telf2) {
        $this->telf2 = $telf2;
    }

    function setTelf3($telf3) {
        $this->telf3 = $telf3;
    }

    function setWeb($web) {
        $this->web = $web;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setResponsable($responsable) {
        $this->responsable = $responsable;
    }

    function setMapaid($mapaid) {
        $this->mapaid = $mapaid;
    }

    function setImglocal($imglocal) {
        $this->imglocal = $imglocal;
    }

    function setImgtoplogo($imgtoplogo) {
        $this->imgtoplogo = $imgtoplogo;
    }

    function setImgpie($imgpie) {
        $this->imgpie = $imgpie;
    }
    
    function selectAll(){
        $data_source = new DataSource();

        $data_tabla = $data_source->ejecutarconsulta("select * from sucursal where activo=1;");

        
        $sucursales= array();
        foreach ($data_tabla as $clave => $valor) {
            $sucursal = new sucursal();
            $sucursal->setId($data_tabla[$clave]["id"]);
            $sucursal->setCodigo($data_tabla[$clave]["codigo"]);
            $sucursal->setNombre($data_tabla[$clave]["nombre"]);
            $sucursal->setEmpresa($data_tabla[$clave]["empresa"]);
            $sucursal->setRuc($data_tabla[$clave]["ruc"]);
            $sucursal->setSlogan($data_tabla[$clave]["slogan"]);
            $sucursal->setSerieimpresora($data_tabla[$clave]["serie_impresora"]);
            $sucursal->setDpto($data_tabla[$clave]["dpto"]);
            $sucursal->setProvincia($data_tabla[$clave]["provincia"]);
            $sucursal->setDistrito($data_tabla[$clave]["distrito"]);
            $sucursal->setDireccion($data_tabla[$clave]["direccion"]);
            $sucursal->setTelf($data_tabla[$clave]["telf"]);
            $sucursal->setTelf1($data_tabla[$clave]["telf1"]);
            $sucursal->setTelf2($data_tabla[$clave]["telf2"]);
            $sucursal->setTelf3($data_tabla[$clave]["telf3"]);
            $sucursal->setWeb($data_tabla[$clave]["web"]);
            $sucursal->setEmail($data_tabla[$clave]["email"]);
            $sucursal->setResponsable($data_tabla[$clave]["responsable"]);
            $sucursal->setMapaid($data_tabla[$clave]["mapaID"]);
            $sucursal->setImglocal($data_tabla[$clave]["imglocal"]);
            $sucursal->setImgtoplogo($data_tabla[$clave]["imgtoplogo"]);
            $sucursal->setImgpie($data_tabla[$clave]["imgpie"]);
            array_push($sucursales, $sucursal);
        }
        return $sucursales;
        
    }
        function selectsecond(){
        $data_source = new DataSource();

        $data_tabla = $data_source->ejecutarconsulta("select * from sucursal where activo=1 and id != 1;");

        
        $sucursales= array();
        foreach ($data_tabla as $clave => $valor) {
            $sucursal = new sucursal();
            $sucursal->setId($data_tabla[$clave]["id"]);
            $sucursal->setCodigo($data_tabla[$clave]["codigo"]);
            $sucursal->setNombre($data_tabla[$clave]["nombre"]);
            $sucursal->setEmpresa($data_tabla[$clave]["empresa"]);
            $sucursal->setRuc($data_tabla[$clave]["ruc"]);
            $sucursal->setSlogan($data_tabla[$clave]["slogan"]);
            $sucursal->setSerieimpresora($data_tabla[$clave]["serie_impresora"]);
            $sucursal->setDpto($data_tabla[$clave]["dpto"]);
            $sucursal->setProvincia($data_tabla[$clave]["provincia"]);
            $sucursal->setDistrito($data_tabla[$clave]["distrito"]);
            $sucursal->setDireccion($data_tabla[$clave]["direccion"]);
            $sucursal->setTelf($data_tabla[$clave]["telf"]);
            $sucursal->setTelf1($data_tabla[$clave]["telf1"]);
            $sucursal->setTelf2($data_tabla[$clave]["telf2"]);
            $sucursal->setTelf3($data_tabla[$clave]["telf3"]);
            $sucursal->setWeb($data_tabla[$clave]["web"]);
            $sucursal->setEmail($data_tabla[$clave]["email"]);
            $sucursal->setResponsable($data_tabla[$clave]["responsable"]);
            $sucursal->setMapaid($data_tabla[$clave]["mapaID"]);
            $sucursal->setImglocal($data_tabla[$clave]["imglocal"]);
            $sucursal->setImgtoplogo($data_tabla[$clave]["imgtoplogo"]);
            $sucursal->setImgpie($data_tabla[$clave]["imgpie"]);
            array_push($sucursales, $sucursal);
        }
        return $sucursales;
        
    }
    
    function selectOne($id){
        $data_source = new DataSource();

        $data_tabla = $data_source->ejecutarconsulta("select * from sucursal where id=?;", array($id));

        $sucursal = new sucursal();

        foreach ($data_tabla as $clave => $valor) {

            $sucursal->setId($data_tabla[$clave]["id"]);
            $sucursal->setCodigo($data_tabla[$clave]["codigo"]);
            $sucursal->setNombre($data_tabla[$clave]["nombre"]);
            $sucursal->setEmpresa($data_tabla[$clave]["empresa"]);
            $sucursal->setRuc($data_tabla[$clave]["ruc"]);
            $sucursal->setSlogan($data_tabla[$clave]["slogan"]);
            $sucursal->setSerieimpresora($data_tabla[$clave]["serie_impresora"]);
            $sucursal->setDpto($data_tabla[$clave]["dpto"]);
            $sucursal->setProvincia($data_tabla[$clave]["provincia"]);
            $sucursal->setDistrito($data_tabla[$clave]["distrito"]);
            $sucursal->setDireccion($data_tabla[$clave]["direccion"]);
            $sucursal->setTelf($data_tabla[$clave]["telf"]);
            $sucursal->setTelf1($data_tabla[$clave]["telf1"]);
            $sucursal->setTelf2($data_tabla[$clave]["telf2"]);
            $sucursal->setTelf3($data_tabla[$clave]["telf3"]);
            $sucursal->setWeb($data_tabla[$clave]["web"]);
            $sucursal->setEmail($data_tabla[$clave]["email"]);
            $sucursal->setResponsable($data_tabla[$clave]["responsable"]);
            $sucursal->setMapaid($data_tabla[$clave]["mapaID"]);
            $sucursal->setImglocal($data_tabla[$clave]["imglocal"]);
            $sucursal->setImgtoplogo($data_tabla[$clave]["imgtoplogo"]);
            $sucursal->setImgpie($data_tabla[$clave]["imgpie"]);
        }
        return $sucursal;

    }
    
    function selectMain(){
        $data_source = new DataSource();

        $data_tabla = $data_source->ejecutarconsulta("select * from sucursal order by id ASC limit 1 ;");

        $sucursal = new sucursal();

        foreach ($data_tabla as $clave => $valor) {

            $sucursal->setId($data_tabla[$clave]["id"]);
            $sucursal->setCodigo($data_tabla[$clave]["codigo"]);
            $sucursal->setNombre($data_tabla[$clave]["nombre"]);
            $sucursal->setEmpresa($data_tabla[$clave]["empresa"]);
            $sucursal->setRuc($data_tabla[$clave]["ruc"]);
            $sucursal->setSlogan($data_tabla[$clave]["slogan"]);
            $sucursal->setSerieimpresora($data_tabla[$clave]["serie_impresora"]);
            $sucursal->setDpto($data_tabla[$clave]["dpto"]);
            $sucursal->setProvincia($data_tabla[$clave]["provincia"]);
            $sucursal->setDistrito($data_tabla[$clave]["distrito"]);
            $sucursal->setDireccion($data_tabla[$clave]["direccion"]);
            $sucursal->setTelf($data_tabla[$clave]["telf"]);
            $sucursal->setTelf1($data_tabla[$clave]["telf1"]);
            $sucursal->setTelf2($data_tabla[$clave]["telf2"]);
            $sucursal->setTelf3($data_tabla[$clave]["telf3"]);
            $sucursal->setWeb($data_tabla[$clave]["web"]);
            $sucursal->setEmail($data_tabla[$clave]["email"]);
            $sucursal->setResponsable($data_tabla[$clave]["responsable"]);
            $sucursal->setMapaid($data_tabla[$clave]["mapaID"]);
            $sucursal->setImglocal($data_tabla[$clave]["imglocal"]);
            $sucursal->setImgtoplogo($data_tabla[$clave]["imgtoplogo"]);
            $sucursal->setImgpie($data_tabla[$clave]["imgpie"]);
        }
        return $sucursal;

    }
    
    function update(sucursal $sucursal){
        $data_source = new DataSource();
        $filas = 0;
//        $cliente = new cliente();
//        $cliente = $objeto;
        $filas = $data_source->ejecutarActualizacion("update sucursal set codigo=?,nombre=?,empresa=?,ruc=?,slogan=?,"
                . "serie_impresora=?,dpto=?,provincia=?,distrito=?,direccion=?,telf=?,telf1=?,telf2=?,telf3=?,web=?,email=?,"
                . "responsable=?,mapaID=?,imglocal=?,imgtoplogo=?,imgpie=? where id=?;", array(
            
            $sucursal->getCodigo(),
            $sucursal->getNombre(),
            $sucursal->getEmpresa(),
            $sucursal->getRuc(),
            $sucursal->getSlogan(),
            $sucursal->getSerieimpresora(),
            $sucursal->getDpto(),
            $sucursal->getProvincia(),
            $sucursal->getDistrito(),
            $sucursal->getDireccion(),
            $sucursal->getTelf(),
            $sucursal->getTelf1(),
            $sucursal->getTelf2(),
            $sucursal->getTelf3(),
            $sucursal->getWeb(),
            $sucursal->getEmail(),
            $sucursal->getResponsable(),
            $sucursal->getMapaid(),
            $sucursal->getImglocal(),
            $sucursal->getImgtoplogo(),
            $sucursal->getImgpie(),
            $sucursal->getId()
            
        ));
       
        return $filas;
        
    }
        function updateimglocal(sucursal $sucursal){
        $data_source = new DataSource();
        $filas = 0;
//        $cliente = new cliente();
//        $cliente = $objeto;
        $filas = $data_source->ejecutarActualizacion("update sucursal set codigo=?,nombre=?,empresa=?,ruc=?,slogan=?,"
                . "serie_impresora=?,dpto=?,provincia=?,distrito=?,direccion=?,telf=?,telf1=?,telf2=?,telf3=?,web=?,email=?,"
                . "responsable=?,mapaID=?,imglocal=? where id=?;", array(
            
            $sucursal->getCodigo(),
            $sucursal->getNombre(),
            $sucursal->getEmpresa(),
            $sucursal->getRuc(),
            $sucursal->getSlogan(),
            $sucursal->getSerieimpresora(),
            $sucursal->getDpto(),
            $sucursal->getProvincia(),
            $sucursal->getDistrito(),
            $sucursal->getDireccion(),
            $sucursal->getTelf(),
            $sucursal->getTelf1(),
            $sucursal->getTelf2(),
            $sucursal->getTelf3(),
            $sucursal->getWeb(),
            $sucursal->getEmail(),
            $sucursal->getResponsable(),
            $sucursal->getMapaid(),
            $sucursal->getImglocal(),
       
            $sucursal->getId()
            
        ));
       
        return $filas;
        
    }
        function updateimgtoplogo(sucursal $sucursal){
        $data_source = new DataSource();
        $filas = 0;
//        $cliente = new cliente();
//        $cliente = $objeto;
         $filas = $data_source->ejecutarActualizacion("update sucursal set codigo=?,nombre=?,empresa=?,ruc=?,slogan=?,"
                . "serie_impresora=?,dpto=?,provincia=?,distrito=?,direccion=?,telf=?,telf1=?,telf2=?,telf3=?,web=?,email=?,"
                . "responsable=?,mapaID=?,imgtoplogo=? where id=?;", array(
            
            $sucursal->getCodigo(),
            $sucursal->getNombre(),
            $sucursal->getEmpresa(),
            $sucursal->getRuc(),
            $sucursal->getSlogan(),
            $sucursal->getSerieimpresora(),
            $sucursal->getDpto(),
            $sucursal->getProvincia(),
            $sucursal->getDistrito(),
            $sucursal->getDireccion(),
            $sucursal->getTelf(),
            $sucursal->getTelf1(),
            $sucursal->getTelf2(),
            $sucursal->getTelf3(),
            $sucursal->getWeb(),
            $sucursal->getEmail(),
            $sucursal->getResponsable(),
            $sucursal->getMapaid(),
          
            $sucursal->getImgtoplogo(),
         
            $sucursal->getId()
            
        ));
       
        return $filas;
        
    }
        function updateimgpie(sucursal $sucursal){
        $data_source = new DataSource();
        $filas = 0;

        $filas = $data_source->ejecutarActualizacion("update sucursal set codigo=?,nombre=?,empresa=?,ruc=?,slogan=?,"
                . "serie_impresora=?,dpto=?,provincia=?,distrito=?,direccion=?,telf=?,telf1=?,telf2=?,telf3=?,web=?,email=?,"
                . "responsable=?,mapaID=?,imgpie=? where id=?;", array(
            
            $sucursal->getCodigo(),
            $sucursal->getNombre(),
            $sucursal->getEmpresa(),
            $sucursal->getRuc(),
            $sucursal->getSlogan(),
            $sucursal->getSerieimpresora(),
            $sucursal->getDpto(),
            $sucursal->getProvincia(),
            $sucursal->getDistrito(),
            $sucursal->getDireccion(),
            $sucursal->getTelf(),
            $sucursal->getTelf1(),
            $sucursal->getTelf2(),
            $sucursal->getTelf3(),
            $sucursal->getWeb(),
            $sucursal->getEmail(),
            $sucursal->getResponsable(),
            $sucursal->getMapaid(),
     
            $sucursal->getImgpie(),
            $sucursal->getId()
            
        ));
       
        return $filas;
        
    }
    
       function updatenoimg(sucursal $sucursal){
        $data_source = new DataSource();
        $filas = 0;
//        $cliente = new cliente();
//        $cliente = $objeto;
        $filas = $data_source->ejecutarActualizacion("update sucursal set codigo=?,nombre=?,empresa=?,ruc=?,slogan=?,"
                . "serie_impresora=?,dpto=?,provincia=?,distrito=?,direccion=?,telf=?,telf1=?,telf2=?,telf3=?,web=?,email=?,"
                . "responsable=?,mapaID=? where id=?;", array(
            
            $sucursal->getCodigo(),
            $sucursal->getNombre(),
            $sucursal->getEmpresa(),
            $sucursal->getRuc(),
            $sucursal->getSlogan(),
            $sucursal->getSerieimpresora(),
            $sucursal->getDpto(),
            $sucursal->getProvincia(),
            $sucursal->getDistrito(),
            $sucursal->getDireccion(),
            $sucursal->getTelf(),
            $sucursal->getTelf1(),
            $sucursal->getTelf2(),
            $sucursal->getTelf3(),
            $sucursal->getWeb(),
            $sucursal->getEmail(),
            $sucursal->getResponsable(),
            $sucursal->getMapaid(),
            $sucursal->getId()
            
        ));
       
        return $filas;
        
    }
    function delete($id){
        $data_source = new DataSource();
        $filas = 0;
        $filas = $data_source->ejecutarActualizacion("update sucursal set activo=0 where id=?;",array($id));
        return $filas;
        
    }
    function insert(sucursal $sucursal){
        $data_source = new DataSource();
        $filas = 0;
//        $cliente = new cliente();
//        $cliente = $objeto;
//        var_dump($sucursal);
        $filas = $data_source->ejecutarActualizacion("insert into sucursal (codigo,nombre,empresa,ruc,slogan,"
                . "serie_impresora,dpto,provincia,distrito,direccion,telf,telf1,telf2,telf3,web,email,"
                . "responsable,mapaID,imglocal,imgtoplogo,imgpie,activo) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);", array(
            $sucursal->getCodigo(),
            $sucursal->getNombre(),
            $sucursal->getEmpresa(),
            $sucursal->getRuc(),
            $sucursal->getSlogan(),
            $sucursal->getSerieimpresora(),
            $sucursal->getDpto(),
            $sucursal->getProvincia(),
            $sucursal->getDistrito(),
            $sucursal->getDireccion(),
            $sucursal->getTelf(),
            $sucursal->getTelf1(),
            $sucursal->getTelf2(),
            $sucursal->getTelf3(),
            $sucursal->getWeb(),
            $sucursal->getEmail(),
            $sucursal->getResponsable(),
            $sucursal->getMapaid(),
            $sucursal->getImglocal(),
            $sucursal->getImgtoplogo(),
            $sucursal->getImgpie(),
            
            1
        ));
       
        return $filas;
        
    }


}
