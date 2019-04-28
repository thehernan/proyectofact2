<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of medidaController
 *
 * @author HERNAN
 */
require_once 'model/unidmedida.php';
class medidaController {
    //put your code here
    
    private $medida;
    
    function __construct() {
      $this->medida = new unidmedida();   
    }
    
    function insert(){
//        var_dump($_POST);
        $fila= 0;       
        if(isset($_POST['txtdescripcionunid']) && isset($_POST['txtcodunid']) && isset($_POST['txtordenunid'])){
            $medida = new unidmedida();
            $medida->setCodigo($_POST['txtcodunid']);
            $medida->setDescripcion($_POST['txtdescripcionunid']);
            $medida->setOrden($_POST['txtordenunid']);
            $fila= $this->medida->insert($medida);  
        }
        echo $fila;
    }
    
    function update(){
       
        $fila= 0;       
        if(isset($_POST['id']) && isset($_POST['txtdescripcionunid']) && isset($_POST['txtcodunid']) && isset($_POST['txtordenunid'])){
            $medida = new unidmedida();
            $medida->setId($_POST['id']);
            $medida->setCodigo($_POST['txtcodunid']);
            $medida->setDescripcion($_POST['txtdescripcionunid']);
            $medida->setOrden($_POST['txtordenunid']);
            $fila= $this->medida->update($medida);
            
            
        }
        echo $fila;
    }
    
    
    function select(){
        
        $medidas = $this->medida->selectAll();
        
        require_once 'view/layout/header.php';
        require_once 'view/unidmedida/listar_medida.php';
      
        
        require_once 'view/layout/footer.php';
    }
    
    function crear(){
        $medida= new unidmedida();
       
        
        require_once 'view/layout/header.php';
        require_once 'view/unidmedida/form_medida.php';
      
        
        require_once 'view/layout/footer.php';
        
        
        
    }
    
    function cargar(){
        
        require_once 'view/layout/header.php';
        if(isset($_GET['id']) && !empty($_GET['id'])){
            
            $medida = $this->medida->selectOne($_GET['id']);
            require_once 'view/unidmedida/form_medida.php';
        }else{
            
            require_once 'view/error.php';
        }
        
       
        
        
        
      
        
        require_once 'view/layout/footer.php';
        
        
        
    }
    
}
