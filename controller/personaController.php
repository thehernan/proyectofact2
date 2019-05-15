<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of personaController
 *
 * @author HERNAN
 */
require_once 'model/persona.php';
require_once 'model/personaTipoDocumento.php';
class personaController {

    //put your code here
    private $persona;
    private $tipodoc;
    function __construct() {
        $this->persona = new persona();
        $this->tipodoc = new personaTipoDocumento();
    }

    
    function selectclient() {
        require_once 'view/layout/header.php';
        $tipo = 1;
        $personas= $this->persona->select($tipo);        
        
        require_once 'view/persona/listar_persona.php';
        require_once 'view/layout/footer.php';
        
    }
    function selectprovee() {
        require_once 'view/layout/header.php';
        $tipo = 2;
        $personas= $this->persona->select($tipo);        
        
        require_once 'view/persona/listar_persona.php';
        require_once 'view/layout/footer.php';
    }


    function cargarclient() {
        
         require_once 'view/layout/header.php';
        if( isset($_GET['id']) && !empty($_GET['id'])){
            $id=$_GET['id'];
         
            $titulo = 'EDITAR CLIENTE';
//        $persona = $this->persona->selectone($id);
        
            $docs = $this->tipodoc->selectAll();

            $persona = $this->persona->selectone($id);
           
            require_once 'view/persona/form_persona_client.php'; 
           
        }
        
        else {
           
            require_once 'view/error.php';
            
        }
        require_once 'view/layout/footer.php';
    }
    
    
        function cargarprovee() {
        require_once 'view/layout/header.php';
        if(!empty($_GET['id']) && isset($_GET['id'])){
            $id=$_GET['id'];
         
//          
//        $persona = $this->persona->selectone($id);
        
            $docs = $this->tipodoc->selectAll();

            $persona = $this->persona->selectone($id);
            
            require_once 'view/persona/form_persona_provee.php';
            require_once 'view/layout/footer.php';
        }else {
           
            require_once 'view/error.php';
            require_once 'view/layout/footer.php';
        }     
    }
    function update() {

    
      
         $fila = 0;
        
         
     if(isset($_POST['id']) && isset($_POST['txtcliente']) && isset($_POST['txtruc']) && isset($_POST['txtrepresentante']) && isset($_POST['txtdni'])
              && 
              isset($_POST['txtdireccion']) && isset($_POST['txttelfijo'])
             && isset($_POST['txtcel1']) && isset($_POST['txtcel2']) && isset($_POST['txtcel3']) && isset($_POST['txtemail']) && isset($_POST['txtweb'])
                     && isset($_POST['dpaniversario'])  && isset($_POST['cbestado'])
             && isset($_POST['txtrepresenta']) && isset($_POST['txtpartida']) && isset($_POST['cbidtipodoc']) && isset($_POST['cbmodopago']) && isset($_POST['cbrepresentante'])){
         
         
        $emision = trim($_POST['dpaniversario']);
         if(!empty($emision)){
             $dateemis = DateTime::createFromFormat('d/m/Y', $emision);
             $emisionf = $dateemis->format('Y-m-d');
             
         } else {
             $emisionf= '0000-00-00';
         }
          
          
         $id =  $_POST['id'];
         $cliente = $_POST['txtcliente'];
         $ruc = $_POST['txtruc'];
         $representante = $_POST['txtrepresentante'];
         $dni = $_POST['txtdni'];
//         $dpto = $_POST['txtdpto'];
//         $provincia =  $_POST['txtprovincia'];
//         $distrito =  $_POST['txtdistrito'];
         $direccion =  $_POST['txtdireccion'];
         $telfijo = $_POST['txttelfijo'];
         $cel1 = $_POST['txtcel1'];
         $cel2 =  $_POST['txtcel2'];
         $cel3 = $_POST['txtcel3'];
         $email = $_POST['txtemail'];
         $web = $_POST['txtweb'];
         $aniv = $emisionf;
//         $responsable = isset($_POST['txtresponsable']) ? $_POST['txtresponsable'] : false;
         $estado = $_POST['cbestado'];
         $representa = $_POST['txtrepresenta'];
         $partida = $_POST['txtpartida'];
         $iddoc =  $_POST['cbidtipodoc'];
         $modopago = $_POST['cbmodopago'];
         $cbrepresentate = $_POST['cbrepresentante'];
         
//          echo 'id'.$id.'cliente'.$cliente.'ruc'.$ruc.'represrnt'.$representante.'dni'.$dni.'dpto'.$dpto.'prov'.$provincia.'distri'.$distrito.'direc'.$direccion.'tel'.$telfijo
//            .'cel1'.$cel1.'cel2'.$cel2.'cel3'.$cel3.'email'.$email.'web'.$web.'aniv'.$aniv.'estado'.$estado.'resenta'.$representa.'parti'.$partida.'iddoc'.$iddoc.'modpago'.$modopago.'cbrepres'.
//             $cbrepresentate;
//         
//         echo 'dentro del if';
         $persona = new persona();
         $persona->setId($id);
         $persona->setNombre($cliente);
         $persona->setRuc($ruc);
         $persona->setRepresentante($representante);
         $persona->setDni($dni);
//         $persona->setDpto($dpto);
//         $persona->setProvincia($provincia);
//         $persona->setDistrito($distrito);
         $persona->setDireccion($direccion);
         $persona->setTelfijo($telfijo);
         $persona->setCel1($cel1);
         $persona->setCel2($cel2);
         $persona->setCel3($cel3);
         $persona->setEmail($email);
         $persona->setWeb($web);
         $persona->setAnivcumplenos($aniv);
         $persona->setResponsable($cbrepresentate);
         $persona->setEstado($estado);
         $persona->setRepresenta($representa);
         $persona->setPartida($partida);
         $persona->setIdtipodocumento($iddoc);
         $persona->setModopago($modopago);
         
         echo  $persona->update($persona);

    } 
     
              
     
   
    }

    function deleteprove() {
        
        if(isset($_POST['id']) && !empty($_POST['id'])){
//            var_dump($_POST);
            $id = $_POST['id'];
            $fila =$this->persona->delete($id);
            
            
            echo 'fila '.$fila;
                    if($fila!=0 ){
                        echo '<script>swal("Éxitosamente!", "Operación realizada correctamente.", "success");</script>';
                        echo "<META HTTP-EQUIV='Refresh' CONTENT='0; URL=".base_url."persona/selectprovee'>";
   
                    }else {
                        
                        echo '<script>swal("No se realizarón cambios!", "Algo sucedio mal :(", "error");</script>';
                    }
            
            
        }
        
    }
    
       function deleteclient() {
        
        if(isset($_POST['id']) && !empty($_POST['id'])){
//            var_dump($_POST);
            $id = $_POST['id'];
            $fila =$this->persona->delete($id);
            
            
            echo 'fila '.$fila;
                    if($fila!=0 ){
                        echo '<script>swal("Éxitosamente!", "Operación realizada correctamente.", "success");</script>';
                        echo "<META HTTP-EQUIV='Refresh' CONTENT='0; URL=".base_url."persona/selectclient'>";
   
                    }
            
            
        }
        
    }

    function insert() {
         
     
           
            
         $fila = 0;
        
         
     if(isset($_POST['id']) && isset($_POST['txtcliente']) && isset($_POST['txtruc']) && isset($_POST['txtrepresentante']) && isset($_POST['txtdni'])
             &&  isset($_POST['txtdireccion']) && isset($_POST['txttelfijo'])
             && isset($_POST['txtcel1']) && isset($_POST['txtcel2']) && isset($_POST['txtcel3']) && isset($_POST['txtemail']) && isset($_POST['txtweb'])
                     && isset($_POST['dpaniversario'])  && isset($_POST['cbestado'])
             && isset($_POST['txtrepresenta']) && isset($_POST['txtpartida']) && isset($_POST['cbidtipodoc']) && isset($_POST['cbmodopago']) && isset($_POST['cbrepresentante']) && 
             isset($_POST['tipo']) && !empty($_POST['tipo'])){
         
         
         $emision = trim($_POST['dpaniversario']);
         if(!empty($emision)){
             $dateemis = DateTime::createFromFormat('d/m/Y', $emision);
             $emisionf = $dateemis->format('Y-m-d');
             
         } else {
             $emisionf= '0000-00-00';
         }
        
          
         $tipo= $_POST['tipo'];
         $id =  $_POST['id'];
         $cliente = $_POST['txtcliente'];
         $ruc = $_POST['txtruc'];
         $representante = $_POST['txtrepresentante'];
         $dni = $_POST['txtdni'];
//         $dpto = $_POST['txtdpto'];
//         $provincia =  $_POST['txtprovincia'];
//         $distrito =  $_POST['txtdistrito'];
         $direccion =  $_POST['txtdireccion'];
         $telfijo = $_POST['txttelfijo'];
         $cel1 = $_POST['txtcel1'];
         $cel2 =  $_POST['txtcel2'];
         $cel3 = $_POST['txtcel3'];
         $email = $_POST['txtemail'];
         $web = $_POST['txtweb'];
         $aniv = $emisionf;
//         $responsable = isset($_POST['txtresponsable']) ? $_POST['txtresponsable'] : false;
         $estado = $_POST['cbestado'];
         $representa = $_POST['txtrepresenta'];
         $partida = $_POST['txtpartida'];
         $iddoc =  $_POST['cbidtipodoc'];
         $modopago = $_POST['cbmodopago'];
         $cbrepresentate = $_POST['cbrepresentante'];
         
//          echo 'id'.$id.'cliente'.$cliente.'ruc'.$ruc.'represrnt'.$representante.'dni'.$dni.'dpto'.$dpto.'prov'.$provincia.'distri'.$distrito.'direc'.$direccion.'tel'.$telfijo
//            .'cel1'.$cel1.'cel2'.$cel2.'cel3'.$cel3.'email'.$email.'web'.$web.'aniv'.$aniv.'estado'.$estado.'resenta'.$representa.'parti'.$partida.'iddoc'.$iddoc.'modpago'.$modopago.'cbrepres'.
//             $cbrepresentate;
//         
//         echo 'dentro del if';
         $persona = new persona();
         $persona->setId($id);
         $persona->setNombre($cliente);
         $persona->setRuc($ruc);
         $persona->setRepresentante($representante);
         $persona->setDni($dni);
//         $persona->setDpto($dpto);
//         $persona->setProvincia($provincia);
//         $persona->setDistrito($distrito);
         $persona->setDireccion($direccion);
         $persona->setTelfijo($telfijo);
         $persona->setCel1($cel1);
         $persona->setCel2($cel2);
         $persona->setCel3($cel3);
         $persona->setEmail($email);
         $persona->setWeb($web);
         $persona->setAnivcumplenos($aniv);
         $persona->setResponsable($cbrepresentate);
         $persona->setEstado($estado);
         $persona->setRepresenta($representa);
         $persona->setPartida($partida);
         $persona->setIdtipodocumento($iddoc);
         $persona->setModopago($modopago);
         $persona->setTipopersona($tipo);
         
         echo $persona->insert($persona);

    }
         
    
        
        
    }
    function crearclient(){
        
            $titulo='NUEVO CLIENTE';
            $tipo = 1;
        
            $docs = $this->tipodoc->selectAll();

            $persona = new persona();
            require_once 'view/layout/header.php';
             require_once 'view/persona/form_persona_client.php'; 
             require_once 'view/layout/footer.php';

    }
        function crearprovee(){
            $tipo = 2;
        
            $docs = $this->tipodoc->selectAll();

            $persona = new persona();
            require_once 'view/layout/header.php';
             require_once 'view/persona/form_persona_provee.php';
             require_once 'view/layout/footer.php';

    }
    
    
    function buscar(){
        
        $data = array();
        if (isset($_POST['ruc']) && !empty($_POST['ruc'])) {

            $ruc = $_POST['ruc'];

            
            $persona = $this->persona->search($ruc);



            if ($persona != null) {
                $datos = array(
                    0 => $persona->getId(),
                    1 => $persona->getRuc(),
                    2 => $persona->getNombre(),
                    3 => $persona->getDireccion(),
                    4 => $persona->getEmail(),
                );
               
            } else {

                $data = file_get_contents("https://api.sunat.cloud/ruc/" . $ruc);
                $info = json_decode($data, true);

                if ($data === '[]' || $info['fecha_inscripcion'] === '--') {
                    $datos = array(0 => 'nada');
                    
                } else {
                    $datos = array(
                        0 => 0,
                        1 => $info['ruc'],
                        2 => $info['razon_social'],
                        3 => $info['domicilio_fiscal'],
                        4 => '-',
                    );
                   
                }
            }
            
           echo json_encode($datos); 
        }
      
        
        
        
    }
    
    function updatedefault(){
        if(isset($_POST['id']) and isset($_POST['tipo'])){
            $id= $_POST['id'];
            $tipo = $_POST['tipo'];
            echo $this->persona->updatedefault($id,$tipo);
            
        }
        
    }
    
    function listarcliente(){
        $persons = array();
        if(isset($_POST['tipo'])){
            $tipo = $_POST['tipo'];
            
            
        
      
        $personas= $this->persona->select($tipo);
        
         $url = 'persona/crearclient';
        $urlup = 'persona/cargarclient';
        $urldel = base_url . 'persona/deleteclient';
        foreach ($personas as $persona){
            
            if($persona->getBydefault() == 1){
                $check = 'checked';
            }else{
                $check = '';
            }
            
            
            
            
            
            $bydefault = '<div class="switch" style="text-align: center;"><label><input type="checkbox" '.$check.' id="ckbydefaultcliente" name="ckbydefaultcliente" value="'.$persona->getId().'"><span class="lever"></span></label> </div>';
            $acciones = '<a href="' . base_url . $urlup . '&id=' . $persona->getId() . '" type="button" class="btn btn-primary"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>'
                        . ' <button  type="button" class="btn btn-danger" onclick=eliminar(' . $persona->getId() . ',"' . $urldel . '","delete")><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>';
            
            
            $array = [
            "tipodoc" => $persona->getTipodocumento(),
            "ndocumento" => $persona->getRuc(),
            "nombre" => $persona->getNombre(),
            "direccion" => $persona->getDireccion(),
            "email" => $persona->getEmail(),
            "telefono"=> "<a href= tel:".$persona->getCel1().">".$persona->getCel1()."</a>",    
            "bydefault" => $bydefault,
            "acciones" => $acciones
        ];
        array_push($persons, $array);
            
        }
        }
        echo '{"data":'.json_encode($persons).'}';  // send data as json format
        
        
    }
    
    
    
    }

