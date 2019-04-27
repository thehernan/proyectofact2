<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of productoController
 *
 * @author HERNAN
 */
require_once 'model/producto.php';
require_once 'model/linea.php';
require_once 'model/categoriaprod.php';
require_once 'model/marcaprod.php';
require_once 'model/unidmedida.php';
require_once 'model/tipoImpuesto.php';
require_once 'model/serieProducto.php';
class productoController {
    //put your code here
    private $producto;
    private $linea;
    private $categoria;
    private $marca;
    private $medida;
    private $impuesto;
    function __construct() {
        $this->producto = new producto();
        $this->linea= new linea();
        $this->categoria= new categoriaprod();
        $this->marca= new marcaprod();
        $this->medida = new unidmedida();
        $this->impuesto = new tipoImpuesto();
    }
    
    function selectprod(){
        $tipo = 'producto';
        $productos = $this->producto->select($tipo);
   
        require_once 'view/layout/header.php';
        require_once 'view/producto/listar_producto.php';
        require_once 'view/layout/footer.php';
    }
    
    function selectserv(){
        $tipo = 'servicio';
        $productos = $this->producto->select($tipo);
        require_once 'view/layout/header.php';
        require_once 'view/producto/listar_producto.php';
        require_once 'view/layout/footer.php';
    }
    function cargarprod(){
        require_once 'view/layout/header.php';
        if(isset($_GET['id']) && !empty($_GET['id'])){
            
            $producto = $this->producto->selectone($_GET['id']);
            $lineas = $this->linea->selectAll();
            $categorias=$this->categoria->selectAll();
            $marcas = $this->marca->selectAll();
            $medidas = $this->medida->selectAll();
            $impuestos=$this->impuesto->selectAll();
            
            $seriesprod = new serieProducto();
            $series = $seriesprod->select($_GET['id']);
            
            require_once 'view/producto/form_producto.php';  
            require_once 'view/marca/modalnewmarca.php'; 
            require_once 'view/linea/modalnewlinea.php'; 
            require_once 'view/categoria/modalnewcategoria.php'; 
            require_once 'view/unidmedida/modalnewunidmedida.php';
            
            
            
            
        }else {
            
            require_once 'view/error.php';
           
        }
        require_once 'view/layout/footer.php';
        
        
    }
    function cargarserv(){
        require_once 'view/layout/header.php';
        if(isset($_GET['id'])){
            
            $producto = $this->producto->selectone($_GET['id']);
            $lineas = $this->linea->selectAll();
            $categorias=$this->categoria->selectAll();
            $marcas = $this->marca->selectAll();
            $medidas = $this->medida->selectAll();
            $impuestos=$this->impuesto->selectAll();
           
            require_once 'view/producto/form_servicio.php';  
            require_once 'view/marca/modalnewmarca.php'; 
            require_once 'view/linea/modalnewlinea.php'; 
            require_once 'view/categoria/modalnewcategoria.php'; 
            require_once 'view/unidmedida/modalnewunidmedida.php';
            
        }else {
            
            require_once 'view/error.php'; 
            
        }  
        require_once 'view/layout/footer.php';
    }
    function  insert(){
//        var_dump($_POST);
        $fila = 0;
        if(isset($_POST['txtdescripcion'])  && isset($_POST['cbmoneda']) && isset($_POST['txtprecioc']) && 
                isset($_POST['txtpreciov']) && isset($_POST['txtpreciomin']) && isset($_POST['txtstock']) && isset($_POST['cbimpuesto'])){
            
            if(empty($_POST['cblinea']) || is_nan($_POST['cblinea'])){
                $linea = 0;
            }else {
                $linea = $_POST['cblinea'];
            }
            if(empty($_POST['cbcategoria']) || is_nan($_POST['cbcategoria'])){
                $categoria = 0;
            }else {
                $categoria = $_POST['cbcategoria'];
            }
            if(empty($_POST['cbmarca']) || is_nan($_POST['cbmarca'])){
                $marca = 0;
            }else {
                $marca = $_POST['cbmarca'];
            }
            if(empty($_POST['txtpeso']) || is_nan($_POST['txtpeso'])){
                $peso = 0;
            }else {
                $peso = $_POST['txtpeso'];
            }
            
            
            
            
            
            $producto = new producto();
//            $producto->setTipo($_POST['cbtipo']);
            $producto->setCodigo($_POST['txtcod']);
            $producto->setCodbarra($_POST['txtcodbarra']);
            $producto->setMarca($_POST['cbmarca']);
            $producto->setDescripcion($_POST['txtdescripcion']);
            $producto->setUnidmed($_POST['cbmedida']);
            $producto->setMoneda($_POST['cbmoneda']);
            $producto->setPrecioc($_POST['txtprecioc']);
            $producto->setPreciov($_POST['txtpreciov']);
            $producto->setPreciovmin($_POST['txtpreciomin']);
            $producto->setStock($_POST['txtstock']);
            $producto->setPeso($peso);
            $producto->setIncluir($_POST['cbincluir']);
//            $producto->setNrocuenta($_POST['txtncuenta']);
            $producto->setObservacion($_POST['txtdetalle']);
            $producto->setIdtipoimpuesto($_POST['cbimpuesto']);
            $producto->setProdservi($_POST['txtprod']);
            $producto->setIdcategoria($categoria);
            $producto->setIdlinea($linea);
            $producto->setIdmarca($marca);
            $producto->setIdunidmedida($_POST['cbmedida']);
            
            echo $this->producto->insert($producto);
           
            
            
            
        }
//        if($fila != 0){
//             echo '<script>swal("Éxitosamente!", "Operación realizada correctamente.", "success");</script>';
//            
//            
//        }else{
//            echo '<script>swal("Error!", "Algo sucedio mal :(.", "error");</script>';
//            
//            
//        }
       
    }
    
       function  insertserv(){
        
        $fila = 0;
        if(isset($_POST['txtdescripcion']) &&  isset($_POST['cbmoneda']) && isset($_POST['txtprecioc']) && 
                isset($_POST['txtpreciov']) && isset($_POST['txtpreciomin']) && isset($_POST['cbimpuesto']) && isset($_POST['txtstock'])){
            
            
         
             
                $linea = 0;

            if(empty($_POST['cbcategoria']) || is_nan($_POST['cbcategoria'])){
                $categoria = 0;
            }else {
                $categoria = $_POST['cbcategoria'];
            }
            
                $marca = 0;
 
                $peso = 0;
            
            
            
            
            $producto = new producto();
//            $producto->setTipo($_POST['cbtipo']);
            $producto->setCodigo($_POST['txtcod']);
//            $producto->setCodbarra($_POST['txtcodbarra']);
//            $producto->setMarca($_POST['cbmarca']);
            $producto->setDescripcion($_POST['txtdescripcion']);
//            $producto->setUnidmed($_POST['cbmedida']);
            $producto->setMoneda($_POST['cbmoneda']);
            $producto->setPrecioc($_POST['txtprecioc']);
            $producto->setPreciov($_POST['txtpreciov']);
            $producto->setPreciovmin($_POST['txtpreciomin']);
            $producto->setStock($_POST['txtstock']);
            $producto->setPeso($peso);
//            $producto->setIncluir($_POST['cbincluir']);
//            $producto->setNrocuenta($_POST['txtncuenta']);
            $producto->setObservacion($_POST['txtdetalle']);
            $producto->setIdtipoimpuesto($_POST['cbimpuesto']);
            $producto->setProdservi($_POST['txtprod']);
            $producto->setIdcategoria($categoria);
            $producto->setIdlinea($linea);
            $producto->setIdmarca($marca);
//            $producto->setIdunidmedida($_POST['cbmedida']);
            
            echo $this->producto->insert($producto);
           
            
            
            
        }
//        if($fila != 0){
//             echo '<script>swal("Éxitosamente!", "Operación realizada correctamente.", "success");</script>';
//            
//            
//        }else{
//            echo '<script>swal("Error!", "Algo sucedio mal :(.", "error");</script>';
//            
//            
//        }
       
    }
    
    
      function  update(){
        
        $fila = 0;
        if(isset($_POST['txtdescripcion']) && isset($_POST['cbmedida']) && isset($_POST['cbmoneda']) && isset($_POST['txtprecioc']) && 
                isset($_POST['txtpreciov']) && isset($_POST['txtpreciomin']) && isset($_POST['txtstock'])){
            
            $producto = new producto();
//            $producto->setTipo($_POST['cbtipo']);
            $producto->setCodigo($_POST['txtcod']);
            $producto->setCodbarra($_POST['txtcodbarra']);
            $producto->setMarca($_POST['cbmarca']);
            $producto->setDescripcion($_POST['txtdescripcion']);
            $producto->setUnidmed($_POST['cbmedida']);
            $producto->setMoneda($_POST['cbmoneda']);
            $producto->setPrecioc($_POST['txtprecioc']);
            $producto->setPreciov($_POST['txtpreciov']);
            $producto->setPreciovmin($_POST['txtpreciomin']);
            $producto->setStock($_POST['txtstock']);
            $producto->setPeso($_POST['txtpeso']);
            $producto->setIncluir($_POST['cbincluir']);
//            $producto->setNrocuenta($_POST['txtncuenta']);
            $producto->setObservacion($_POST['txtdetalle']);
            $producto->setIdtipoimpuesto($_POST['cbimpuesto']);
//            $producto->setProdservi($_POST['txtprod']);
            $producto->setIdcategoria($_POST['cbcategoria']);
            $producto->setIdlinea($_POST['cblinea']);
            $producto->setIdmarca($_POST['cbmarca']);
            $producto->setIdunidmedida($_POST['cbmedida']);
            $producto->setId($_POST['id']);
                    
            echo $this->producto->update($producto);
           
             
            
            
        }
//        if($fila != 0){
//             echo '<script>swal("Éxitosamente!", "Operación realizada correctamente.", "success");</script>';
//            
//            
//        }else{
//            echo '<script>swal("Error!", "Algo sucedio mal :(.", "error");</script>';
//            
//            
//        }
       
    }
    
    function  updateserv(){
        
        $fila = 0;
        if(isset($_POST['txtdescripcion']) &&  isset($_POST['cbmoneda']) && isset($_POST['txtprecioc']) && 
                isset($_POST['txtpreciov']) && isset($_POST['txtpreciomin']) && isset($_POST['cbimpuesto']) && isset($_POST['txtstock'])){
            
            $producto = new producto();
//            $producto->setTipo($_POST['cbtipo']);
            $producto->setCodigo($_POST['txtcod']);
//            $producto->setCodbarra($_POST['txtcodbarra']);
//            $producto->setMarca($_POST['cbmarca']);
            $producto->setDescripcion($_POST['txtdescripcion']);
//            $producto->setUnidmed($_POST['cbmedida']);
            $producto->setMoneda($_POST['cbmoneda']);
            $producto->setPrecioc($_POST['txtprecioc']);
            $producto->setPreciov($_POST['txtpreciov']);
            $producto->setPreciovmin($_POST['txtpreciomin']);
            $producto->setStock($_POST['txtstock']);
//            $producto->setPeso($_POST['txtpeso']);
//            $producto->setIncluir($_POST['cbincluir']);
//            $producto->setNrocuenta($_POST['txtncuenta']);
            $producto->setObservacion($_POST['txtdetalle']);
            $producto->setIdtipoimpuesto($_POST['cbimpuesto']);
//            $producto->setProdservi($_POST['txtprod']);
            $producto->setIdcategoria($_POST['cbcategoria']);
//            $producto->setIdlinea($_POST['cblinea']);
//            $producto->setIdmarca($_POST['cbmarca']);
//            $producto->setIdunidmedida($_POST['cbmedida']);
            $producto->setId($_POST['id']);
                    
            echo $this->producto->update($producto);
           
             
            
            
        }
//        if($fila != 0){
//             echo '<script>swal("Éxitosamente!", "Operación realizada correctamente.", "success");</script>';
//            
//            
//        }else{
//            echo '<script>swal("Error!", "Algo sucedio mal :(.", "error");</script>';
//            
//            
//        }
       
    }



function  search(){
    
   
    if (isset($_POST['query'])){
        $return_arr = array();
        
        foreach ($this->producto->search($_POST['query']) as $producto)  //$_GET['term']  $_POST['query']
        {
        //    $id_cliente=$persona->getId();
            $row_array['value'] = $producto->getDescripcion();
            $row_array['id']=$producto->getId();
            $row_array['codigo']=$producto->getCodigo();
            $row_array['descripcion']=$producto->getDescripcion();
            $row_array['preciov']=$producto->getPreciov();
            $row_array['preciovmin']=$producto->getPreciovmin();
            $row_array['incluir']=$producto->getIncluir();


            array_push($return_arr,$row_array);
        }

        /* Toss back results as json encoded array. */
        echo json_encode($return_arr);
}
    
    
    
    
}





  function crearprod(){
        
        
            $series = array();
            $producto = new producto();
            $lineas = $this->linea->selectAll();
            $categorias=$this->categoria->selectAll();
            $marcas = $this->marca->selectAll();
            $medidas = $this->medida->selectAll();
            $impuestos=$this->impuesto->selectAll();
            require_once 'view/layout/header.php';
            require_once 'view/producto/form_producto.php';  
            require_once 'view/marca/modalnewmarca.php'; 
            require_once 'view/linea/modalnewlinea.php'; 
            require_once 'view/categoria/modalnewcategoria.php'; 
            require_once 'view/unidmedida/modalnewunidmedida.php';
            require_once 'view/layout/footer.php';
            
        
        
        
    }
    
     function crearserv(){
        
        
            
            $producto = new producto();
            $lineas = $this->linea->selectAll();
            $categorias=$this->categoria->selectAll();
            $marcas = $this->marca->selectAll();
            $medidas = $this->medida->selectAll();
            $impuestos=$this->impuesto->selectAll();
            require_once 'view/layout/header.php';
            require_once 'view/producto/form_servicio.php';  
            require_once 'view/marca/modalnewmarca.php'; 
            require_once 'view/linea/modalnewlinea.php'; 
            require_once 'view/categoria/modalnewcategoria.php'; 
            require_once 'view/unidmedida/modalnewunidmedida.php';
            require_once 'view/layout/footer.php';
            
        
        
        
    }
    
        function deleteserv() {
        
        if(isset($_POST['id']) && !empty($_POST['id'])){
//            var_dump($_POST);
            $id = $_POST['id'];
            $fila =$this->producto->delete($id);
            
            
//            echo 'fila '.$fila;
                    if($fila!=0 ){
                        echo '<script>swal("Éxitosamente!", "Operación realizada correctamente.", "success");</script>';
                        echo "<META HTTP-EQUIV='Refresh' CONTENT='0; URL=".base_url."producto/selectserv'>";
//                        header("Location:".base_url."producto/selectserv");
   
                    }else {
                        
                        echo '<script>swal("No se realizarón cambios!", "Algo sucedio mal :(", "error");</script>';
                    }
            
            
        }
        
    }
    
        function deleteprod() {
        
        if(isset($_POST['id']) && !empty($_POST['id'])){
//            var_dump($_POST);
            $id = $_POST['id'];
            $fila =$this->producto->delete($id);
            
            
//            echo 'fila '.$fila;
                    if($fila!=0 ){
                        echo '<script>swal("Éxitosamente!", "Operación realizada correctamente.", "success");</script>';
                        echo "<META HTTP-EQUIV='Refresh' CONTENT='0; URL=".base_url."producto/selectprod'>";
//                        header("Location:".base_url."producto/selectprod");
                    }else {
                        
                        echo '<script>swal("No se realizarón cambios!", "Algo sucedio mal :(", "error");</script>';
                    }
            
            
        }
        
    }


}
