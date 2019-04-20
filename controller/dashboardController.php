<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of dashboardController
 *
 * @author HERNAN
 */
require_once 'model/tipocambio.php';
class dashboardController {
    //put your code here
    private $cambio;
    function __construct() {
        $this->cambio= new tipocambio();
    }

    function index(){
        $cambio = $this->cambio->selectMax();
        $cambios = $this->cambio->selectLimit(5);
        require_once 'view/layout/header.php';
        require_once 'view/dashboard.php';
        require_once 'view/layout/footer.php';
        
        
    }
}
