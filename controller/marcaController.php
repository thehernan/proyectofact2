<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of marcaController
 *
 * @author HERNAN
 */
require_once 'model/marcaprod.php';
class marcaController {
    private $marca;
    
    function __construct() {
      $this->marca = new marcaprod();   
    }
    
    function insert(){
        
        $fila= 0;       
        if(isset($_POST['txtdescripcionmarca']) && isset($_POST['txtcodmarca']) && isset($_POST['txtordenmarca'])){
            $marca = new marcaprod();
            $marca->setCodigo($_POST['txtcodmarca']);
            $marca->setDescripcion($_POST['txtdescripcionmarca']);
            $marca->setOrden($_POST['txtordenmarca']);
            $fila= $this->marca->insert($marca);
            
            
        }
        echo $fila;
    }
    
    function update(){
       
        $fila= 0;       
        if(isset($_POST['id']) && isset($_POST['txtdescripcionmarca']) && isset($_POST['txtcodmarca']) && isset($_POST['txtordenmarca'])){
            $marca = new marcaprod();
            $marca->setId($_POST['id']);
            $marca->setCodigo($_POST['txtcodmarca']);
            $marca->setDescripcion($_POST['txtdescripcionmarca']);
            $marca->setOrden($_POST['txtordenmarca']);
            $fila= $this->marca->update($marca);
            
            
        }
        echo $fila;
    }
    
    
    function select(){
        require_once 'view/layout/header.php';
        $marcas = $this->marca->selectAll();
        
        
        require_once 'view/marca/listar_marca.php';
      
        
        require_once 'view/layout/footer.php';
    }
    
    function crear(){
        
        require_once 'view/layout/header.php';
        $marca= new marcaprod();
       
        
        
        require_once 'view/marca/form_marca.php';
      
        
        require_once 'view/layout/footer.php';
        
        
        
    }
    
    function cargar(){
        
        require_once 'view/layout/header.php';
        if(isset($_GET['id']) && !empty($_GET['id'])){
            
            $marca = $this->marca->selectOne($_GET['id']);
            require_once 'view/marca/form_marca.php';
        }else{
            
            require_once 'view/error.php';
        }
        
       
        
        
        
      
        
        require_once 'view/layout/footer.php';
        
        
        
    }



    //put your code here
}
