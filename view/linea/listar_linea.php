
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
                           LINEA<hr>
                            <a href="<?= base_url ?>linea/crear"  class="btn btn-primary"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> NUEVO</a>

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
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable" id="tablabancos">
                                <thead>
                                    <tr>
                                        <th>Nro°</th>
                                        <th>Descripción </th>
                                        <th>Código</th>
                                     

                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Nro°</th>
                                        <th>Descripción </th>
                                        <th>Código</th>

                                        <th>Acciones</th>
                                    </tr>
                                </tfoot>
                                <tbody>

                                    <?php
                                    $i = 1;
                                    foreach ($lineas as $linea) {
                                        echo '<tr>';
                                        echo '<td>' . $i . '</td>';
                                        echo '<td>' . $linea->getDescripcion() . '</td>';
                                        echo '<td>' . $linea->getCodigo() . '</td>';
                                        
                                       
                                 
                                        echo '<td><a href="' . base_url . 'linea/cargar&id=' . $linea->getId() . '" type="button" class="btn btn-primary"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a></td>';
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
