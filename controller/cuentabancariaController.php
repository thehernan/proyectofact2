<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of cuentabancariaController
 *
 * @author HERNAN
 */
require_once 'model/cuentaBancaria.php';
require_once 'model/bancos.php';
class cuentabancariaController {
    //put your code here
    private $cuenta; 
    private $banco;
    function __construct() {
        $this->cuenta = new cuentaBancaria();
        $this->banco = new bancos();
    }
    
    
    function select(){
        require_once 'view/layout/header.php';
        $cuentas = $this->cuenta->selectAll();
        
        
        require_once 'view/cuentabancaria/listar_cuenta.php';
      
        
        require_once 'view/layout/footer.php';
        
        
        
    }
    function crear(){
        require_once 'view/layout/header.php';
        $cuenta = new cuentaBancaria();
        $bancos = $this->banco->selectAll();
        
        
        require_once 'view/cuentabancaria/form_cuenta.php';
      
        
        require_once 'view/layout/footer.php';
        
        
        
    }
    function insert(){
        
    if(isset($_POST['cbbanco']) && isset($_POST['txtnumero']) && isset($_POST['txtcci']) && isset($_POST['txttitular'])){
        $cuenta= new cuentaBancaria();
        
        $cuenta->setBanco($_POST['cbbanco']);
        $cuenta->setNumero($_POST['txtnumero']);
        $cuenta->setCci($_POST['txtcci']);
        $cuenta->setTitular($_POST['txttitular']);
        
        echo $this->cuenta->insert($cuenta);
        
        
    }
        
    }
    
    function update(){
        if(isset($_POST['id']) && isset($_POST['cbbanco']) && isset($_POST['txtnumero']) && isset($_POST['txtcci']) && isset($_POST['txttitular'])){
            $cuenta= new cuentaBancaria();
            $cuenta->setId($_POST['id']);
            $cuenta->setBanco($_POST['cbbanco']);
            $cuenta->setNumero($_POST['txtnumero']);
            $cuenta->setCci($_POST['txtcci']);
            $cuenta->setTitular($_POST['txttitular']);

            echo $this->cuenta->update($cuenta);
            
        }
        
        
        
    }
    function cargar(){
        require_once 'view/layout/header.php';
        if(isset($_GET['id']) && !empty($_GET['id'])){
            $cuenta = $this->cuenta->selectOne($_GET['id']);
            $bancos = $this->banco->selectAll();
            
            require_once 'view/cuentabancaria/form_cuenta.php';
            
            
            
        }else{
            require_once 'view/error.php';
            
        }
      require_once 'view/layout/footer.php';  
        
        
    }
        
        


}
