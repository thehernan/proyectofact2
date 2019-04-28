
<?php
if ($cuenta->getId() != 0) {
    $titulo = 'EDITAR CUENTA BANCARIA';
    $url = 'cuentabancaria/update';
    $data = 'update';
} else {
    $titulo = 'NUEVA CUENTA BANCARIA';
    $url = 'cuentabancaria/insert';
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


                    </div>
                    <div class="body">
                        <form action="<?= base_url . $url ?>" method="POST"  id="FormularioAjax" data-form="<?= $data ?>" enctype="multipart/form-data" autocomplete="off" >
                            <div class="row clearfix">
                                <!--<form >-->
                                <div class="row">
                                    <input type="hidden" value="<?= $cuenta->getId(); ?>" id="id" name="id">

                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-group form-float">
                                            <label class="form-label text-danger"> Banco</label>
                                            <div id="divlinea">
                                                <select class="form-control show-tick" id="cbbanco" name="cbbanco"  required="">
                                                    <option value="" >- Bancos - </option>
                                                    <?php
                                                    foreach ($bancos as $banco) {
                                                        if ($banco->getNombre() == $cuenta->getBanco()) {
                                                            echo '<option value="' . $banco->getNombre() . '" selected="selected">' . $banco->getNombre() . '</option>';
                                                        } else {
                                                            echo '<option value="' . $banco->getNombre() . '">' . $banco->getNombre() . '</option>';
                                                        }
                                                    }
                                                    ?>

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-group form-float">
                                            <label class="form-label text-danger">Numero</label>
                                            <div class="form-line focused error">
                                                <input type="text" class="form-control" id="txtnumero" name="txtnumero" value="<?= $cuenta->getNumero(); ?>" required="">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-group form-float">
                                            <label class="form-label text-danger">CCI</label>
                                            <div class="form-line focused error">
                                                <input type="text" class="form-control" id="txtcci" name="txtcci" value="<?= $cuenta->getCci(); ?>" required="">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-group form-float">
                                            <label class="form-label text-danger">Titular</label>
                                            <div class="form-line focused error">
                                                <input type="text" class="form-control" id="txttitular" name="txttitular" value="<?= $cuenta->getTitular(); ?>" required="">

                                            </div>
                                        </div>
                                    </div>




                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
            <!--                            <input type="checkbox" id="remember_me_5" class="filled-in">
                                        <label for="remember_me_5">Remember Me</label>-->
                                        <button type="submit" class="btn btn-primary btn-lg m-l-15 waves-effect">GUARDAR</button>
                                        <a href="<?= base_url ?>cuentabancaria/select"  class="btn btn-danger btn-lg m-l-15 waves-effect" id="btncancelar">CANCELAR</a>
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
