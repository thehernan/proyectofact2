<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'model/bancos.php';
class bancosController{
    
    private $bancosm;
    
    
    function __construct() {
        $this->bancosm = new bancos();
        
    }
    
    function select(){
        require_once 'view/layout/header.php';
        $bancos = $this->bancosm->selectAll();
        
        
        require_once 'view/bancos/listar_bancos.php';
      
        
        require_once 'view/layout/footer.php';
        
        
        
        
    }
    
    function crear(){
        require_once 'view/layout/header.php';
        $banco = new bancos();
        
        require_once 'view/bancos/form_bancos.php';
      
        
        require_once 'view/layout/footer.php';
        
        
    }
    
    function insert(){
       
        if(isset($_POST['txtnombre']) && !empty($_POST['txtnombre'])){
            $nombre = $_POST['txtnombre'];
            
            $banco = new bancos();
            $banco->setNombre($nombre);
            echo $this->bancosm->insert($banco);
            
            
            
        }
        
    }
    
    function cargar(){
        require_once 'view/layout/header.php';
        if(isset($_GET['id']) && !empty($_GET['id'])){
            $id = $_GET['id'];
            $banco = $this->bancosm->selectOne($id);
        
            require_once 'view/bancos/form_bancos.php';
      
        
        
        }else {
            require_once 'view/error.php';
            
        }
        require_once 'view/layout/footer.php';
    }
    
    function update(){
        
        if(isset($_POST['txtnombre']) && !empty($_POST['txtnombre']) && isset($_POST['id']) && !empty($_POST['id'])){
            $banco = new bancos();
            $banco->setId($_POST['id']);
            $banco->setNombre($_POST['txtnombre']);
            
            echo $this->bancosm->update($banco);
            
        }
        
        
        
        
        
    }

    
    
    
    
    
    
    
    
    
    
}

