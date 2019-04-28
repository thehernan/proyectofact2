<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of cliente
 *
 * @author HERNAN
 */



class persona {

    private $id;
    private $nombre;
    private $ruc;
    private $representante;
    private $dni;
    private $dpto;
    private $provincia;
    private $distrito;
    private $direccion;
    private $telfijo;
    private $cel1;
    private $cel2;
    private $cel3;
    private $email;
    private $web;
    private $anivcumplenos;
    private $responsable;
    private $estado;
    private $representa;
    private $partida;
    private $tipopersona;
    private $idtipodocumento;
    private $modopago;

    function __construct() {
        
    }

    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function getModopago() {
        return $this->modopago;
    }

    function setModopago($modopago) {
        $this->modopago = $modopago;
    }

    function getRuc() {
        return $this->ruc;
    }

    function getIdtipodocumento() {
        return $this->idtipodocumento;
    }

    function setIdtipodocumento($idtipodocumento) {
        $this->idtipodocumento = $idtipodocumento;
    }

    function getRepresentante() {
        return $this->representante;
    }

    function getDni() {
        return $this->dni;
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

    function getTelfijo() {
        return $this->telfijo;
    }

    function getCel1() {
        return $this->cel1;
    }

    function getCel2() {
        return $this->cel2;
    }

    function getCel3() {
        return $this->cel3;
    }

    function getEmail() {
        return $this->email;
    }

    function getWeb() {
        return $this->web;
    }

    function getAnivcumplenos() {
        return $this->anivcumplenos;
    }

    function getResponsable() {
        return $this->responsable;
    }

    function getEstado() {
        return $this->estado;
    }

    function getRepresenta() {
        return $this->representa;
    }

    function getPartida() {
        return $this->partida;
    }

    function getTipopersona() {
        return $this->tipopersona;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setRuc($ruc) {
        $this->ruc = $ruc;
    }

    function setRepresentante($representante) {
        $this->representante = $representante;
    }

    function setDni($dni) {
        $this->dni = $dni;
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

    function setTelfijo($telfijo) {
        $this->telfijo = $telfijo;
    }

    function setCel1($cel1) {
        $this->cel1 = $cel1;
    }

    function setCel2($cel2) {
        $this->cel2 = $cel2;
    }

    function setCel3($cel3) {
        $this->cel3 = $cel3;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setWeb($web) {
        $this->web = $web;
    }

    function setAnivcumplenos($anivcumplenos) {
        $this->anivcumplenos = $anivcumplenos;
    }

    function setResponsable($responsable) {
        $this->responsable = $responsable;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setRepresenta($representa) {
        $this->representa = $representa;
    }

    function setPartida($partida) {
        $this->partida = $partida;
    }

    function setTipopersona($tipopersona) {
        $this->tipopersona = $tipopersona;
    }

    function select($tipo) {
        $data_source = new DataSource();

        $data_tabla = $data_source->ejecutarconsulta("select * from persona where tipopersona=? and activo = 1 order by id desc;", array($tipo));
        $personas = array();
        $persona = null;
        foreach ($data_tabla as $clave => $valor) {
            $persona = new persona();
            $persona->setId($data_tabla[$clave]["id"]);
            $persona->setNombre($data_tabla[$clave]["nombre"]);
            $persona->setRuc($data_tabla[$clave]["ruc"]);
            $persona->setRepresentante($data_tabla[$clave]["representante"]);
            $persona->setDni($data_tabla[$clave]["dni"]);
            $persona->setDpto($data_tabla[$clave]["dpto"]);
            $persona->setProvincia($data_tabla[$clave]["provincia"]);
            $persona->setDistrito($data_tabla[$clave]["distrito"]);
            $persona->setDireccion($data_tabla[$clave]["direccion"]);
            $persona->setTelfijo($data_tabla[$clave]["telfijo"]);
            $persona->setCel1($data_tabla[$clave]["cel1"]);
            $persona->setCel2($data_tabla[$clave]["cel2"]);
            $persona->setCel3($data_tabla[$clave]["cel3"]);
            $persona->setEmail($data_tabla[$clave]["email"]);
            $persona->setWeb($data_tabla[$clave]["web"]);
            $persona->setAnivcumplenos($data_tabla[$clave]["anivcumpleanos"]);
            $persona->setResponsable($data_tabla[$clave]["responsable"]);
            $persona->setEstado($data_tabla[$clave]["estado"]);
            $persona->setRepresenta($data_tabla[$clave]["representa"]);
            $persona->setPartida($data_tabla[$clave]["partida"]);
            $persona->setTipopersona($data_tabla[$clave]["tipopersona"]);
            $persona->setIdtipodocumento($data_tabla[$clave]["id_tipo_documento"]);
            $persona->setModopago($data_tabla[$clave]["modopago"]);



            array_push($personas, $persona);
        }
        return $personas;
    }

    function selectone($id) {
        $data_source = new DataSource();

        $data_tabla = $data_source->ejecutarconsulta("select * from persona where id=?;", array($id));

        $persona = new persona();
        foreach ($data_tabla as $clave => $valor) {

            $persona->setId($data_tabla[$clave]["id"]);
            $persona->setNombre($data_tabla[$clave]["nombre"]);
            $persona->setRuc($data_tabla[$clave]["ruc"]);
            $persona->setRepresentante($data_tabla[$clave]["representante"]);
            $persona->setDni($data_tabla[$clave]["dni"]);
            $persona->setDpto($data_tabla[$clave]["dpto"]);
            $persona->setProvincia($data_tabla[$clave]["provincia"]);
            $persona->setDistrito($data_tabla[$clave]["distrito"]);
            $persona->setDireccion($data_tabla[$clave]["direccion"]);
            $persona->setTelfijo($data_tabla[$clave]["telfijo"]);
            $persona->setCel1($data_tabla[$clave]["cel1"]);
            $persona->setCel2($data_tabla[$clave]["cel2"]);
            $persona->setCel3($data_tabla[$clave]["cel3"]);
            $persona->setEmail($data_tabla[$clave]["email"]);
            $persona->setWeb($data_tabla[$clave]["web"]);
            $persona->setAnivcumplenos($data_tabla[$clave]["anivcumpleanos"]);
            $persona->setResponsable($data_tabla[$clave]["responsable"]);
            $persona->setEstado($data_tabla[$clave]["estado"]);
            $persona->setRepresenta($data_tabla[$clave]["representa"]);
            $persona->setPartida($data_tabla[$clave]["partida"]);
            $persona->setTipopersona($data_tabla[$clave]["tipopersona"]);
            $persona->setIdtipodocumento($data_tabla[$clave]["id_tipo_documento"]);
            $persona->setModopago($data_tabla[$clave]["modopago"]);
            $persona->setTipopersona("tipopersona");
        }
        return $persona;
    }

    function update(persona $persona) {
        $data_source = new DataSource();
        $filas = 0;
//        $cliente = new cliente();
//        $cliente = $objeto;
        $filas = $data_source->ejecutarActualizacion("update persona set nombre=?, ruc=?,"
                . "representante=?,dni=?,dpto=?,provincia=?,"
                . "distrito=?, direccion=?,telfijo=?,cel1=?,"
                . "cel2=?, cel3=?,email=?,web=?,anivcumpleanos=?,"
                . "responsable=?,estado=?,representa=?,partida=?,"
                . "id_tipo_documento=?,modopago=? where id=?;", array($persona->getNombre(),
            $persona->getRuc(),
            $persona->getRepresentante(),
            $persona->getDni(),
            $persona->getDpto(),
            $persona->getProvincia(),
            $persona->getDistrito(),
            $persona->getDireccion(),
            $persona->getTelfijo(),
            $persona->getCel1(),
            $persona->getCel2(),
            $persona->getCel3(),
            $persona->getEmail(),
            $persona->getWeb(),
            $persona->getAnivcumplenos(),
            $persona->getResponsable(),
            $persona->getEstado(),
            $persona->getRepresenta(),
            $persona->getPartida(),
            $persona->getIdtipodocumento(),
            $persona->getModopago(),
           
            $persona->getId()
        ));
        return $filas;
    }
    function insert(persona $persona){
        
        $data_source = new DataSource();
        $filas = 0;
//        $cliente = new cliente();
//        $cliente = $objeto;
        $filas = $data_source->ejecutarActualizacion("insert into persona (nombre, ruc,"
                . "representante,dni,dpto,provincia,"
                . "distrito, direccion,telfijo,cel1,"
                . "cel2, cel3,email,web,anivcumpleanos,"
                . "responsable,estado,representa,partida,"
                . "id_tipo_documento,modopago,tipopersona,activo) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);", array($persona->getNombre(),
            $persona->getRuc(),
            $persona->getRepresentante(),
            $persona->getDni(),
            $persona->getDpto(),
            $persona->getProvincia(),
            $persona->getDistrito(),
            $persona->getDireccion(),
            $persona->getTelfijo(),
            $persona->getCel1(),
            $persona->getCel2(),
            $persona->getCel3(),
            $persona->getEmail(),
            $persona->getWeb(),
            $persona->getAnivcumplenos(),
            $persona->getResponsable(),
            $persona->getEstado(),
            $persona->getRepresenta(),
            $persona->getPartida(),
            $persona->getIdtipodocumento(),
            $persona->getModopago(),
            $persona->getTipopersona(),
            1
           
//            $persona->getId()
        ));
        return $filas;
    }
    
    function  delete($id){
        $data_source = new DataSource();
        $filas = 0;
//        $cliente = new cliente();
//        $cliente = $objeto;
        $filas = $data_source->ejecutarActualizacion("update persona set activo= 0  where id=?;", array(              
            $id
        ));
        
        return $filas;
        
        
    }
    
    function search($cadena){
        
         $data_source = new DataSource();

        $data_tabla = $data_source->ejecutarconsulta("select * from persona where ruc=? or dni=?;", array($cadena,$cadena));

        $persona = null;
        foreach ($data_tabla as $clave => $valor) {
            $persona = new persona();
            $persona->setId($data_tabla[$clave]["id"]);
            $persona->setNombre($data_tabla[$clave]["nombre"]);
            $persona->setRuc($data_tabla[$clave]["ruc"]);
            $persona->setRepresentante($data_tabla[$clave]["representante"]);
            $persona->setDni($data_tabla[$clave]["dni"]);
            $persona->setDpto($data_tabla[$clave]["dpto"]);
            $persona->setProvincia($data_tabla[$clave]["provincia"]);
            $persona->setDistrito($data_tabla[$clave]["distrito"]);
            $persona->setDireccion($data_tabla[$clave]["direccion"]);
            $persona->setTelfijo($data_tabla[$clave]["telfijo"]);
            $persona->setCel1($data_tabla[$clave]["cel1"]);
            $persona->setCel2($data_tabla[$clave]["cel2"]);
            $persona->setCel3($data_tabla[$clave]["cel3"]);
            $persona->setEmail($data_tabla[$clave]["email"]);
            $persona->setWeb($data_tabla[$clave]["web"]);
            $persona->setAnivcumplenos($data_tabla[$clave]["anivcumpleanos"]);
            $persona->setResponsable($data_tabla[$clave]["responsable"]);
            $persona->setEstado($data_tabla[$clave]["estado"]);
            $persona->setRepresenta($data_tabla[$clave]["representa"]);
            $persona->setPartida($data_tabla[$clave]["partida"]);
            $persona->setTipopersona($data_tabla[$clave]["tipopersona"]);
            $persona->setIdtipodocumento($data_tabla[$clave]["id_tipo_documento"]);
            $persona->setModopago($data_tabla[$clave]["modopago"]);
            $persona->setTipopersona("tipopersona");
        }
        return $persona;
        
        
        
    }

}
