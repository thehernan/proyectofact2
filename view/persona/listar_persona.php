
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
                            <table class="table table-bordered table-striped table-hover dataTable " id="tablapersona">
                                <thead>
                                    <tr>
                                        <th>Tipo Documento</th>
                                        <th>Nro. Documento</th>
                                        <th>Razón social</th>
                                        <th>Dirección</th>
                                        <th>Email</th>
                                        <th>Celular</th>
                                        <th>Por defecto?</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
<!--                                <tfoot>
                                    <tr>
                                        <th>Tipo Documento</th>
                                        <th>Nro. Documento</th>
                                        <th>Razón social</th>
                                        <th>Dirección</th>
                                        <th>Email</th>
                                        <th>Celular</th>
                                        <th>Por defecto?</th>
                                        <th>Acciones</th>
                                    </tr>
                                </tfoot>-->
                           
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Exportable Table --> 
    </div>
</section>

<script>
    
$(document).ready(function() {
        $('#tablapersona').DataTable({
             "responsive": true,
             
            
            "ajax":{
                "method":"POST",
                "url":'<?= base_url.'persona/listarcliente'?>',
                "data":{tipo: <?= $tipo?>},
            },
            "columns":[
                {"data":"tipodoc"},
                {"data":"ndocumento"},
                {"data":"nombre"},
                {"data":"direccion"},
                {"data":"email"},
                {"data":"telefono"},
                {"data":"bydefault"},
                {"data":"acciones"}
                
            ],
            "ordering": false
        });
    });
    
    
    
$(document).on('change','#ckbydefaultcliente', function (e){
        ck = true;
         if(!$(this).is(':checked')){
               ck= false;     
        }
        var id = $(this).val();        
        $.ajax({
            type: 'POST',
            url: '<?= base_url.'persona/updatedefault' ?>',
            data: {id : id , tipo: <?= $tipo ?>},
            success: function (data) {
                console.log(data);
                $('#tablapersona').dataTable()._fnAjaxUpdate();
                        
            }
            
            
        });
        
    });

</script>
    
