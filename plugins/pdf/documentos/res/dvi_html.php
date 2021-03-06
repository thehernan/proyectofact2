<style type="text/css">
  @font-face {
	font-family: 'GOTHIC';
	src:  url('../fonts/GOTHIC.ttf') format('truetype'),
	url('../fonts/GOTHIC.TTF.woff') format('woff'); 
}	
html{
	width:100%;
	height:100%;
}
body {
	width:100%;
	height:100%;
	background:#fff;
	margin:0px;
	padding:0px;
	font-family:arial;
	font-size:9pt;
	text-align:center;
	background:#999;
}
h1, h2, h3{
	border:solid 0px red;
	display:block;
	margin:10px;
	padding:0px;
	font-family:GOTHIC;
	color:white;
	font-weight:normal;	
}

	h1{
		font-size:18pt;
	}
	
	#content_admin > h1, #content_admin > h2{
		margin:10px 8px !important;
	}

	h2{
		font-size:16pt;
	}

	h3{
		font-size:14pt;
	}
#header_menu{
	font-family:GOTHIC;
	color:white;
	font-weight:normal;	
	border:dotted 0px green;
	position:relative;
}
#header_menu, #content_admin{
	max-width:1500px;
	/*min-width:950px;*/
	margin:0px auto 0px auto;
	border:dotted 0px red;
	display:inline-block;
}

#content_admin{
	display:block;
}
.bloque_mitad{
	float:left;
	border:dotted 0px green;
}

.bloque_mitad{
	border-radius:10px;
	background:#CD7B35;
	width:50%;
}

@media only screen and (max-width: 953px) {
	.bloque_mitad{
		float:none;
		/*display:inline-block;*/
		width:100%;
		border:dotted 0px blue;
	}
	
}
.seccion{
	border:solid 0px #BEBEBE !important;
	box-sizing:border-box;
	border-radius:8px;
	overflow:hidden;
	position:relative;
	margin:8px;
	padding:8px;
	background-color:white;
	display:block;
	color:#FFF;
}

.seccion h2.titulo{
	margin:20px 0px 0px 20px;
}
p{
	border:dotted 0px red;
	margin:5px 10px;
	padding:6px!important;
	text-align:left;
}


p.align-right{
	text-align:right;
}
#content_admin>h2{
	border:dotted 0px red;
	margin:0px 0px 10px 0px;
}
a, p, label{
	margin:0px;
	padding:0px;
	text-decoration:none;
}
p{
	border:dotted 0px red;
	margin:5px 10px;
	padding:0px;
	text-align:left;
}

p.align-right{
	text-align:right;
}
.content_admin p{
		margin:2px;
		padding:px;
		display:inline-block;
		width:100%;
		border:dotted 0px green;
		box-sizing:border-box;
}

.center_cajas{
	display:inline-block;
	border-radius:6px 6px 6px 6px !important;
	padding:10px 10px 10px 10px;
	width:auto !important;
	text-align:center;	  		
}
@media all and (max-height: 638px){
	body {
		width:100%;
		height:100%;
	}
	}

	#contenido{
		display:inline-block;
		margin-top:0px;
		border:dotted 0px red;
	}
	
}
#contenido{
	background-image:url(../img/restaurant-2602736_1920.jpg);
	background-size:100%;
	background-repeat:no-repeat;
	display:inline-block;
	margin-top:-320px;
	margin-bottom:40px;
	padding:0px;
	width:850px;
	min-height:572px;
	position:relative;
	left:0px;
	overflow:hidden;
	text-align:left;
	border:solid 1px #f0f0f0;
	border-radius:12px 12px 0px 0px;
	
}
#contenido .seccion{
	border:solid 1px #BEBEBE;
	box-sizing:border-box;
	border-radius:8px;
	overflow:hidden;
	position:relative;
	margin:8px;
	background-color:#FFF;
	display:block;
	
}
.logo_adm{
	background-image:url(../img/cook-2893904_1920.png);
	background-position:center;
	background-repeat:no-repeat;
	background-size:100%;
	width:100%;
	height:200px;
	border:0px;
	
}
#contenido .padding, #contenido .padding20{/*web*/
	display:inline-block;
	width:100%;
	box-sizing:border-box;
	border:dotted 0px green;
}
#contenido .padding20{
	padding:17px;
}
#contenido .padding{/*web*/
	padding:8px;
	display:inline-block;
	width:100%;
	box-sizing:border-box;
	border:dotted 0px green;
}
.mitad_dvi{
	width:244.08px;
	height:153.07px;
	border:solid 1px #fff;
	border-radius:5px;
	background:#FF6;
	color:#000;
}
.bloque_superior{
	width:244.08px;
	height:19.84px;
	border:solid 0px red;
	border-radius:5px 5px 0px 0px;
	background:#999;
	color:#000;
}
#text-superior{
	border:solid 0px red;
	font-family:arial;
	font-size:4.2pt;
	font-weight:bold;	
	width:65.2px;
	height:auto;
	position:relative;
	float:left;
	padding:5px;
}

#text-centro-superior{
	border: solid 0px red;
    font-family: arial;
    font-size: 3.3pt;
    font-weight: bold;
    width: 116.22px;
    height: auto;
    position: relative;
    float: left;
    padding: 4px 0px;
    text-align: left;
}
#text-derecha-superior{
	border: solid 0px red;
    font-family: arial;
    font-size: 3.3pt;
    font-weight: bold;
    width: 48.19px;
    height: auto;
    position: relative;
    float: right;
    padding: 2px 0px;
    text-align: left;
}
#cui{
	border: solid 0px red;
    font-family: arial;
    font-size: 4.5pt;
    font-weight: bold;
    width: 48px;
    height:auto;
    position: relative;
    text-align: center;
}
#dvi{
	border: solid 0px red;
    font-family: arial;
    font-size: 4pt;
    font-weight: bold;
    width:48px;
    height:auto;
    position: relative;
    text-align: center;
	color:#F00;
}
#num_dvi{
	border: solid 0px red;
    font-family: arial;
    font-size: 4pt;
    font-weight: bold;
    width:48px;
    height:auto;
    position: relative;
    text-align: center;
	color:#000;
}
.bloque_inferior{
	border:solid 0px red;
	font-family:arial;
	font-size:4.2pt;
	font-weight:bold;	
	width:233px;
	height:123.4px;
	position:relative;
	float:left;
	padding:5px;
}
#logo{
	background-size:100%;
	background-repeat:no-repeat;
	border:solid 1px red;
	width:125px;
	height:125px;
}
#foto_dvi{
	background-size:100%;
	background-repeat:no-repeat;
	border:solid 1px white;
	width:48.19px;
	height:70.87px;
	float:left;
}
#datos_dvi{
	background-size:100%;
	background-repeat:no-repeat;
	border:solid 0px white;
	width:119.06px;
	height:70.87px;
	float:left;
	padding:0px 3px;
}
.tit_dat{
	border:solid 0px red;
	font-family:arial;
	font-size:3.3pt;
	font-weight:bold;	
	text-align:left;
}
.dato_animal{
	text-align:left;
	padding:1.4px 0px;
}
.fecha_dvi_animal{
	background-size:100%;
	background-repeat:no-repeat;
	border:solid 0px white;
	width:46px;
	height:46px;
	float:right;
}
.fech_dvi_data{
	background-size:100%;
	background-repeat:no-repeat;
	border:solid 1px black;
	width:46px;
	height:14.17px;
	float:right;
	border-bottom:0px;
}
.fech_dvi_data_{
	background-size:100%;
	background-repeat:no-repeat;
	border:solid 1px black;
	width:46px;
	height:14.17px;
	float:right;

}
.tit_fecha{
	border:solid 0px red;
	font-family:arial;
	font-size:2.9pt;
	font-weight:bold;	
	text-align:center;
}
.fech_dato_cad{
	color:red;
}
.datos_codf{
	border:solid 0px red;
	width:235.28px;
	height:36.85px;
	float:right;
	margin: 8px 0px;
}
.dat_codf{
	font-family:arial;
	font-size:7pt;
	border:solid 0px black;
	width:235.28px;
	height:10px;
	float:left;
	text-align:left;
}
#datos_prop{
	border:solid 0px black;
	width:170px;
	height:62.36px;
	float:left;
    margin: 7px 6px;
}
#huella{
	border:solid 1px white;
	width:48.19px;
	height:62.36px;
	float:left;
    margin: 7px 0px;
}
#propietario{
	border:solid 0px red;
	font-family:arial;
	font-size:3.3pt;
	font-weight:bold;	
	text-align:left;
	width:48.19px;
	height:25px;
	float:left;
}
#nombre_propietario{
	border:solid 0px red;
	font-family:arial;
	font-size:4.2pt;
	font-weight:bold;	
	text-align:left;
	float:left;
	width:100px;
	height:auto;
}
#apellido_propietario{
	border:solid 0px red;
	font-family:arial;
	font-size:4.2pt;
	font-weight:bold;	
	text-align:left;
	width:48.19px;
	height:12.5px;
	float:left;
}
#domicilio{
	border:solid 0px red;
	font-family:arial;
	font-size:3.3pt;
	font-weight:bold;	
	text-align:left;
	width:160px;
	height:auto;
	float:left;
}
#direccion{
	border:solid 0px red;
	font-family:arial;
	font-size:3.3pt;
	font-weight:bold;	
	text-align:left;
	width:160px;
	height:auto;
	float:left;
}
#estados{
	font-family:arial;
	font-size:7pt;
	border:solid 0px black;
	width:235.28px;
	height:70px;
	float:left;
	text-align:left;
}
#ciudades{
	font-family:arial;
	font-size:4.2pt;
	font-weight:bold;	
	border:solid 0px black;
	width: 170px;
    height:25px;
	float:left;
	text-align:left;
}
.dep{
	font-family:arial;
	font-size:4.2pt;
	font-weight:bold;	
	border:solid 0px black;
	width:54px;
    height:25px;
	float:left;
	text-align:left;
}
#img_cod{
	border:solid 1px black;
	width:170px;
    height:45px;
	float:left;
	text-align:left;
	margin: 1px 0px;
}
#cod_barras{
	border:solid 1px black;
	width:20px;
    height:62.36px;
	float:right;
	margin-top: -19px;
}

</style>
<page backtop="15mm" backbottom="15mm" backleft="15mm" backright="15mm" style="font-size: 12pt; font-family: arial">
    <page_footer>
        <table class="page_footer">
            <tr>

                <td style="width: 50%; text-align: left">
                    P&aacute;gina [[page_cu]]/[[page_nb]]
                </td>

            </tr>
        </table>
    </page_footer>

    <table cellspacing="0" style="width: 100%; text-align: left; font-size: 11pt;">
        <tr>
            <td style="width:100%;">
                v

            </td>
        </tr>
        <tr>
            <td style="width:100%;">
                <div class="mitad_dvi">
                    <div id="datos_prop">
                        <div id="propietario">Propietario: </div>
                        <div id="nombre_propietario"> YULIANA </div>
                        <div id="apellido_propietario"> ALAMO SERRANO</div>
                        <br><br>
                        <div id="domicilio">Domicilio: </div>
                        <div id="direccion"> Av. TACNA 912 - PIURA - CASTILLA </div>
                        <br>
                        <div id="domicilio">Telefono: </div>
                        <div id="direccion"> 933721871 </div>


                    </div>
                    <div id="huella">
                    </div>

                    <div id="estados">
                        <div id="ciudades">
                            <div class="dep">
                                <span>Distrito</span><br>
                                <span>PIURA</span>
                                <br>
                                <br>
                                <span>Observaciones</span>
                            </div>
                            <div class="dep">
                                <span>Provincia</span><br>
                                <span>PIURA</span>
                            </div>
                            <div class="dep">
                                <span>Departamento</span><br>
                                <span>PIURA</span>
                            </div>
                        </div>

                        <div id="img_cod">
                        </div>
                        <div id="cod_barras">
                        </div>


                    </div>
                </div>


            </td>
        </tr>
    </table>





</page>
