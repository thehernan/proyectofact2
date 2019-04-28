<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of sucursalController
 *
 * @author HERNAN
 */
require_once 'model/sucursal.php';
;

class sucursalController {

    //put your code here
    private $sucursal;

    function __construct() {
        $this->sucursal = new sucursal();
    }

    function select() {

        $sucursales = $this->sucursal->selectsecond();
        require_once 'view/layout/header.php';
        require_once 'view/sucursal/listar_sucursal.php';
        require_once 'view/layout/footer.php';
    }

    function cargar() {
        $titulo = '<div class="demo-google-material-icon"> <i class="material-icons">business</i> <span class="icon-name"> EDITAR SUCURSAL </span> </div>';
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $sucursal = $this->sucursal->selectOne($id);

//            var_dump($sucursal);
            require_once 'view/layout/header.php';
            require_once 'view/sucursal/form_sucursal.php';
            require_once 'view/layout/footer.php';
        }
    }

    function crear() {
        $titulo = '<div class="demo-google-material-icon"> <i class="material-icons">business</i> <span class="icon-name"> NUEVA SUCURSAL </span> </div>';

        $sucursal = new sucursal();

//            var_dump($sucursal);
        require_once 'view/layout/header.php';
        require_once 'view/sucursal/form_sucursal.php';
        require_once 'view/layout/footer.php';
    }

    function update() {
//        var_dump($_POST);
        if (isset($_POST['txtnombre']) && isset($_POST['txtempresa']) && isset($_POST['txtruc'])
        ) {



            $sucursal = new sucursal();
            $sucursal->setId($_POST['id']);
            $sucursal->setCodigo($_POST['txtcod']);
            $sucursal->setNombre($_POST['txtnombre']);
            $sucursal->setEmpresa($_POST['txtempresa']);
            $sucursal->setRuc($_POST['txtruc']);
            $sucursal->setSlogan($_POST['txtslogan']);
//            $sucursal->setSerieimpresora($_POST['txtimpresora']);
//            $sucursal->setDpto($_POST['txtdpto']);
//            $sucursal->setProvincia($_POST['txtprovincia']);
//            $sucursal->setDistrito($_POST['txtdistrito']);
            $sucursal->setDireccion($_POST['txtdireccion']);
            $sucursal->setTelf($_POST['txttelf']);
            $sucursal->setTelf1($_POST['txttelf1']);
            $sucursal->setTelf2($_POST['txttelf2']);
            $sucursal->setTelf3($_POST['txttelf3']);
            $sucursal->setWeb($_POST['txtweb']);
            $sucursal->setEmail($_POST['txtemail']);
            $sucursal->setResponsable($_POST['txtresponsable']);
//            $sucursal->setMapaid($_POST['txtmapaid']);

            $imgpie = '';
            if (!empty($_FILES['imglocal']['name']) && !empty($_FILES['txtimgtop']['name']) && !empty($_FILES['imgpie']['name'])) {

                $imglocal = $_FILES['imglocal'];
                $imglocal64 = base64_encode(file_get_contents($imglocal["tmp_name"]));

                $imglogo = $_FILES['imgtop'];
                $imglogo64 = base64_encode(file_get_contents($imglogo["tmp_name"]));

                $imgpie = $_FILES['imgpie'];
                $imgpie64 = base64_encode(file_get_contents($imgpie["tmp_name"]));

                $sucursal->setImglocal($imglocal64);
                $sucursal->setImgtoplogo($imglogo64);
                $sucursal->setImgpie($imgpie64);

                echo $this->sucursal->update($sucursal);
            } elseif (!empty($_FILES['imglocal']['name'])) {
                $imglocal = $_FILES['imglocal'];
                $imglocal64 = base64_encode(file_get_contents($imglocal["tmp_name"]));

                $sucursal->setImglocal($imglocal64);
                echo $this->sucursal->updateimglocal($sucursal);
            } elseif (!empty($_FILES['imgtop']['name'])) {

                $imglogo = $_FILES['imgtop'];
                $imglogo64 = base64_encode(file_get_contents($imglogo["tmp_name"]));
                $sucursal->setImgtoplogo($imglogo64);
                echo $this->sucursal->updateimgtoplogo($sucursal);
            } elseif (!empty($_FILES['imgpie']['name'])) {
                $imgpie = $_FILES['imgpie'];
                $imgpie64 = base64_encode(file_get_contents($imgpie["tmp_name"]));
                $sucursal->setImgpie($imgpie64);

                echo $this->sucursal->updateimgpie($sucursal);
            } else {

                echo $this->sucursal->updatenoimg($sucursal);
            }
        }
    }

    function insert() {

//        var_dump($_POST);
        if (isset($_POST['txtnombre']) && isset($_POST['txtempresa']) && isset($_POST['txtruc']) ) {
            $sucursal = new sucursal();
//            $sucursal->setId($_POST['id']);
            $sucursal->setCodigo($_POST['txtcod']);
            $sucursal->setNombre($_POST['txtnombre']);
            $sucursal->setEmpresa($_POST['txtempresa']);
            $sucursal->setRuc($_POST['txtruc']);
            $sucursal->setSlogan($_POST['txtslogan']);
//            $sucursal->setSerieimpresora($_POST['txtimpresora']);
//            $sucursal->setDpto($_POST['txtdpto']);
//            $sucursal->setProvincia($_POST['txtprovincia']);
//            $sucursal->setDistrito($_POST['txtdistrito']);
            $sucursal->setDireccion($_POST['txtdireccion']);
            $sucursal->setTelf($_POST['txttelf']);
            $sucursal->setTelf1($_POST['txttelf1']);
            $sucursal->setTelf2($_POST['txttelf2']);
            $sucursal->setTelf3($_POST['txttelf3']);
            $sucursal->setWeb($_POST['txtweb']);
            $sucursal->setEmail($_POST['txtemail']);
            $sucursal->setResponsable($_POST['txtresponsable']);
//            $sucursal->setMapaid($_POST['txtmapaid']);

            if (!empty($_FILES['imglocal']['name'])) {

                $imglocal = $_FILES['imglocal'];
                $imglocal64 = base64_encode(file_get_contents($imglocal["tmp_name"]));
            } else {
                $imglocal64 = '';
            }
            if (!empty($_FILES['imgtop']['name'])) {
                $imglogo = $_FILES['imgtop'];
                $imglogo64 = base64_encode(file_get_contents($imglogo["tmp_name"]));
            } else {

                $imglogo64 = '';
            }

            if (!empty($_FILES['imgpie']['name'])) {
                $imgpie = $_FILES['imgpie'];
                $imgpie64 = base64_encode(file_get_contents($imgpie["tmp_name"]));
            } else {

                $imgpie64 = '';
            }



            $sucursal->setImglocal($imglocal64);
            $sucursal->setImgtoplogo($imglogo64);
            $sucursal->setImgpie($imgpie64);

            echo $this->sucursal->insert($sucursal);
        }
    }

    function main() {
        $titulo = '<div class="demo-google-material-icon"> <i class="material-icons">business</i> <span class="icon-name"> SUCURSAL PRINCIPAL</span> </div>';

        $sucursal = $this->sucursal->selectMain();

//            var_dump($sucursal);
        require_once 'view/layout/header.php';
        require_once 'view/sucursal/form_sucursal.php';
        require_once 'view/layout/footer.php';
    }
    
    function delete() {
        
        if(isset($_POST['id']) && !empty($_POST['id'])){
//            var_dump($_POST);
            $id = $_POST['id'];
            $fila =$this->sucursal->delete($id);
            
            
//            echo 'fila '.$fila;
                    if($fila!=0 ){
                        echo '<script>swal("Éxitosamente!", "Operación realizada correctamente.", "success");</script>';
                        echo "<META HTTP-EQUIV='Refresh' CONTENT='0; URL=".base_url."sucursal/select'>";
//                        header("Location:".base_url."producto/selectserv");
   
                    }else {
                        
                        echo '<script>swal("No se realizarón cambios!", "Algo sucedio mal :(", "error");</script>';
                    }
            
            
        }
        
    }

}
