<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$cont = $_GET['cont'];

?>
<script>

        $(".descripcionprod").autocomplete({
           
//            var descrip = $("#cliente").val();
          
            source: '<?= base_url.'producto/search'?>',
            minLength: 3,
//            data: {decrip: descrip}
            select: function(event, ui) {
                 console.log('ccoigo '+ui);
                    event.preventDefault();
//                    $('#idcodsunat').val(ui.item.id);
                    $('.descripcionprod').val(ui.item.codigo+' - '+ui.item.descripcion);
                    
                    
              
                    


             }
        });


</script>
