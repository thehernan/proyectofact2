<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of tipocambioController
 *
 * @author HERNAN
 */
require_once 'model/tipocambio.php';
class tipocambioController {
    //put your code here
    private $cambio;
    function __construct() {
        $this->cambio = new tipocambio();
    }
    
    function insert(){
        var_dump($_POST);
        if(isset($_POST['txtcompra']) && isset($_POST['txtventa'])){
            
            $tipo = new tipocambio();
            $tipo->setCompra($_POST['txtcompra']);
            $tipo->setVenta($_POST['txtventa']);
            $this->cambio->insert($tipo);       
        }
        
        
    }
    

}
