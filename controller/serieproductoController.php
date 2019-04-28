<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of serieproductoController
 *
 * @author juana
 */
require_once 'model/serieProducto.php';
class serieproductoController {
    //put your code here
    private $serie;
    function __construct() {
        $this->serie = new serieProducto();
    }

    function select(){
//        var_dump($_POST);
        if(isset($_POST['id'])){
            $idprod = $_POST['id'];
//            echo $idprod;
            $series = array();
            
            foreach ($this->serie->select($idprod) as $serie){
                $d = array(
                    'id' => $serie->getId(),
                    'serie' => $serie->getSerie()
                    
                    
                );
                array_push($series, $d);
                
            }
            
            echo json_encode($series);
            
        }
        
        
        
        
    }
    
    
    
}
