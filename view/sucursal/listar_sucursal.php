


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
                                LISTA DE SUCURSALES <hr>
                                <a href="<?= base_url?>sucursal/crear"  class="btn btn-primary"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> NUEVO</a>
                               
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
                                            <th>Sucursal</th>
                                            <th>Nombre</th>
                                            <th>Telefonos</th>
                                            <th>Responsable</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nro°</th>
                                            <th>Sucursal</th>
                                            <th>Nombre</th>
                                            <th>Telefonos</th>
                                            <th>Responsable</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        
                                        <?php $i=1;
                                        foreach ($sucursales as $sucursal){ 
                                            echo '<tr>';
                                            echo '<td>'.$i.'</td>';
                                            echo '<td>'.$sucursal->getEmpresa().'</td>';
                                            echo '<td>'.$sucursal->getNombre().'</td>';
                                            echo '<td>'.$sucursal->getTelf().'</td>';
                                            echo '<td>'.$sucursal->getResponsable().'</td>';
                                           
                                           
                                            echo '<td><a href="'.base_url.'sucursal/cargar&id='.$sucursal->getId().'"  ><li class="material-icons" >create</li></a>'
                                            .' <button  type="button" class="btn bg-orange waves-effect  " onclick=eliminar('.$sucursal->getId().',"'.base_url.'sucursal/delete","delete")><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button></td>';
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

