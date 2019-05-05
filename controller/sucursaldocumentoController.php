<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of sucursaldocumentoController
 *
 * @author HERNAN
 */
require_once 'model/documentoSucursal.php';
require_once 'model/sucursal.php';
class sucursaldocumentoController {
    //put your code here
    private $documento;
    private $sucursal;
    function __construct() {
        $this->documento= new documentoSucursal();
        $this->sucursal=new sucursal();
        
    }
    
    function select(){
        $sucursalesdoc =$this->documento->select();
        require_once 'view/layout/header.php';
        require_once 'view/documentosucursal/listar_sucursaldoc.php';
        require_once 'view/layout/footer.php';
        
    }
    
    function cargar(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $sucursaldoc =$this->documento->selectOne($id);
            $sucursales= $this->sucursal->selectAll();
//            var_dump($sucursales);
//            var_dump($sucursaldoc);
            require_once 'view/layout/header.php';
            require_once 'view/documentosucursal/form_sucursaldoc.php';
            require_once 'view/layout/footer.php';
            
            
            
            
        }
        
    }
    function cargarserie(){
        if(isset($_POST['tipodoc'])){
            $idsucur = $_SESSION['idsucursal'];
            $tipodoc = $_POST['tipodoc'];
            $documentossuc =$this->documento->selectAll($idsucur,$tipodoc);
            
            echo '<select class="form-control show-tick" id="cbserie" name="cbserie" required onchange="ultimonumerodoc('."'".base_url.'documento/selectmaxnro'."'".');">';
                if(count($documentossuc) == 0){
                   echo '<option value="" class="text-danger">- Sin resultados  -</option>';
                }
//                
                
                foreach ($documentossuc as $docsucur) {

                    echo '<option value="' . $docsucur->getSerie() . '">' . $docsucur->getTipodoc() . '-' . $docsucur->getSerie() . '</option>';
                }
                
            echo '</select>'; 
        }
        
    }
    function insert(){
        if(isset($_POST['cbsucursal']) && isset($_POST['cbtipodoc']) && isset($_POST['txtserie'])  && isset($_POST['cbpredeterminado']) 
                && isset($_POST['cbprint']) ){
            $doc = new documentoSucursal();
            $doc->setIdsucursal($_POST['cbsucursal']);
            $doc->setTipodoc($_POST['cbtipodoc']);
            $doc->setSerie($_POST['txtserie']);
            $doc->setPredeterminado($_POST['cbpredeterminado']);
            $doc->setModoimpresion($_POST['cbprint']);
            
            echo $this->documento->insert($doc);
            
        }
        
    }
    
    function update(){
           if(isset($_POST['cbsucursal']) && isset($_POST['cbtipodoc']) && isset($_POST['txtserie'])  && isset($_POST['cbpredeterminado']) 
                && isset($_POST['cbprint']) && isset($_POST['id'])){
            $doc = new documentoSucursal();
            $doc->setIdsucursal($_POST['cbsucursal']);
            $doc->setTipodoc($_POST['cbtipodoc']);
            $doc->setSerie($_POST['txtserie']);
            $doc->setPredeterminado($_POST['cbpredeterminado']);
            $doc->setModoimpresion($_POST['cbprint']);
            $doc->setId($_POST['id']);
            echo $this->documento->update($doc);
            
        }
        
    }
    
        function delete() {
        
        if(isset($_POST['id']) && !empty($_POST['id'])){
//            var_dump($_POST);
            $id = $_POST['id'];
            $fila =$this->documento->delete($id);
            
            
//            echo 'fila '.$fila;
                    if($fila!=0 ){
                        echo '<script>swal("Éxitosamente!", "Operación realizada correctamente.", "success");</script>';
                        echo "<META HTTP-EQUIV='Refresh' CONTENT='0; URL=".base_url."sucursaldocumento/select'>";
//                        header("Location:".base_url."producto/selectserv");
   
                    }else {
                        
                        echo '<script>swal("No se realizarón cambios!", "Algo sucedio mal :(", "error");</script>';
                    }
            
            
        }
        
    }

}
