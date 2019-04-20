
<?php
if ($sucursal->getId() != 0) {
    
    $url = 'sucursal/update';
    $data = 'update';
} else {

    $url = 'sucursal/insert';
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
                            <input type="hidden" value="<?= $sucursal->getId(); ?>" id="id" name="id">

                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                <div class="form-group form-float">
                                    <label class="form-label">Codigo</label>
                                    <div class="form-line">
                                        <input type="text" class="form-control" id="txtcod" name="txtcod" value="<?= $sucursal->getCodigo(); ?>">
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                <div class="form-group form-float">
                                    <label class="form-label text-danger">Nombre </label>
                                    <div class="form-line focused error ">
                                        <input type="text" class="form-control" id="txtnombre" name="txtnombre" value="<?= $sucursal->getNombre(); ?>" required>
                                        
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                <div class="form-group form-float">
                                    <label class="form-label text-danger">Empresa </label>
                                    <div class="form-line focused error">
                                        <input type="text" class="form-control" id="txtempresa" name="txtempresa" value="<?= $sucursal->getEmpresa(); ?>" required="">
                                        
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                <div class="form-group form-float">
                                    <label class="form-label text-danger">RUC </label>
                                    <div class="form-line focused error">
                                        <input type="text" class="form-control" id="txtruc" name="txtruc" value="<?= $sucursal->getRuc() ?>" required>
                                        
                                    </div>
                                </div>
                            </div>


                        </div>
                        <div class="row">

                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                <div class="form-group form-float">
                                    <label class="form-label">Slogan</label>
                                    <div class="form-line">
                                        <input type="text" class="form-control" id="txtslogan" name="txtslogan" value="<?= $sucursal->getSlogan() ?>">
                                        
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                <div class="form-group form-float">
                                    <label class="form-label">Dirección</label>
                                    <div class="form-line">
                                        <input type="text" class="form-control" id="txtdireccion" name="txtdireccion" value="<?= $sucursal->getDireccion(); ?>" >
                                        
                                    </div>
                                </div>
                            </div>
                            
                          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                <div class="form-group form-float">
                                    <label class="form-label">Teléfono</label>
                                    <div class="form-line">
                                        <input type="text" class="form-control" id="txttelf" name="txttelf" value="<?= $sucursal->getTelf(); ?>">
                                        
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                <div class="form-group form-float">
                                    <label class="form-label">Teléfono 1</label>
                                    <div class="form-line">
                                        <input type="text" class="form-control" id="txttelf1" name="txttelf1" value="<?= $sucursal->getTelf1(); ?>">
                                        
                                    </div>
                                </div>
                            </div>

                        </div>
                        
                        <div class="row">

                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                <div class="form-group form-float">
                                    <label class="form-label">Teléfono 2</label>
                                    <div class="form-line">
                                        <input type="text" class="form-control" id="txttelf2" name="txttelf2" value="<?= $sucursal->getTelf2(); ?>">
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                <div class="form-group form-float">
                                    <label class="form-label">Teléfono 3</label>
                                    <div class="form-line">
                                        <input type="text" class="form-control" id="txttelf3" name="txttelf3" value="<?= $sucursal->getTelf3(); ?>">
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                <div class="form-group form-float">
                                    <label class="form-label">Web</label>
                                    <div class="form-line">
                                        <input type="text" class="form-control" id="txtweb" name="txtweb" value="<?= $sucursal->getWeb(); ?>">
                                        
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                <div class="form-group form-float">
                                    <label class="form-label">Email</label>
                                    <div class="form-line">
                                        <input type="text" class="form-control" id="txtemail" name="txtemail" value="<?= $sucursal->getEmail(); ?>">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">



                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                <div class="form-group form-float">
                                    <label class="form-label">Responsable</label>
                                    <div class="form-line">
                                        <input type="text" class="form-control" id="txtresponsable" name="txtresponsable" value="<?= $sucursal->getResponsable(); ?>">
                                        

                                    </div>
                                </div>
                            </div>


                           

<!--                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                <div class="form-group form-float">
<?php // echo' <img src="data:image/jpg;base64 ,' . $sucursal->getImglocal() . '" width="48" height="48" alt="Img Local" id="local" />'; ?>
                                    <input type="file" class="form-control" id="imglocal" name="imglocal" accept="image/*">
                                    <label class="form-label">Imagen del Local</label>


                                </div>
                            </div>-->

                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                <div class="form-group form-float">
<?php echo' <img src="data:image/jpg;base64 ,' . $sucursal->getImgtoplogo() . '" width="48" height="48" alt="Logo" id="top" />'; ?>
                                    <input type="file" class="form-control" id="imgtop" name="imgtop" accept="image/*" >
                                    <label class="form-label">Logo</label>


                                </div>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                <div class="form-group form-float">
<?php echo' <img src="data:image/jpg;base64 ,' . $sucursal->getImgpie() . '" width="48" height="48" alt="Pie de página" id="pie" />'; ?>
                                    <input type="file" class="form-control" id="imgpie" name="imgpie" accept="image/*">
                                    <label class="form-label">Pie de página</label>


                                </div>
                            </div> 

                        </div>
                        <div class="row">

                           
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
    <!--                            <input type="checkbox" id="remember_me_5" class="filled-in">
                                <label for="remember_me_5">Remember Me</label>-->
                                <button type="submit" class="btn btn-primary btn-lg m-l-15 waves-effect">GUARDAR</button>
                                <a href="<?= base_url ?>sucursal/select"  class="btn btn-danger btn-lg m-l-15 waves-effect" id="btncancelar">CANCELAR</a>
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
<script>
    function init() {
//        var inputFile = document.getElementById('imglocal');
//        inputFile.addEventListener('change', mostrarImagenlocal, false);
        
        var inputFile = document.getElementById('imgtop');
        inputFile.addEventListener('change', mostrarImagentop, false);
        
        var inputFile = document.getElementById('imgpie');
        inputFile.addEventListener('change', mostrarImagenpie, false);
    }

//    function mostrarImagenlocal(event) {
//        var file = event.target.files[0];
//        var reader = new FileReader();
//        reader.onload = function (event) {
//            var img = document.getElementById('local');
//            img.src = event.target.result;
//        }
//        reader.readAsDataURL(file);
//    }
    
        function mostrarImagentop(event) {
        var file = event.target.files[0];
        var reader = new FileReader();
        reader.onload = function (event) {
            var img = document.getElementById('top');
            img.src = event.target.result;
        }
        reader.readAsDataURL(file);
    }
        function mostrarImagenpie(event) {
        var file = event.target.files[0];
        var reader = new FileReader();
        reader.onload = function (event) {
            var img = document.getElementById('pie');
            img.src = event.target.result;
        }
        reader.readAsDataURL(file);
    }

    window.addEventListener('load', init, false);

</script>