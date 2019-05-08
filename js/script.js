

//Loads the correct sidebar on window load,
//collapses the sidebar on window resize.
// Sets the min-height of #page-wrapper to window size


///// Cargar datos cliente //////////////
//$(document).ready(function () {
//    $('#dataTables-cliente').DataTable({
//
//        responsive: true,
//    
//        "ajax": {
//            "method": "POST",
//            "url": "../ajax/tabla_cliente.php",
//
//        },
//        "columns": [
//            {"data": "codigo"},
//            {"data": "descripcion"},
//            {"data": "stock"},
//            {"data": "precio"},
//            {"data": "acciones"}
//
//        ]
//    });
//});

// $('#FormularioAja').submit(function(e){
//      
//     
//      swal({
//        title: "Are you sure?",
//        text: "You will not be able to recover this imaginary file!",
//        type: "warning",
//        showCancelButton: true,
//        confirmButtonColor: "#DD6B55",
//        confirmButtonText: "Yes, delete it!",
//        closeOnConfirm: false
//    }, function () {
//        swal("Deleted!", "Your imaginary file has been deleted.", "success");
//    });
// });

//$(document).ready(function() {
//  $('.dataTable').DataTable( {
//    "language": spanish
//} );
//} );

//////////// 



$(document).on( 'submit','#Formulario',function (e) {
//     alert('form');
    e.preventDefault();



    var tipo = $(this).attr('data-form');
    var accion = $(this).attr('action');
    var metodo = $(this).attr('method');
//    var respuesta=form.children('.RespuestaAjax');

//    var msjError = "<script>swal('Ocurrió un error inesperado','Por favor recargue la página','error');</script>";

    var formdata = $(this).serialize();
//     var formdata = new FormData($(this)[0]);


    var textoAlerta;
    if (tipo === "save") {
        textoAlerta = "Los datos que enviaras quedaran almacenados en el sistema";
    } else if (tipo === "delete") {
        textoAlerta = "Los datos serán eliminados completamente del sistema";
    } else if (tipo === "update") {
        textoAlerta = "Los datos del sistema serán actualizados";
    } else {
        textoAlerta = "Quieres realizar la operación solicitada";
    }

//    alert('tipo '+tipo+' accion'+accion+'metodo '+metodo+' respuesta '+respuesta);
    swal({
        title: "¿Estás seguro?",
        text: textoAlerta,
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Aceptar",
        closeOnConfirm: false
    }, function () {
        $.ajax({
            type: metodo,
            url: accion,
            data: formdata,
//            data: formdata,
//            cache: false,
//            contentType: false,
//            processData: false,

            beforeSend: function (data) {
//                $('#respuestaAjax').html('<p class="text-center">Procesando... </p>');
            },
//            xhr: function(){
//                var xhr = new window.XMLHttpRequest();
//                xhr.upload.addEventListener("progress", function(evt) {
//                  if (evt.lengthComputable) {
//                    var percentComplete = evt.loaded / evt.total;
//                    percentComplete = parseInt(percentComplete * 100);
//                    if(percentComplete<100){
//                            $respuesta.html('<p class="text-center">Procesado... ('+percentComplete+'%)</p><div class="progress progress-striped active"><div class="progress-bar progress-bar-info" style="width: '+percentComplete+'%;"></div></div>');
//                    }else{
//                            respuesta.html('<p class="text-center"></p>');
//                    }
//                  }
//                }, false);
//                return xhr;
//            },
            success: function (data) {
                    swal("Éxitosamente!", "Operación realizada correctamente.", "success");
                    $('#Formulario').trigger("reset");
//                    $('#respuestaAjax').html(data);
            },
            error: function () {
                swal('Ocurrió un error inesperado', 'Por favor recargue la página', 'error');
            }
        });
        return false;
    });
//     e.preventDefault();
});


$(document).on('submit','#FormularioAjax',function (e) {
//     alert('form');
    e.preventDefault();



    var tipo = $(this).attr('data-form');
    var accion = $(this).attr('action');
    var metodo = $(this).attr('method');
//    var respuesta=form.children('.RespuestaAjax');

//    var msjError = "<script>swal('Ocurrió un error inesperado','Por favor recargue la página','error');</script>";

//    var formdata = $(this).serialize();
     var formdata = new FormData($(this)[0]);


    var textoAlerta;
    if (tipo === "save") {
        textoAlerta = "Los datos que enviaras quedaran almacenados en el sistema";
    } else if (tipo === "delete") {
        textoAlerta = "Los datos serán eliminados completamente del sistema";
    } else if (tipo === "update") {
        textoAlerta = "Los datos del sistema serán actualizados";
    } else {
        textoAlerta = "Quieres realizar la operación solicitada";
    }

//    alert('tipo '+tipo+' accion'+accion+'metodo '+metodo+' respuesta '+respuesta);
    swal({
        title: "¿Estás seguro?",
        text: textoAlerta,
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Aceptar",
        closeOnConfirm: false
    }, function () {
        $.ajax({
            type: metodo,
            url: accion,
            data: formdata,
//            data: formdata,
            cache: false,
            contentType: false,
            processData: false,

            beforeSend: function (data) {
                $('#respuestaAjax').html('<p class="text-center">Procesando... </p>');
            },
//            xhr: function(){
//                var xhr = new window.XMLHttpRequest();
//                xhr.upload.addEventListener("progress", function(evt) {
//                  if (evt.lengthComputable) {
//                    var percentComplete = evt.loaded / evt.total;
//                    percentComplete = parseInt(percentComplete * 100);
//                    if(percentComplete<100){
//                            $respuesta.html('<p class="text-center">Procesado... ('+percentComplete+'%)</p><div class="progress progress-striped active"><div class="progress-bar progress-bar-info" style="width: '+percentComplete+'%;"></div></div>');
//                    }else{
//                            respuesta.html('<p class="text-center"></p>');
//                    }
//                  }
//                }, false);
//                return xhr;
//            },
            success: function (data) {
                $('#respuestaAjax').html('');
                    if(data==1){
                       swal("Éxitosamente!", "Operación realizada correctamente.", "success");
                        
                       
                       if(tipo!= 'update'){
                           $('#FormularioAjax').trigger("reset");
                           
                       }
                           $('#btncancelar').html('REGRESAR');
                       
                        
                       
//                    $('#respuestaAjax').html(data);  
                        
                    }else{
                        swal('No se realizarón cambios', 'Ya se encuentra registrado en el sistema', 'error');
                        console.log(data);
                    }
                   
            },
            error: function () {
                 swal('Ocurrió un error inesperado', 'Por favor recargue la página', 'error');
                 $('#respuestaAjax').html('');
            }
        });
        return false;
    });
//     e.preventDefault();
});




/////////////////////// buscar documento ///////////////
$(document).on('submit','#FormularioAjaxBuscar',function (e) {
//     alert('form');
    e.preventDefault();



    var tipo = $(this).attr('data-form');
    var accion = $(this).attr('action');
    var metodo = $(this).attr('method');
//    var respuesta=form.children('.RespuestaAjax');

//    var msjError = "<script>swal('Ocurrió un error inesperado','Por favor recargue la página','error');</script>";

//    var formdata = $(this).serialize();
     var formdata = new FormData($(this)[0]);


//    var textoAlerta;


//    alert('tipo '+tipo+' accion'+accion+'metodo '+metodo+' respuesta '+respuesta);
   
        $.ajax({
            type: metodo,
            url: accion,
            data: formdata,
//            data: formdata,
            cache: false,
            contentType: false,
            processData: false,

            beforeSend: function (data) {
                $('#respuestaAjax').html('<p class="text-center">Procesando... </p>');
            },
//            xhr: function(){
//                var xhr = new window.XMLHttpRequest();
//                xhr.upload.addEventListener("progress", function(evt) {
//                  if (evt.lengthComputable) {
//                    var percentComplete = evt.loaded / evt.total;
//                    percentComplete = parseInt(percentComplete * 100);
//                    if(percentComplete<100){
//                            $respuesta.html('<p class="text-center">Procesado... ('+percentComplete+'%)</p><div class="progress progress-striped active"><div class="progress-bar progress-bar-info" style="width: '+percentComplete+'%;"></div></div>');
//                    }else{
//                            respuesta.html('<p class="text-center"></p>');
//                    }
//                  }
//                }, false);
//                return xhr;
//            },
            success: function (data) {
//                    swal("Éxitosamente!", "Operación realizada correctamente.", "success");
//                    $('#FormularioAjax').trigger("reset");
                    $('#respuestaAjax').html(data);
            },
            error: function () {
                swal('Ocurrió un error inesperado', 'Por favor recargue la página', 'error');
            }
        });
//        return false;
    
//     e.preventDefault();
});



//////// cbtipocomprobante///////////

$(document).on('change','#cbtipocomprobante',function (){
//    var url = $('#url').val(); 
    
//    buscardocumento(url);

    $('#FormularioAjaxBuscar').submit();
    
    
    
});

$(document).on('change','#cbsucursal',function (){
//    var url = $('#url').val(); 
    
//    buscardocumento(url);

    $('#FormularioAjaxBuscar').submit();
    
    
    
});


//////////////////////////////

//////////////// guardar producto / servicio ////////////////////

$(document).on('submit','#FormularioProducto',function (e) {
//     alert('form');
    e.preventDefault();
    var precioc = $('#txtprecioc').val();
    var preciov = $('#txtpreciov').val();
    var preciovmin = $('#txtpreciomin').val();
    var stock = $('#txtstock').val();
    if(isNaN(precioc) || precioc < 0){
        swal('Ingrese precio compra valido','Error','error');
        $('#txtprecioc').focus();
        return false;
    }
    if(isNaN(preciov) || preciov <= 0){
        swal('Ingrese precio venta valido','Error','error');
        $('#txtpreciov').focus();
        return false;
    }
    if(isNaN(preciovmin) || preciovmin <= 0){
        swal('Ingrese precio venta minimo valido','Error','error');
        $('#txtpreciomin').focus();
        return false;
    }
    if(isNaN(stock)){
        swal('Ingrese stock inicial valido','Error','error');
        $('#txtstock').focus();
        return false;
    }



    var tipo = $(this).attr('data-form');
    var accion = $(this).attr('action');
    var metodo = $(this).attr('method');
//    var respuesta=form.children('.RespuestaAjax');

    

    var formdata = $(this).serialize();


    var textoAlerta;
    if (tipo === "save") {
        textoAlerta = "Los datos que enviaras quedaran almacenados en el sistema";
    } else if (tipo === "delete") {
        textoAlerta = "Los datos serán eliminados completamente del sistema";
    } else if (tipo === "update") {
        textoAlerta = "Los datos del sistema serán actualizados";
    } else {
        textoAlerta = "Quieres realizar la operación solicitada";
    }

//    alert('tipo '+tipo+' accion'+accion+'metodo '+metodo+' respuesta '+respuesta);
    swal({
        title: "¿Estás seguro?",
        text: textoAlerta,
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Aceptar",
        closeOnConfirm: false
    }, function () {
        $.ajax({
            type: metodo,
            url: accion,
            data: formdata,
//            data: formdata,
//            cache: false,
//            contentType: false,
//            processData: false,

            beforeSend: function (data) {
                $('.RespuestaAjax').html('<p class="text-center">Procesando... </p>');
            },
//            xhr: function(){
//                var xhr = new window.XMLHttpRequest();
//                xhr.upload.addEventListener("progress", function(evt) {
//                  if (evt.lengthComputable) {
//                    var percentComplete = evt.loaded / evt.total;
//                    percentComplete = parseInt(percentComplete * 100);
//                    if(percentComplete<100){
//                            $respuesta.html('<p class="text-center">Procesado... ('+percentComplete+'%)</p><div class="progress progress-striped active"><div class="progress-bar progress-bar-info" style="width: '+percentComplete+'%;"></div></div>');
//                    }else{
//                            respuesta.html('<p class="text-center"></p>');
//                    }
//                  }
//                }, false);
//                return xhr;
//            },
            success: function (data) {
                $('#respuestaAjax').html('');
                    if(data==1){
                       swal("Éxitosamente!", "Operación realizada correctamente.", "success");
                        
                       
                       if(tipo!= 'update'){
                           $('#FormularioAjax').trigger("reset");
                           
                       }
                           $('#btncancelar').html('REGRESAR');
                       
                        
                       
//                    $('#respuestaAjax').html(data);  
                        
                    }else{
                        swal('No se realizarón cambios', 'Ya se encuentra registrado en el sistema', 'error');
                        console.log(data);
                    }


            },
            error: function () {
                swal('Ocurrió un error inesperado', 'Por favor recargue la página', 'error');
            }
        });
        return false;
    });
//     e.preventDefault();
});


function  eliminar(id, accion, tipo) {
    var textoAlerta;
    if (tipo === "save") {
        textoAlerta = "Los datos que enviaras quedaran almacenados en el sistema";
    } else if (tipo === "delete") {
        textoAlerta = "Los datos serán eliminados completamente del sistema";
    } else if (tipo === "update") {
        textoAlerta = "Los datos del sistema serán actualizados";
    } else {
        textoAlerta = "Quieres realizar la operación solicitada";
    }

    swal({
        title: "¿Estás seguro?",
        text: textoAlerta,
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Aceptar",
        closeOnConfirm: false
    }, function () {
        $.ajax({
            type: 'POST',
            url: accion,
            data: {id: id},
//            data: formdata,

            beforeSend: function (data) {
                $('.RespuestaAjax').html('<p class="text-center">Procesando... </p>');
            },
            success: function (data) {

                $('.RespuestaAjax').html(data);

            },
            error: function () {
                $('.RespuestaAjax').html(msjError);
            }
        });
        return false;
    });
}
////////////// nueva marca from producto//////////
$(document).on("submit","#formnuevamarca",function (e) {
    
    var form = $(this).serialize();

    var url = $(this).attr('action');
    $.ajax({
        type: 'POST',
        url: url,
        data: form,
        beforeSend: function (data) {
//            $('.RespuestaAjax').html('Mensaje: Cargando...');
        },
        success: function (data) {
            console.log(data);
            
//             $('.RespuestaAjax').html(data);
            if (data == 1) {

                swal("Éxitosamente!", "Operación realizada correctamente.", "success");
                $('#formnuevamarca').trigger("reset");
                $('.modal').modal('hide');
                $('#divmarca').load(location.href + " #divmarca>*", "");
            } else {
                swal("Error!", "Algo sucedio mal :(.", "error");
            }

        },
        error: function (xhr) {
            console.log(xhr.responseText);

        }




    });
    
    e.preventDefault();


});

//////////////// nueva linea form producto /////////////////
$(document).on('submit', "#formnuevalinea",function (e) {
    e.preventDefault();
    var form = $(this).serialize();

    var url = $(this).attr('action');
    $.ajax({
        type: 'POST',
        url: url,
        data: form,
        beforeSend: function (data) {
//            $('.RespuestaAjax').html('Mensaje: Cargando...');
        },
        success: function (data) {

//             $('.RespuestaAjax').html(data);
            if (data != 0) {

                swal("Éxitosamente!", "Operación realizada correctamente.", "success");
                $('#formnuevalinea').trigger("reset");
                $('.modal').modal('hide');
                $('#divlinea').load(location.href + " #divlinea>*", "");
            } else {
                swal("Error!", "Algo sucedio mal :(.", "error");
            }

        },
        error: function (xhr) {
            console.log(xhr.responseText);

        }




    });


});
//////////////// nueva documento sucursal modal /////////////////
$(document).on('submit', "#formnuevodocsucursal",function (e) {
    e.preventDefault();
    var form = $(this).serialize();

    var url = $(this).attr('action');
    $.ajax({
        type: 'POST',
        url: url,
        data: form,
        beforeSend: function (data) {
//            $('.RespuestaAjax').html('Mensaje: Cargando...');
        },
        success: function (data) {

//             $('.RespuestaAjax').html(data);
            if (data != 0) {

                swal("Éxitosamente!", "Operación realizada correctamente.", "success");
                $('#formnuevodocsucursal').trigger("reset");
                $('.modal').modal('hide');
                $('#divserie').load(location.href + " #divserie>*", "");
            } else {
                swal("Error!", "Algo sucedio mal :(.", "error");
            }

        },
        error: function (xhr) {
            console.log(xhr.responseText);

        }




    });


});
//////////// MODAL NUEVA CATEGORIA FORM PRODUCTO //////////
$(document).on('submit', "#formnuevacategoria",function (e) {
    e.preventDefault();
    var form = $(this).serialize();

    var url = $(this).attr('action');
    $.ajax({
        type: 'POST',
        url: url,
        data: form,
        beforeSend: function (data) {
//            $('.RespuestaAjax').html('Mensaje: Cargando...');
        },
        success: function (data) {

//             $('.RespuestaAjax').html(data);
            if (data != 0) {

                swal("Éxitosamente!", "Operación realizada correctamente.", "success");
                $('#formnuevacategoria').trigger("reset");
                $('.modal').modal('hide');
                $('#divcategoria').load(location.href + " #divcategoria>*", "");
            } else {
                swal("Error!", "Algo sucedio mal :(.", "error");
            }

        },
        error: function (xhr) {
            console.log(xhr.responseText);

        }




    });


});

///////////// MODAL NUEVA UNID MEDIDA FORM PRODUCTO //////////////
$(document).on('submit', "#formnuevaunidmedida",function (e) {
    e.preventDefault();
    var form = $(this).serialize();

    var url = $(this).attr('action');
    $.ajax({
        type: 'POST',
        url: url,
        data: form,
        beforeSend: function (data) {
//            $('.RespuestaAjax').html('Mensaje: Cargando...');
        },
        success: function (data) {

//             $('.RespuestaAjax').html(data);
            if (data != 0) {

                swal("Éxitosamente!", "Operación realizada correctamente.", "success");
                $('#formnuevaunidmedida').trigger("reset");
                $('.modal').modal('hide');
                $('#divmedida').load(location.href + " #divmedida>*", "");
            } else {
                swal("Error!", "Algo sucedio mal :(.", "error");
            }

        },
        error: function (xhr) {
            console.log(xhr.responseText);

        }




    });


});


$(document).on('submit', '#FormularioCambio',function (e) {
//     alert('form');
    e.preventDefault();
    var compra = $('#txtcompra').val();
    var venta = $('#txtventa').val();

    if(isNaN(compra) || compra < 0){
        swal('Ingrese precio compra valido','Error','error');
        $('#txtprecioc').focus();
        return false;
    }
    if(isNaN(venta) || venta <= 0){
        swal('Ingrese precio venta valido','Error','error');
        $('#txtpreciov').focus();
        return false;
    }

    var tipo = $(this).attr('data-form');
    var accion = $(this).attr('action');
    var metodo = $(this).attr('method');
//    var respuesta=form.children('.RespuestaAjax');

    var textoAlerta;
    if (tipo === "save") {
        textoAlerta = "Los datos que enviaras quedaran almacenados en el sistema";
    } else if (tipo === "delete") {
        textoAlerta = "Los datos serán eliminados completamente del sistema";
    } else if (tipo === "update") {
        textoAlerta = "Los datos del sistema serán actualizados";
    } else {
        textoAlerta = "Quieres realizar la operación solicitada";
    }

//    alert('tipo '+tipo+' accion'+accion+'metodo '+metodo+' respuesta '+respuesta);
    swal({
        title: "¿Estás seguro?",
        text: textoAlerta,
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Aceptar",
        closeOnConfirm: false
    }, function () {
        $.ajax({
            type: metodo,
            url: accion,
            data: {txtcompra:compra,txtventa:venta},
//            data: formdata,
//            cache: false,
//            contentType: false,
//            processData: false,

            beforeSend: function (data) {
                $('.RespuestaAjax').html('<p class="text-center">Procesando... </p>');
            },

            success: function (data) {
                    console.log(data);
                    swal("Éxitosamente!", "Operación realizada correctamente.", "success");
                    $('#cardcambio').load(location.href + " #cardcambio>*", "");
            },
            error: function () {
                swal('Ocurrió un error inesperado', 'Por favor recargue la página', 'error');
            }
        });
        return false;
    });
//     e.preventDefault();
});


$(document).on('submit', '#formcambioclave',function (e){
    e.preventDefault();
    var tipo = $(this).attr('data-form');
    var accion = $(this).attr('action');
    var metodo = $(this).attr('method');
    
    var id= $('#id').val();
    
    var keyn=$('#txtnuevaclave').val();
    var keyr=$('#txtrepitaclave').val();
    if(keyn != keyr){
        swal("Error!", "Las claves no coinciden.", "error");
        return false;
        
    }
    $.ajax({
        type: 'POST',
        url: accion,
        data:{id : id , txtnuevaclave:keyn },
        beforeSend: function (xhr) {
            
        },
        success: function (data) {
            swal("Éxitosamente!", "Operación realizada correctamente.", "success");
            $('.modalcambioclave').modal('hide');
        }
        
        
    });
    
    
    
    
    
});

$(document).on('submit', '#formlogin',function (e){
//    alert('fsdfds');
    e.preventDefault();
    var form = $(this).serialize();
    var accion = $(this).attr('action');
    $.ajax({
        type: 'POST',
        url: accion,
        data: form,
        beforeSend: function (xhr) {
            $('#respuestaAjax').html('Cargando ...');
        },
        success: function (data) {
            
            $('#respuestaAjax').html(data);
        }
        
        
    });
        
    
    
});

function consultaruc(){
    
    
   var ruc = $('#txtrucbuscar').val();
   if(ruc == ''){
        $('#mensajebusqueda').html('Ingrese RUC o DNI');
       $('#txtrucbuscar').focus();
       return false;
   }
   
    
    $.ajax({
        type: 'POST',
        url: '../model/consultaruc.php',
//        dataType: 'json',
         
        data: {ruc:ruc},
        beforeSend: function (xhr) {
            $('#mensajebusqueda').html('Buscando en servidores de SUNAT ...');
        },
        success: function (datos_dni) {
           
            var datos = eval(datos_dni);
                var nada ='nada';
                if(datos[0]==nada){
                        $('#mensajebusqueda').html('DNI o RUC no válido o no registrado');
                }else{
                    $('#mensajebusqueda').html('');
                   
                        $('#txtruc').val(datos[0]);
                        $('#txtcliente').val(datos[1]);
//                        $('#fecha_actividad').text(datos[2]);
//                        $('#condicion').text(datos[3]);
//                        $('#tipo').text(datos[4]);
//                        $('#estado').text(datos[5]);
//                        $('#fecha_inscripcion').text(datos[6]);
                        $('#txtdireccion').val(datos[7]);
//                        $('#emision').text(datos[8]);
                }		
            
        }
//        ,
//        error: function (data){
//            console.log(data);
//            
//        }
 
    });
 
}

function consultarucDoc($url){
    
    
    
   var ruc = $('#txtrucbuscar').val();
   if(ruc.length < 8){
       $('#txtruc').val('');
       $('#txtcliente').val('');
       $('#txtdireccion').val('');
       $('#txtemail').val('');
       return false;
   }
   
    
    $.ajax({
        type: 'POST',
        url: $url,
//        dataType: 'json',
         
        data: {ruc:ruc}
        
        ,
        beforeSend: function (xhr) {
            $('#respuestabusqueda').html('Cargando ...');
        }
        ,
        success: function (datos_dni) {
            console.log(datos_dni);
            var datos = eval(datos_dni);
            
                var nada ='nada';
                if(datos[0]==nada){
                        $('#respuestabusqueda').html('DNI o RUC inválido o no registrado');
                        $('#txtruc').val('');
                        $('#txtcliente').val('');
                        $('#txtdireccion').val('');
                        $('#txtemail').val('');
                }else{
                    $('#respuestabusqueda').html('');
                   
                        $('#txtruc').val(datos[1]);
                        $('#txtcliente').val(datos[2]);
//                        $('#fecha_actividad').text(datos[2]);
//                        $('#condicion').text(datos[3]);
//                        $('#tipo').text(datos[4]);
//                        $('#estado').text(datos[5]);
//                        $('#fecha_inscripcion').text(datos[6]);
                        $('#txtdireccion').val(datos[3]);
                        $('#txtemail').val(datos[4]);
                }		
            
        }
        ,
//        error: function (data){
//            console.log(data);
//            
//        }
 
    });
            
//            .done(function (response){
//        alert(response);
//        console.log('response: '+response);
//        $('#respuestabusqueda').html(response);
//        
//        
//    });
// 
}


//$(document).on('click','#guardardocumento', function (e){
//    var serie = $('#cbserie').val();
//    var num = $('#txtnro').val();
//    var fechae = $('#dpfechaemision').val();
//    var fechav = $('#dpfechavencimiento').val();
//    var tipoop = $('#cbtipoop').val();
//    var vendedor = $('#cbvendedor').val();
//    var ruc = $('#txtrucbuscar').val();
//    var cliente = $('#txtcliente').val();
//    var cont = $('#cont').val();
//    
//    var url = $('#url').val();
    
//    
//    if(serie == ''){
//        $('#cbserie').focus();
//        swal("Alerta!", "Ingrese Doc-Serie", "info");
//        
//        return false;
//        
//        
//    }
//    if(num == '' || isNaN(num)){
//        $('#txtnro').focus();
//        swal("Alerta!", "Ingrese Numero", "info");
//        
//        return false;
//        
//        
//    }
//    if(fechae == ''){
//        $('#dpfechaemision').focus();
//        swal("Alerta!", "Ingrese Fecha de Emisión", "info");
//        
//        return false;
//        
//        
//    }
//    if(fechav == ''){
//        $('#dpfechavencimiento').focus();
//        swal("Alerta!", "Ingrese Fecha de Vencimiento", "info");
//        
//        return false;
//        
//        
//    }
//    if(tipoop == ''){
//        $('#cbtipoop').focus();
//        swal("Alerta!", "Tipo de Operación", "info");
//        
//        return false;
//        
//        
//    }
//    if(vendedor == ''){
//        $('#cbvendedor').focus();
//        swal("Alerta!", "Ingrese Vendedor", "info");
//        
//        return false;
//        
//        
//    }
//    if(ruc == '' || isNaN(ruc) || ruc.length > 11 || ruc.length < 8){
//        $('#txtrucbuscar').focus();
//        swal("Alerta!", "Ingrese RUC valido", "info");
//        
//        return false;
//        
//        
//    }
//    if(cliente == ''){
//        $('#txtcliente').focus();
//        swal("Alerta!", "Ingrese Razón Social / Nombre", "info");
//        
//        return false;
//        
//        
//    }
//    if(cont == '' || cont == 0){
//        
//        swal("Alerta!", "Agregue linea o item", "info");
//        
//        return false;
//        
//        
//    }
//    
//    
//    var itemv = 1;
//    var descrip;
//    var pd=0;
//    for (var i = 0 ; i < cont ; i++){
//         descrip = $('.descripcionprod'+i).val();
//         if(descrip == ''){
//             itemv = 0;
//             pd = i;
//             console.log(pd);
//            
//         }
//        
//    }
//    var itemvc = 1;
//    var cantidad;
//    var pc=0;
//    for (var i = 0 ; i < cont ; i++){
//         cantidad = $('.cantidad'+i).val();
//         if(cantidad == '' || cantidad == 0 || isNaN(cantidad) ){
//             itemvc = 0;
//             pc=i;
//         }
//        
//    }
//    var itemvp = 1;
//    var precio;
//    var pp=0;
//    for (var i = 0 ; i < cont ; i++){
//         precio = $('.precio'+i).val();
//         if(precio == '' || precio ==0 || isNaN(precio)){
//             itemvp = 0;
//            pp=i;
//             
//         }
//        
//    }
//    if(itemv == 0 ){
//        $('.descripcionprod'+pd).focus();
//        swal("Alerta!", "Agregue descripción al item", "info");
//        
//        return false;
//        
//        
//    }
//    if(itemvc == 0 ){
//        $('.cantidad'+pc).focus();
//        swal("Alerta!", "Agregue cantidad al item", "info");
//        
//        return false;
//        
//        
//    }
//    if(itemvp == 0 ){
//        $('.precio'+pp).focus();
//        swal("Alerta!", "Agregue precio al item", "info");
//        
//        return false;
//        
//        
//    }
    
//     var users = $('input[name^="descripcionprod[]"]').serialize();
//     
//     console.log(users);
//        $.ajax({
//            type: 'POST',
//            url: url,
//            data: {
//                'username[]': users,
//                // other data
//            },
//            success: function(data) {
//                console.log(data);
//
//            }
//        });
    
   
    
    
    
    
    
    
    
//});
$(document).on('submit','#FormularioAjaxDocumento',function (e) {
//     alert('form');
    e.preventDefault();
    
    ////////////////validaciones //////////////////////
    
    
    var serie = $('#cbserie').val();
    var num = $('#txtnro').val();
    var fechae = $('#dpfechaemision').val();
    var fechav = $('#dpfechavencimiento').val();
    var tipoop = $('#cbtipoop').val();
    var vendedor = $('#cbvendedor').val();
    var ruc = $('#txtrucbuscar').val();
    var cliente = $('#txtcliente').val();
    var cont = $('#cont').val();
    
    var urlprint = $('#print').val();
    
//    
    if(serie == ''){
        $('#cbserie').focus();
        swal("Alerta!", "Ingrese Doc-Serie", "info");
        
        return false;
        
        
    }
    if(num == '' || isNaN(num) || num < 0){
        $('#txtnro').focus();
        swal("Alerta!", "Ingrese Numero", "info");
        
        return false;
        
        
    }
    if(fechae == ''){
        $('#dpfechaemision').focus();
        swal("Alerta!", "Ingrese Fecha de Emisión", "info");
        
        return false;
        
        
    }
    if(fechav == ''){
        $('#dpfechavencimiento').focus();
        swal("Alerta!", "Ingrese Fecha de Vencimiento", "info");
        
        return false;
        
        
    }
    if(tipoop == ''){
        $('#cbtipoop').focus();
        swal("Alerta!", "Tipo de Operación", "info");
        
        return false;
        
        
    }
    if(vendedor == ''){
        $('#cbvendedor').focus();
        swal("Alerta!", "Ingrese Vendedor", "info");
        
        return false;
        
        
    }
    if(ruc == '' || isNaN(ruc) || ruc.length > 11 || ruc.length < 8){
        $('#txtrucbuscar').focus();
        swal("Alerta!", "Ingrese RUC valido", "info");
        
        return false;
        
        
    }
    if(cliente == ''){
        $('#txtcliente').focus();
        swal("Alerta!", "Ingrese Razón Social / Nombre", "info");
        
        return false;
        
        
    }
    if(cont == '' || cont == 0){
        
        swal("Alerta!", "Agregue linea o item", "info");
        
        return false;
        
        
    }
    
    
    var itemv = 1;
    var descrip;
    var pd=0;
    
     $("textarea[name='descripcionprod[]']").each(function(indice, elemento) {
           // console.log('El elemento con 1el índice '+indice+' contiene '+$(elemento).val());1111111111
//           alert($(elemento).val());
           if($(elemento).val() == ''){
               itemv = 0;
               pd = $(elemento).attr('ident');
           }

    });
   
    var itemvc = 1;
    var cantidad;
    var pc=0;
    
    $("input[name='cantidad[]']").each(function(indice, elemento) {
           // console.log('El elemento con el índice '+indice+' contiene '+$(elemento).val());
           
           if($(elemento).val() == '' || $(elemento).val() == 0 || isNaN($(elemento).val())){
               itemvc = 0;
               pc = $(elemento).attr('ident');
           }

    });
    
    
    var itemvp = 1;
    var precio;
    var pp=0;
    
    $("input[name='precio[]']").each(function(indice, elemento) {
           // console.log('El elemento con el índice '+indice+' contiene '+$(elemento).val());
           if($(elemento).val() == '' || $(elemento).val() == 0 || isNaN($(elemento).val())){
               itemvp = 0;
               pp = $(elemento).attr('ident');
           }

    });
    
    var itemvs=1;
    var ps =0 ;
        $("input[name='serieprod[]']").each(function(indice, elemento) {
           // console.log('El elemento con el índice '+indice+' contiene '+$(elemento).val());
//          alert('fueraif');
           if($(elemento).val() == ''){
//               itemvp = 0;
//               pp = $(elemento).attr('ident');
               
               itemvs=0;
               ps =  $(elemento).attr('ident');
//               $(elemento).focus();
                
//                return false;
           }

    });
    
    
    if(itemv == 0 ){
        $('.descripcionprod'+pd).focus();
        swal("Alerta!", "Ingrese descripción al item", "info");
        
        return false;
        
        
    }
    if(itemvc == 0 ){
        $('.cantidad'+pc).focus();
        swal("Alerta!", "Ingrese cantidad al item", "info");
        
        return false;
        
        
    }
    if(itemvp == 0 ){
        $('.precio'+pp).focus();
        swal("Alerta!", "Ingrese precio al item", "info");
        
        return false;
        
        
    }
    if(itemvs == 0 ){
        $('.serieprod'+ps).focus();
        
        swal("Alerta!", "Ingrese serie de producto", "info");
        return false;
        
        
    }


///////////// FIN de validaciones ////////////////////



    var tipo = $(this).attr('data-form');
    var accion = $(this).attr('action');
    var metodo = $(this).attr('method');
//    var respuesta=form.children('.RespuestaAjax');

//    var msjError = "<script>swal('Ocurrió un error inesperado','Por favor recargue la página','error');</script>";

//    var formdata = $(this).serialize();
     var formdata = new FormData($(this)[0]);


    var textoAlerta;
    if (tipo === "save") {
        textoAlerta = "Los datos que enviaras quedaran almacenados en el sistema";
    } else if (tipo === "delete") {
        textoAlerta = "Los datos serán eliminados completamente del sistema";
    } else if (tipo === "update") {
        textoAlerta = "Los datos del sistema serán actualizados";
    } else {
        textoAlerta = "Quieres realizar la operación solicitada";
    }

//    alert('tipo '+tipo+' accion'+accion+'metodo '+metodo+' respuesta '+respuesta);
    swal({
        title: "¿Estás seguro?",
        text: textoAlerta,
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Aceptar",
        closeOnConfirm: false
    }, function () {
        $.ajax({
            type: metodo,
            url: accion,
            data: formdata,
//            data: formdata,
            cache: false,
            contentType: false,
            processData: false,

            beforeSend: function (data) {
                $('#respuestaAjax').html('<p class="text-center">Procesando... </p>');
            },
//            xhr: function(){
//                var xhr = new window.XMLHttpRequest();
//                xhr.upload.addEventListener("progress", function(evt) {
//                  if (evt.lengthComputable) {
//                    var percentComplete = evt.loaded / evt.total;
//                    percentComplete = parseInt(percentComplete * 100);
//                    if(percentComplete<100){
//                            $respuesta.html('<p class="text-center">Procesado... ('+percentComplete+'%)</p><div class="progress progress-striped active"><div class="progress-bar progress-bar-info" style="width: '+percentComplete+'%;"></div></div>');
//                    }else{
//                            respuesta.html('<p class="text-center"></p>');
//                    }
//                  }
//                }, false);
//                return xhr;
//            },
            success: function (data) {
                $('#respuestaAjax').html('');
                console.log(data);
                    if(data > 0){
                        
                        var nro = $('#txtnro').val();
                        $('#FormularioAjaxDocumento').trigger("reset");
                        
                        
                         
                           if(nro != '' || !isNaN(nro)){
                               $('#txtnro').val(parseInt(nro.trim()) + 1);
                           }
                        VentanaCentrada(urlprint+'&id='+data,'Ticket','','','','false');
                       swal("Éxitosamente!", "Operación realizada correctamente.", "success");
                        
                       
                       
                           
                           
                       
                           $('#tabla').empty();
                           
                           
                           $('#lblgravada').html('<strong>GRAVADA: </strong>  S/ 0.00');
                           $('#lbligv').html('<strong>IGV 18%: </strong>  S/ 0.00');
                           $('#lbltotal').html('<strong>TOTAL: </strong>    S/ 0.00');
                           
                           
                        
                       
//                    $('#respuestaAjax').html(data);  
                        
                    } else if(data.trim() == 'duplicado'){
                        swal('No se realizo registro', 'El documento ya se encuentra emitido', 'error');
                        console.log(data);
                    }else {
                        swal('No se realizarón cambios', 'Por favor recargue la página', 'error');
                        console.log(data);
                    }
                   
            },
            error: function () {
                 swal('Ocurrió un error inesperado', 'Por favor recargue la página', 'error');
                 $('#respuestaAjax').html('');
            }
        });
        return false;
    });
//     e.preventDefault();
});


function ultimonumerodoc(url){
    
    var tipo = $('#tipodoc').val();
    var tipod = $('#tipo').val();
    var serie = $('#cbserie').val();
        $.ajax({
        type: 'POST',
        url: url,
//        dataType: 'json',
         
        data: {tipod:tipod,tipo:tipo,serie:serie}
        
        
        ,
//        beforeSend: function (xhr) {
//            $('#respuestabusqueda').html('Cargando ...');
//        }
//        ,
        success: function (dato) {
            console.log(serie);
            
            if(serie!= ''){
                $('#txtnro').val(dato);
            }else {
                $('#txtnro').val('');
            }
            
            
        }
//        ,
//        error: function (data){
//            console.log(data);
//            
//        }
    });
}

//$(document).on('change','#cbserie', function (){
//    alert('fr');
//    
//});
function cargarserie(url,urll){
    
    var tipo = $('#tipodoc').val();
//    var tipod = $('#tipo').val();
    
        $.ajax({
        type: 'POST',
        url: url,
//        dataType: 'json',
         
        data: {tipodoc:tipo}
        
        
        ,
//        beforeSend: function (xhr) {
//            $('#respuestabusqueda').html('Cargando ...');
//        }
//        ,
        success: function (dato) {
            console.log(dato);
            $('#divcargarserie').html(dato);
            
            var serie = $('#cbserie').val();
            console.log(serie);
            if(serie != ''){
                ultimonumerodoc(urll);
            }else{
                $('#txtnro').val('');
            }
            
        }
//        ,
//        error: function (data){
//            console.log(data);
//            
//        }
    });
}
$(document).on('change','#ckcondicion', function(){
    
    var cnd = true;
    if(!$(this).is(':checked')){
               cnd = false;     
        }
   var divcond = document.getElementById('divcondicion'); 
    var divdia= document.getElementById('divdia');
    $(divdia).remove();
   if(cnd == false){
       
       
       
       var divc = document.createElement('div');
       divc.setAttribute('class','form-line focused error');
       divc.setAttribute('id','divdia');
       divc.innerHTML = '<input type="number" class="form-control" id="txtdiacredito" name="txtdiacredito" value="" placeholder="Días" required>' ;
       divcond.appendChild(divc);
       
   }
    console.log(cnd);
    
});


$(document).on('click','#exceldocument', function (e){
   var url = $(this).attr('url');
   var desde = $('#dpdesde').val();
   var hasta = $('#dphasta').val();
   var tipocomprobante = $('#cbtipocomprobante').val();
   var ruc = $('#txtbuscar').val();
   var serie = $('#txtserie').val();
   var numero = $('#txtnumero').val();
   var idsucur = $('#cbsucursal').val();
   
   var Dated = desde;
    var date_desde = moment(Dated, "DD/MM/YYYY").format("YYYY-MM-DD");
   var Dateh = hasta;
    var date_hasta = moment(Dateh, "DD/MM/YYYY").format("YYYY-MM-DD");
    console.log(date_desde);
    console.log(date_hasta);
//   var d = new Date(desde);
//   console.log(desde);
//    var desdef = $.datepicker.formatDate('yy-mm-dd', d);
//    console.log(hasta);
//   var h = new Date(hasta);
//    var hastaf = $.datepicker.formatDate('yy-mm-dd', h);
//    console.log(desdef);
//    console.log(hastaf);
//    $.ajax({
//        type: 'POST',
//        url: url,
//        data: {dpdesde:desde,dphasta:hasta,cbtipocomprobante:tipocomprobante,txtbuscar:ruc,txtserie:serie,txtnumero:numero,cbsucursal:idsucur},
//        success: function (data) {
            
            window.open(url+'&dpdesde='+date_desde+'&dphasta='+date_hasta+'&cbtipocomprobante='+tipocomprobante+'&txtbuscar='+ruc+'&txtserie='+serie+'&txtnumero='+numero+'&cbsucursal='+idsucur, "_blank");
//        }
//        
//        
//        
//    });
    e.preventDefault();
});


function VentanaCentrada(theURL,winName,features, myWidth, myHeight, isCenter) { //v3.0
  if(window.screen)if(isCenter)if(isCenter=="true"){
    var myLeft = (screen.width-myWidth)/2;
    var myTop = (screen.height-myHeight)/2;
    features+=(features!='')?',':'';
    features+=',left='+myLeft+',top='+myTop;
    window.open(theURL,winName,features+((features!='')?',':'')+'width='+myWidth+',height='+myHeight);
  }else {
      var params = [
    'height='+screen.height,
    'width='+screen.width,
    'fullscreen=yes' // only works in IE, but here for completeness
    ].join(',');
      
      
      window.open(theURL,winName,params);
  }
  
}









    
    
    
    
    






