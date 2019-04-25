<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of usuarioController
 *
 * @author HERNAN
 */
require_once 'model/usuario.php';
require_once 'model/sucursal.php';
require_once 'model/nivel.php';
class usuarioController {
    //put your code here
    private $usuario;
    private $sucursal;
    private $nivel;
    function __construct() {
        $this->usuario = new usuario();
        $this->sucursal = new sucursal();
        $this->nivel = new nivel();
        
    }
    function index(){
//       S
//        var_dump($_SESSION);
        if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
//            echo header("Location:".base_url);
            echo "<META HTTP-EQUIV ='Refresh' CONTENT='0; URL=".base_url."dashboard/index'>";
            
        } else {
            
            require_once 'view/layout/encabezado.php';
            require_once 'view/usuario/sign-in.php';
            require_once 'view/layout/footer.php';
            
        }
        
        
    }
            
    function select(){
        
        $usuarios = $this->usuario->selectAll();
        require_once 'view/layout/header.php';
        require_once 'view/usuario/listar_usuario.php';
        require_once 'view/layout/footer.php';
 
    }
    function insert(){
        
        if(isset($_POST['txtapellidop']) && isset($_POST['txtapellidom']) && isset($_POST['txtnombre'])
                 && isset($_POST['cbsexo']) && isset($_POST['dpfechanacimiento'])
                && isset($_POST['txtdni']) &&  isset($_POST['txttelf1']) &&  isset($_POST['txttelf2']) &&  isset($_POST['txtcel1'])
                 && isset($_POST['txtcel2']) && isset($_POST['txtemail']) && isset($_POST['txtusuario']) && isset($_POST['txtclave'])
                && isset($_POST['cbnivel']) && isset($_POST['cbsucursal']) && isset($_POST['txtcomision']) ){
            
            $usuario = new usuario();
            
            $fnac = $_POST['dpfechanacimiento'];
            $dated = DateTime::createFromFormat('d/m/Y', $fnac);      
            $datedf = $dated->format('Y-m-d');
            
            $usuario->setApellidop($_POST['txtapellidop']);
            $usuario->setApellidom($_POST['txtapellidom']);
            $usuario->setNombre($_POST['txtnombre']);
//            $usuario->setNacionalidad($_POST['cbnacionalidad']);
            $usuario->setSexo($_POST['cbsexo']);
            $usuario->setFechan($datedf);
            $usuario->setDni($_POST['txtdni']);
            $usuario->setTelf1($_POST['txttelf1']);
            $usuario->setTelf2($_POST['txttelf2']);
            $usuario->setCel1($_POST['txtcel1']);
            $usuario->setCel2($_POST['txtcel2']);
            $usuario->setEmail($_POST['txtemail']);
            $usuario->setUsuario($_POST['txtusuario']);
            $usuario->setClave(base64_encode($_POST['txtclave']));
            $usuario->setId_nivel($_POST['cbnivel']);
            $usuario->setIdsucursal($_POST['cbsucursal']);
            $usuario->setComision($_POST['txtcomision']);
              if (!empty($_FILES['imgfoto']['name'])){
                  $imgfoto = $_FILES['imgfoto'];
                  $imgfoto64 = base64_encode(file_get_contents($imgfoto["tmp_name"]));
              }else{
                  $imgfoto64='';
              }
            
            $usuario->setFoto($imgfoto64);
            echo $this->usuario->insert($usuario);
            
            
//            if (!empty($_FILES['imgfoto']['name'])){
//                
//                $usuario->setFoto($imgfoto64);
//                $this->usuario->insert($usuario);
//                
//            }else{
//                $this->usuario->insertnofoto($usuario);
//            }
            
            
            
            
        }
        
        
    }
    
    function cargar(){
        if(isset($_GET['id'])){
            $id =$_GET['id'];
            
            $usuario = $this->usuario->selectOne($id);
            $sucursales = $this->sucursal->selectAll();
            $niveles=$this->nivel->selectAll();
            require_once 'view/layout/header.php';
            require_once 'view/usuario/form_usuario.php';
            require_once 'view/usuario/modalcambioclave.php';
            require_once 'view/layout/footer.php';
            
            
        }
        
        
    }
    function updatekey(){
        if(isset($_POST['id']) && !empty($_POST['id']) && isset($_POST['txtnuevaclave']) && !empty($_POST['txtnuevaclave'])){
            
            $id=$_POST['id'];
            $key= base64_encode($_POST['txtnuevaclave']);
            
            $this->usuario->updatekey($id, $key);
  
        }
        
        
    }
    function update(){
        
//        var_dump($_POST);
        if(isset($_POST['txtapellidop']) && isset($_POST['txtapellidom']) && isset($_POST['txtnombre'])
                && isset($_POST['cbsexo']) && isset($_POST['dpfechanacimiento'])
                && isset($_POST['txtdni']) &&  isset($_POST['txttelf1']) &&  isset($_POST['txttelf2']) &&  isset($_POST['txtcel1'])
                && isset($_POST['txtcel2']) && isset($_POST['txtemail']) && isset($_POST['txtusuario']) 
                && isset($_POST['cbnivel']) && isset($_POST['cbsucursal']) && isset($_POST['txtcomision']) ){
            
            $usuario = new usuario();
            
            $fnac = $_POST['dpfechanacimiento'];
            $dated = DateTime::createFromFormat('d/m/Y', $fnac);      
            $datedf = $dated->format('Y-m-d');
            
            $usuario->setId($_POST['id']);
            $usuario->setApellidop($_POST['txtapellidop']);
            $usuario->setApellidom($_POST['txtapellidom']);
            $usuario->setNombre($_POST['txtnombre']);
//            $usuario->setNacionalidad($_POST['cbnacionalidad']);
            $usuario->setSexo($_POST['cbsexo']);
            $usuario->setFechan($datedf);
            $usuario->setDni($_POST['txtdni']);
            $usuario->setTelf1($_POST['txttelf1']);
            $usuario->setTelf2($_POST['txttelf2']);
            $usuario->setCel1($_POST['txtcel1']);
            $usuario->setCel2($_POST['txtcel2']);
            $usuario->setEmail($_POST['txtemail']);
            $usuario->setUsuario($_POST['txtusuario']);
//            $usuario->setClave(base64_encode($_POST['txtclave']));
            $usuario->setId_nivel($_POST['cbnivel']);
            $usuario->setIdsucursal($_POST['cbsucursal']);
            $usuario->setComision($_POST['txtcomision']);
            
            if (!empty($_FILES['imgfoto']['name'])){
                  $imgfoto = $_FILES['imgfoto'];
                  $imgfoto64 = base64_encode(file_get_contents($imgfoto["tmp_name"]));
                  $usuario->setFoto($imgfoto64);
                  
                 echo  $this->usuario->update($usuario);
              }else{
                echo  $this->usuario->updatenofoto($usuario);
              }

        }
    
    }
function login(){
    
        
    if(isset($_POST['username']) && isset($_POST['password']) && !empty($_POST['username']) && !empty($_POST['password'])){
                 
                $usuario = new usuario();
                $usuario->setUsuario($_POST['username']);
                $usuario->setClave($_POST['password']);
//                        var_dump($usuario);
                $user = $usuario->login($usuario);
                  
                if($user!=null && is_object($user)){
                    session_start();
                 
                    $_SESSION['id']=$user->getId();
                    $_SESSION['apellidop'] = $user->getApellidop();
                    $_SESSION['apellidom']=$user->getApellidom();
                    $_SESSION['nombre']=$user->getNombre();
                    $_SESSION['nacionalidad']=$user->getNacionalidad();
                    $_SESSION['sexo']=$user->getSexo();
                    $_SESSION['fechan']=$user->getFechan();
                    $_SESSION['dni']=$user->getDni();
                    $_SESSION['telf1']=$user->getTelf1();
                    $_SESSION['telf2']=$user->getTelf2();
                    $_SESSION['cel1']=$user->getCel1();
                    $_SESSION['cel2']=$user->getCel2();
                    $_SESSION['email']=$user->getEmail();
                    $_SESSION['usuario']=$user->getUsuario();
        //            $usuario->getClave(),
                    $_SESSION['nivel']=$user->getId_nivel();
                    $_SESSION['idsucursal']=$user->getIdsucursal();
                    $_SESSION['sucursal']=$user->getSucursal();
                    $_SESSION['comision']=$user->getComision();
                    $_SESSION['foto']=$user->getFoto();
                    
//                    var_dump($_SESSION);
                    
//                    header("Location:".base_url.'dashboard/index');
                      echo "<META HTTP-EQUIV='Refresh' CONTENT='0; URL=".base_url."dashboard/index'>";
                }else{
                    
                 
                 echo ' <div class="alert bg-red alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                La contraseña o usuario es incorrecta, Vuelve a intentarlo
                        </div>';
                    
                }
  
    }
   
    }
    
    function delete() {
        
        if(isset($_POST['id']) && !empty($_POST['id'])){
//            var_dump($_POST);
            $id = $_POST['id'];
            $fila =$this->usuario->delete($id);
            
            
//            echo 'fila '.$fila;
                    if($fila!=0 ){
                        echo '<script>swal("Éxitosamente!", "Operación realizada correctamente.", "success");</script>';
                        echo "<META HTTP-EQUIV='Refresh' CONTENT='0; URL=".base_url."usuario/select'>";
//                        header("Location:".base_url."producto/selectserv");
   
                    }else {
                        
                        echo '<script>swal("No se realizarón cambios!", "Algo sucedio mal :(", "error");</script>';
                    }
            
            
        }
        
    }
    
    function cerrarsesion(){
        
        $_SESSION= array();
        session_destroy();
        echo header("Location:".base_url); //// cuando no utiliza ajax funciona header 
       
    }
}