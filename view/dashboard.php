
<section class="content">
    <div class="container-fluid">

        <div class="block-header">
            <h2>DASHBOARD</h2>
        </div>

        <!-- Widgets -->
        <div class="row clearfix">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box-4  hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons col-black">face</i>
                    </div>
                    <div class="content">
                        <div class="text">NUEVO CLIENTE</div>
                        <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box-4  hover-expand-effect ">
                    <div class="icon">
                        <i class="material-icons col-red">shopping_cart</i>
                    </div>
                    <div class="content">
                        <div class="text">NUEVA VENTA</div>
                        <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box-4 bg-light-green hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons col-white">shopping_cart</i>
                    </div>
                    <div class="content">
                        <div class="text">NUEVO ARTICULO</div>
                        <div class="number count-to" data-from="0" data-to="243" data-speed="1000" data-fresh-interval="20"></div>
                    </div>
                </div>
            </div>
<!--            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-orange hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">person_add</i>
                    </div>
                    <div class="content">
                        <div class="text">NEW VISITORS</div>
                        <div class="number count-to" data-from="0" data-to="1225" data-speed="1000" data-fresh-interval="20"></div>
                    </div>
                </div>
            </div>-->
        </div>
        <!-- #END# Widgets -->
        <!-- CPU Usage -->
        <!--<div class="row clearfix">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="header">
                        <div class="row clearfix">
                            <div class="col-xs-12 col-sm-6">
                                <h2>CPU USAGE (%)</h2>
                            </div>
                            <div class="col-xs-12 col-sm-6 align-right">
                                <div class="switch panel-switch-btn">
                                    <span class="m-r-10 font-12">REAL TIME</span>
                                    <label>OFF<input type="checkbox" id="realtime" checked><span class="lever switch-col-cyan"></span>ON</label>
                                </div>
                            </div>
                        </div>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="javascript:void(0);">Action</a></li>
                                    <li><a href="javascript:void(0);">Another action</a></li>
                                    <li><a href="javascript:void(0);">Something else here</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <div id="real_time_chart" class="dashboard-flot-chart"></div>
                    </div>
                </div>
            </div>
        </div>-->
        <!-- #END# CPU Usage -->
        <div class="row clearfix">
            <!-- Visitors -->
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="card">
                    <div class="body ">
                        <!--                <div class="sparkline" data-type="line" data-spot-Radius="4" data-highlight-Spot-Color="rgb(255, 152, 0)" data-highlight-Line-Color="#fff"
                                             data-min-Spot-Color="rgb(255,255,255)" data-max-Spot-Color="rgb(255,255,255)" data-spot-Color="rgb(255,255,255)"
                                             data-offset="90" data-width="100%" data-height="92px" data-line-Width="2" data-line-Color="rgba(255,255,255,0.7)"
                                             data-fill-Color="rgba(0, 188, 212, 0)">
                                            TIPO DE CAMBIO
                                        </div>-->

                        <div class="font-bold m-b--35">TIPO DE CAMBIO</div>
                        <form method="POST" action="<?= base_url ?>tipocambio/insert" id="FormularioCambio" data-form="save" enctype="multipart/form-data" autocomplete="off">

                            <ul class="dashboard-stat-list">
                                <li>
                                    COMPRA
                                    <span class="pull-right"><input type="text" class="form-control" id="txtcompra" value="<?= $cambio->getCompra(); ?>" required></span>
                                </li>
                                <li>
                                    VENTA
                                    <span class="pull-right"><input type="text" class="form-control" id="txtventa" value="<?= $cambio->getVenta(); ?>" required></span>
                                </li>
                                <li>
                                    <button type="submit" class="btn btn-success" >GUARDAR</button>
                                </li>
                            </ul>
                        </form>  
                    </div>


                </div>
            </div>
            <!-- #END# Visitors -->
            <!-- Latest Social Trends -->
<!--            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="card">
                    <div class="body bg-cyan" id="cardcambio">
                        <div class="m-b--35 font-bold">ULTIMOS TIPOS DE CAMBIO</div>
                        <ul class="dashboard-stat-list">
                            <?php
                          

//                            foreach ($cambios as $tipoc) {
//                                echo '<li>';
//                                echo '[' . $tipoc->getFecha() . ']<strong> [C: ' . $tipoc->getCompra() . ' - V: ' . $tipoc->getVenta() . ']</strong>';
//                                $temp = $tipoc->getVenta();
//
//
//                                echo '</li>';
//                            }
                            ?>

                        </ul>
                    </div>
                </div>
            </div>-->
            <!-- #END# Latest Social Trends -->
            <!-- Answered Tickets -->
<!--            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="card">
                    <div class="body bg-teal">
                        <div class="font-bold m-b--35">ANSWERED TICKETS</div>
                        <ul class="dashboard-stat-list">
                            <li>
                                TODAY
                                <span class="pull-right"><b>12</b> <small>TICKETS</small></span>
                            </li>
                            <li>
                                YESTERDAY
                                <span class="pull-right"><b>15</b> <small>TICKETS</small></span>
                            </li>
                            <li>
                                LAST WEEK
                                <span class="pull-right"><b>90</b> <small>TICKETS</small></span>
                            </li>
                            <li>
                                LAST MONTH
                                <span class="pull-right"><b>342</b> <small>TICKETS</small></span>
                            </li>
                            <li>
                                LAST YEAR
                                <span class="pull-right"><b>4 225</b> <small>TICKETS</small></span>
                            </li>
                            <li>
                                ALL
                                <span class="pull-right"><b>8 752</b> <small>TICKETS</small></span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>-->
            <!-- #END# Answered Tickets -->
<!--        </div>

        <div class="row clearfix">-->
            <!-- Task Info -->
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                <div class="card" id="cardcambio">
                    <div class="header">
                        <h2>ULTIMOS TIPOS DE CAMBIO</h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="javascript:void(0);">Action</a></li>
                                    <li><a href="javascript:void(0);">Another action</a></li>
                                    <li><a href="javascript:void(0);">Something else here</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-hover dashboard-task-infos">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Fecha/Hora</th>
                                        <th>Compra</th>
                                        <th>Venta</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                   <?php
                                    $i=1;
                                   foreach ($cambios as $tipoc) { 
                                    echo '<tr>';
                                    echo  '<td>'.$i.'</td>';
                                    echo   '<td>'.$tipoc->getFecha().'</td>';
                                    echo    '<td><span class="label bg-green">'.$tipoc->getCompra().'</span></td>';
                                    echo     '<td><span class="label bg-green">'.$tipoc->getVenta().'</td>';
                                        
                                    echo '</tr>';
                                        $i++;
                                    } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Task Info -->
            <!-- Browser Usage -->
<!--            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="card">
                    <div class="header">
                        <h2>BROWSER USAGE</h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="javascript:void(0);">Action</a></li>
                                    <li><a href="javascript:void(0);">Another action</a></li>
                                    <li><a href="javascript:void(0);">Something else here</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <div id="donut_chart" class="dashboard-donut-chart"></div>
                    </div>
                </div>
            </div>-->
            <!-- #END# Browser Usage -->
        </div>

    </div>
</section>