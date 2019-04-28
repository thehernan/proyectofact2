
<?php 
$url= '';
$urlup='';
$urldel='';
if($tipo=='producto'){
    $urlcrear = 'producto/crearprod';
    $urlup = 'producto/cargarprod';
    $urldel = base_url.'producto/deleteprod';
}
if($tipo=='servicio') {
    $urlcrear = 'producto/crearserv';
    $urlup = 'producto/cargarserv';
    $urldel = base_url.'producto/deleteserv';
}

?>
<section class="content">
    <div class="container-fluid">


<div class="block-header">
<!--    <br>-->
    <div class="RespuestaAjax"></div>
</div>
<!-- Basic Examples -->

<!-- #END# Basic Examples -->
<!-- Exportable Table -->
<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <?=  $tipo=='producto' ?  'LISTA DE ARTICULOS' : 'LISTA DE SERVICIOS' ?><hr>
                                <a href="<?= base_url.$urlcrear?>"  class="btn btn-primary"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> NUEVO</a>
                               
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
<!--                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
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
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable" id="tablapersona">
                                    <thead>
                                        <tr>
                                            <th>Nro°</th>
                                            <th>Codigo</th>
                                            <th>Descripción</th>
                                            <th>Stock</th>
                                            <th>P.C</th>
                                            <th>P.V</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nro°</th>
                                            <th>Codigo</th>
                                            <th>Descripción</th>
                                            <th>Stock</th>
                                            <th>P.C</th>
                                            <th>P.V</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        
                                        <?php $i=1;
                                        foreach ($productos as $producto){ 
                                            echo '<tr>';
                                            echo '<td>'.$i.'</td>';
                                            echo '<td>'.$producto->getCodigo().'</td>';
                                            echo '<td>'.$producto->getDescripcion().'</td>';
                                            echo '<td>'.$producto->getStock().'</td>';
                                            echo '<td>'.$producto->getPrecioc().'</td>';
                                            echo '<td>'.$producto->getPreciov().'</td>';
                                           
                                            echo '<td><a href="'.base_url.$urlup.'&id='.$producto->getId().'" type="button" class="btn btn-primary"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>'
                                            .' <button  type="button" class="btn btn-danger" onclick=eliminar(' . $producto->getId() . ',"' . $urldel . '","delete")><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button></td>';
                                            echo '</tr>';
                                            $i++;
                                        }
                                        ?>
                                      
                                     
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<!-- #END# Exportable Table --> 
   </div>
</section>
