<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of errorController
 *
 * @author HERNAN
 */
class errorController {
    //put your code here
    function index(){
        
        require_once 'view/layout/header.php';
        require_once 'view/error.php';
        require_once 'view/layout/footer.php';
    }
}
