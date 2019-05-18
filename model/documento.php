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
    private $tipodoc;
    private $tipocambio;
    private $docref;
    private $serieref;
    private $numeroref;
    private $idtiponota;
    private $garantia;
    private $condicionpago;
    private $validezdias;
    private $plazoentregadias;
    private $condicionpagodias;
    private $atencion;
    private $tipopago;
    private $nrooptipopago;
    private $motivoanulacion;

    function __construct() {
        
    }

    function getMotivoanulacion() {
        return $this->motivoanulacion;
    }

    function setMotivoanulacion($motivoanulacion) {
        $this->motivoanulacion = $motivoanulacion;
    }

        function getTipopago() {
        return $this->tipopago;
    }

    function getNrooptipopago() {
        return $this->nrooptipopago;
    }

    function setTipopago($tipopago) {
        $this->tipopago = $tipopago;
    }

    function setNrooptipopago($nrooptipopago) {
        $this->nrooptipopago = $nrooptipopago;
    }

    function getCondicionpago() {
        return $this->condicionpago;
    }

    function getValidezdias() {
        return $this->validezdias;
    }

    function getPlazoentregadias() {
        return $this->plazoentregadias;
    }

    function getCondicionpagodias() {
        return $this->condicionpagodias;
    }

    function getAtencion() {
        return $this->atencion;
    }

    function setCondicionpago($condicionpago) {
        $this->condicionpago = $condicionpago;
    }

    function setValidezdias($validezdias) {
        $this->validezdias = $validezdias;
    }

    function setPlazoentregadias($plazoentregadias) {
        $this->plazoentregadias = $plazoentregadias;
    }

    function setCondicionpagodias($condicionpagodias) {
        $this->condicionpagodias = $condicionpagodias;
    }

    function setAtencion($atencion) {
        $this->atencion = $atencion;
    }

    function getGarantia() {
        return $this->garantia;
    }

    function setGarantia($garantia) {
        $this->garantia = $garantia;
    }

    function getDocref() {
        return $this->docref;
    }

    function getSerieref() {
        return $this->serieref;
    }

    function getNumeroref() {
        return $this->numeroref;
    }

    function getIdtiponota() {
        return $this->idtiponota;
    }

    function setDocref($docref) {
        $this->docref = $docref;
    }

    function setSerieref($serieref) {
        $this->serieref = $serieref;
    }

    function setNumeroref($numeroref) {
        $this->numeroref = $numeroref;
    }

    function setIdtiponota($idtiponota) {
        $this->idtiponota = $idtiponota;
    }

    function getTipocambio() {
        return $this->tipocambio;
    }

    function setTipocambio($tipocambio) {
        $this->tipocambio = $tipocambio;
    }

    function getTipodoc() {
        return $this->tipodoc;
    }

    function setTipodoc($tipodoc) {
        $this->tipodoc = $tipodoc;
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

    function selectAll() {

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
            $documento->setTipopago($data_tabla[$clave]["tipo_pago"]);
            $documento->setNrooptipopago($data_tabla[$clave]["nroop_tipopago"]);





            array_push($documentos, $documento);
        }
        return $documentos;
    }

    function select($desde, $hasta, $tipocomp,$tipodoc, $buscar, $serie, $numero, $idsucur) {


        $fecha = '';
        if (!empty($desde) && !empty($hasta)) {
            $fecha = 'fechaemision between "' . $desde . '" and "' . $hasta . '" and ';
        }
        if (!empty($tipocomp)) {
            $tipocomp = 'tipo= "' . $tipocomp . '" and ';
        }
        if (!empty($tipodoc)) {
            $tipodoc = 'tipo_doc= "' . $tipodoc . '" and ';
        }
        if (!empty($buscar)) {
            $buscar = 'concat(ruc,razonsocial) like concat("%","' . $buscar . '","%") and ';
        }
        if (!empty($serie)) {
            $serie = 'serie= "' . $serie . '" and ';
        }
        if (!empty($numero)) {
            $numero = 'numero= "' . $numero . '" and ';
        }
        if (!empty($idsucur)) {
            $idsucur = 'id_sucursal= ' . $idsucur;
        }


//        echo 'select * from documento  where '.$fecha.$tipocomp.$buscar.$serie.$numero.$idsucur.' order by id desc;';


        $data_source = new DataSource();

        $data_tabla = $data_source->ejecutarconsulta('SELECT doc.*,sum(det.total) as totaldoc FROM `documento` as doc inner join detalle as det on det.id_documento=doc.id
  where ' . $fecha . $tipocomp . $tipodoc. $buscar . $serie . $numero . $idsucur . ' GROUP BY id_documento order by id_documento desc;');


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
            $documento->setTipodoc($data_tabla[$clave]["tipo_doc"]);
            $documento->setTotal($data_tabla[$clave]["totaldoc"]);
            $documento->setIdsucursal($data_tabla[$clave]["id_sucursal"]);





            array_push($documentos, $documento);
        }
        return $documentos;
    }
    function selectdetallado($desde, $hasta, $tipocomp,$tipodoc, $buscar, $serie, $numero, $moneda, $idsucur) {


        $fecha = '';
        if (!empty($desde) && !empty($hasta)) {
            $fecha = 'fechaemision between "' . $desde . '" and "' . $hasta . '" and ';
        }
        if (!empty($tipocomp)) {
            $tipocomp = 'tipo= "' . $tipocomp . '" and ';
        }
        if (!empty($moneda)) {
            $moneda = 'moneda= "' . $moneda . '" and ';
        }
        if (!empty($tipodoc)) {
            $tipodoc = 'tipo_doc= "' . $tipodoc . '" and ';
        }
        if (!empty($buscar)) {
            $buscar = 'concat(ruc,razonsocial) like concat("%","' . $buscar . '","%") and ';
        }
        if (!empty($serie)) {
            $serie = 'serie= "' . $serie . '" and ';
        }
        if (!empty($numero)) {
            $numero = 'numero= "' . $numero . '" and ';
        }
        if (!empty($idsucur)) {
            $idsucur = 'doc.id_sucursal= ' . $idsucur;
        }


//        echo 'select * from documento  where '.$fecha.$tipocomp.$buscar.$serie.$numero.$idsucur.' order by id desc;';


        $data_source = new DataSource();

        $data_tabla = $data_source->ejecutarconsulta('select doc.tipo,concat(doc.serie," - ",doc.numero) as serien,doc.fechaemision,doc.razonsocial,u.nombre,doc.tipo_pago,
        CONCAT(det.descripcionprod," (",det.cantidad," x ",det.precio,")") as descripcionprod,doc.moneda, (det.cantidad*det.precio) - (det.montobasegratuito + det.montobaseivap) as total,
        case WHEN doc.incigv = 1 THEN  (det.cantidad*det.precio) - (det.montobasegratuito + det.montobaseivap)  else  
        (((det.cantidad*det.precio) - (det.montobasegratuito + det.montobaseivap))- 
        (det.montobaseexpo+det.montobaseexonarado+det.montobaseinafecto))+((((det.cantidad*det.precio) - (det.montobasegratuito + det.montobaseivap))- 
        (det.montobaseexpo+det.montobaseexonarado+det.montobaseinafecto)) - ((((det.cantidad*det.precio) - (det.montobasegratuito + det.montobaseivap))- 
        (det.montobaseexpo+det.montobaseexonarado+det.montobaseinafecto))/ 1.18)) end as total2, case when doc.incigv = 1 THEN "Si" else "No" end as incluyeigv,
        ti.descripcion
         from documento as doc INNER JOIN detalle 
        as det on doc.id = det.id_documento INNER JOIN tipo_impuesto as ti on ti.id= det.id_impuesto INNER JOIN usuario as u on u.id = doc.id_usuario
        where ' . $fecha . $tipocomp . $tipodoc. $buscar . $serie . $numero .$moneda. $idsucur . ' order by id_documento desc;');


        $detallado = array();
        foreach ($data_tabla as $clave => $valor) {
            $documento = array(
                "tipo"=>$data_tabla[$clave]["tipo"],
                "serien"=>$data_tabla[$clave]["serien"],
                "fechaemision"=>$data_tabla[$clave]["fechaemision"],
                "razonsocial"=>$data_tabla[$clave]["razonsocial"],
                "vendedor"=>$data_tabla[$clave]["nombre"],
                "tipo_pago"=>$data_tabla[$clave]["tipo_pago"],
                "descripcionprod"=>$data_tabla[$clave]["descripcionprod"],
                "moneda"=>$data_tabla[$clave]["moneda"],
                "total"=>$data_tabla[$clave]["total2"],
                "incigv"=>$data_tabla[$clave]["incluyeigv"],
                "impuesto"=>$data_tabla[$clave]["descripcion"]);
            
                array_push($detallado, $documento); 
        }
        return $detallado;
    }

    function insert(documento $documento) {

        $data_source = new DataSource();
        $id = 0;

        $data_source->ejecutarActualizacion("insert into documento(serie, numero, fechaemision,fechavencimiento,nroden,"
                . "moneda,incigv,id_sunat_transaction,id_usuario,tipo_venta,tipo_venta_movimiento,tipo_venta_nop,"
                . "sujetoa,id_persona,ruc,razonsocial,direccion,email,estadosunat,estadolocal,total,tipo,id_sucursal,tipo_doc,tipo_cambio,documento_ref,serie_ref,numero_ref,id_tiponota,observacion,garantia,condicionpago,"
                . "validezdias,plazoentregadias,condicionpagodias,atencion,tipo_pago,nroop_tipopago) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)", array(
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
            $documento->getIdsucursal(),
            $documento->getTipodoc(),
            $documento->getTipocambio(),
            $documento->getDocref(),
            $documento->getSerieref(),
            $documento->getNumeroref(),
            $documento->getIdtiponota(),
            $documento->getObservacion(),
            $documento->getGarantia(),
            $documento->getCondicionpago(),
            $documento->getValidezdias(),
            $documento->getPlazoentregadias(),
            $documento->getCondicionpagodias(),
            $documento->getAtencion(),
            $documento->getTipopago(),
            $documento->getNrooptipopago()
        ));
        $id = $data_source->lastinsertid();
        return $id;
    }
    function update(documento $documento) {

        $data_source = new DataSource();
      

          $fila = $data_source->ejecutarActualizacion("update documento set  fechaemision=?,fechavencimiento=?,nroden=?,"
                . "moneda=?,incigv=?,id_sunat_transaction=?,id_usuario=?,tipo_venta=?,tipo_venta_movimiento=?,tipo_venta_nop=?,"
                . "sujetoa=?,id_persona=?,ruc=?,razonsocial=?,direccion=?,email=?,estadosunat=?,estadolocal=?,total=?,id_sucursal=?,tipo_cambio=?,documento_ref=?,serie_ref=?,numero_ref=?,id_tiponota=?,observacion=?,garantia=?,condicionpago=?,"
                . "validezdias=?,plazoentregadias=?,condicionpagodias=?,atencion=?,tipo_pago=?,nroop_tipopago=? where id=?;", array(
//            $documento->getSerie(),
//            $documento->getNumero(),
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
//            $documento->getTipo(),
            $documento->getIdsucursal(),
//            $documento->getTipodoc(),
            $documento->getTipocambio(),
            $documento->getDocref(),
            $documento->getSerieref(),
            $documento->getNumeroref(),
            $documento->getIdtiponota(),
            $documento->getObservacion(),
            $documento->getGarantia(),
            $documento->getCondicionpago(),
            $documento->getValidezdias(),
            $documento->getPlazoentregadias(),
            $documento->getCondicionpagodias(),
            $documento->getAtencion(),
            $documento->getTipopago(),
            $documento->getNrooptipopago(),
            $documento->getId()
                    
        ));
       
        return $fila;
    }

    function selectOne($id) {

        $data_source = new DataSource();

        $data_tabla = $data_source->ejecutarconsulta("select * from documento  where id=?;", array($id));


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
            $documento->setTipodoc($data_tabla[$clave]["tipo_doc"]);
            $documento->setTotal($data_tabla[$clave]["total"]);
            $documento->setIdsucursal($data_tabla[$clave]["id_sucursal"]);
            $documento->setTipopago($data_tabla[$clave]["tipo_pago"]);
            $documento->setNrooptipopago($data_tabla[$clave]["nroop_tipopago"]);
            $documento->setObservacion($data_tabla[$clave]["observacion"]);
            $documento->setGarantia($data_tabla[$clave]["garantia"]);
            $documento->setCondicionpago($data_tabla[$clave]["condicionpago"]);
            $documento->setValidezdias($data_tabla[$clave]["validezdias"]);
            $documento->setPlazoentregadias($data_tabla[$clave]["plazoentregadias"]);
            $documento->setCondicionpagodias($data_tabla[$clave]["condicionpagodias"]);
            $documento->setAtencion($data_tabla[$clave]["atencion"]);
            $documento->setCondicionpagodias($data_tabla[$clave]["condicionpagodias"]);
            $documento->setTipopago($data_tabla[$clave]["tipo_pago"]);
            $documento->setNrooptipopago($data_tabla[$clave]["nroop_tipopago"]);
            $documento->setMotivoanulacion($data_tabla[$clave]["motivoanulacion"]);
            $documento->setTipocambio($data_tabla[$clave]["tipo_cambio"]);
        }
        return $documento;
    }

    function selectMax($tipodoc, $tipo, $serie) {

        $data_source = new DataSource();

        $data_tabla = $data_source->ejecutarconsulta("select * from documento where tipo_doc = ? and tipo = ? and serie = ? ORDER BY id DESC LIMIT 1;", array($tipodoc, $tipo, $serie));


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
            $documento->setTipopago($data_tabla[$clave]["tipo_pago"]);
            $documento->setNrooptipopago($data_tabla[$clave]["nroop_tipopago"]);
        }
        return $documento;
    }

    function duplicado($serie, $numero, $tipodoc) {
        $data_source = new DataSource();

        $data_tabla = $data_source->ejecutarconsulta("select 1 from documento where serie = ? and numero = ? and tipo_doc = ?;", array($serie, $numero, $tipodoc));
        $bol = 'valido';
        foreach ($data_tabla as $clave => $valor) {
            $bol = 'duplicado';
        }
        return $bol;
    }

    function anular($id, $motivo) {
        $data_source = new DataSource();

        return $data_source->ejecutarActualizacion("update documento set estadolocal='Anulado', motivoanulacion=? where id = ?", array($motivo, $id));
    }
    
   

}
