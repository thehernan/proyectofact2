
<?php
if ($sucursaldoc->getId() != 0) {
    $titulo = 'EDITAR DOCUMENTO';
    $url = 'sucursaldocumento/update';
    $data = 'update';
} else {
    $titulo = 'NUEVO DOCUMENTO';
    $url = 'sucursaldocumento/insert';
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
                        </h2>



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
                        <form action="<?= base_url . $url ?>" method="POST"  id="FormularioAjax" data-form="<?= $data ?>" enctype="multipart/form-data" autocomplete="off" >
                            <div class="row clearfix">
                                <!--<form >-->
                                <div class="row">
                                    <input type="hidden" value="<?= $sucursaldoc->getId(); ?>" id="id" name="id">

                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group form-float">
                                            <label class="form-label text-danger">Sucursal </label>
                                            <select class="form-control show-tick" id="cbsucursal" name="cbsucursal"  required="">
                                                <option value="" >- Sucursal - </option>
                                                <?php
                                                foreach ($sucursales as $sucursal) {
                                                    if ($sucursal->getId() == $sucursaldoc->getIdsucursal()) {
                                                        echo '<option value="' . $sucursal->getId() . '" selected="selected">' . $sucursal->getNombre() . '</option>';
                                                    } else {
                                                        echo '<option value="' . $sucursal->getId() . '">' . $sucursal->getNombre() . '</option>';
                                                    }
                                                }
                                                ?>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group form-float">
                                            <label class="form-label text-danger">Tipo de documento </label>
                                            <select class="form-control show-tick" id="cbtipodoc" name="cbtipodoc" required="">
                                                <option value="">- Tipo de documento -</option>
<?php
$tipodoc = array('Factura', 'Boleta', 'Nota de Venta', 'Guia de Remision');

for ($i = 0; $i < count($tipodoc); $i++) {
    if ($sucursaldoc->getTipodoc() == $tipodoc[$i]) {
        echo '<option value="' . $tipodoc[$i] . '" selected="selected">' . $tipodoc[$i] . '</option>';
    } else {
        echo '<option value="' . $tipodoc[$i] . '" >' . $tipodoc[$i] . '</option>';
    }
}
?>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group form-float">
                                            <label class="form-label text-danger">Serie </label>
                                            <div class="form-line focused error">
                                                <input type="text" class="form-control" id="txtserie" name="txtserie" value="<?= $sucursaldoc->getSerie(); ?>" required="">
                                                
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group form-float">
                                            <label class="form-label text-danger">Predeterminado </label>
                                            <select class="form-control show-tick" id="cbpredeterminado" name="cbpredeterminado" required="">
                                                <option value="">- Predeterminado -</option>
<?php
$pred = array('Si', 'No');

for ($i = 0; $i < count($pred); $i++) {
    if ($sucursaldoc->getPredeterminado() == $pred[$i]) {
        echo '<option value="' . $pred[$i] . '" selected="selected">' . $pred[$i] . '</option>';
    } else {
        echo '<option value="' . $pred[$i] . '" >' . $pred[$i] . '</option>';
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
                                            <label class="form-label text-danger">Imprimir en modo </label>
                                            <select class="form-control show-tick" id="cbprint" name="cbprint" required="">
                                                <option value="">- Imprimir en modo -</option>
<?php
$print = array('Ticket', 'Otros');

for ($i = 0; $i < count($print); $i++) {
    if ($sucursaldoc->getModoimpresion() == $print[$i]) {
        echo '<option value="' . $print[$i] . '" selected="selected">' . $print[$i] . '</option>';
    } else {
        echo '<option value="' . $print[$i] . '" >' . $print[$i] . '</option>';
    }
}
?>

                                            </select>
                                        </div>
                                    </div>





                                </div>

                                <div class="row">


                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
            <!--                            <input type="checkbox" id="remember_me_5" class="filled-in">
                                        <label for="remember_me_5">Remember Me</label>-->
                                        <button type="submit" class="btn btn-primary btn-lg m-l-15 waves-effect">GUARDAR</button>
                                        <a href="<?= base_url ?>sucursaldocumento/select" class="btn btn-danger btn-lg m-l-15 waves-effect" id="btncancelar">CANCELAR</a>
                                    </div>
                                </div>
                                <!--</form>-->
                            </div>
                        </form>
                        <div id="respuestaAjax"></div>



                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Inline Layout | With Floating Label -->

    </div>
</section>