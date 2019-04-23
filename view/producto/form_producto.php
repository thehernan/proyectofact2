
<?php
if ($producto->getId() != 0) {
    $titulo = 'EDITAR ARTICULO';
    $url = 'producto/update';
    $data = 'update';
} else {
    $titulo = 'NUEVO ARTICULO';
    $url = 'producto/insert';
    $data = 'insert';
}
?>

<section class="content">
    <div class="container-fluid">


        <div class="block-header">
            <!--<h2>FORM EXAMPLES</h2>-->
            <!--    <div class="RespuestaAjax"></div>-->
        </div>
        <!-- Inline Layout | With Floating Label -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
<?= $titulo ?>
                            <!--<small>Edición</small>-->
                        </h2><hr>

                        <button type="button" data-color="lime" class="btn bg-lime waves-effect" data-toggle="modal" data-target=".modallinea"><span class="glyphicon glyphicon-plus"></span> LINEA</button>
                        <button type="button" data-color="cyan" class="btn bg-cyan waves-effect" data-toggle="modal" data-target=".modalcategoria"><span class="glyphicon glyphicon-plus"></span> CATEGORIA</button>
                        <button type="button" data-color="green" class="btn bg-green waves-effect" data-toggle="modal" data-target=".modalunidmedida"><span class="glyphicon glyphicon-plus"></span> UNID. MED.</button>

                        <button type="button" data-color="deep-purple" class="btn bg-deep-purple waves-effect" data-toggle="modal" data-target=".modalmarca"><span class="glyphicon glyphicon-plus"></span> MARCA</button>

                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <!--                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                                            <i class="material-icons">more_vert</i>
                                                        </a>
                                                        <ul class="dropdown-menu pull-right">
                                                            <li><a href="javascript:void(0);">Action</a></li>
                                                            <li><a href="javascript:void(0);">Another action</a></li>
                                                            <li><a href="javascript:void(0);">Something else here</a></li>
                                                        </ul>-->


                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <form action="<?= base_url . $url ?>" method="POST"  id="FormularioProducto" data-form="<?= $data ?>" enctype="multipart/form-data" autocomplete="off" >
                            <div class="row clearfix">
                                <!--<form >-->
                                <input type="hidden" value="<?= $producto->getId(); ?>" id="id" name="id">
                                    <input type="hidden" value="producto" id="txtprod" name="txtprod">
                                <div class="row">
                                   
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group form-float">
                                            <label class="form-label">Cod. Articulo</label>
                                            <div class="form-line">
                                                <input type="text" class="form-control" id="txtcod" name="txtcod" value="<?= $producto->getCodigo(); ?>" >
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group form-float">
                                            <label class="form-label">Cod. Barra</label>
                                            <div class="form-line">
                                                <input type="text" class="form-control" id="txtcodbarra" name="txtcodbarra" value="<?= $producto->getCodbarra(); ?>">
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group form-float">
                                            <label class="form-label"> Linea</label>
                                            <div id="divlinea">
                                                <select class="form-control show-tick" id="cblinea" name="cblinea" >
                                                    <option value="" >- Linea - </option>
<?php
foreach ($lineas as $linea) {
    if ($linea->getId() == $producto->getIdlinea()) {
        echo '<option value="' . $linea->getId() . '" selected="selected">' . $linea->getDescripcion() . '</option>';
    } else {
        echo '<option value="' . $linea->getId() . '">' . $linea->getDescripcion() . '</option>';
    }
}
?>

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                         <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group form-float">
                                            <label class="form-label">Categoria</label>
                                            <div id="divcategoria">
                                                <select class="form-control show-tick" id="cbcategoria" name="cbcategoria" >
                                                    <option value="">- Categoria -</option>
<?php
foreach ($categorias as $categoria) {
    if ($categoria->getId() == $producto->getIdcategoria()) {
        echo '<option value="' . $categoria->getId() . '" selected="selected">' . $categoria->getDescripcion() . '</option>';
    } else {
        echo '<option value="' . $categoria->getId() . '">' . $categoria->getDescripcion() . '</option>';
    }
}
?>

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                               
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group form-float" >
                                            <label class="form-label">Marca</label>
                                            <div id="divmarca">
                                                <select class="form-control show-tick" id="cbmarca" name="cbmarca" >
                                                    <option value="">- Marca -</option>
                                                    <?php
                                                    foreach ($marcas as $marca) {
                                                        if ($marca->getId() == $producto->getIdmarca()) {
                                                            echo '<option value="' . $marca->getId() . '" selected="selected">' . $marca->getDescripcion() . '</option>';
                                                        } else {
                                                            echo '<option value="' . $marca->getId() . '">' . $marca->getDescripcion() . '</option>';
                                                        }
                                                    }
                                                    ?>

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group form-float">
                                            <label class="form-label text-danger">Descripción del Articulo </label>
                                            <div class="form-line focused error">
                                                <input type="text" class="form-control" id="txtdescripcion" name="txtdescripcion" value="<?= $producto->getDescripcion() ?>" required>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group form-float">
                                            <label class="form-label text-danger">Medida</label>
                                            <div id="divmedida">
                                                <select class="form-control show-tick" id="cbmedida" name="cbmedida" required>

                                                    <option value="">- Medida -</option>
<?php
foreach ($medidas as $medida) {
    if ($medida->getId() == $producto->getIdunidmedida()) {
        echo '<option value="' . $medida->getId() . '" selected="selected">' . $medida->getDescripcion() . '</option>';
    } else {
        echo '<option value="' . $medida->getId() . '">' . $medida->getDescripcion() . '</option>';
    }
}
?>

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group form-float">
                                            <label class="form-label text-danger">Moneda</label>
                                            <select class="form-control show-tick" id="cbmoneda" name="cbmoneda" required>
                                                
                                                    <?php
                                                    $money= array('Soles','Dolares');
                                                    
                                                    for($i=0;$i < count($money);$i++){
                                                    if ($producto->getMoneda() == $money[$i]) {
                                                        echo '<option value="'.$money[$i].'" selected="selected">'.$money[$i].'</option>';
                                                        
                                                    }else {
                                                        echo '<option value="'.$money[$i].'" >'.$money[$i].'</option>';
                                                    } 
                                                    
                                                    }
                                                    ?>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group form-float">
                                            <label class="form-label text-danger">Precio Compra</label>
                                            <div class="form-line focused error">
                                                <input type="text" class="form-control" id="txtprecioc" name="txtprecioc" value="<?= $producto->getPrecioc(); ?>" required>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group form-float">
                                            <label class="form-label text-danger">Precio Venta</label>
                                            <div class="form-line focused error">
                                                <input type="text" class="form-control" id="txtpreciov" name="txtpreciov" value="<?= $producto->getPreciov(); ?>" required>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group form-float">
                                            <label class="form-label text-danger">Precio Venta Min.</label>
                                            <div class="form-line focused error">
                                                <input type="text" class="form-control" id="txtpreciomin" name="txtpreciomin" value="<?= $producto->getPreciovmin(); ?>" required>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group form-float">
                                            <label class="form-label text-danger">Stock Inicial</label>
                                            <div class="form-line focused error">
                                                <input type="number" step="0.01" class="form-control" id="txtstock" name="txtstock" value="<?= $producto->getStock(); ?>" required>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group form-float">
                                            <label class="form-label">Peso (KG)</label>
                                            <div class="form-line">
                                                <input type="text" class="form-control" id="txtpeso" name="txtpeso" value="<?= $producto->getPeso(); ?>">
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group form-float">
                                            <label class="form-label">Series</label>
                                            <select class="form-control show-tick" id="cbincluir" name="cbincluir">
                                                <option value="">- Series -</option>
<?php
$serie = array('Si','No');
for ($i=0; $i < count($serie); $i++){
    if ($producto->getIncluir() == $serie[$i]) {
    echo '<option value="'.$serie[$i].'" selected="selected">'.$serie[$i].'</option>';
    
    } else {
        echo '<option value="'.$serie[$i].'" >'.$serie[$i].'</option>';
    }
    
}

?>

                                            </select>

                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group ">
                                            <label class="form-label text-danger">Tipo de Impuesto</label>
                                            <select class="form-control show-tick" id="cbimpuesto" name="cbimpuesto" required >
                                                
                                                <?php
                                                foreach ($impuestos as $impuesto) {
                                                    if ($impuesto->getId() == $producto->getIdtipoimpuesto()) {
                                                        echo '<option value="' . $impuesto->getId() . '" selected="selected">' . $impuesto->getDescripcion() . '</option>';
                                                    } else {
                                                        echo '<option value="' . $impuesto->getId() . '">' . $impuesto->getDescripcion() . '</option>';
                                                    }
                                                }
                                                ?>

                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group form-float">
                                            <label class="form-label">Detalle del Articulo</label>
                                            <div class="form-line">
                                                <textarea class="form-control" id="txtdetalle" name="txtdetalle" ><?= $producto->getObservacion(); ?></textarea>
                                                
                                            </div>

                                        </div>
                                    </div>
                                    
                                    
                                </div>
                                <div class="row">
                                    
                                    

                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <!--                            <input type="checkbox" id="remember_me_5" class="filled-in">
                                        <label for="remember_me_5">Remember Me</label>-->
                                        <button type="submit" class="btn btn-primary btn-lg m-l-15 waves-effect">GUARDAR</button>
                                        <a href="<?= base_url ?>producto/selectprod"  class="btn btn-danger btn-lg m-l-15 waves-effect" id="btncancelar">CANCELAR</a>
                                    </div>
                                </div>
                                <!--</form>-->
                            </div>
                        </form>


                        <?= require_once 'view/producto/listar_series.php'; ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Inline Layout | With Floating Label -->

    </div>
</section>