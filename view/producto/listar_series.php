
<div class="card">
    <div class="header bg-teal">
        
        <h2>SERIES DEL PRODUCTO</h2>
    </div>
    <div class="body">
        <table class="table  table-hover table-bordered" id="tabladocumento">
    <thead>
        <tr>
            <th class="text-danger">Serie</th>

        </tr>
    </thead>
<!--                                <tfoot>
        <tr>
            <th>Fecha</th>
            <th>Tipo</th>
            <th>Serie</th>
            <th>Número</th>
            <th>RUC/ DNI</th>
            <th>Nombre / Rz. Social</th>
            <th>Total</th>
            <th>Est. Local</th>
            <th>Est. Sunat</th>
            <th>Imprimir</th>
            <th>Acciones</th>
        </tr>
        </tfoot>-->
    <tbody >
<?php
foreach ($series as $serie) {

    echo '<tr>';
    echo '<td>' . $serie->getSerie() . '</td>';
    echo '</tr>';
}
?>



    </tbody>

</table>
<div class="pagination">
    <nav>
        <ul class="pagination"></ul>

    </nav>

</div>
        
    </div>
    
    
    
    
</div>


<script>

    var table = '#tabladocumento'
    $(document).ready(function () {

        $('.pagination').html('')
        var trnum = 0
        var maxRows = 10
        var totalRows = $(table + ' tbody tr').length
        $(table + ' tr:gt(0)').each(function () {
            trnum++
            if (trnum > maxRows) {
                $(this).hide()
            }
            if (trnum <= maxRows) {
                $(this).show()

            }



        })
        if (totalRows > maxRows) {
            var pagenum = Math.ceil(totalRows / maxRows)
            for (var i = 1; i <= pagenum; ) {
                $('.pagination').append('<li data-page="' + i + '">\<span>' + i++ + '<span class="sr-only">(current)</span>\n\
                </span>\</li>').show()

            }

        }
        $('.pagination li:first-child').addClass('active')
        $('.pagination li').on('click', function () {

            var pageNum = $(this).attr('data-page')
            var trIndex = 0;
            $('.pagination li').removeClass('active')
            $(this).addClass('active')
            $(table + ' tr:gt(0)').each(function () {
                trIndex++
                if (trIndex > (maxRows * pageNum) || trIndex <= ((maxRows * pageNum) - maxRows)) {
                    $(this).hide()
                } else {
                    $(this).show()
                }

            })

        });


    });
//       $(function (){
//        $('table tr:eq(0)').prepend('<th>ID</th>')
//        var id=0;
//        $('table tr:gt(0)').each(function (){
//            id++
//            $(this).prepend('<td>'+id+'</td>')
//            
//        })
//       
//       
//       
//       
//       })


</script>    


     <?php           



            
            
            
        
       
        


