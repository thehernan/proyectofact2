<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of lineacontroller
 *
 * @author HERNAN
 */
require_once 'model/linea.php';
class lineacontroller {
    //put your code here
     private $linea;
    
    function __construct() {
      $this->linea = new linea();   
    }
    
    function insert(){
//        var_dump($_POST);
        $fila= 0;       
        if(isset($_POST['txtdescripcionlinea']) && isset($_POST['txtcodlinea']) && isset($_POST['txtordenlinea'])){
            $linea = new linea();
            $linea->setCodigo($_POST['txtcodlinea']);
            $linea->setDescripcion($_POST['txtdescripcionlinea']);
            $linea->setOrden($_POST['txtordenlinea']);
            $fila= $this->linea->insert($linea);  
        }
        echo $fila;
    }
    
    function update(){
       
        $fila= 0;       
        if(isset($_POST['id']) && isset($_POST['txtdescripcionlinea']) && isset($_POST['txtcodlinea']) && isset($_POST['txtordenlinea'])){
            $linea = new linea();
            $linea->setId($_POST['id']);
            $linea->setCodigo($_POST['txtcodlinea']);
            $linea->setDescripcion($_POST['txtdescripcionlinea']);
            $linea->setOrden($_POST['txtordenlinea']);
            $fila= $this->linea->update($linea);
            
            
        }
        echo $fila;
    }
    
    
    function select(){
        require_once 'view/layout/header.php';
        $lineas = $this->linea->selectAll();
        
        
        require_once 'view/linea/listar_linea.php';
      
        
        require_once 'view/layout/footer.php';
    }
    
    function crear(){
        
        require_once 'view/layout/header.php';
        $linea= new linea();
       
        
        
        require_once 'view/linea/form_linea.php';
      
        
        require_once 'view/layout/footer.php';
        
        
        
    }
    
    function cargar(){
        
        require_once 'view/layout/header.php';
        if(isset($_GET['id']) && !empty($_GET['id'])){
            
            $linea = $this->linea->selectOne($_GET['id']);
            require_once 'view/linea/form_linea.php';
        }else{
            
            require_once 'view/error.php';
        }
        
       
        
        
        
      
        
        require_once 'view/layout/footer.php';
        
        
        
    }
    
    

}
