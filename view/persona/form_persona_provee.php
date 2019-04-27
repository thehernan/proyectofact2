
<?php
//$nombre = '';
//$tipodoc = '';
//$ruc = '';
//$dni = '';
//$representate = '';
//$dpto = '';
//$provincia = '';
//$distrito = '';
//$direccion = '';
//$telfijo = '';
//$cel1 = '';
//$cel2 = '';
//$cel3 = '';
//$email = '';
//$aniver = '';
//$representa = '';
//$modpago = '';
//$estado = '';
//$partida = '';
//$web = '';
//$url = '';
//$id = '';
//$titulo = 'NUEVO CLIENTE';
if ($persona->getId() != 0 ) {
//    $id = $persona->getId();
//    $nombre = $persona->getNombre();
//    $tipodoc = $persona->getIdtipodocumento();
//    $ruc = $persona->getRuc();
//    $representate = $persona->getRepresentante();
//    $dni = $persona->getDni();
//    $dpto = $persona->getDpto();
//    $provincia = $persona->getProvincia();
//    $distrito = $persona->getDistrito();
//    $direccion = $persona->getDireccion();
//    $telfijo = $persona->getTelfijo();
//    $cel1 = $persona->getCel1();
//    $cel2 = $persona->getCel2();
//    $cel3 = $persona->getCel3();
//    $email = $persona->getEmail();
//    $aniver = $persona->getAnivcumplenos();
//    $representa = $persona->getRepresenta();
//    $modpago = $persona->getModopago();
//    $estado = $persona->getEstado();
//    $partida = $persona->getPartida();
//    $web = $persona->getWeb();
//    $tipo = $persona->getTipopersona();
//    $titulo = 'EDITAR CLIENTE';
    $url = 'persona/update';
} else {
    $url = 'persona/insert';
}
?>


<section class="content">
    <div class="container-fluid">



        <div class="block-header">
            <!--<h2>FORM EXAMPLES</h2>-->
            <div class="RespuestaAjax"></div>
        </div>
        <!-- Inline Layout | With Floating Label -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            NUEVO PROVEEDOR
                            <small>Registro</small>
                        </h2>
                        <br>
                         <div class="row">
                            <div class="col-lg-10 col-md-10 col-sm-12 ">
                                <input type="text" class="form-control" id="txtrucbuscar" placeholder="Busqueda SUNAT RUC/DNI" name="txtrucbuscar"  >
                            </div>
                             <div class="col-lg-2 col-md-2 col-sm-2 ">
                                 <button type="button" class="btn btn-primary" onclick="consultaruc();"><span class="glyphicon glyphicon-search" ></span> Buscar</button> 
                                <!-- "consultaruc('<?= base_url.'consultaruc/search' ?>');"-->
                            </div>
                            
                        </div>
                        <div class="h5 text-danger" id="mensajebusqueda"></div>
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
                        <form action="<?= base_url . $url ?>" method="POST"  id="FormularioAjax" data-form="update" enctype="multipart/form-data" autocomplete="off" >
                            <div class="row clearfix">
                                <!--<form >-->
                                <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-6 ">
                                    <input type="hidden" value="<?= $id ?>" id="id" name="id">
                                    <input type="hidden" value="2" id="tipo" name="tipo">
                                    <div class="form-group form-float">
                                        <label class="form-label text-danger">Proveedor </label>
                                        <div class="form-line focused error">
                                            <input type="text" class="form-control" id="txtcliente" name="txtcliente" value="<?= $persona->getNombre(); ?>" required="required">
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6 ">
                                    <div class="form-group form-float">
                                        <label class="form-label text-danger">Tipo Doc </label>
                                        <select class="form-control show-tick" id="cbidtipodoc" name="cbidtipodoc" >
                                            
                                            <?php
                                            foreach ($docs as $doc) {
                                                if ($persona->getIdtipodocumento() == $doc->getId()) {

                                                    echo '<option value="' . $doc->getId() . '" selected="selected">' . $doc->getDocumento() . '</option>';
                                                } else {
                                                    echo '<option value="' . $doc->getId() . '">' . $doc->getDocumento() . '</option>';
                                                }
                                            }
                                            ?>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                    <div class="form-group form-float">
                                        <label class="form-label text-danger">Ruc </label>
                                        <div class="form-line focused error">
                                            <input type="text" class="form-control" id="txtruc" name="txtruc" value="<?= $persona->getRuc(); ?>">
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                    <div class="form-group form-float">
                                        <label class="form-label">Representate</label>
                                        <div class="form-line">
                                            <input type="text" class="form-control" id="txtrepresentante" name="txtrepresentante" value="<?= $persona->getRepresentante(); ?>">
                                            
                                        </div>
                                    </div>
                                </div>
                                    
                                </div>
                                <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                    <div class="form-group form-float">
                                        <label class="form-label">DNI</label>
                                        <div class="form-line">
                                            <input type="text" class="form-control" id="txtdni" name="txtdni" value="<?= $persona->getDni(); ?>">
                                            
                                        </div>
                                    </div>
                                </div>
                                
                               
                                
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                    <div class="form-group form-float">
                                        <label class="form-label text-danger">Dirección</label>
                                        <div class="form-line focused error">
                                            <input type="text" class="form-control" id="txtdireccion" name="txtdireccion" value="<?= $persona->getDireccion(); ?>">
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                    <div class="form-group form-float">
                                        <label class="form-label ">Tel. Fijo</label>
                                        <div class="form-line">
                                            <input type="text" class="form-control" id="txttelfijo" name="txttelfijo" value="<?= $persona->getTelfijo(); ?>">
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                    <div class="form-group form-float">
                                        <label class="form-label">Celular-1</label>
                                        <div class="form-line">
                                            <input type="text" class="form-control" id="txtcel1" name="txtcel1" value="<?= $persona->getCel1(); ?>">
                                            
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                    <div class="form-group form-float">
                                        <label class="form-label">Celular-2</label>
                                        <div class="form-line">
                                            <input type="text" class="form-control" id="txtcel2" name="txtcel2" value="<?= $persona->getCel2(); ?>">
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                    <div class="form-group form-float">
                                        <label class="form-label">Celular-3</label>
                                        <div class="form-line">
                                            <input type="text" class="form-control" id="txtcel3" name="txtcel3" value="<?= $persona->getCel3(); ?>">
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                    <div class="form-group form-float">
                                        <label class="form-label">E-mail</label>
                                        <div class="form-line">
                                            <input type="email" class="form-control" id="txtemail" name="txtemail" value="<?= $persona->getEmail(); ?>">
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                    <div class="form-group form-float">
                                        <!--                                <h2 class="card-inside-title">Aniversario</h2>-->
                                        <label class="form-label">E-mail</label>
                                        <div class="form-group">
                                            <div class="form-line" id="bs_datepicker_container">
                                                <input type="text" class="form-control" placeholder="Aniversario/Cump." id="dpaniversario" name="dpaniversario" value="<?= $persona->getAnivcumplenos(); ?>">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                </div>
                                
                                <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                    <div class="form-group form-float">
                                        <label class="form-label">Representa (Nombre)</label>
                                        <div class="form-line">
                                            <input type="text" class="form-control" id="txtrepresenta" name="txtrepresenta" value="<?= $persona->getRepresenta(); ?>">
                                            
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                    
                                    <div class="form-group ">
                                        <label class="form-label">Responsable</label>
                                        <select class="form-control show-tick" id="cbrepresentante" name="cbrepresentante">
                                            <option value="">- Responsable -</option>
                                            <option value="1">Director Cbet</option>
                                            <option value="2">Director Peg</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                    <div class="form-group form-float">
                                        <label class="form-label">Modo de Pago</label>
                                        <select class="form-control show-tick" id="cbmodopago" name="cbmodopago">

                                            <option value="">- Modo de Pago -</option>
<?php
if ($persona->getModopago() == 'contado') {
    echo '<option value="contado" selected="selected">contado</option>';
    echo '<option value="credito" >credito</option>';
} elseif ($modpago == 'credito') {
    echo '<option value="contado" >contado</option>';
    echo '<option value="credito" selected="selected">credito</option>';
} else {
    echo '<option value="contado" >contado</option>';
    echo '<option value="credito" >credito</option>';
}
?>


                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                    <div class="form-group form-float">
                                        <label class="form-label">Estado</label>
                                        <select class="form-control show-tick" id="cbestado" name="cbestado">
                                            <option value="">- Estado -</option>
<?php
if ($persona->getEstado() == 'pagador') {
    echo '<option value="pagador" selected="selected">pagador</option>';
    echo '<option value="moroso">moroso</option>';
} elseif ($persona->getEstado() == 'moroso') {
    echo '<option value="pagador">pagador</option>';
    echo '<option value="moroso" selected="selected">moroso</option>';
} else {
    echo '<option value="pagador">pagador</option>';
    echo '<option value="moroso">moroso</option>';
}
?>

                                        </select>
                                    </div>
                                </div>
                                </div>
                                
                                <div class="row">

                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                    <div class="form-group form-float">
                                        <label class="form-label">Partida</label>
                                        <div class="form-line">
                                            <input type="text" class="form-control" id="txtpartida" name="txtpartida" value='<?= $persona->getPartida(); ?>'>
                                            
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                    <div class="form-group form-float">
                                        <label class="form-label">Pagina Web</label>
                                        <div class="form-line">
                                            <input type="text" class="form-control" id="txtweb" name="txtweb" value="<?= $persona->getWeb(); ?>">
                                            
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <!--                            <input type="checkbox" id="remember_me_5" class="filled-in">
                                    <label for="remember_me_5">Remember Me</label>-->
                                    <button type="submit" class="btn btn-primary btn-lg m-l-15 waves-effect">GUARDAR</button>
                                    <a href="<?= base_url ?>persona/selectprovee" class="btn btn-danger btn-lg m-l-15 waves-effect" id="btncancelar">CANCELAR</a>
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
