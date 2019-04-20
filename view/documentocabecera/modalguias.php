<div class="modal fade modalguia" id="mdModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content "> <!-- modal-col-deep-purple-->
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">Agregar información</h4>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="header bg-teal">
                        <label><strong>Guías de remisión</strong></label>
                        
                    </div>
                    
                    <div class="body" >
                        <div id="guias">
                            
                            
                        </div>
                       
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                            <button type="button" class="btn btn-primary waves-effect" id="addguia"><span class="glyphicon glyphicon-plus"></span></button>
                            
                            </div>
                            
                        </div>
                       
                        
                        
                        
                    </div>
                    
                   
                </div>
                
                
                  <div class="card">
                    <div class="header bg-teal">
                        <label><strong>Otros</strong></label>
                        
                    </div>
                    
                    <div class="body">
                        <div id="otros">
                            
                        </div>
                        <button type="button" class="btn btn-primary waves-effect" id="addotros"><span class="glyphicon glyphicon-plus"></span></button>
                    </div>
                </div>
                
                
                <div class="form-group">
                    
                    <div class="form-line">
                        <label><strong>Condiciones de pago</strong></label>
                        <input type="text" class="form-control">
                    
                    </div>
                </div>
                
                
                
                
                
                
                
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-primary waves-effect" data-dismiss="modal"><span class="glyphicon glyphicon-check"></span> Aceptar</button>
            </div>
        </div>
    </div>
</div>


<script>



    $(function () {
    ///////////////// guias de remision//////
  
        
        $(document).on('click',"#addguia", function () {
//              var newDiv = document.createElement("div"); 
//              var newContent = document.createTextNode("Hola!¿Qué tal?"); 
//              newDiv.appendChild(newContent); //añade texto al div creado. 
//
//              // añade el elemento creado y su contenido al DOM 
//              var currentDiv = document.getElementById("div1"); 
//              document.getElementById('#tabla').innerHTML (newDiv, currentDiv);
           
           
           ////////////////////////////// div /////////////
           
           var divcol = document.createElement('div');
           divcol.setAttribute('class','col-lg-5 col-md-5 col-sm-5 col-xs-6');
           
           var divcol2 = document.createElement('div');
           divcol2.setAttribute('class','col-lg-5 col-md-5 col-sm-5 col-xs-6');
           
                    
           
           var diveliminar = document.createElement('div');
           diveliminar.setAttribute('class','eliminar col-lg-2 col-md-2 col-sm-2 col-xs-6');
           
           //////////////////////////////////////////////////////////////////
           /////////// elemento serie numero ///
           
                
              ////// input ///////////
           var input = document.createElement('input');
//           divcol.createTextNode(input);
           input.setAttribute('type','text');
           input.setAttribute('class','form-control');
           input.setAttribute('id','serie[]');
           input.setAttribute('name','serie[]');
           input.setAttribute('placeholder','Serie - Numero');
           
           divcol.appendChild(input);
           //////////////////////////////////////////////
           //

           
             //////////////////////////////////////////////////////////////////
           /////////// elemento tipo guia ///

              ////// select ///////////
           var select = document.createElement('select');
           
//           divcol.createTextNode(input);
           
//           select.last().addClass('form-control show-tick');
           select.setAttribute('id','tipoguia');
           select.setAttribute('name','tipoguia');
           select.setAttribute('data-live-search','true');
           select.className ='form-control show-tick';
          
                   
            var option = document.createElement("option");
            var option1 = document.createElement("option");
            option.innerHTML = 'GUÍA DE REMISIÓN REMITENTE';
            option.setAttribute('value','GUÍA DE REMISIÓN REMITENTE');
            
            option1.innerHTML = 'GUÍA DE REMISIÓN TRANSPORTISTA';
            option1.setAttribute('value','GUÍA DE REMISIÓN TRANSPORTISTA');
            select.add(option);
            select.add(option1);
        
           
           
           select.appendChild(option);
         
           
           divcol2.appendChild(select);
           //////////////////////////////////////////////
               
           //////////// elemento acciones ////////////
           ///////// span //////
           
           var span = document.createElement('span');
           span.setAttribute('class','glyphicon glyphicon-remove');
           
           
           ///btn eliminar //////
           
           var btn = document.createElement('button');
           btn.setAttribute('type','button');
           btn.setAttribute('class','btn btn-danger waves-effect');
//           btn.setAttribute('id','btneliminar');
           
          
           btn.appendChild(span);
           diveliminar.appendChild(btn);
           
           
           var div = document.createElement('div');
           div.setAttribute('class','row');
           div.appendChild(divcol);
           div.appendChild(divcol2);
      
           div.appendChild(diveliminar);
           
           
            
            $('#guias').append(div);
            
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
        });
        
  //////////////////////////// ////////////////////////////////////////////////
  ///////////////// otros //////////////////
          
        $(document).on('click',"#addotros", function () {
//              var newDiv = document.createElement("div"); 
//              var newContent = document.createTextNode("Hola!¿Qué tal?"); 
//              newDiv.appendChild(newContent); //añade texto al div creado. 
//
//              // añade el elemento creado y su contenido al DOM 
//              var currentDiv = document.getElementById("div1"); 
//              document.getElementById('#tabla').innerHTML (newDiv, currentDiv);
           
           
           ////////////////////////////// div /////////////
           
           var divcol = document.createElement('div');
           divcol.setAttribute('class','col-lg-5 col-md-5 col-sm-5 col-xs-6');
           
           var divcol2 = document.createElement('div');
           divcol2.setAttribute('class','col-lg-5 col-md-5 col-sm-5 col-xs-6');
           
                    
           
           var diveliminar = document.createElement('div');
           diveliminar.setAttribute('class','eliminar col-lg-2 col-md-2 col-sm-2 col-xs-6');
           
           //////////////////////////////////////////////////////////////////
           /////////// elemento nombre ///
           
                
              ////// input ///////////
           var input = document.createElement('input');
//           divcol.createTextNode(input);
           input.setAttribute('type','text');
           input.setAttribute('class','form-control');
           input.setAttribute('id','nombre[]');
           input.setAttribute('name','nombre[]');
           input.setAttribute('placeholder','Nombre');
           
           divcol.appendChild(input);
           //////////////////////////////////////////////
           //
                /////////// elemento descripcion ///
           
                
              ////// input ///////////
           var input = document.createElement('input');
//           divcol.createTextNode(input);
           input.setAttribute('type','text');
           input.setAttribute('class','form-control');
           input.setAttribute('id','descripcion[]');
           input.setAttribute('name','descripcion[]');
           input.setAttribute('placeholder','Descripción');
           
           divcol2.appendChild(input);
           

           //////////// elemento acciones ////////////
           ///////// span //////
           
           var span = document.createElement('span');
           span.setAttribute('class','glyphicon glyphicon-remove');
           
           
           ///btn eliminar //////
           
           var btn = document.createElement('button');
           btn.setAttribute('type','button');
           btn.setAttribute('class','btn btn-danger waves-effect');
//           btn.setAttribute('id','btneliminar');
           
          
           btn.appendChild(span);
           diveliminar.appendChild(btn);
           
           
           var div = document.createElement('div');
           div.setAttribute('class','row');
           div.appendChild(divcol);
           div.appendChild(divcol2);
      
           div.appendChild(diveliminar);
           
           
            
            $('#otros').append(div);
            
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
        });
  
  //////////////////////////////////////////////////////////////
  

        // Evento que selecciona la fila y la edivmina 
        $(document).on("click", ".eliminar", function () {
           
            var parent = $(this).parents().get(0);
//            var parent1 = $(this).parents().get(1);
            $(parent).remove();
//            $(parent1).remove();
        });
        
        
        
//        $(document).on("click", ".btneliminar", function () {
//            alert('hola');
//        });
    });






</script>
