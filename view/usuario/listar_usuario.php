
<?php 

   
$urlup = 'usuario/cargar';
$urldel = base_url.'usuario/delete';



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
                                LISTA DE USUARIOS <hr>
                                <a href="<?= base_url.$urlup?>&id=0"  class="btn btn-primary"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> NUEVO</a>
                               
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
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable" id="tablasucursal">
                                    <thead>
                                        <tr>
                                            <th>Nro°</th>
                                            <th>Nombre</th>                                          
                                            <th>Telefonos</th>
                                            <th>Sucursal</th>
                                            <th>Perfil</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                           <th>Nro°</th>
                                            <th>Nombre</th>
                                            <th>Telefonos</th>
                                            <th>Sucursal</th>
                                            <th>Perfil</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        
                                        <?php $i=1;
                                        foreach ($usuarios as $usuario){ 
                                            echo '<tr>';
                                            echo '<td>'.$i.'</td>';
                                            echo '<td>'.$usuario->getNombre().'</td>';
                                            echo '<td><a href= telf:'.$usuario->getCel1().'></a>'.$usuario->getCel1().'</td>';
                                            echo '<td>'.$usuario->getSucursal().'</td>';
                                            echo '<td>'.$usuario->getId_nivel().'</td>';
                                           
                                           
                                            echo '<td><a href="'.base_url.$urlup.'&id='.$usuario->getId().'" type="button" class="btn btn-primary"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>'
                                            .' <button  type="button" class="btn btn-danger" onclick=eliminar('.$usuario->getId().',"'.$urldel.'","delete")><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button></td>';
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
