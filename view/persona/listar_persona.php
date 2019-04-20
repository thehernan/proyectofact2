
<?php
$url = '';
$urlup = '';
$urldel = '';
if ($tipo == 1) {
    $url = 'persona/crearclient';
    $urlup = 'persona/cargarclient';
    $urldel = base_url . 'persona/deleteclient';
}
if ($tipo == 2) {
    $url = 'persona/crearprovee';
    $urlup = 'persona/cargarprovee';
    $urldel = base_url . 'persona/deleteprove';
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
                            <?= $tipo == 1 ? 'LISTA DE CLIENTES' : 'LISTA DE PROVEEDORES' ?><hr>
                            <a href="<?= base_url . $url ?>"  class="btn btn-primary"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> NUEVO</a>

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
                                        <th>Nombre</th>
                                        <th>Dpto</th>
                                        <th>R.U.C</th>
                                        <th>Telf. Fijo</th>
                                        <th>Aniv.</th>
                                        <th>Vendedor</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Nro°</th>
                                        <th>Nombre</th>
                                        <th>Dpto</th>
                                        <th>R.U.C</th>
                                        <th>Telf. Fijo</th>
                                        <th>Aniv.</th>
                                        <th>Vendedor</th>
                                        <th>Acciones</th>
                                    </tr>
                                </tfoot>
                                <tbody>

                                    <?php
                                    $i = 1;
                                    foreach ($personas as $persona) {
                                        echo '<tr>';
                                        echo '<td>' . $i . '</td>';
                                        echo '<td>' . $persona->getNombre() . '</td>';
                                        echo '<td>' . $persona->getDpto() . '</td>';
                                        echo '<td>' . $persona->getRuc() . '</td>';
                                        echo '<td>' . $persona->getTelfijo() . '</td>';
                                        echo '<td>' . $persona->getAnivcumplenos() . '</td>';
                                        echo '<td>' . $persona->getRepresentante() . '</td>';
                                        echo '<td><a href="' . base_url . $urlup . '&id=' . $persona->getId() . '" type="button" class="btn btn-primary"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>'
                                        . ' <button  type="button" class="btn btn-danger" onclick=eliminar(' . $persona->getId() . ',"' . $urldel . '","delete")><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button></td>';
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
