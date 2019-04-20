<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of documento
 *
 * @author HERNAN
 */
class documento {
    //put your code here
    private $id;
    private $serie;
    private $numero;
    private $fechaemision;
    private $fechavencimiento;
    private $norden;
    private $moneda;
    private $incigv;
    private $idsunattransaction;
    private $idusuario;
    private $tipoventa;
    private $tipoventamov;
    private $tipoventaop;
    private $sujetoa;
    private $idpersona;
    private $ruc;
    private $razonsocial;
    private $direccion;
    private $email;
    private $estadosunat;
    private $estadolocal;
    private $total;
    private $tipo;
    private $idsucursal;
    private $observacion;
            
    function __construct() {
        
    }
    
    function getObservacion() {
        return $this->observacion;
    }

    function setObservacion($observacion) {
        $this->observacion = $observacion;
    }

        
    function getId() {
        return $this->id;
    }

    function getSerie() {
        return $this->serie;
    }

    function getNumero() {
        return $this->numero;
    }

    function getFechaemision() {
        return $this->fechaemision;
    }

    function getFechavencimiento() {
        return $this->fechavencimiento;
    }

    function getNorden() {
        return $this->norden;
    }

    function getMoneda() {
        return $this->moneda;
    }

    function getIncigv() {
        return $this->incigv;
    }

    function getIdsunattransaction() {
        return $this->idsunattransaction;
    }

    function getIdusuario() {
        return $this->idusuario;
    }

    function getTipoventa() {
        return $this->tipoventa;
    }

    function getTipoventamov() {
        return $this->tipoventamov;
    }

    function getTipoventaop() {
        return $this->tipoventaop;
    }

    function getSujetoa() {
        return $this->sujetoa;
    }

    function getIdpersona() {
        return $this->idpersona;
    }

    function getRuc() {
        return $this->ruc;
    }

    function getRazonsocial() {
        return $this->razonsocial;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getEmail() {
        return $this->email;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setSerie($serie) {
        $this->serie = $serie;
    }

    function setNumero($numero) {
        $this->numero = $numero;
    }

    function setFechaemision($fechaemision) {
        $this->fechaemision = $fechaemision;
    }

    function setFechavencimiento($fechavencimiento) {
        $this->fechavencimiento = $fechavencimiento;
    }

    function setNorden($norden) {
        $this->norden = $norden;
    }

    function setMoneda($moneda) {
        $this->moneda = $moneda;
    }

    function setIncigv($incigv) {
        $this->incigv = $incigv;
    }

    function setIdsunattransaction($idsunattransaction) {
        $this->idsunattransaction = $idsunattransaction;
    }

    function setIdusuario($idusuario) {
        $this->idusuario = $idusuario;
    }

    function setTipoventa($tipoventa) {
        $this->tipoventa = $tipoventa;
    }

    function setTipoventamov($tipoventamov) {
        $this->tipoventamov = $tipoventamov;
    }

    function setTipoventaop($tipoventaop) {
        $this->tipoventaop = $tipoventaop;
    }

    function setSujetoa($sujetoa) {
        $this->sujetoa = $sujetoa;
    }

    function setIdpersona($idpersona) {
        $this->idpersona = $idpersona;
    }

    function setRuc($ruc) {
        $this->ruc = $ruc;
    }

    function setRazonsocial($razonsocial) {
        $this->razonsocial = $razonsocial;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    function setEmail($email) {
        $this->email = $email;
    }
    function getEstadosunat() {
        return $this->estadosunat;
    }

    function getEstadolocal() {
        return $this->estadolocal;
    }

    function getTotal() {
        return $this->total;
    }

    function setEstadosunat($estadosunat) {
        $this->estadosunat = $estadosunat;
    }

    function setEstadolocal($estadolocal) {
        $this->estadolocal = $estadolocal;
    }

    function setTotal($total) {
        $this->total = $total;
    }
    function getTipo() {
        return $this->tipo;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }
    function getIdsucursal() {
        return $this->idsucursal;
    }

    function setIdsucursal($idsucursal) {
        $this->idsucursal = $idsucursal;
    }

    
    
        
     function selectAll(){
        
        $data_source = new DataSource();

        $data_tabla = $data_source->ejecutarconsulta("select * from documento  order by id desc;");

        
        $documentos = array();
        foreach ($data_tabla as $clave => $valor) {
            $documento = new documento();
            $documento->setId($data_tabla[$clave]["id"]);
            $documento->setserie($data_tabla[$clave]["serie"]);
            $documento->setNumero($data_tabla[$clave]["numero"]);
            $documento->setFechaemision($data_tabla[$clave]["fechaemision"]);
            $documento->setFechavencimiento($data_tabla[$clave]["fechavencimiento"]);
            $documento->setNorden($data_tabla[$clave]["nroden"]);
            $documento->setMoneda($data_tabla[$clave]["moneda"]);
            $documento->setIncigv($data_tabla[$clave]["incigv"]);
            $documento->setIdsunattransaction($data_tabla[$clave]["id_sunat_transaction"]);
            $documento->setIdusuario($data_tabla[$clave]["id_usuario"]);
            $documento->setTipoventa($data_tabla[$clave]["tipo_venta"]);
            $documento->setTipoventamov($data_tabla[$clave]["tipo_venta_movimiento"]);
            $documento->setTipoventaop($data_tabla[$clave]["tipo_venta_nop"]);
            $documento->setSujetoa($data_tabla[$clave]["sujetoa"]);
            $documento->setIdpersona($data_tabla[$clave]["id_persona"]);
            $documento->setRuc($data_tabla[$clave]["ruc"]);
            $documento->setRazonsocial($data_tabla[$clave]["razonsocial"]);
            $documento->setDireccion($data_tabla[$clave]["direccion"]);
            $documento->setEmail($data_tabla[$clave]["email"]);
            $documento->setEstadosunat($data_tabla[$clave]["estadosunat"]);
            $documento->setEstadolocal($data_tabla[$clave]["estadolocal"]);
            $documento->setEmail($data_tabla[$clave]["email"]);
            $documento->setTipo($data_tabla[$clave]["tipo"]);
            $documento->setTotal($data_tabla[$clave]["total"]);
            $documento->setIdsucursal($data_tabla[$clave]["id_sucursal"]);
            
   
            
      
             array_push($documentos, $documento);
        }
        return $documentos;
        
    }
    function select($desde,$hasta,$tipocomp,$buscar,$serie,$numero,$idsucur){
        
        
        $fecha='';
        if(!empty($desde) && !empty($hasta)){
            $fecha = 'fechaemision between "'.$desde.'" and "'.$hasta.'" and ';
            
        }
        if(!empty($tipocomp)){
            $tipocomp = 'tipo= "'.$tipocomp.'" and ';
            
        }
        if(!empty($buscar)){
            $buscar = 'concat(ruc,razonsocial) like concat("%","'.$buscar.'","%") and ';
            
        }
        if(!empty($serie)){
            $serie = 'serie= "'.$serie.'" and ';
            
        }
        if(!empty($numero)){
            $numero = 'numero= "'.$numero.'" and ';
            
        }
        if(!empty($idsucur)){
            $idsucur = 'id_sucursal= '.$idsucur;
            
        }
        
        
//        echo 'select * from documento  where '.$fecha.$tipocomp.$buscar.$serie.$numero.$idsucur.' order by id desc;';
        
        
                $data_source = new DataSource();

        $data_tabla = $data_source->ejecutarconsulta('select * from documento  where '.$fecha.$tipocomp.$buscar.$serie.$numero.$idsucur.' order by id desc;');

        
        $documentos = array();
        foreach ($data_tabla as $clave => $valor) {
            $documento = new documento();
            $documento->setId($data_tabla[$clave]["id"]);
            $documento->setserie($data_tabla[$clave]["serie"]);
            $documento->setNumero($data_tabla[$clave]["numero"]);
            $documento->setFechaemision($data_tabla[$clave]["fechaemision"]);
            $documento->setFechavencimiento($data_tabla[$clave]["fechavencimiento"]);
            $documento->setNorden($data_tabla[$clave]["nroden"]);
            $documento->setMoneda($data_tabla[$clave]["moneda"]);
            $documento->setIncigv($data_tabla[$clave]["incigv"]);
            $documento->setIdsunattransaction($data_tabla[$clave]["id_sunat_transaction"]);
            $documento->setIdusuario($data_tabla[$clave]["id_usuario"]);
            $documento->setTipoventa($data_tabla[$clave]["tipo_venta"]);
            $documento->setTipoventamov($data_tabla[$clave]["tipo_venta_movimiento"]);
            $documento->setTipoventaop($data_tabla[$clave]["tipo_venta_nop"]);
            $documento->setSujetoa($data_tabla[$clave]["sujetoa"]);
            $documento->setIdpersona($data_tabla[$clave]["id_persona"]);
            $documento->setRuc($data_tabla[$clave]["ruc"]);
            $documento->setRazonsocial($data_tabla[$clave]["razonsocial"]);
            $documento->setDireccion($data_tabla[$clave]["direccion"]);
            $documento->setEmail($data_tabla[$clave]["email"]);
            $documento->setEstadosunat($data_tabla[$clave]["estadosunat"]);
            $documento->setEstadolocal($data_tabla[$clave]["estadolocal"]);
            $documento->setEmail($data_tabla[$clave]["email"]);
            $documento->setTipo($data_tabla[$clave]["tipo"]);
            $documento->setTotal($data_tabla[$clave]["total"]);
            $documento->setIdsucursal($data_tabla[$clave]["id_sucursal"]);

            
   
            
      
             array_push($documentos, $documento);
        }
        return $documentos;
        
        
        
    }
            
    
    function insert(documento $documento){
        
        $data_source = new DataSource();
        $id = 0;

        $data_source->ejecutarActualizacion("insert into documento(serie, numero, fechaemision,fechavencimiento,nroden,"
                . "moneda,incigv,id_sunat_transaction,id_usuario,tipo_venta,tipo_venta_movimiento,tipo_venta_nop,"
                . "sujetoa,id_persona,ruc,razonsocial,direccion,email,estadosunat,estadolocal,total,tipo,id_sucursal) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)", array(
            $documento->getSerie(),
            $documento->getNumero(),
            $documento->getFechaemision(),
            $documento->getFechavencimiento(),
            $documento->getNorden(),
            $documento->getMoneda(),
            $documento->getIncigv(),
            $documento->getIdsunattransaction(),
            $documento->getIdusuario(),
            $documento->getTipoventa(),
            $documento->getTipoventamov(),
            $documento->getTipoventaop(),
            $documento->getSujetoa(),
            $documento->getIdpersona(),
            $documento->getRuc(),
            $documento->getRazonsocial(),
            $documento->getDireccion(),
            $documento->getEmail(),
            $documento->getEstadosunat(),
            $documento->getEstadolocal(),
            $documento->getTotal(),
            $documento->getTipo(),
            $documento->getIdsucursal()
            
        ));
        $id = $data_source->lastinsertid();
        return $id;
        
    
    
    
    }
    
    
      function selectOne($id){
        
        $data_source = new DataSource();

        $data_tabla = $data_source->ejecutarconsulta("select * from documento  where id=?;",array($id));

        
        $documento = new documento();
        foreach ($data_tabla as $clave => $valor) {
            
            $documento->setId($data_tabla[$clave]["id"]);
            $documento->setserie($data_tabla[$clave]["serie"]);
            $documento->setNumero($data_tabla[$clave]["numero"]);
            $documento->setFechaemision($data_tabla[$clave]["fechaemision"]);
            $documento->setFechavencimiento($data_tabla[$clave]["fechavencimiento"]);
            $documento->setNorden($data_tabla[$clave]["nroden"]);
            $documento->setMoneda($data_tabla[$clave]["moneda"]);
            $documento->setIncigv($data_tabla[$clave]["incigv"]);
            $documento->setIdsunattransaction($data_tabla[$clave]["id_sunat_transaction"]);
            $documento->setIdusuario($data_tabla[$clave]["id_usuario"]);
            $documento->setTipoventa($data_tabla[$clave]["tipo_venta"]);
            $documento->setTipoventamov($data_tabla[$clave]["tipo_venta_movimiento"]);
            $documento->setTipoventaop($data_tabla[$clave]["tipo_venta_nop"]);
            $documento->setSujetoa($data_tabla[$clave]["sujetoa"]);
            $documento->setIdpersona($data_tabla[$clave]["id_persona"]);
            $documento->setRuc($data_tabla[$clave]["ruc"]);
            $documento->setRazonsocial($data_tabla[$clave]["razonsocial"]);
            $documento->setDireccion($data_tabla[$clave]["direccion"]);
            $documento->setEmail($data_tabla[$clave]["email"]);
            $documento->setEstadosunat($data_tabla[$clave]["estadosunat"]);
            $documento->setEstadolocal($data_tabla[$clave]["estadolocal"]);
            $documento->setEmail($data_tabla[$clave]["email"]);
            $documento->setTipo($data_tabla[$clave]["tipo"]);
            $documento->setTotal($data_tabla[$clave]["total"]);
            $documento->setIdsucursal($data_tabla[$clave]["id_sucursal"]);
             
        }
        return $documento;
        
    }



}
