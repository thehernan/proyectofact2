<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of categoriaController
 *
 * @author HERNAN
 */
require_once 'model/categoriaprod.php';
class categoriaController {
    //put your code here
         private $categoria;
    
    function __construct() {
      $this->categoria = new categoriaprod();   
    }
    
    function insert(){
//        var_dump($_POST);
        $fila= 0;       
        if(isset($_POST['txtdescripcioncategoria']) && isset($_POST['txtcodcategoria']) && isset($_POST['txtordencategoria'])){
            $categoria = new categoriaprod();
            $categoria->setCodigo($_POST['txtcodcategoria']);
            $categoria->setDescripcion($_POST['txtdescripcioncategoria']);
            $categoria->setOrden($_POST['txtordencategoria']);
            $fila= $this->categoria->insert($categoria);  
        }
        echo $fila;
    }
    
    
    function update(){
       
        $fila= 0;       
        if(isset($_POST['id']) && isset($_POST['txtdescripcioncategoria']) && isset($_POST['txtcodcategoria']) && isset($_POST['txtordencategoria'])){
            $categoria = new categoriaprod();
            $categoria->setId($_POST['id']);
            $categoria->setCodigo($_POST['txtcodcategoria']);
            $categoria->setDescripcion($_POST['txtdescripcioncategoria']);
            $categoria->setOrden($_POST['txtordencategoria']);
            $fila= $this->categoria->update($categoria);
            
            
        }
        echo $fila;
    }
    
    
    function select(){
        
        $categorias = $this->categoria->selectAll();
        
        require_once 'view/layout/header.php';
        require_once 'view/categoria/listar_categoria.php';
      
        
        require_once 'view/layout/footer.php';
    }
    
    function crear(){
        $categoria= new categoriaprod();
       
        
        require_once 'view/layout/header.php';
        require_once 'view/categoria/form_categoria.php';
      
        
        require_once 'view/layout/footer.php';
        
        
        
    }
    
    function cargar(){
        
        require_once 'view/layout/header.php';
        if(isset($_GET['id']) && !empty($_GET['id'])){
            
            $categoria = $this->categoria->selectOne($_GET['id']);
            require_once 'view/categoria/form_categoria.php';
        }else{
            
            require_once 'view/error.php';
        }
        
       
        
        
        
      
        
        require_once 'view/layout/footer.php';
        
        
        
    }
}
