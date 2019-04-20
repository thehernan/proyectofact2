
<body class="login-page"> 
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">FACTURADOR<b> ELECTRONICO</b></a>
            <small>INICIO DE SESION</small>
        </div>
        <div  id="respuestaAjax"></div>
        <div class="card">
            <div class="body">
                <form action="<?= base_url ?>usuario/login" method="POST"  id="formlogin" data-form="<?= $data ?>" enctype="multipart/form-data" autocomplete="off" >
                    <!--<div class="msg">Sign in to start your session</div>-->
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="username" placeholder="Usuario" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Contraseña" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8 p-t-5">
                            <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">
                            <label for="rememberme">Recuérdame</label>
                        </div>
                        <div class="col-xs-5">
                            <button class="btn btn-block bg-deep-purple waves-effect" type="submit">INICIAR SESION</button>
                        </div>
                    </div>
                    <!--                    <div class="row m-t-15 m-b--20">
                                            <div class="col-xs-6">
                                                <a href="sign-up.html">Register Now!</a>
                                            </div>
                                            <div class="col-xs-6 align-right">
                                                <a href="forgot-password.html">Forgot Password?</a>
                                            </div>
                                        </div>-->
                </form>
            </div>
        </div>
    </div>

