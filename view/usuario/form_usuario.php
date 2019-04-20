
<?php
if ($usuario->getId() != 0) {
    $titulo = 'EDITAR USUARIO';
    $url = 'usuario/update';
    $data = 'update';
} else {
    $titulo = 'NUEVO USUARIO';
    $url = 'usuario/insert';
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
               
                
                <?php  if($data == 'update'):?>
                <hr>

                <button type="button" data-color="deep-purple" class="btn bg-deep-purple waves-effect" data-toggle="modal" data-target=".modalcambioclave"><span class="glyphicon glyphicon-user"></span>  CAMBIAR CLAVE</button>
                <?php endif;?>
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
                            <input type="hidden" value="<?= $usuario->getId(); ?>" id="id" name="id">

                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                <div class="form-group form-float">
                                    <label class="form-label text-danger">Apellido Paterno </label>
                                    <div class="form-line focused error">
                                        <input type="text" class="form-control" id="txtapellidop" name="txtapellidop" value="<?= $usuario->getApellidoP(); ?>" required="">
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                <div class="form-group form-float">
                                    <label class="form-label text-danger">Apellido Materno </label>
                                    <div class="form-line focused error">
                                        <input type="text" class="form-control" id="txtapellidom" name="txtapellidom" value="<?= $usuario->getApellidoM(); ?>" required>
                                        
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                <div class="form-group form-float">
                                    <label class="form-label text-danger">Nombre </label>
                                    <div class="form-line focused error">
                                        <input type="text" class="form-control" id="txtnombre" name="txtnombre" value="<?= $usuario->getNombre(); ?>" required="">
                                        
                                    </div>
                                </div>
                            </div>

                          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                    <div class="form-group form-float">
                                        <label class="form-label text-danger">Sexo</label>
                                        <select class="form-control show-tick" id="cbsexo" name="cbsexo" required="">
                                            <option value="">- Sexo  -</option>
                                            <?php 
                                            $pred= array('Masculino','Femenino');

                                            for($i=0;$i < count($pred);$i++){
                                                if($usuario->getSexo() == $pred[$i]){
                                                    echo '<option value="'.$pred[$i].'" selected="selected">'.$pred[$i].'</option>';

                                                }else{
                                                    echo '<option value="'.$pred[$i].'" >'.$pred[$i].'</option>';
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
                                    <label class="form-label text-danger">Fecha de Nacimiento </label>
                                     <div class="form-group">
                                        <div class="form-line error" id="bs_datepicker_container">
                                            <input type="text" class="form-control" placeholder="Fecha de Nacimiento" id="dpfechanacimiento" name="dpfechanacimiento" value="<?= ($usuario->getFechan()=='') ? date('d/m/Y') : date('d/m/Y',strtotime($usuario->getFechan())) ?>" required="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                <div class="form-group form-float">
                                    <label class="form-label text-danger">DNI</label>
                                    <div class="form-line focused error">
                                        <input type="text" class="form-control" id="txtdni" name="txtdni" value="<?= $usuario->getDni(); ?>" required>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                <div class="form-group form-float">
                                    <label class="form-label">Telf1</label>
                                    <div class="form-line">
                                        <input type="text" class="form-control" id="txttelf1" name="txttelf1" value="<?= $usuario->getTelf1(); ?>">
                                        
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                <div class="form-group form-float">
                                    <label class="form-label">Telf2 </label>
                                    <div class="form-line">
                                        <input type="text" class="form-control" id="txttelf2" name="txttelf2" value="<?= $usuario->getTelf2(); ?>">
                                        
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row">



                            

                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                <div class="form-group form-float">
                                    <label class="form-label">Celular1</label>
                                    <div class="form-line">
                                        <input type="text" class="form-control" id="txtcel1" name="txtcel1" value="<?= $usuario->getCel1(); ?>" >
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                <div class="form-group form-float">
                                    <label class="form-label">Celular</label>
                                    <div class="form-line">
                                        <input type="text" class="form-control" id="txtcel2" name="txtcel2" value="<?= $usuario->getCel2(); ?>">
                                        
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                <div class="form-group form-float">
                                    <label class="form-label">Email</label>
                                    <div class="form-line">
                                        <input type="email" class="form-control" id="txtemail" name="txtemail" value="<?= $usuario->getEmail(); ?>">
                                        
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                <div class="form-group form-float">
                                    <label class="form-label text-danger">Usuario </label>
                                    <div class="form-line">
                                        <input type="text" class="form-control" id="txtusuario" name="txtusuario" value="<?= $usuario->getUsuario(); ?>" required="" autocomplete="off">
                                        
                                    </div>
                                </div>
                            </div>


                        </div>
                        <div class="row">

                            
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                <div class="form-group form-float">
                                    <label class="form-label text-danger">Clave </label>
                                    <div class="form-line">
                                        <input type="password" class="form-control" id="txtclave" name="txtclave" value=""  <?= $data=='insert' ? 'required=""' : 'disabled=""' ?> >
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                <div class="form-group form-float">
                                    <label class="form-label text-danger">Nivel </label>
                                    <select class="form-control show-tick" id="cbnivel" name="cbnivel" required="">
                                        <option value="">- Nivel -</option>
                                        <?php 
                                        foreach ($niveles as $nivel){
                                            if($usuario->getId_nivel()==$nivel->getId()){
                                                
                                                echo '<option value="'.$nivel->getId().'" selected="selected">'.$nivel->getDescripcion().'</option>';
                                            }else{
                                                 echo '<option value="'.$nivel->getId().'">'.$nivel->getDescripcion().'</option>';
                                            }
                                            
                                            
                                        }
   
                                        ?>
                                        
                                </select>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                <div class="form-group form-float">
                                    <label class="form-label text-danger">Sucursal </label>
                                    <select class="form-control show-tick" id="cbsucursal" name="cbsucursal" required="">
                                        <option value="">- Sucursal -</option>
                                        <?php 
                                        foreach ($sucursales as $sucursal){
                                            if($sucursal->getId()==$usuario->getIdsucursal()){
                                                
                                                echo '<option value="'.$sucursal->getId().'" selected="selected">'.$sucursal->getNombre().'</option>';
                                            }else{
                                                 echo '<option value="'.$sucursal->getId().'">'.$sucursal->getNombre().'</option>';
                                            }
                                            
                                            
                                        }
   
                                        ?>
                                        
                                </select>
                                </div>
                            </div>
                            
                            
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                <div class="form-group form-float">
                                    <label class="form-label ">Comision %</label>
                                    <div class="form-line">
                                        <input type="text" class="form-control" id="txtcomision" name="txtcomision" value="<?= $usuario->getComision(); ?>">
                                        

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">



                            

                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                <div class="form-group form-float">
<?php echo' <img src="data:image/jpg;base64 ,' . $usuario->getFoto() . '" width="48" height="48" alt="Foto" id="foto" />'; ?>
                                    <input type="file" class="form-control" id="imgfoto" name="imgfoto" accept="image/*">
                                    <label class="form-label">Foto</label>


                                </div>
                            </div>

                            

                        </div>
                        <div class="row">

                           
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
    <!--                            <input type="checkbox" id="remember_me_5" class="filled-in">
                                <label for="remember_me_5">Remember Me</label>-->
                                <button type="submit" class="btn btn-primary btn-lg m-l-15 waves-effect">GUARDAR</button>
                                <a href="<?= base_url ?>usuario/select"  class="btn btn-danger btn-lg m-l-15 waves-effect" id="btncancelar">CANCELAR</a>
                            </div>
                        </div>
                        <!--</form>-->
                    </div>
                </form>
                



            </div>
        </div>
    </div>
</div>
<!-- #END# Inline Layout | With Floating Label -->

    </div>
</section>

<script>
    function init() {
        var inputFile = document.getElementById('imgfoto');
        inputFile.addEventListener('change', mostrarImagenlocal, false);
        
       
    }

    function mostrarImagenlocal(event) {
        var file = event.target.files[0];
        var reader = new FileReader();
        reader.onload = function (event) {
            var img = document.getElementById('foto');
            img.src = event.target.result;
        }
        reader.readAsDataURL(file);
    }
    
       
    window.addEventListener('load', init, false);

</script>