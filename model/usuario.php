<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of usuario
 *
 * @author HERNAN
 */
class usuario {

    private $id;
    private $apellidop;    //put your code here
    private $apellidom;
    private $nombre;
    private $nacionalidad;
    private $sexo;
    private $fechan;
    private $dni;
    private $telf1;
    private $telf2;
    private $cel1;
    private $cel2;
    private $email;
    private $usuario;
    private $clave;
    private $id_nivel;
    private $comision;
    private $foto;
    private $idsucursal;
    private $sucursal;

    function __construct() {
        
    }

    function getSucursal() {
        return $this->sucursal;
    }

    function setSucursal($sucursal) {
        $this->sucursal = $sucursal;
    }

    function getIdsucursal() {
        return $this->idsucursal;
    }

    function setIdsucursal($idsucursal) {
        $this->idsucursal = $idsucursal;
    }

    function getId() {
        return $this->id;
    }

    function getApellidop() {
        return $this->apellidop;
    }

    function getApellidom() {
        return $this->apellidom;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getNacionalidad() {
        return $this->nacionalidad;
    }

    function getSexo() {
        return $this->sexo;
    }

    function getFechan() {
        return $this->fechan;
    }

    function getDni() {
        return $this->dni;
    }

    function getTelf1() {
        return $this->telf1;
    }

    function getTelf2() {
        return $this->telf2;
    }

    function getCel1() {
        return $this->cel1;
    }

    function getCel2() {
        return $this->cel2;
    }

    function getEmail() {
        return $this->email;
    }

    function getUsuario() {
        return $this->usuario;
    }

    function getClave() {
        return $this->clave;
    }

    function getId_nivel() {
        return $this->id_nivel;
    }

    function getComision() {
        return $this->comision;
    }

    function getFoto() {
        return $this->foto;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setApellidop($apellidop) {
        $this->apellidop = $apellidop;
    }

    function setApellidom($apellidom) {
        $this->apellidom = $apellidom;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setNacionalidad($nacionalidad) {
        $this->nacionalidad = $nacionalidad;
    }

    function setSexo($sexo) {
        $this->sexo = $sexo;
    }

    function setFechan($fechan) {
        $this->fechan = $fechan;
    }

    function setDni($dni) {
        $this->dni = $dni;
    }

    function setTelf1($telf1) {
        $this->telf1 = $telf1;
    }

    function setTelf2($telf2) {
        $this->telf2 = $telf2;
    }

    function setCel1($cel1) {
        $this->cel1 = $cel1;
    }

    function setCel2($cel2) {
        $this->cel2 = $cel2;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    function setClave($clave) {
        $this->clave = $clave;
    }

    function setId_nivel($id_nivel) {
        $this->id_nivel = $id_nivel;
    }

    function setComision($comision) {
        $this->comision = $comision;
    }

    function setFoto($foto) {
        $this->foto = $foto;
    }

    function selectAll() {
        $data_source = new DataSource();

        $data_tabla = $data_source->ejecutarconsulta("SELECT u.id,u.apellidoP,u.apellidoM,u.nombre,u.nacionalidad,
            u.sexo,u.fechaN,u.dni,u.telf1,u.telf2,u.cel1,u.cel2,u.email,u.usuario,
            u.clave,u.id_nivel,u.id_sucursal,u.comision,u.foto,s.nombre as sucursal
             from usuario as u LEFT JOIN sucursal as s 
            on u.id_sucursal = s.id where u.activo=1;");


        $usuarios = array();
        foreach ($data_tabla as $clave => $valor) {
            $usuario = new usuario();
            $usuario->setId($data_tabla[$clave]["id"]);
            $usuario->setApellidop($data_tabla[$clave]["apellidoP"]);
            $usuario->setApellidom($data_tabla[$clave]["apellidoM"]);
            $usuario->setNombre($data_tabla[$clave]["nombre"]);
            $usuario->setNacionalidad($data_tabla[$clave]["nacionalidad"]);
            $usuario->setSexo($data_tabla[$clave]["sexo"]);
            $usuario->setFechan($data_tabla[$clave]["fechaN"]);
            $usuario->setDni($data_tabla[$clave]["dni"]);
            $usuario->setTelf1($data_tabla[$clave]["telf1"]);
            $usuario->setTelf2($data_tabla[$clave]["telf2"]);
            $usuario->setCel1($data_tabla[$clave]["cel1"]);
            $usuario->setCel2($data_tabla[$clave]["cel2"]);
            $usuario->setEmail($data_tabla[$clave]["email"]);
            $usuario->setUsuario($data_tabla[$clave]["usuario"]);
            $usuario->setClave($data_tabla[$clave]["clave"]);
            $usuario->setId_nivel($data_tabla[$clave]["id_nivel"]);
            $usuario->setIdsucursal($data_tabla[$clave]["id_sucursal"]);
            $usuario->setComision($data_tabla[$clave]["comision"]);
            $usuario->setFoto($data_tabla[$clave]["foto"]);
            $usuario->setSucursal($data_tabla[$clave]["sucursal"]);

            array_push($usuarios, $usuario);
        }
        return $usuarios;
    }

    function selectOne($id) {
        $data_source = new DataSource();

        $data_tabla = $data_source->ejecutarconsulta("select * from usuario where activo=1 and id=?;", array($id));

        $usuario = new usuario();

        foreach ($data_tabla as $clave => $valor) {

            $usuario->setId($data_tabla[$clave]["id"]);
            $usuario->setApellidop($data_tabla[$clave]["apellidoP"]);
            $usuario->setApellidom($data_tabla[$clave]["apellidoM"]);
            $usuario->setNombre($data_tabla[$clave]["nombre"]);
            $usuario->setNacionalidad($data_tabla[$clave]["nacionalidad"]);
            $usuario->setSexo($data_tabla[$clave]["sexo"]);
            $usuario->setFechan($data_tabla[$clave]["fechaN"]);
            $usuario->setDni($data_tabla[$clave]["dni"]);
            $usuario->setTelf1($data_tabla[$clave]["telf1"]);
            $usuario->setTelf2($data_tabla[$clave]["telf2"]);
            $usuario->setCel1($data_tabla[$clave]["cel1"]);
            $usuario->setCel2($data_tabla[$clave]["cel2"]);
            $usuario->setEmail($data_tabla[$clave]["email"]);
            $usuario->setUsuario($data_tabla[$clave]["usuario"]);
            $usuario->setClave($data_tabla[$clave]["clave"]);
            $usuario->setId_nivel($data_tabla[$clave]["id_nivel"]);
            $usuario->setIdsucursal($data_tabla[$clave]["id_sucursal"]);
            $usuario->setComision($data_tabla[$clave]["comision"]);
            $usuario->setFoto($data_tabla[$clave]["foto"]);
        }
        return $usuario;
    }

    function insert(usuario $usuario) {
        $data_source = new DataSource();
        $filas = 0;

        $filas = $data_source->ejecutarActualizacion("insert into usuario(apellidoP,apellidoM,nombre,nacionalidad,sexo,"
                . "fechaN,dni,telf1,telf2,cel1,cel2,email,usuario,clave,id_nivel,id_sucursal,comision,foto,activo)"
                . " values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?) ;", array(
            $usuario->getApellidop(),
            $usuario->getApellidom(),
            $usuario->getNombre(),
            $usuario->getNacionalidad(),
            $usuario->getSexo(),
            $usuario->getFechan(),
            $usuario->getDni(),
            $usuario->getTelf1(),
            $usuario->getTelf2(),
            $usuario->getCel1(),
            $usuario->getCel2(),
            $usuario->getEmail(),
            $usuario->getUsuario(),
            $usuario->getClave(),
            $usuario->getId_nivel(),
            $usuario->getIdsucursal(),
            $usuario->getComision(),
            $usuario->getFoto(),
            TRUE
        ));

        return $filas;
    }

    function update(usuario $usuario) {
        $data_source = new DataSource();
        $filas = 0;

        $filas = $data_source->ejecutarActualizacion("update usuario set apellidoP=?,apellidoM=?,nombre=?,nacionalidad=?,sexo=?,"
                . "fechaN=?,dni=?,telf1=?,telf2=?,cel1=?,cel2=?,email=?,usuario=?,id_nivel=?,id_sucursal=?,comision=?,foto=? "
                . " where id=? ;", array(
            $usuario->getApellidop(),
            $usuario->getApellidom(),
            $usuario->getNombre(),
            $usuario->getNacionalidad(),
            $usuario->getSexo(),
            $usuario->getFechan(),
            $usuario->getDni(),
            $usuario->getTelf1(),
            $usuario->getTelf2(),
            $usuario->getCel1(),
            $usuario->getCel2(),
            $usuario->getEmail(),
            $usuario->getUsuario(),
//            $usuario->getClave(),
            $usuario->getId_nivel(),
            $usuario->getIdsucursal(),
            $usuario->getComision(),
            $usuario->getFoto(),
//            TRUE,
            $usuario->getId()
        ));

        return $filas;
    }

    function updatenofoto(usuario $usuario) {
        $data_source = new DataSource();
        $filas = 0;

        $filas = $data_source->ejecutarActualizacion("update usuario set apellidoP=?,apellidoM=?,nombre=?,nacionalidad=?,sexo=?,"
                . "fechaN=?,dni=?,telf1=?,telf2=?,cel1=?,cel2=?,email=?,usuario=?,id_nivel=?,id_sucursal=?,comision=? "
                . " where id=? ;", array(
            $usuario->getApellidop(),
            $usuario->getApellidom(),
            $usuario->getNombre(),
            $usuario->getNacionalidad(),
            $usuario->getSexo(),
            $usuario->getFechan(),
            $usuario->getDni(),
            $usuario->getTelf1(),
            $usuario->getTelf2(),
            $usuario->getCel1(),
            $usuario->getCel2(),
            $usuario->getEmail(),
            $usuario->getUsuario(),
//            $usuario->getClave(),
            $usuario->getId_nivel(),
            $usuario->getIdsucursal(),
            $usuario->getComision(),
//            $usuario->getFoto(),
//            TRUE,
            $usuario->getId()
        ));

        return $filas;
    }

    function updatekey($id, $key) {
        $data_source = new DataSource();
        $filas = 0;

        $filas = $data_source->ejecutarActualizacion("update usuario set clave=? "
                . " where id=? ;", array($key, $id
        ));

        return $filas;
    }

    function delete($id) {
        $data_source = new DataSource();
        $filas = 0;

        $filas = $data_source->ejecutarActualizacion("update usuario set activo=0 "
                . " where id=? ;", array($id));

        return $filas;
    }

    function login(usuario $user) {

        $data_source = new DataSource();
//        $user = $this->usuario;
//        $password = base64_encode($this->clave);
        $data_tabla = $data_source->ejecutarconsulta("SELECT u.id,u.apellidoP,u.apellidoM,u.nombre,u.nacionalidad,
            u.sexo,u.fechaN,u.dni,u.telf1,u.telf2,u.cel1,u.cel2,u.email,u.usuario,
            u.clave,u.id_nivel,u.id_sucursal,u.comision,u.foto,s.nombre as sucursal
             from usuario as u LEFT JOIN sucursal as s 
            on u.id_sucursal = s.id where usuario = ? and clave = ? and u.activo=1;", array($user->getUsuario(),base64_encode($user->getClave())));

        $usuario = null;

        foreach ($data_tabla as $clave => $valor) {
            $usuario = new usuario();
            $usuario->setId($data_tabla[$clave]["id"]);
            $usuario->setApellidop($data_tabla[$clave]["apellidoP"]);
            $usuario->setApellidom($data_tabla[$clave]["apellidoM"]);
            $usuario->setNombre($data_tabla[$clave]["nombre"]);
            $usuario->setNacionalidad($data_tabla[$clave]["nacionalidad"]);
            $usuario->setSexo($data_tabla[$clave]["sexo"]);
            $usuario->setFechan($data_tabla[$clave]["fechaN"]);
            $usuario->setDni($data_tabla[$clave]["dni"]);
            $usuario->setTelf1($data_tabla[$clave]["telf1"]);
            $usuario->setTelf2($data_tabla[$clave]["telf2"]);
            $usuario->setCel1($data_tabla[$clave]["cel1"]);
            $usuario->setCel2($data_tabla[$clave]["cel2"]);
            $usuario->setEmail($data_tabla[$clave]["email"]);
            $usuario->setUsuario($data_tabla[$clave]["usuario"]);
            $usuario->setClave($data_tabla[$clave]["clave"]);
            $usuario->setId_nivel($data_tabla[$clave]["id_nivel"]);
            $usuario->setIdsucursal($data_tabla[$clave]["id_sucursal"]);
            $usuario->setSucursal($data_tabla[$clave]["sucursal"]);
            $usuario->setComision($data_tabla[$clave]["comision"]);
            $usuario->setFoto($data_tabla[$clave]["foto"]);
        }
        return $usuario;
    }
 

}
