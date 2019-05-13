
<style>
    .ui-autocomplete {
        position: absolute;
        top: 100%;
        left: 0;
        z-index: 1000;
        float: left;
        display: none;
        min-width: 160px;   
        padding: 4px 0;
        margin: 0 0 10px 25px;
        list-style: none;
        background-color: #ffffff;
        border-color: #ccc;
        border-color: rgba(0, 0, 0, 0.2);
        border-style: solid;
        border-width: 1px;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;
        -webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
        -moz-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
        -webkit-background-clip: padding-box;
        -moz-background-clip: padding;
        background-clip: padding-box;
        *border-right-width: 2px;
        *border-bottom-width: 2px;
        max-height: 200px;
        max-width:  auto;
        overflow-y: auto;
        overflow-x: auto;

        /* add padding to account for vertical scrollbar */
        padding-right: 20px;

    }

    .ui-menu-item > a.ui-corner-all {
        display: block;
        padding: 3px 15px;
        clear: both;
        font-weight: normal;
        line-height: 18px;
        color: #555555;
        white-space: nowrap;
        text-decoration: none;

    }

    .ui-state-hover, .ui-state-active {
        color: #ffffff;
        text-decoration: none;
        background-color: #0088cc;
        border-radius: 0px;
        -webkit-border-radius: 0px;
        -moz-border-radius: 0px;
        background-image: none;
        cursor: pointer;
    }

    .ui-helper-hidden-accessible { display:none; }

    /* //////////// quitar padding de los div   */
    /* no-gutters Class Rules */
    .row .no-gutters {
        margin-right: 0;
        margin-left: 0;
    }
    .row .no-gutters > [class^="col-"],
    .row .no-gutters > [class*=" col-"] {
        padding-right: 0;
        padding-left: 0;
    }
</style>

<div class="card ">
    <div class="header bg-teal">
        <h2>
            Productos / Servicios <small> Ingrese los datos aqui...</small>
        </h2>

    </div>

    <!--<form method="post">-->
    <!--<h4 class="bg-primary text-center pad-basic no-btm">Productos / Servicios </h4>-->
    <input id="url" type="hidden" value="<?= base_url ?>producto/search">
    <input id="cont" type="hidden">
    <div class="body no-gutters"   id="tabla">






    </div>



    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 align-center">
            <!--<input type="submit" name="insertar" value="Insertar Alumno" class="btn btn-info"/>-->
            <button id="adicional" name="adicional" type="button" class="btn btn-primary waves-effect"> Agregar linea o item </button>


            <!--</form>-->
        </div>
    </div>
</div>
<?php
$total = 0;
?>
<script>

    $(function () {
        // Clona la fila oculta que tiene los campos base, y la agrega al final de la tabla

        var cont = 0;
        var ident = '';


<?php foreach ($detalles as $detalle) { ?>
            ////////////// INICIO DE DETALLES ///////////////
            
            ////////////////////////////// div /////////////

            var divcol = document.createElement('div');
            divcol.setAttribute('class', 'col-lg-1 col-md-1 col-sm-3 col-xs-3 no-gutters');

            var divcol2 = document.createElement('div');
            divcol2.setAttribute('class', 'col-lg-3 col-md-3 col-sm-3 col-xs-3 no-gutters');

            var divcol3 = document.createElement('div');
            divcol3.setAttribute('class', 'col-lg-1 col-md-1 col-sm-3 col-xs-3 no-gutters');

            var divcol4 = document.createElement('div');
            divcol4.setAttribute('class', 'col-lg-2 col-md-2 col-sm-3 col-xs-3 no-gutters');

            var divcol5 = document.createElement('div');
            divcol5.setAttribute('class', 'col-lg-1 col-md-1 col-sm-3 col-xs-3 no-gutters');

            var divcol6 = document.createElement('div');
            divcol6.setAttribute('class', 'col-lg-1 col-md-1 col-sm-3 col-xs-3 no-gutters');

            var divcol7 = document.createElement('div');
            divcol7.setAttribute('class', 'col-lg-1 col-md-1 col-sm-3 col-xs-3 no-gutters');

            var divcol8 = document.createElement('div');
            divcol8.setAttribute('class', 'col-lg-1 col-md-1 col-sm-3 col-xs-3 no-gutters');

    //           var divcol9 = document.createElement('div');
    //           divcol9.setAttribute('class','col-lg-1 col-md-1 col-sm-1 col-xs-3 no-gutters');


            var diveliminar = document.createElement('div');
            diveliminar.setAttribute('class', 'eliminar col-lg-1 col-md-1 col-sm-2 col-xs-2');
            diveliminar.setAttribute('ident', cont);



            var divserie = document.createElement('div');
            divserie.setAttribute('id', 'serie' + cont);
            divserie.setAttribute('name', 'serie' + cont);
            divserie.setAttribute('class', 'row divseries' + cont);



            //////////////////////////////////////////////////////////////////
            //////////// id prod ////////////////////
            var input = document.createElement('input');
    //           divcol.createTextNode(input);
            input.setAttribute('type', 'hidden');
            input.setAttribute('class', 'form-control id' + cont);
            input.setAttribute('id', 'id[]');
            input.setAttribute('name', 'id[]');
            input.setAttribute('value', <?= $detalle->getIdproducto() ?>);
            var inputigv = document.createElement('input');
    //           divcol.createTextNode(input);
            inputigv.setAttribute('type', 'hidden');
            inputigv.setAttribute('class', 'form-control igvprod' + cont);
            inputigv.setAttribute('id', 'igvprod[]');
            inputigv.setAttribute('name', 'igvprod[]');
            inputigv.setAttribute('value', <?= $detalle->getIgvprod() ?>);
            var inputvalorunit = document.createElement('input');
    //           divcol.createTextNode(input);
            inputvalorunit.setAttribute('type', 'hidden');
            inputvalorunit.setAttribute('class', 'form-control valorunitref' + cont);
            inputvalorunit.setAttribute('id', 'valorunitref[]');
            inputvalorunit.setAttribute('name', 'valorunitref[]');
            inputvalorunit.setAttribute('value', <?= $detalle->getValorunitref() ?>);
            var inputmontobaseigv = document.createElement('input');
    //           divcol.createTextNode(input);
            inputmontobaseigv.setAttribute('type', 'hidden');
            inputmontobaseigv.setAttribute('class', 'form-control montobaseigv' + cont);
            inputmontobaseigv.setAttribute('id', 'montobaseigv[]');
            inputmontobaseigv.setAttribute('name', 'montobaseigv[]');
            inputmontobaseigv.setAttribute('value', <?= $detalle->getMontobaseigv() ?>);
            var inputmontobaseexpo = document.createElement('input');
    //           divcol.createTextNode(input);
            inputmontobaseexpo.setAttribute('type', 'hidden');
            inputmontobaseexpo.setAttribute('class', 'form-control montobaseexpo' + cont);
            inputmontobaseexpo.setAttribute('id', 'montobaseexpo[]');
            inputmontobaseexpo.setAttribute('name', 'montobaseexpo[]');
            inputmontobaseexpo.setAttribute('value',<?= $detalle->getMontobaseexpo() ?>);
            var inputmontobaseexo = document.createElement('input');
    //           divcol.createTextNode(input);
            inputmontobaseexo.setAttribute('type', 'hidden');
            inputmontobaseexo.setAttribute('class', 'form-control montobaseexonerado' + cont);
            inputmontobaseexo.setAttribute('id', 'montobaseexonerado[]');
            inputmontobaseexo.setAttribute('name', 'montobaseexonerado[]');
            inputmontobaseexo.setAttribute('value',<?= $detalle->getMontobaseexonarado() ?>);
            var inputmontobaseinafecto = document.createElement('input');
    //           divcol.createTextNode(input);
            inputmontobaseinafecto.setAttribute('type', 'hidden');
            inputmontobaseinafecto.setAttribute('class', 'form-control montobaseinafecto' + cont);
            inputmontobaseinafecto.setAttribute('id', 'montobaseinafecto[]');
            inputmontobaseinafecto.setAttribute('name', 'montobaseinafecto[]');
            inputmontobaseinafecto.setAttribute('value', <?= $detalle->getMontobaseinafecto() ?>);
            var inputmontobasegratuito = document.createElement('input');
    //           divcol.createTextNode(input);
            inputmontobasegratuito.setAttribute('type', 'hidden');
            inputmontobasegratuito.setAttribute('class', 'form-control montobasegratuito' + cont);
            inputmontobasegratuito.setAttribute('id', 'montobasegratuito[]');
            inputmontobasegratuito.setAttribute('name', 'montobasegratuito[]');
            inputmontobasegratuito.setAttribute('value', <?= $detalle->getMontobasegratuito() ?>);
            var inputmontobaseisc = document.createElement('input');
    //           divcol.createTextNode(input);
            inputmontobaseisc.setAttribute('type', 'hidden');
            inputmontobaseisc.setAttribute('class', 'form-control montobaseivap' + cont);
            inputmontobaseisc.setAttribute('id', 'montobaseivap[]');
            inputmontobaseisc.setAttribute('name', 'montobaseivap[]');
            inputmontobaseisc.setAttribute('value', <?= $detalle->getMontobaseivap() ?>);
            var inputmontobaseotros = document.createElement('input');
    //           divcol.createTextNode(input);
            inputmontobaseotros.setAttribute('type', 'hidden');
            inputmontobaseotros.setAttribute('class', 'form-control montobaseotrostributos' + cont);
            inputmontobaseotros.setAttribute('id', 'montobaseotrostributos[]');
            inputmontobaseotros.setAttribute('name', 'montobaseotrostributos[]');
            inputmontobaseotros.setAttribute('value', <?= $detalle->getMontobaseotrstributos() ?>);
            var inputventagratuita = document.createElement('input');
    //           divcol.createTextNode(input);
            inputventagratuita.setAttribute('type', 'hidden');
            inputventagratuita.setAttribute('class', 'form-control tributoventagratuita' + cont);
            inputventagratuita.setAttribute('id', 'tributoventagratuita[]');
            inputventagratuita.setAttribute('name', 'tributoventagratuita[]');
            inputventagratuita.setAttribute('value', <?= $detalle->getTributoventagratuita() ?>);
            var inputotrostrib = document.createElement('input');
    //           divcol.createTextNode(input);
            inputotrostrib.setAttribute('type', 'hidden');
            inputotrostrib.setAttribute('class', 'form-control otrostributos' + cont);
            inputotrostrib.setAttribute('id', 'otrostributos[]');
            inputotrostrib.setAttribute('name', 'otrostributos[]');
            inputotrostrib.setAttribute('value', <?= $detalle->getOtrostributos() ?>);
            var inputporcentajeigv = document.createElement('input');
    //           divcol.createTextNode(input);
            inputporcentajeigv.setAttribute('type', 'hidden');
            inputporcentajeigv.setAttribute('class', 'form-control porcentajeigv' + cont);
            inputporcentajeigv.setAttribute('id', 'porcentajeigv[]');
            inputporcentajeigv.setAttribute('name', 'porcentajeigv[]');
            inputporcentajeigv.setAttribute('value', <?= $detalle->getPorcentajaigv() ?>);
            var inputporcentajeotrostrib = document.createElement('input');
    //           divcol.createTextNode(input);
            inputporcentajeotrostrib.setAttribute('type', 'hidden');
            inputporcentajeotrostrib.setAttribute('class', 'form-control porcentajeotrostributos' + cont);
            inputporcentajeotrostrib.setAttribute('id', 'porcentajeotrostributos[]');
            inputporcentajeotrostrib.setAttribute('name', 'porcentajeotrostributos[]');
            inputporcentajeotrostrib.setAttribute('value',<?= $detalle->getPorcentajeotrstributos() ?>);
            var inputporcentajetributoventagratuita = document.createElement('input');
    //           divcol.createTextNode(input);
            inputporcentajetributoventagratuita.setAttribute('type', 'hidden');
            inputporcentajetributoventagratuita.setAttribute('class', 'form-control porcentajetributoventagratuita' + cont);
            inputporcentajetributoventagratuita.setAttribute('id', 'porcentajetributoventagratuita[]');
            inputporcentajetributoventagratuita.setAttribute('name', 'porcentajetributoventagratuita[]');
            inputporcentajetributoventagratuita.setAttribute('value', <?= $detalle->getPorcentjetributoventagratuita() ?>);
            var inputmontooriginal = document.createElement('input');
    //           divcol.createTextNode(input);
            inputmontooriginal.setAttribute('type', 'hidden');
            inputmontooriginal.setAttribute('class', 'form-control montooriginal' + cont);
            inputmontooriginal.setAttribute('id', 'montooriginal[]');
            inputmontooriginal.setAttribute('name', 'montooriginal[]');
            inputmontooriginal.setAttribute('value',<?= $detalle->getMontooriginal() ?>);
            var inputmonedaorig = document.createElement('input');
    //           divcol.createTextNode(input);
            inputmonedaorig.setAttribute('type', 'hidden');
            inputmonedaorig.setAttribute('class', 'form-control monedaoriginal' + cont);
            inputmonedaorig.setAttribute('id', 'monedaoriginal[]');
            inputmonedaorig.setAttribute('name', 'monedaoriginal[]');
            inputmonedaorig.setAttribute('value','<?= $detalle->getMonedaoriginal() ?>');

            var inputincluye = document.createElement('input');
    //           divcol.createTextNode(input);
            inputincluye.setAttribute('type', 'hidden');
            inputincluye.setAttribute('class', 'form-control incluye' + cont);
            inputincluye.setAttribute('id', 'incluye[]');
            inputincluye.setAttribute('name', 'incluye[]');
            inputincluye.setAttribute('value', '<?= $detalle->getIncluyeserie() ?>');



            divcol.appendChild(input);
            divcol.appendChild(inputigv);
            divcol.appendChild(inputvalorunit);
            divcol.appendChild(inputmontobaseigv);
            divcol.appendChild(inputmontobaseexpo);
            divcol.appendChild(inputmontobaseexo);
            divcol.appendChild(inputmontobaseinafecto);
            divcol.appendChild(inputmontobasegratuito);
            divcol.appendChild(inputmontobaseisc);
            divcol.appendChild(inputmontobaseotros);
            divcol.appendChild(inputventagratuita);
            divcol.appendChild(inputotrostrib);
            divcol.appendChild(inputporcentajeigv);
            divcol.appendChild(inputporcentajeotrostrib);
            divcol.appendChild(inputporcentajetributoventagratuita);
            divcol.appendChild(inputmontooriginal);
            divcol.appendChild(inputmonedaorig);
            divcol.appendChild(inputincluye);
            /////////// elemento codigo ///


            ///////// label //////

            var labelcod = document.createElement('label');
            labelcod.innerHTML = 'Código';
            divcol.appendChild(labelcod);


            ////// input ///////////
            var input = document.createElement('input');
    //           divcol.createTextNode(input);
            input.setAttribute('type', 'text');
            input.setAttribute('class', 'form-control codigo' + cont);
            input.setAttribute('id', 'codigo[]');
            input.setAttribute('name', 'codigo[]');
            input.setAttribute('placeholder', 'código');
            input.setAttribute('value', '<?= $detalle->getCodigoprod() ?>');


            divcol.appendChild(input);
            //////////////////////////////////////////////
            //////////////////////////////////////////////////////////////////
            /////////// elemento descripcion ///


            ///////// label //////

            var labelcod = document.createElement('label');
            labelcod.innerHTML = 'Descripción';
            divcol2.appendChild(labelcod);


            ////// input ///////////
            var input = document.createElement('textarea');
    //           divcol.createTextNode(input);
            input.setAttribute('type', 'text');
            input.setAttribute('class', 'form-control descripcionprod' + cont);
            input.setAttribute('id', 'descripcionprod[]');
            input.setAttribute('name', 'descripcionprod[]');
            input.innerHTML = '<?= $detalle->getDescripcionprod() ?>';
            input.setAttribute('placeholder', 'Descripción');
            
            input.setAttribute('ident', cont);
            input.addEventListener('focus', function (e) {
                // e.target matches elem
                var att = $(this).attr('ident');
                ident = att;
            }, false
                    );
            divcol2.appendChild(input);
            //////////////////////////////////////////////

            //////////////////////////////////////////////////////////////////
            /////////// elemento unidad ///


            ///////// label //////

            var labelcod = document.createElement('label');
            labelcod.innerHTML = 'Unidad';
            divcol3.appendChild(labelcod);


            ////// select ///////////
            var select = document.createElement('select');

    //           divcol.createTextNode(input);

    //           select.last().addClass('form-control show-tick');
            select.setAttribute('id', 'unidad');
            select.setAttribute('name', 'unidad[]');
            select.setAttribute('data-live-search', 'true');
            select.className = 'form-control show-tick';
    <?php
    $i = 0;
    foreach ($unidades as $unidad) {
        $i++;
        ?>

                var option = document.createElement("option");
                option.innerHTML = '<?= trim($unidad->getDescripcion()) ?>';
                option.setAttribute('value', '<?= $unidad->getId() ?>');
              <?php  if($detalle->getIdunidad() == $unidad->getId() ){ ?>
                    option.setAttribute('checked','true');
              <?php   }  ?>
                select.add(option);
    <?php } ?>


            select.appendChild(option);


            divcol3.appendChild(select);
            //////////////////////////////////////////////

            //////////// elemento tipo igv

            ///////// label //////

            var labeligv = document.createElement('label');
            labeligv.innerHTML = 'Tipo Igv';
            divcol4.appendChild(labeligv);


            ////// select ///////////
            var selectigv = document.createElement('select');

    //           divcol.createTextNode(input);

    //           select.last().addClass('form-control show-tick');
            selectigv.setAttribute('id', 'tipoigv');
            selectigv.setAttribute('name', 'tipoigv[]');
            selectigv.setAttribute('data-live-search', 'true');
            selectigv.setAttribute('class', 'form-control show-tick tipoigv' + cont);
            selectigv.setAttribute('ident', cont);
    <?php foreach ($impuestos as $impuesto) { ?>

                var optionigv = document.createElement("option");
                optionigv.innerHTML = '<?= trim($impuesto->getDescripcion()) ?>';
                optionigv.setAttribute('value', '<?= $impuesto->getOp() ?>');
                <?php if($detalle->getIdimpuesto() == $impuesto->getOp()){ ?>
                    optionigv.setAttribute('selected','true');
                <?php } ?>
                    selectigv.add(optionigv);
    <?php } ?>


            selectigv.appendChild(optionigv);


            divcol4.appendChild(selectigv);
            //////////////////////////////////////////////
            /////////// elemento cantidad ///


            ///////// label //////

            var labelcant = document.createElement('label');
            labelcant.innerHTML = 'Cantidad';
            divcol5.appendChild(labelcant);


            ////// input ///////////
            var input = document.createElement('input');
    //           divcol.createTextNode(input);
            input.setAttribute('type', 'text');
            input.setAttribute('class', 'form-control cantidad' + cont);
            input.setAttribute('id', 'cantidad[]');
            input.setAttribute('name', 'cantidad[]');
            input.setAttribute('placeholder', '0');
            input.setAttribute('value', <?= $detalle->getCantidad() ?>);
            input.setAttribute('ident', cont);
            input.addEventListener('focus', function (e) {
                // e.target matches elem
                var att = $(this).attr('ident');
                ident = att;
            }, false
                    );
            divcol5.appendChild(input);
            //////////////////////////////////////////////
            //////////////////////////////////////////////
            /////////// elemento precio unitario ///


            ///////// label //////

            var labelprecio = document.createElement('label');
            labelprecio.innerHTML = 'Precio U.';
            divcol6.appendChild(labelprecio);


            ////// input ///////////
            var input = document.createElement('input');
    //           divcol.createTextNode(input);
            input.setAttribute('type', 'text');
            input.setAttribute('class', 'form-control precio' + cont);
            input.setAttribute('id', 'precio[]');
            input.setAttribute('name', 'precio[]');
            input.setAttribute('placeholder', '0');
            input.setAttribute('value', '<?= number_format($detalle->getPrecio(),2) ?>');
            input.setAttribute('ident', cont);
            input.addEventListener('focus', function (e) {
                // e.target matches elem
                var att = $(this).attr('ident');
                ident = att;
            }, false
                    );

            divcol6.appendChild(input);
            //////////////////////////////////////////////
            //////////////////////////////////////////////
            /////////// elemento subtotal ///


            ///////// label //////

            var labelsub = document.createElement('label');
            labelsub.innerHTML = 'Subtotal';
            divcol7.appendChild(labelsub);


            ////// input ///////////
            var input = document.createElement('input');
    //           divcol.createTextNode(input);
            input.setAttribute('type', 'text');
            input.setAttribute('class', 'form-control subtotal' + cont);
            input.setAttribute('readonly', 'true');
            input.setAttribute('id', 'subtotal[]');
            input.setAttribute('name', 'subtotal[]');
            input.setAttribute('placeholder', '0');
            input.setAttribute('value', '<?= number_format($detalle->getValor(),2) ?>');

            divcol7.appendChild(input);

            //////////////////////////////////////////////
            //////////////////////////////////////////////
            /////////// elemento total ///


            ///////// label //////

            var labeltotal = document.createElement('label');
            labeltotal.innerHTML = 'Total';
            divcol8.appendChild(labeltotal);


            ////// input ///////////
            var inputtotal = document.createElement('input');
    //           divcol.createTextNode(input);
            inputtotal.setAttribute('type', 'text');
            inputtotal.setAttribute('class', 'form-control total' + cont);
            inputtotal.setAttribute('readonly', 'true');
            inputtotal.setAttribute('id', 'total[]');
            inputtotal.setAttribute('name', 'total[]');
            inputtotal.setAttribute('placeholder', '0');
            inputtotal.setAttribute('value', '<?= $detalle->getTotal() ?>');

            divcol8.appendChild(inputtotal);
            //////////////////////////////////////////////

            //////////// elemento acciones ////////////
            ///////// label //////
            var labelacci = document.createElement('label');
            labelacci.innerHTML = 'Acciones';
            diveliminar.appendChild(labelacci);

            var span = document.createElement('span');
            span.setAttribute('class', 'glyphicon glyphicon-remove');


            ///btn eliminar //////

            var btn = document.createElement('button');
            btn.setAttribute('type', 'button');
            btn.setAttribute('class', 'form-control btn btn-danger waves-effect');
    //           btn.setAttribute('id','btneliminar');


            btn.appendChild(span);

            diveliminar.appendChild(btn);
            
             ////////////////// SI INCLUYE SERIE ///////////////////////////////////
            //////////////////////////////////////////////////////////////////////
            
            <?php 
       
            
            if($detalle->getIncluyeserie()== 'Si'){ 
                    
             
                 
//                  var_dump($serie); 
            ?>
            var divpanelsuccess = document.createElement('div'); ///////////// DIV PRINCIPAL 
            divpanelsuccess.setAttribute('class', 'panel panel-successs');
            
            var panelheding = document.createElement('div');  ////////// DIV CABECERA
            panelheding.setAttribute('class', 'panel-heading row');
            panelheding.setAttribute('role', 'tab');
            panelheding.setAttribute('id', 'headingOne_2');
            
            var divaselect = document.createElement('div'); ////////// CONTENEDOR DEL ELEMENTO 'A' Y 'SELECT'/////////
            divaselect.setAttribute('class', 'col-lg-4 col-md-4 col-sm-4 col-xs-6 no-gutters');

            var a = document.createElement('a'); ////////// CREO ELEMENTO A //////////////////
            a.setAttribute('role', 'button');
            a.setAttribute('data-toggle', 'collapse');
            a.setAttribute('data-parent', '#accordion_2');
            a.setAttribute('href', '#collapseOne_2' + cont);
            a.setAttribute('aria-expanded', 'true');
            a.setAttribute('aria-controls', 'collapseOne_2' + cont);
            a.innerHTML = '<strong>Series de: </strong>' + '<?= $detalle->getDescripcionprod() ?>' + '  '; //// IMPRIMO DESCRIPCION PRODUCTO /////////


           ///////// cargo series del producto en el SELECT//////////
            var selectserie = document.createElement('select');

            //           divcol.createTextNode(input);

            //           select.last().addClass('form-control show-tick');
            selectserie.setAttribute('id', 'idserie[]');
            selectserie.setAttribute('name', 'idserie[]');
            selectserie.setAttribute('class', 'form-control  show-tick idserie' + cont);
            selectserie.setAttribute('ident', cont);
            selectserie.setAttribute('data-live-search', 'true');
             //            selectserie.className = 'form-control show-tick';
                            var idprod = <?= $detalle->getIdproducto()?>;
                            $.ajax({
                                type: 'POST',
                                url: "<?= base_url ?>serieproducto/select",
                                data: {id: idprod},
                                success: function (data) {
                                    console.log(data);
                                    var datos = eval(data);

                                    datos.forEach(function (data, index) {
                                        console.log("index " + index + " | id: " + data.id + " serie: " + data.serie)
                                        var options = document.createElement("option");
                                        options.innerHTML = data.serie;
                                        options.setAttribute('value', data.id);
                                        selectserie.add(options);
                                    });
                                }



                            });
                 ///////////////////////// FIN DEL SELECT //////////////////////////////////
                divaselect.appendChild(a); ////////// 'A' DENTRO DEL CONTENEDOR DIVASELECT ///
                divaselect.appendChild(selectserie);  ///// 'SELECT' DENTRO DEL CONTENEDOR DIVASELECT ///
                
                panelheding.appendChild(divaselect);  //////// AGREGO EL CONTENEDOR DIVASELECT DENTRO DE PANELHEADING
                           

            var divboton = document.createElement('div');  ///////// CREO CONTENEDOR PARA EL BOTON MAS //////////
            divboton.setAttribute('class', ' col-lg-1 col-md-1 col-sm-1 col-xs-4 no-gutters');
            
            var botonmas = document.createElement('button'); ///////////// CREO BOTON MAS /////
            botonmas.setAttribute('class', ' btn btn-success waves-effect  nuevoserie' + cont);
            botonmas.setAttribute('id', 'nuevoserie' + cont);
            botonmas.setAttribute('name', 'nuevoserie' + cont);
            botonmas.setAttribute('ident', cont);
            botonmas.innerHTML = '<span class="glyphicon glyphicon-plus"></span>';

            divboton.appendChild(botonmas);
            panelheding.appendChild(divboton);


            var collapse = document.createElement('div');  ///////////// CREO COLLAPSE /////
            collapse.setAttribute('id', 'collapseOne_2' + cont);
            collapse.setAttribute('class', 'panel-collapse collapse in');
            collapse.setAttribute('role', 'tabpanel');
            collapse.setAttribute('aria-labelledby', 'headingOne_2');

            var body = document.createElement('div'); ///////// CREO EL BODY DEL COLLAPSE ///////
            body.setAttribute('class', 'panel-body body' + cont);
            body.setAttribute('id', 'body' + cont);
            
             ///////////////////// AQUI AGREGO LAS SERIES ///////////////
                            <?php
            
            foreach ($seriedet->select($detalle->getId()) as $serie){ ?>
                    
                var divrow = document.createElement('div'); /////////////// CREO UN ROW ////
                divrow.setAttribute('class', 'row');
                
                var divseries = document.createElement('div');  /////////// CREO CONTENEDOR PARA EL INPUT SERIES /////
                divseries.setAttribute('class', 'col-lg-3 col-md-3 col-sm-3 col-xs-6');
                
                 var serieid = document.createElement('input');  //////////// CREO INPUT ID SERIE //////////////
                serieid.setAttribute('id', 'idserieitem[]');
                serieid.setAttribute('name', 'idserieitem[]');
                serieid.setAttribute('class', '  idserieitem' + cont);
                serieid.setAttribute('type', 'hidden');
                serieid.setAttribute('ident', cont);
                serieid.setAttribute('value', '<?= $serie->getId() ?>');
                
                var inputs = document.createElement('input'); ///////// CREO INPUT SERIE PROD ///////// 
                inputs.setAttribute('type', 'text');
                inputs.setAttribute('name', 'serieprod[]');
                inputs.setAttribute('id', 'serieprod[]');
                inputs.setAttribute('class', 'form-control serieprod' + cont);
                inputs.setAttribute('readonly', 'true');
                inputs.setAttribute('value', '<?= $serie->getSerie() ?>'); //////// LE ASIGNO VALOR AL INPUT ////

                divseries.appendChild(inputs);
                divseries.appendChild(serieid);

                var divbtn = document.createElement('div');  ////////// CREO CONTENEDOR PARA EL DIV BOTON ELIMINAR
                divbtn.setAttribute('class', 'col-lg-3 col-md-3 col-sm-3 col-xs-6 eliminarserie' + cont);  //
                divbtn.setAttribute('ident', cont);
                
                var btneliminar = document.createElement('button'); /////////// CREO BOTON ELIMINAR SERIE //////
                btneliminar.setAttribute('type', 'button');
                btneliminar.setAttribute('class', 'btn btn-danger btneliminarserie' + cont);
                btneliminar.setAttribute('ident', cont);
                btneliminar.innerHTML= '<span class= "glyphicon glyphicon-remove"></span>';
                divbtn.appendChild(btneliminar);
                
                divrow.appendChild(divseries);
                divrow.appendChild(divbtn);
                
                body.appendChild(divrow);
                
                
    //                divbtn.setAttribute('onclick',"eliminarserie("+iden+")");


//                var body = document.getElementById('body' + cont);
    //                body.appendChild(divserie);
    //                ////// select ///////////
               

                //////////////////////////////////////////////
    //       
               
            <?php } ?>
 
                
///////////////////////// FIN DE LAS SERIES //////////////////////

        collapse.appendChild(body);
        divpanelsuccess.appendChild(panelheding);
        divpanelsuccess.appendChild(collapse);


                
        divserie.appendChild(divpanelsuccess);
             
                
    //                divrow.appendChild(inputidprod);
                

               
    //                
    //                body.appendChild(inputidprod)
    //                body.appendChild(divserie);
    //                body.appendChild(btneliminar);

    //                i++;


//                var precio = $('.precio' + iden).val();
//                var total = cant * precio;
//                var subtotal = total / 1.18;
//
//                $('.subtotal' + iden).val(subtotal.toFixed(2));
//                $('.total' + iden).val(total.toFixed(2));
//
//                calculartotal();


    
    
    
    

                            
                         

    //                            divboton.appendChild(labelplus);
                          

                            
                           


                            
            
           
            
//                
            <?php   } ?>
            
                    
                    
           
            
            
                 
            
           ///////////////// FIN SI EXISTE SERIE /////////////////////////////
           //////////////////////////////////////////////////////////////////


            var div = document.createElement('div');
            div.setAttribute('class', 'row ');
            div.appendChild(divcol);
            div.appendChild(divcol2);
            div.appendChild(divcol3);
            div.appendChild(divcol4);
            div.appendChild(divcol5);
            div.appendChild(divcol6);
            div.appendChild(divcol7);
            div.appendChild(divcol8);
            div.appendChild(diveliminar);


            $('#tabla').append(div);
            $('#tabla').append(divserie);

            var hoja = document.createElement('style');
            hoja.innerHTML = ".no-gutters{margin-right: 0; margin-left: 0;} .no-gutters {padding-right: 2px;padding-left: 2px;} ";
            document.body.appendChild(hoja);

            $(document).on("keydown.autocompleteselect", ".descripcionprod" + cont, function () {
                $(this).autocomplete({
                    minLength: 2,
                    source:
                            function (request, response) {
                                $.ajax({
                                    type: 'POST',
                                    url: '<?= base_url . 'producto/search' ?>',
                                    data: {query: request.term},
                                    success: response,
                                    error: function (jqXHR, textStatus, errorThrown) {
                                        alert("error handler!");
                                        alert(errorThrown);
                                    },
                                    dataType: 'json',
                                    delay: 100
                                });
    //                          .done(function (data){
    //                      console.log('done'+data);
    ////                      console.log('select dano'+ui);
    //                      
    //                     
    //                  });
                            },

                    select: function (event, ui) {
                        var subtotal = 0, total = 0;
                        $('.id' + (ident)).val(ui.item.id);
                        $('.codigo' + (ident)).val(ui.item.codigo);
                        $('.precio' + (ident)).val(ui.item.preciov);
                        $('.descripcionprod' + (ident)).val(ui.item.descripcion);
                        var incluir = ui.item.incluir;


                        ///////////////// creo colapce para incluir series ////////////////

                        if (incluir == 'Si') {
    //                        var series = document.getElementById('serie'+cont);
    //                        console.log(series);
                            $('.cantidad' + ident).val(0);
                            $('.incluye' + ident).val('Si');
                            $('.cantidad' + ident).attr('readonly', 'true');
                            var divpanels = document.createElement('div');
                            divpanels.setAttribute('class', 'panel panel-successs');
                            var panelheding = document.createElement('div');
                            panelheding.setAttribute('class', 'panel-heading row');
                            panelheding.setAttribute('role', 'tab');
                            panelheding.setAttribute('id', 'headingOne_2');



    //                            var diva = document.createElement('div');
    //                            diva.setAttribute('class', 'col-lg-3 col-md-3 col-sm-3 col-xs-6 no-gutters');

                            var divselect = document.createElement('div');
                            divselect.setAttribute('class', 'col-lg-4 col-md-4 col-sm-4 col-xs-6 no-gutters');

                            var divboton = document.createElement('div');
                            divboton.setAttribute('class', ' col-lg-1 col-md-1 col-sm-1 col-xs-4 no-gutters');



                            console.log(ident);

                            var a = document.createElement('a');
                            a.setAttribute('role', 'button');
                            a.setAttribute('data-toggle', 'collapse');
                            a.setAttribute('data-parent', '#accordion_2');
                            a.setAttribute('href', '#collapseOne_2' + ident);
                            a.setAttribute('aria-expanded', 'true');
                            a.setAttribute('aria-controls', 'collapseOne_2' + ident);
                            a.innerHTML = '<strong>Series de: </strong>' + ui.item.descripcion + '  ';

                            ///////// cargo series del producto en el SELECT//////////
                            var selectserie = document.createElement('select');

                            selectserie.setAttribute('id', 'idserie[]');
                            selectserie.setAttribute('name', 'idserie[]');
                            selectserie.setAttribute('class', 'form-control  show-tick idserie' + ident);
                            selectserie.setAttribute('ident', ident);
                            selectserie.setAttribute('data-live-search', 'true');
                            //            selectserie.className = 'form-control show-tick';
                            var idprod = ui.item.id;
                            $.ajax({
                                type: 'POST',
                                url: "<?= base_url ?>serieproducto/select",
                                data: {id: idprod},
                                success: function (data) {
                                    console.log(data);
                                    var datos = eval(data);

                                    datos.forEach(function (data, index) {
                                        console.log("index " + index + " | id: " + data.id + " serie: " + data.serie)
                                        var option = document.createElement("option");
                                        option.innerHTML = data.serie;
                                        option.setAttribute('value', data.id);
                                        selectserie.add(option);
                                    });
                                }



                            });
                            divselect.appendChild(a);
                            divselect.appendChild(selectserie);
                            panelheding.appendChild(divselect);
                            ///////////////////////// FIN DEL SELECT //////////////////////////////////

                            var collapse = document.createElement('div');
                            collapse.setAttribute('id', 'collapseOne_2' + ident);
                            collapse.setAttribute('class', 'panel-collapse collapse in');
                            collapse.setAttribute('role', 'tabpanel');
                            collapse.setAttribute('aria-labelledby', 'headingOne_2');

                            var body = document.createElement('div');
                            body.setAttribute('class', 'panel-body body' + ident);
                            body.setAttribute('id', 'body' + ident);
    //                        body.innerHTML = 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry';

    //                            var labelplus = document.createElement('label');
    //                             labelplus.setAttribute('class', 'text-info');
    //                             labelplus.innerHTML ='Más';

                            var botonmas = document.createElement('button');
                            botonmas.setAttribute('class', ' btn btn-success waves-effect  nuevoserie' + ident);
                            botonmas.setAttribute('id', 'nuevoserie' + ident);
                            botonmas.setAttribute('name', 'nuevoserie' + ident);
                            botonmas.setAttribute('ident', ident);
                            var span = document.createElement('span');
                            span.setAttribute('class', 'glyphicon glyphicon-plus');
                            botonmas.appendChild(span);

    //                            divboton.appendChild(labelplus);
                            divboton.appendChild(botonmas);
                            panelheding.appendChild(divboton);

                            collapse.appendChild(body);
                            divpanels.appendChild(panelheding);
                            divpanels.appendChild(collapse);


                            divserie.appendChild(divpanels);



                        } else {
                            $('.incluye' + ident).val('No');
                            $('.divseries' + ident).empty();
                            $('.cantidad' + ident).removeAttr('readonly');

                        }

                        /////// calculo item ///////
                        var cantidad = $('.cantidad' + ident).val();
                        console.log('cant ' + cantidad);

                        var precio = ui.item.preciov;

                        total = cantidad * precio;
                        subtotal = total / 1.18;

                        $('.total' + ident).val(total.toFixed(2));
                        $('.subtotal' + ident).val(subtotal.toFixed(2));
                        var total = 0;


                        ///////////////////////////////////////////////////////////////////


                        calculartotal();
    //                    $('#idcodsunat').val(ui.item.id);
    //                    $('#codigo').val(ui.item.codigo);                    
    //                        console.log(ui);
    //                    console.log('select  '+ui);
                        event.preventDefault();
                    }



                });

    //            event.preventDefault();
            });


            ////////////////////evento boton agregar serie ////////////////////

            $(document).on('click', ".nuevoserie" + cont, function (e) {
                e.preventDefault();

                var iden = $(this).attr('ident');
    //                alert('ident '+iden);
                var cant = $('.cantidad' + iden).val();
                if (cant == '') {
                    cant = 1;
                } else {
                    cant++;
                }
                $('.cantidad' + iden).val(cant);

                var idprod = $('.id' + iden).val();


    //                var idn = $('.idserie'+iden).attr('ident');
                var opcion = $('.idserie' + iden + ' option:selected').text();
                var opcionval = $('.idserie' + iden).val();
    //                 alert(opcion);



    //               $('.serieprod'+idn).val(opcion);

    //                var cantidad = document.getElementById('cantidad'+ident);
    //                cantidad.=cont;
                var inputs = document.createElement('input');
                inputs.setAttribute('type', 'text');
                inputs.setAttribute('name', 'serieprod[]');
                inputs.setAttribute('id', 'serieprod[]');
                inputs.setAttribute('class', 'form-control serieprod' + iden);
                inputs.setAttribute('readonly', 'true');
                inputs.setAttribute('value', opcion);


                var divrow = document.createElement('div');
                divrow.setAttribute('class', 'row');

                var divserie = document.createElement('div');
                divserie.setAttribute('class', 'col-lg-3 col-md-3 col-sm-3 col-xs-6');

                var divbtn = document.createElement('div');
                divbtn.setAttribute('class', 'col-lg-3 col-md-3 col-sm-3 col-xs-6 eliminarserie' + iden);  //
                divbtn.setAttribute('ident', iden);
    //                divbtn.setAttribute('onclick',"eliminarserie("+iden+")");


                var body = document.getElementById('body' + iden);
    //                body.appendChild(divserie);
    //                ////// select ///////////
                var selectserie = document.createElement('input');

    //           divcol.createTextNode(input);

    //           select.last().addClass('form-control show-tick');
                selectserie.setAttribute('id', 'idserieitem[]');
                selectserie.setAttribute('name', 'idserieitem[]');
                selectserie.setAttribute('class', '  idserieitem' + iden);
                selectserie.setAttribute('type', 'hidden');

                selectserie.setAttribute('ident', iden);
                selectserie.setAttribute('value', opcionval);

                //////////////////////////////////////////////
    //       
                divserie.appendChild(inputs);
                divserie.appendChild(selectserie);



                var btneliminar = document.createElement('button');
                btneliminar.setAttribute('type', 'button');
                btneliminar.setAttribute('class', 'btn btn-danger btneliminarserie' + iden);
                btneliminar.setAttribute('ident', iden);

                var span = document.createElement('span');
                span.setAttribute('class', 'glyphicon glyphicon-remove');
                btneliminar.appendChild(span);
                divbtn.appendChild(btneliminar);
    //                divrow.appendChild(inputidprod);
                divrow.appendChild(divserie);
                divrow.appendChild(divbtn);

                body.appendChild(divrow);
    //                
    //                body.appendChild(inputidprod)
    //                body.appendChild(divserie);
    //                body.appendChild(btneliminar);

    //                i++;


                var precio = $('.precio' + iden).val();
                var total = cant * precio;
                var subtotal = total / 1.18;

                $('.subtotal' + iden).val(subtotal.toFixed(2));
                $('.total' + iden).val(total.toFixed(2));

                calculartotal();


            });
            ///////////////////////////////////////////////////////////////////




            $(document).on("keyup", ".cantidad" + cont, function () {

                var op = $('.tipoigv' + ident).val();
                calculartipoigv(ident, op);
                calculartotal();



            });

            $(document).on("keyup", ".precio" + cont, function () {

                var op = $('.tipoigv' + ident).val();
                calculartipoigv(ident, op);
                calculartotal();

            });

            $(document).on("change", ".tipoigv" + cont, function () {
                var idn = $(this).attr('ident');
                var op = $(this).val();
                /////reset inputs/////
                calculartipoigv(idn, op);

                calculartotal();

            });

            function calculartipoigv(idn, op) {
                $('.igvprod' + idn).val('');
                $('.valorunitref' + idn).val('');
                $('.montobaseigv' + idn).val('');
                $('.montobaseexpo' + idn).val('');
                $('.montobaseexonerado' + idn).val('');
                $('.montobaseinafecto' + idn).val('');
                $('.montobasegratuito' + idn).val('');
                $('.montobaseivap' + idn).val('');
                $('.montobaseotrostributos' + idn).val('');
                $('.tributoventagratuita' + idn).val('');
                $('.otrostributos' + idn).val('');
                $('.porcentajeigv' + idn).val('');
                $('.porcentajeotrostributos' + idn).val('');
                $('.porcentajetributoventagratuita' + idn).val('');
                //////////////////////////////////

                var cantidad = $('.cantidad' + idn).val();
                var precio = $('.precio' + idn).val();
                var total = cantidad * precio;
                var subtotal = total / 1.18;
                if (op == 1) {

                    var igvprod;


                    igvprod = total - subtotal;

                    $('.igvprod' + idn).val(igvprod);
                    $('.montobaseigv' + idn).val(subtotal);
                    $('.porcentajeigv' + idn).val('18');
                    $('.montooriginal' + idn).val(precio);
                    $('.subtotal' + ident).val(subtotal.toFixed(2));


                } else if (op >= 2 && op <= 7) {
                    $('.valorunitref' + idn).val(precio);
                    $('.montobasegratuito' + idn).val(total);
                    $('.porcentajetributoventagratuita' + idn).val(18);

                    var triboventagratuita = total * 0.18;
                    $('.tributoventagratuita' + idn).val(triboventagratuita);
                    $('.subtotal' + idn).val(total.toFixed(2));

                } else if (op == 8) {
    //                            $('.valorunitref'+ idn).val(precio);
                    $('.montobaseivap' + idn).val(total);
    //                            $('.montobaseexpo'+ idn).val(total);
                    $('.subtotal' + idn).val(total.toFixed(2));

                } else if (op == 9) {
    //                           $('.montobaseexpo'+ idn).val(total);
                    $('.montobaseexonerado' + idn).val(total);
                    $('.subtotal' + idn).val(total.toFixed(2));

                } else if (op == 10 || (op >= 12 && op <= 17)) {
                    $('.valorunitref' + idn).val(precio);
    //                           $('.montobaseexpo'+ idn).val(total);
                    $('.montobasegratuito' + idn).val(total);
                    $('.tributoventagratuita' + idn).val(0);
                    $('.porcentajetributoventagratuita' + idn).val(0);
                    $('.subtotal' + idn).val(total.toFixed(2));
                } else if (op == 11) {
    //                           $('.porcentajetributoventagratuita'+ idn).val(0);
                    $('.montobaseinafecto' + idn).val(total);
                    $('.subtotal' + idn).val(total.toFixed(2));
                } else {
                    $('.montobaseexpo' + idn).val(total);
                    $('.subtotal' + idn).val(total.toFixed(2));
                }

    //                       $('.subtotal' + idn).val(subtotal.toFixed(2));
                $('.total' + idn).val(total.toFixed(2));


            }
            $(document).on("click", ".eliminarserie" + cont, function () {
    //            function eliminarserie(idn){

                var idn = $(this).attr('ident');

    //                alert(idn);

                var cant = $('.cantidad' + idn).val();

                cant--;

                $('.cantidad' + idn).val(cant);

                var precio = $('.precio' + idn).val();
                var total = cant * precio;
                var subtotal = total / 1.18;

                $('.subtotal' + idn).val(subtotal.toFixed(2));
                $('.total' + idn).val(total.toFixed(2));

                var parent = $(this).parents().get(0);
    //            var parent1 = $(this).parents().get(1);
                $(parent).remove();
    //            $(parent1).remove();

                calculartotal();
            });

            console.log('cont' + cont);
            cont++;
            $('#cont').val(cont);

           calculartotal();
            ///////////////  FIN DE DETALLES ////////////////
            ////////////////////////////////////////////////
<?php } ?>
        //////////////// Fin //////////////

        $(document).on('click', "#adicional", function () {


            nuevoitem();






        });




        ////////// CREA NUEVOS ITEMS ///////////
        function nuevoitem() {

            //              var newDiv = document.createElement("div"); 
//              var newContent = document.createTextNode("Hola!¿Qué tal?"); 
//              newDiv.appendChild(newContent); //añade texto al div creado. 
//
//              // añade el elemento creado y su contenido al DOM 
//              var currentDiv = document.getElementById("div1"); 
//              document.getElementById('#tabla').innerHTML (newDiv, currentDiv);


            ////////////////////////////// div /////////////

            var divcol = document.createElement('div');
            divcol.setAttribute('class', 'col-lg-1 col-md-1 col-sm-3 col-xs-3 no-gutters');

            var divcol2 = document.createElement('div');
            divcol2.setAttribute('class', 'col-lg-3 col-md-3 col-sm-3 col-xs-3 no-gutters');

            var divcol3 = document.createElement('div');
            divcol3.setAttribute('class', 'col-lg-1 col-md-1 col-sm-3 col-xs-3 no-gutters');

            var divcol4 = document.createElement('div');
            divcol4.setAttribute('class', 'col-lg-2 col-md-2 col-sm-3 col-xs-3 no-gutters');

            var divcol5 = document.createElement('div');
            divcol5.setAttribute('class', 'col-lg-1 col-md-1 col-sm-3 col-xs-3 no-gutters');

            var divcol6 = document.createElement('div');
            divcol6.setAttribute('class', 'col-lg-1 col-md-1 col-sm-3 col-xs-3 no-gutters');

            var divcol7 = document.createElement('div');
            divcol7.setAttribute('class', 'col-lg-1 col-md-1 col-sm-3 col-xs-3 no-gutters');

            var divcol8 = document.createElement('div');
            divcol8.setAttribute('class', 'col-lg-1 col-md-1 col-sm-3 col-xs-3 no-gutters');

//           var divcol9 = document.createElement('div');
//           divcol9.setAttribute('class','col-lg-1 col-md-1 col-sm-1 col-xs-3 no-gutters');


            var diveliminar = document.createElement('div');
            diveliminar.setAttribute('class', 'eliminar col-lg-1 col-md-1 col-sm-2 col-xs-2');
            diveliminar.setAttribute('ident', cont);



            var divserie = document.createElement('div');
            divserie.setAttribute('id', 'serie' + cont);
            divserie.setAttribute('name', 'serie' + cont);
            divserie.setAttribute('class', 'row divseries' + cont);



            //////////////////////////////////////////////////////////////////
            //////////// id prod ////////////////////
            var input = document.createElement('input');
//           divcol.createTextNode(input);
            input.setAttribute('type', 'hidden');
            input.setAttribute('class', 'form-control id' + cont);
            input.setAttribute('id', 'id[]');
            input.setAttribute('name', 'id[]');
            var inputigv = document.createElement('input');
//           divcol.createTextNode(input);
            inputigv.setAttribute('type', 'hidden');
            inputigv.setAttribute('class', 'form-control igvprod' + cont);
            inputigv.setAttribute('id', 'igvprod[]');
            inputigv.setAttribute('name', 'igvprod[]');
            inputigv.setAttribute('value', '0');
            var inputvalorunit = document.createElement('input');
//           divcol.createTextNode(input);
            inputvalorunit.setAttribute('type', 'hidden');
            inputvalorunit.setAttribute('class', 'form-control valorunitref' + cont);
            inputvalorunit.setAttribute('id', 'valorunitref[]');
            inputvalorunit.setAttribute('name', 'valorunitref[]');
            var inputmontobaseigv = document.createElement('input');
//           divcol.createTextNode(input);
            inputmontobaseigv.setAttribute('type', 'hidden');
            inputmontobaseigv.setAttribute('class', 'form-control montobaseigv' + cont);
            inputmontobaseigv.setAttribute('id', 'montobaseigv[]');
            inputmontobaseigv.setAttribute('name', 'montobaseigv[]');
            var inputmontobaseexpo = document.createElement('input');
//           divcol.createTextNode(input);
            inputmontobaseexpo.setAttribute('type', 'hidden');
            inputmontobaseexpo.setAttribute('class', 'form-control montobaseexpo' + cont);
            inputmontobaseexpo.setAttribute('id', 'montobaseexpo[]');
            inputmontobaseexpo.setAttribute('name', 'montobaseexpo[]');
            var inputmontobaseexo = document.createElement('input');
//           divcol.createTextNode(input);
            inputmontobaseexo.setAttribute('type', 'hidden');
            inputmontobaseexo.setAttribute('class', 'form-control montobaseexonerado' + cont);
            inputmontobaseexo.setAttribute('id', 'montobaseexonerado[]');
            inputmontobaseexo.setAttribute('name', 'montobaseexonerado[]');
            var inputmontobaseinafecto = document.createElement('input');
//           divcol.createTextNode(input);
            inputmontobaseinafecto.setAttribute('type', 'hidden');
            inputmontobaseinafecto.setAttribute('class', 'form-control montobaseinafecto' + cont);
            inputmontobaseinafecto.setAttribute('id', 'montobaseinafecto[]');
            inputmontobaseinafecto.setAttribute('name', 'montobaseinafecto[]');
            var inputmontobasegratuito = document.createElement('input');
//           divcol.createTextNode(input);
            inputmontobasegratuito.setAttribute('type', 'hidden');
            inputmontobasegratuito.setAttribute('class', 'form-control montobasegratuito' + cont);
            inputmontobasegratuito.setAttribute('id', 'montobasegratuito[]');
            inputmontobasegratuito.setAttribute('name', 'montobasegratuito[]');
            var inputmontobaseisc = document.createElement('input');
//           divcol.createTextNode(input);
            inputmontobaseisc.setAttribute('type', 'hidden');
            inputmontobaseisc.setAttribute('class', 'form-control montobaseivap' + cont);
            inputmontobaseisc.setAttribute('id', 'montobaseivap[]');
            inputmontobaseisc.setAttribute('name', 'montobaseivap[]');
            var inputmontobaseotros = document.createElement('input');
//           divcol.createTextNode(input);
            inputmontobaseotros.setAttribute('type', 'hidden');
            inputmontobaseotros.setAttribute('class', 'form-control montobaseotrostributos' + cont);
            inputmontobaseotros.setAttribute('id', 'montobaseotrostributos[]');
            inputmontobaseotros.setAttribute('name', 'montobaseotrostributos[]');
            var inputventagratuita = document.createElement('input');
//           divcol.createTextNode(input);
            inputventagratuita.setAttribute('type', 'hidden');
            inputventagratuita.setAttribute('class', 'form-control tributoventagratuita' + cont);
            inputventagratuita.setAttribute('id', 'tributoventagratuita[]');
            inputventagratuita.setAttribute('name', 'tributoventagratuita[]');
            var inputotrostrib = document.createElement('input');
//           divcol.createTextNode(input);
            inputotrostrib.setAttribute('type', 'hidden');
            inputotrostrib.setAttribute('class', 'form-control otrostributos' + cont);
            inputotrostrib.setAttribute('id', 'otrostributos[]');
            inputotrostrib.setAttribute('name', 'otrostributos[]');
            var inputporcentajeigv = document.createElement('input');
//           divcol.createTextNode(input);
            inputporcentajeigv.setAttribute('type', 'hidden');
            inputporcentajeigv.setAttribute('class', 'form-control porcentajeigv' + cont);
            inputporcentajeigv.setAttribute('id', 'porcentajeigv[]');
            inputporcentajeigv.setAttribute('name', 'porcentajeigv[]');
            var inputporcentajeotrostrib = document.createElement('input');
//           divcol.createTextNode(input);
            inputporcentajeotrostrib.setAttribute('type', 'hidden');
            inputporcentajeotrostrib.setAttribute('class', 'form-control porcentajeotrostributos' + cont);
            inputporcentajeotrostrib.setAttribute('id', 'porcentajeotrostributos[]');
            inputporcentajeotrostrib.setAttribute('name', 'porcentajeotrostributos[]');
            var inputporcentajetributoventagratuita = document.createElement('input');
//           divcol.createTextNode(input);
            inputporcentajetributoventagratuita.setAttribute('type', 'hidden');
            inputporcentajetributoventagratuita.setAttribute('class', 'form-control porcentajetributoventagratuita' + cont);
            inputporcentajetributoventagratuita.setAttribute('id', 'porcentajetributoventagratuita[]');
            inputporcentajetributoventagratuita.setAttribute('name', 'porcentajetributoventagratuita[]');
            var inputmontooriginal = document.createElement('input');
//           divcol.createTextNode(input);
            inputmontooriginal.setAttribute('type', 'hidden');
            inputmontooriginal.setAttribute('class', 'form-control montooriginal' + cont);
            inputmontooriginal.setAttribute('id', 'montooriginal[]');
            inputmontooriginal.setAttribute('name', 'montooriginal[]');
            var inputmonedaorig = document.createElement('input');
//           divcol.createTextNode(input);
            inputmonedaorig.setAttribute('type', 'hidden');
            inputmonedaorig.setAttribute('class', 'form-control monedaoriginal' + cont);
            inputmonedaorig.setAttribute('id', 'monedaoriginal[]');
            inputmonedaorig.setAttribute('name', 'monedaoriginal[]');
            inputmonedaorig.setAttribute('value', 'Soles');

            var inputincluye = document.createElement('input');
//           divcol.createTextNode(input);
            inputincluye.setAttribute('type', 'hidden');
            inputincluye.setAttribute('class', 'form-control incluye' + cont);
            inputincluye.setAttribute('id', 'incluye[]');
            inputincluye.setAttribute('name', 'incluye[]');
            inputincluye.setAttribute('value', 'No');



            divcol.appendChild(input);
            divcol.appendChild(inputigv);
            divcol.appendChild(inputvalorunit);
            divcol.appendChild(inputmontobaseigv);
            divcol.appendChild(inputmontobaseexpo);
            divcol.appendChild(inputmontobaseexo);
            divcol.appendChild(inputmontobaseinafecto);
            divcol.appendChild(inputmontobasegratuito);
            divcol.appendChild(inputmontobaseisc);
            divcol.appendChild(inputmontobaseotros);
            divcol.appendChild(inputventagratuita);
            divcol.appendChild(inputotrostrib);
            divcol.appendChild(inputporcentajeigv);
            divcol.appendChild(inputporcentajeotrostrib);
            divcol.appendChild(inputporcentajetributoventagratuita);
            divcol.appendChild(inputmontooriginal);
            divcol.appendChild(inputmonedaorig);
            divcol.appendChild(inputincluye);
            /////////// elemento codigo ///


            ///////// label //////

            var labelcod = document.createElement('label');
            labelcod.innerHTML = 'Código';
            divcol.appendChild(labelcod);


            ////// input ///////////
            var input = document.createElement('input');
//           divcol.createTextNode(input);
            input.setAttribute('type', 'text');
            input.setAttribute('class', 'form-control codigo' + cont);
            input.setAttribute('id', 'codigo[]');
            input.setAttribute('name', 'codigo[]');
            input.setAttribute('placeholder', 'código');


            divcol.appendChild(input);
            //////////////////////////////////////////////
            //////////////////////////////////////////////////////////////////
            /////////// elemento descripcion ///


            ///////// label //////

            var labelcod = document.createElement('label');
            labelcod.innerHTML = 'Descripción';
            divcol2.appendChild(labelcod);


            ////// input ///////////
            var input = document.createElement('textarea');
//           divcol.createTextNode(input);
            input.setAttribute('type', 'text');
            input.setAttribute('class', 'form-control descripcionprod' + cont);
            input.setAttribute('id', 'descripcionprod[]');
            input.setAttribute('name', 'descripcionprod[]');
            input.setAttribute('placeholder', 'Descripción');
            input.setAttribute('ident', cont);
            input.addEventListener('focus', function (e) {
                // e.target matches elem
                var att = $(this).attr('ident');
                ident = att;
            }, false
                    );
            divcol2.appendChild(input);
            //////////////////////////////////////////////

            //////////////////////////////////////////////////////////////////
            /////////// elemento unidad ///


            ///////// label //////

            var labelcod = document.createElement('label');
            labelcod.innerHTML = 'Unidad';
            divcol3.appendChild(labelcod);


            ////// select ///////////
            var select = document.createElement('select');

//           divcol.createTextNode(input);

//           select.last().addClass('form-control show-tick');
            select.setAttribute('id', 'unidad');
            select.setAttribute('name', 'unidad[]');
            select.setAttribute('data-live-search', 'true');
            select.className = 'form-control show-tick';
<?php
$i = 0;
foreach ($unidades as $unidad) {
    $i++;
    ?>

                var option = document.createElement("option");
                option.innerHTML = '<?= trim($unidad->getDescripcion()) ?>';
                option.setAttribute('value', '<?= $unidad->getId() ?>');
                select.add(option);
<?php } ?>


            select.appendChild(option);


            divcol3.appendChild(select);
            //////////////////////////////////////////////

            //////////// elemento tipo igv

            ///////// label //////

            var labeligv = document.createElement('label');
            labeligv.innerHTML = 'Tipo Igv';
            divcol4.appendChild(labeligv);


            ////// select ///////////
            var selectigv = document.createElement('select');

//           divcol.createTextNode(input);

//           select.last().addClass('form-control show-tick');
            selectigv.setAttribute('id', 'tipoigv');
            selectigv.setAttribute('name', 'tipoigv[]');
            selectigv.setAttribute('data-live-search', 'true');
            selectigv.setAttribute('class', 'form-control show-tick tipoigv' + cont);
            selectigv.setAttribute('ident', cont);
<?php foreach ($impuestos as $impuesto) { ?>

                var optionigv = document.createElement("option");
                optionigv.innerHTML = '<?= trim($impuesto->getDescripcion()) ?>';
                optionigv.setAttribute('value', '<?= $impuesto->getOp() ?>');
                selectigv.add(optionigv);
<?php } ?>


            selectigv.appendChild(optionigv);


            divcol4.appendChild(selectigv);
            //////////////////////////////////////////////
            /////////// elemento cantidad ///


            ///////// label //////

            var labelcant = document.createElement('label');
            labelcant.innerHTML = 'Cantidad';
            divcol5.appendChild(labelcant);


            ////// input ///////////
            var input = document.createElement('input');
//           divcol.createTextNode(input);
            input.setAttribute('type', 'text');
            input.setAttribute('class', 'form-control cantidad' + cont);
            input.setAttribute('id', 'cantidad[]');
            input.setAttribute('name', 'cantidad[]');
            input.setAttribute('placeholder', 'Cantidad');
            input.setAttribute('ident', cont);
            input.addEventListener('focus', function (e) {
                // e.target matches elem
                var att = $(this).attr('ident');
                ident = att;
            }, false
                    );
            divcol5.appendChild(input);
            //////////////////////////////////////////////
            //////////////////////////////////////////////
            /////////// elemento precio unitario ///


            ///////// label //////

            var labelprecio = document.createElement('label');
            labelprecio.innerHTML = 'Precio U.';
            divcol6.appendChild(labelprecio);


            ////// input ///////////
            var input = document.createElement('input');
//           divcol.createTextNode(input);
            input.setAttribute('type', 'text');
            input.setAttribute('class', 'form-control precio' + cont);
            input.setAttribute('id', 'precio[]');
            input.setAttribute('name', 'precio[]');
            input.setAttribute('placeholder', '0');
            input.setAttribute('ident', cont);
            input.addEventListener('focus', function (e) {
                // e.target matches elem
                var att = $(this).attr('ident');
                ident = att;
            }, false
                    );

            divcol6.appendChild(input);
            //////////////////////////////////////////////
            //////////////////////////////////////////////
            /////////// elemento subtotal ///


            ///////// label //////

            var labelsub = document.createElement('label');
            labelsub.innerHTML = 'Subtotal';
            divcol7.appendChild(labelsub);


            ////// input ///////////
            var input = document.createElement('input');
//           divcol.createTextNode(input);
            input.setAttribute('type', 'text');
            input.setAttribute('class', 'form-control subtotal' + cont);
            input.setAttribute('readonly', 'true');
            input.setAttribute('id', 'subtotal[]');
            input.setAttribute('name', 'subtotal[]');
            input.setAttribute('placeholder', '0');

            divcol7.appendChild(input);

            //////////////////////////////////////////////
            //////////////////////////////////////////////
            /////////// elemento total ///


            ///////// label //////

            var labeltotal = document.createElement('label');
            labeltotal.innerHTML = 'Total';
            divcol8.appendChild(labeltotal);


            ////// input ///////////
            var inputtotal = document.createElement('input');
//           divcol.createTextNode(input);
            inputtotal.setAttribute('type', 'text');
            inputtotal.setAttribute('class', 'form-control total' + cont);
            inputtotal.setAttribute('readonly', 'true');
            inputtotal.setAttribute('id', 'total[]');
            inputtotal.setAttribute('name', 'total[]');
            inputtotal.setAttribute('placeholder', '0');

            divcol8.appendChild(inputtotal);
            //////////////////////////////////////////////

            //////////// elemento acciones ////////////
            ///////// label //////
            var labelacci = document.createElement('label');
            labelacci.innerHTML = 'Acciones';
            diveliminar.appendChild(labelacci);

            var span = document.createElement('span');
            span.setAttribute('class', 'glyphicon glyphicon-remove');


            ///btn eliminar //////

            var btn = document.createElement('button');
            btn.setAttribute('type', 'button');
            btn.setAttribute('class', 'form-control btn btn-danger waves-effect');
//           btn.setAttribute('id','btneliminar');
           
            btn.appendChild(span);

            diveliminar.appendChild(btn);


            var div = document.createElement('div');
            div.setAttribute('class', 'row ');
            div.appendChild(divcol);
            div.appendChild(divcol2);
            div.appendChild(divcol3);
            div.appendChild(divcol4);
            div.appendChild(divcol5);
            div.appendChild(divcol6);
            div.appendChild(divcol7);
            div.appendChild(divcol8);
            div.appendChild(diveliminar);


//            var divrowserie = document.createElement('div');
//            divrowserie.setAttribute('class', 'row ');
//            divrowserie.appendChild(divserie);

//            div.appendChild(divserie);


            $('#tabla').append(div);
            $('#tabla').append(divserie);






            var hoja = document.createElement('style');
            hoja.innerHTML = ".no-gutters{margin-right: 0; margin-left: 0;} .no-gutters {padding-right: 2px;padding-left: 2px;} ";
            document.body.appendChild(hoja);
//            var hoja = document.createElement('style')
//            hoja.innerHTML = "div {border: 2px solid black; background-color: blue;}";
//            document.body.appendChild(hoja);






            $(document).on("keydown.autocompleteselect", ".descripcionprod" + cont, function () {
                $(this).autocomplete({
                    minLength: 2,
                    source:
                            function (request, response) {
                                $.ajax({
                                    type: 'POST',
                                    url: '<?= base_url . 'producto/search' ?>',
                                    data: {query: request.term},
                                    success: response,
                                    error: function (jqXHR, textStatus, errorThrown) {
                                        alert("error handler!");
                                        alert(errorThrown);
                                    },
                                    dataType: 'json',
                                    delay: 100
                                });
//                          .done(function (data){
//                      console.log('done'+data);
////                      console.log('select dano'+ui);
//                      
//                     
//                  });
                            },

                    select: function (event, ui) {
                        var subtotal = 0, total = 0;
                        $('.id' + (ident)).val(ui.item.id);
                        $('.codigo' + (ident)).val(ui.item.codigo);
                        $('.precio' + (ident)).val(ui.item.preciov);
                        $('.descripcionprod' + (ident)).val(ui.item.descripcion);
                        var incluir = ui.item.incluir;


                        ///////////////// creo colapce para incluir series ////////////////

                        if (incluir == 'Si') {
//                        var series = document.getElementById('serie'+cont);
//                        console.log(series);
                            $('.cantidad' + ident).val(0);
                            $('.incluye' + ident).val('Si');
                            $('.cantidad' + ident).attr('readonly', 'true');
                            var divpanels = document.createElement('div');
                            divpanels.setAttribute('class', 'panel panel-successs');
                            var panelheding = document.createElement('div');
                            panelheding.setAttribute('class', 'panel-heading row');
                            panelheding.setAttribute('role', 'tab');
                            panelheding.setAttribute('id', 'headingOne_2');



//                            var diva = document.createElement('div');
//                            diva.setAttribute('class', 'col-lg-3 col-md-3 col-sm-3 col-xs-6 no-gutters');

                            var divselect = document.createElement('div');
                            divselect.setAttribute('class', 'col-lg-4 col-md-4 col-sm-4 col-xs-6 no-gutters');

                            var divboton = document.createElement('div');
                            divboton.setAttribute('class', ' col-lg-1 col-md-1 col-sm-1 col-xs-4 no-gutters');



                            console.log(ident);

                            var a = document.createElement('a');
                            a.setAttribute('role', 'button');
                            a.setAttribute('data-toggle', 'collapse');
                            a.setAttribute('data-parent', '#accordion_2');
                            a.setAttribute('href', '#collapseOne_2' + ident);
                            a.setAttribute('aria-expanded', 'true');
                            a.setAttribute('aria-controls', 'collapseOne_2' + ident);
                            a.innerHTML = '<strong>Series de: </strong>' + ui.item.descripcion + '  ';
//                            diva.appendChild(a);
//                            panelheding.appendChild(diva);

                            ///////// cargo series del producto en el SELECT//////////
                            var selectserie = document.createElement('select');

                            //           divcol.createTextNode(input);

                            //           select.last().addClass('form-control show-tick');
                            selectserie.setAttribute('id', 'idserie[]');
                            selectserie.setAttribute('name', 'idserie[]');
                            selectserie.setAttribute('class', 'form-control  show-tick idserie' + ident);
                            selectserie.setAttribute('ident', ident);
                            selectserie.setAttribute('data-live-search', 'true');
                            //            selectserie.className = 'form-control show-tick';
                            var idprod = ui.item.id;
                            $.ajax({
                                type: 'POST',
                                url: "<?= base_url ?>serieproducto/select",
                                data: {id: idprod},
                                success: function (data) {
                                    console.log(data);
                                    var datos = eval(data);

                                    datos.forEach(function (data, index) {
                                        console.log("index " + index + " | id: " + data.id + " serie: " + data.serie)
                                        var option = document.createElement("option");
                                        option.innerHTML = data.serie;
                                        option.setAttribute('value', data.id);
                                        selectserie.add(option);
                                    });
                                }



                            });
                            divselect.appendChild(a);
                            divselect.appendChild(selectserie);
                            panelheding.appendChild(divselect);
                            ///////////////////////// FIN DEL SELECT //////////////////////////////////






                            var collapse = document.createElement('div');
                            collapse.setAttribute('id', 'collapseOne_2' + ident);
                            collapse.setAttribute('class', 'panel-collapse collapse in');
                            collapse.setAttribute('role', 'tabpanel');
                            collapse.setAttribute('aria-labelledby', 'headingOne_2');

                            var body = document.createElement('div');
                            body.setAttribute('class', 'panel-body body' + ident);
                            body.setAttribute('id', 'body' + ident);
//                        body.innerHTML = 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry';

//                            var labelplus = document.createElement('label');
//                             labelplus.setAttribute('class', 'text-info');
//                             labelplus.innerHTML ='Más';

                            var botonmas = document.createElement('button');
                            botonmas.setAttribute('class', ' btn btn-success waves-effect  nuevoserie' + ident);
                            botonmas.setAttribute('id', 'nuevoserie' + ident);
                            botonmas.setAttribute('name', 'nuevoserie' + ident);
                            botonmas.setAttribute('ident', ident);
                            var span = document.createElement('span');
                            span.setAttribute('class', 'glyphicon glyphicon-plus');
                            botonmas.appendChild(span);

//                            divboton.appendChild(labelplus);
                            divboton.appendChild(botonmas);
                            panelheding.appendChild(divboton);

                            collapse.appendChild(body);
                            divpanels.appendChild(panelheding);
                            divpanels.appendChild(collapse);


                            divserie.appendChild(divpanels);



                        } else {
                            $('.incluye' + ident).val('No');
                            $('.divseries' + ident).empty();
                            $('.cantidad' + ident).removeAttr('readonly');

                        }

                        /////// calculo item ///////
                        var cantidad = $('.cantidad' + ident).val();
                        console.log('cant ' + cantidad);

                        var precio = ui.item.preciov;

                        total = cantidad * precio;
                        subtotal = total / 1.18;

                        $('.total' + ident).val(total.toFixed(2));
                        $('.subtotal' + ident).val(subtotal.toFixed(2));
                        var total = 0;


                        ///////////////////////////////////////////////////////////////////


                        calculartotal();
//                    $('#idcodsunat').val(ui.item.id);
//                    $('#codigo').val(ui.item.codigo);                    
//                        console.log(ui);
//                    console.log('select  '+ui);
                        event.preventDefault();
                    }



                });

//            event.preventDefault();
            });


            ////////////////////evento boton agregar serie ////////////////////

            $(document).on('click', ".nuevoserie" + cont, function (e) {
                e.preventDefault();

                var iden = $(this).attr('ident');
//                alert('ident '+iden);
                var cant = $('.cantidad' + iden).val();
                if (cant == '') {
                    cant = 1;
                } else {
                    cant++;
                }
                $('.cantidad' + iden).val(cant);

                var idprod = $('.id' + iden).val();


//                var idn = $('.idserie'+iden).attr('ident');
                var opcion = $('.idserie' + iden + ' option:selected').text();
                var opcionval = $('.idserie' + iden).val();
//                 alert(opcion);



//               $('.serieprod'+idn).val(opcion);

//                var cantidad = document.getElementById('cantidad'+ident);
//                cantidad.=cont;
                var inputs = document.createElement('input');
                inputs.setAttribute('type', 'text');
                inputs.setAttribute('name', 'serieprod[]');
                inputs.setAttribute('id', 'serieprod[]');
                inputs.setAttribute('class', 'form-control serieprod' + iden);
                inputs.setAttribute('readonly', 'true');
                inputs.setAttribute('value', opcion);


                var divrow = document.createElement('div');
                divrow.setAttribute('class', 'row');

                var divserie = document.createElement('div');
                divserie.setAttribute('class', 'col-lg-3 col-md-3 col-sm-3 col-xs-6');

                var divbtn = document.createElement('div');
                divbtn.setAttribute('class', 'col-lg-3 col-md-3 col-sm-3 col-xs-6 eliminarserie' + iden);  //
                divbtn.setAttribute('ident', iden);
//                divbtn.setAttribute('onclick',"eliminarserie("+iden+")");


                var body = document.getElementById('body' + iden);
//                body.appendChild(divserie);
//                ////// select ///////////
                var selectserie = document.createElement('input');

//           divcol.createTextNode(input);

//           select.last().addClass('form-control show-tick');
                selectserie.setAttribute('id', 'idserieitem[]');
                selectserie.setAttribute('name', 'idserieitem[]');
                selectserie.setAttribute('class', '  idserieitem' + iden);
                selectserie.setAttribute('type', 'hidden');

                selectserie.setAttribute('ident', iden);
                selectserie.setAttribute('value', opcionval);

//            selectserie.className = 'form-control show-tick';




//            select.appendChild(option);



                //////////////////////////////////////////////
//       
                divserie.appendChild(inputs);
                divserie.appendChild(selectserie);



                var btneliminar = document.createElement('button');
                btneliminar.setAttribute('type', 'button');
                btneliminar.setAttribute('class', 'btn btn-danger btneliminarserie' + iden);
                btneliminar.setAttribute('ident', iden);

                var span = document.createElement('span');
                span.setAttribute('class', 'glyphicon glyphicon-remove');
                btneliminar.appendChild(span);
                divbtn.appendChild(btneliminar);
//                divrow.appendChild(inputidprod);
                divrow.appendChild(divserie);
                divrow.appendChild(divbtn);

                body.appendChild(divrow);
//                
//                body.appendChild(inputidprod)
//                body.appendChild(divserie);
//                body.appendChild(btneliminar);

//                i++;


                var precio = $('.precio' + iden).val();
                var total = cant * precio;
                var subtotal = total / 1.18;

                $('.subtotal' + iden).val(subtotal.toFixed(2));
                $('.total' + iden).val(total.toFixed(2));

                calculartotal();


            });
            ///////////////////////////////////////////////////////////////////




            $(document).on("keyup", ".cantidad" + cont, function () {
//                var cantidad = $(this).val();
//                var precio = $('.precio' + ident).val();
//                var total = cantidad * precio;
//                
//                var igvprod;
//
//                var subtotal = total / 1.18;
//                igvprod= total - subtotal;
//                
//                $('.igvprod'+ ident).val(igvprod);
//                $('.montobaseigv'+ ident).val(subtotal);
//                $('.porcentajeigv'+ ident).val('18');
//                $('.montooriginal'+ ident).val(precio);
//                
//                
//
//               
//                $('.subtotal' + ident).val(subtotal.toFixed(2));
//                $('.total' + ident).val(total.toFixed(2));
                var op = $('.tipoigv' + ident).val();
                calculartipoigv(ident, op);
                calculartotal();



            });

            $(document).on("keyup", ".precio" + cont, function () {
//                var precio = $(this).val();
//                var cantidad = $('.cantidad' + ident).val();
//                var total = cantidad * precio;
//                
//                 var igvprod;
//
//                var subtotal = total / 1.18;
//                igvprod= total - subtotal;
//                
//                $('.igvprod'+ ident).val(igvprod);
//                $('.montobaseigv'+ ident).val(subtotal);
//                $('.porcentajeigv'+ ident).val('18');
//                $('.montooriginal'+ ident).val(precio);
// 
//               
//                $('.subtotal' + ident).val(subtotal.toFixed(2));
//                $('.total' + ident).val(total.toFixed(2));
                var op = $('.tipoigv' + ident).val();
                calculartipoigv(ident, op);
                calculartotal();

            });

            $(document).on("change", ".tipoigv" + cont, function () {
                var idn = $(this).attr('ident');
                var op = $(this).val();
                /////reset inputs/////
                calculartipoigv(idn, op);

                calculartotal();

            });

            function calculartipoigv(idn, op) {
                $('.igvprod' + idn).val('');
                $('.valorunitref' + idn).val('');
                $('.montobaseigv' + idn).val('');
                $('.montobaseexpo' + idn).val('');
                $('.montobaseexonerado' + idn).val('');
                $('.montobaseinafecto' + idn).val('');
                $('.montobasegratuito' + idn).val('');
                $('.montobaseivap' + idn).val('');
                $('.montobaseotrostributos' + idn).val('');
                $('.tributoventagratuita' + idn).val('');
                $('.otrostributos' + idn).val('');
                $('.porcentajeigv' + idn).val('');
                $('.porcentajeotrostributos' + idn).val('');
                $('.porcentajetributoventagratuita' + idn).val('');
                //////////////////////////////////

                var cantidad = $('.cantidad' + idn).val();
                var precio = $('.precio' + idn).val();
                var total = cantidad * precio;
                var subtotal = total / 1.18;
                if (op == 1) {

                    var igvprod;


                    igvprod = total - subtotal;

                    $('.igvprod' + idn).val(igvprod);
                    $('.montobaseigv' + idn).val(subtotal);
                    $('.porcentajeigv' + idn).val('18');
                    $('.montooriginal' + idn).val(precio);
                    $('.subtotal' + ident).val(subtotal.toFixed(2));


                } else if (op >= 2 && op <= 7) {
                    $('.valorunitref' + idn).val(precio);
                    $('.montobasegratuito' + idn).val(total);
                    $('.porcentajetributoventagratuita' + idn).val(18);

                    var triboventagratuita = total * 0.18;
                    $('.tributoventagratuita' + idn).val(triboventagratuita);
                    $('.subtotal' + idn).val(total.toFixed(2));

                } else if (op == 8) {
//                            $('.valorunitref'+ idn).val(precio);
                    $('.montobaseivap' + idn).val(total);
//                            $('.montobaseexpo'+ idn).val(total);
                    $('.subtotal' + idn).val(total.toFixed(2));

                } else if (op == 9) {
//                           $('.montobaseexpo'+ idn).val(total);
                    $('.montobaseexonerado' + idn).val(total);
                    $('.subtotal' + idn).val(total.toFixed(2));

                } else if (op == 10 || (op >= 12 && op <= 17)) {
                    $('.valorunitref' + idn).val(precio);
//                           $('.montobaseexpo'+ idn).val(total);
                    $('.montobasegratuito' + idn).val(total);
                    $('.tributoventagratuita' + idn).val(0);
                    $('.porcentajetributoventagratuita' + idn).val(0);
                    $('.subtotal' + idn).val(total.toFixed(2));
                } else if (op == 11) {
//                           $('.porcentajetributoventagratuita'+ idn).val(0);
                    $('.montobaseinafecto' + idn).val(total);
                    $('.subtotal' + idn).val(total.toFixed(2));
                } else {
                    $('.montobaseexpo' + idn).val(total);
                    $('.subtotal' + idn).val(total.toFixed(2));
                }

//                       $('.subtotal' + idn).val(subtotal.toFixed(2));
                $('.total' + idn).val(total.toFixed(2));


            }


            $(document).on("click", ".eliminarserie" + cont, function () {
//            function eliminarserie(idn){

                var idn = $(this).attr('ident');

//                alert(idn);

                var cant = $('.cantidad' + idn).val();

                cant--;

                $('.cantidad' + idn).val(cant);

                var precio = $('.precio' + idn).val();
                var total = cant * precio;
                var subtotal = total / 1.18;

                $('.subtotal' + idn).val(subtotal.toFixed(2));
                $('.total' + idn).val(total.toFixed(2));

                var parent = $(this).parents().get(0);
//            var parent1 = $(this).parents().get(1);
                $(parent).remove();
//            $(parent1).remove();

                calculartotal();
            });




//          










            console.log('cont' + cont);
            cont++;
            $('#cont').val(cont);

//           var fila = $("#tabla  div:eq(0)").clone();
//           fila.appendTo("#tabla");
//            
//            
//            /////////////////////////////////////////////
//            var op = $('#unidad').clone(true,true);
//            
//            var selectedValue = $("#unidad option:selected").val();
//            op.find("option[value = '" + selectedValue + "']").attr("selected", "selected");
//            op.attr('class','form-control show-tick');
////            $('#tabla').append(op);
//            op.appendTo('#select');









        }


        function calculartotal() {
            var total = 0, subtotal = 0, montobasegratuito = 0;
            var montobaseexona = 0, montobaseinafecto = 0, montobaseivap = 0;
            var montobaseexpo = 0;
            var igv = 0;
            var incigv = true;
            if (!$('#incigv').is(':checked')) {
                incigv = false;

            }
            $("input[name='total[]']").each(function (indice, elemento) {
                // console.log('El elemento con el índice '+indice+' contiene '+$(elemento).val());
                if ($(elemento).val() != '') {
                    total += parseFloat($(elemento).val());
                }

            });
            $("input[name='subtotal[]']").each(function (indice, elemento) {
                // console.log('El elemento con el índice '+indice+' contiene '+$(elemento).val());
                if ($(elemento).val() != '') {
                    subtotal += parseFloat($(elemento).val());
                }

            });
            $("input[name='montobasegratuito[]']").each(function (indice, elemento) {
                // console.log('El elemento con el índice '+indice+' contiene '+$(elemento).val());
                if ($(elemento).val() != '') {
                    montobasegratuito += parseFloat($(elemento).val());
                }

            });
            $("input[name='montobaseexonerado[]']").each(function (indice, elemento) {
                // console.log('El elemento con el índice '+indice+' contiene '+$(elemento).val());
                if ($(elemento).val() != '') {
                    montobaseexona += parseFloat($(elemento).val());
                }

            });
            $("input[name='montobaseinafecto[]']").each(function (indice, elemento) {
                // console.log('El elemento con el índice '+indice+' contiene '+$(elemento).val());
                if ($(elemento).val() != '') {
                    montobaseinafecto += parseFloat($(elemento).val());
                }

            });
            $("input[name='montobaseexpo[]']").each(function (indice, elemento) {
                // console.log('El elemento con el índice '+indice+' contiene '+$(elemento).val());
                if ($(elemento).val() != '') {
                    montobaseexpo += parseFloat($(elemento).val());
                }

            });
            $("input[name='montobaseivap[]']").each(function (indice, elemento) {
                // console.log('El elemento con el índice '+indice+' contiene '+$(elemento).val());
                if ($(elemento).val() != '') {
                    montobaseivap += parseFloat($(elemento).val());
                }

            });
            var moneda = $('#cbmoneda').val();
            var simbolomoneda;
            if (moneda == 'Soles') {
                simbolomoneda = 'S/';

            } else {
                simbolomoneda = '$';
            }


            var montos = document.getElementById('montos');
            if (montobasegratuito > 0) {
                $('.basegratuito').remove();
                var divbasegratuito = document.createElement('div');
                divbasegratuito.setAttribute('class', 'col-lg-4 col-md-4 col-sm-6 col-xs-12 no-gutters basegratuito');
                divbasegratuito.innerHTML = '<label class="text-danger"><strong>GRATUITA: ' + simbolomoneda + ' </strong>' + montobasegratuito.toFixed(2) + '</label>';

                montos.prepend(divbasegratuito);

            } else {
                $('.basegratuito').remove();
            }
            if (montobaseexona > 0) {
                $('.baseexona').remove();
                var divbaseexone = document.createElement('div');
                divbaseexone.setAttribute('class', 'col-lg-4 col-md-4 col-sm-6 col-xs-12 no-gutters baseexona');
                divbaseexone.innerHTML = '<label class="text-danger"><strong>EXONERADA: ' + simbolomoneda + ' </strong>' + montobaseexona.toFixed(2) + '</label>';

                montos.prepend(divbaseexone);

            } else {
                $('.baseexona').remove();
            }
            if (montobaseinafecto > 0) {
                $('.baseinafecto').remove();
                var divbaseina = document.createElement('div');
                divbaseina.setAttribute('class', 'col-lg-4 col-md-4 col-sm-6 col-xs-12 no-gutters baseinafecto');
                divbaseina.innerHTML = '<label class="text-danger"><strong>INAFECTO: ' + simbolomoneda + '</strong>' + montobaseinafecto.toFixed(2) + '</label>';

                montos.prepend(divbaseina);


            } else {
                $('.baseinafecto').remove();
            }
            if (montobaseexpo > 0) {
                $('.baseexpo').remove();
                var divbaseexp = document.createElement('div');
                divbaseexp.setAttribute('class', 'col-lg-4 col-md-4 col-sm-6 col-xs-12 no-gutters baseexpo');
                divbaseexp.innerHTML = '<label class="text-danger"><strong>EXPORTACION: ' + simbolomoneda + '</strong>' + montobaseexpo.toFixed(2) + '</label>';

                montos.prepend(divbaseexp);


            } else {
                $('.baseexpo').remove();
            }
            total = total - (montobasegratuito + montobaseivap);
            subtotal = (total - (montobaseexpo + montobaseexona + montobaseinafecto)) / 1.18;
            igv = (total - (montobaseexpo + montobaseexona + montobaseinafecto)) - subtotal;


            if (incigv == false) {
                subtotal = total;
                total += igv;
                igv = total - subtotal;

            }

            $('#lblgravada').html('<strong>GRAVADA:</strong>' + simbolomoneda + ' ' + subtotal.toFixed(2));
            $('#lbligv').html('<strong>IGV 18%:</strong> ' + simbolomoneda + ' ' + igv.toFixed(2));
            $('#lbltotal').html('<strong>TOTAL:</strong> ' + simbolomoneda + ' ' + total.toFixed(2));


        }

        ///////// FIN DE NUEVO ITEM ///////////////////

        $(document).on('change', '#incigv', function () {

            calculartotal();

        });
        /////////////// moneda //////
        $(document).on('change', '#cbmoneda', function () {

            calculartotal();

        });

        ///// elimina serie del producto //////////////////////////////

        // Evento que selecciona la fila y la edivmina 
        $(document).on("click", ".eliminar", function () {

            var ide = $(this).attr('ident');
//            alert(ide);
            var parent = $(this).parents().get(0);
//            var parent1 = $(this).parents().get(1);
            var parentserie = $('.divseries' + ide).remove();
            $(parent).remove();

//            cont--;
//            $('#cont').val(cont);
            calculartotal();

        });



//        $(document).on("click", ".btneliminar", function () {
//            alert('hola');
//        });






//        


//        



    });






</script>    



















