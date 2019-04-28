<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
  

class DataSource 
{

    private $conexion;
    private $host = "mysql:host=localhost;dbname=bdfacturacion";
    private $username = 'root';
    private $password = '';
   

    
    function __construct() {

        try {
            

        $this->conexion = new PDO($this->host, $this->username, $this->password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $this->conexion->setAttribute(PDO::ATTR_PERSISTENT, TRUE);
        $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exc) {
            echo 'Fallo la conexion'.$exc->getMessage();
        }
            
    }
    function ejecutarconsulta($sql = "",$values = array())
    {
        if($sql!=""){
            $consulta = $this->conexion->prepare($sql);
            $consulta->execute($values);
            $tabla_datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
            return $tabla_datos;
            
        }else {
            return 0;           
        }        
    }
    
    function ejecutarActualizacion($sql="",$values=array()){
        if($sql!=""){
            $consulta=  $this->conexion->prepare($sql);
            
          
                     
            
            $consulta->execute($values);
//          
//            var_dump($consulta);
//            var_dump($values);
            $numero_tabla_afectadas=$consulta->rowCount();
            return $numero_tabla_afectadas;
            
            
        }else {
            
            return 0;
        }
        
        
        
    }
    
    function lastinsertid(){
        return $this->conexion->lastinsertid();
        
    }
    
    function  Conexion(){
        return $this->conexion;
        
    }
    
    function insertmultiple($sql="",$values=array()){
        if($sql!=""){
            $ids = array();
            $this->conexion->beginTransaction();
            $consulta=  $this->conexion->prepare($sql);
            
            
            for($i=0; $i<count($values);$i++){
                $consulta->execute($values[$i]);
                $id = $this->conexion->lastInsertId();
                array_push($ids, $id);
            }
            $this->conexion->commit();
            
//            $numero_tabla_afectadas=$consulta->rowCount();
            return $ids;
            
            
        }else {
            
            return 0;
        }
        
        
        
    }
    

    
    
    
    
}

