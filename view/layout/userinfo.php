<div class="user-info">
    <div class="image">
        <img src="data:image/jpg;base64 ,<?=  $_SESSION['foto']; ?>" width="48" height="48" alt="User" />
    </div>
    <div class="info-container">
        
        <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?=  $_SESSION['nombre'].' '.$_SESSION['apellidop'].' '.$_SESSION['apellidom'] ?></div>
        
        <div class="email"><?=  $_SESSION['email'] ?></div>
        <div class="btn-group user-helper-dropdown">
            <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
            <ul class="dropdown-menu pull-right">
                <li><a href="<?= base_url?>usuario/cargar&id=<?= $_SESSION['id']?>"><i class="material-icons">person</i>Perfil</a></li>
                <li role="separator" class="divider"></li>
                <!--<li><a href="javascript:void(0);"><i class="material-icons">group</i>Followers</a></li>-->
                <li><a href="javascript:void(0);"><i class="material-icons">shopping_cart</i>Comisiones</a></li>
                <!--<li><a href="javascript:void(0);"><i class="material-icons">favorite</i>Likes</a></li>-->
                <li role="separator" class="divider"></li>
                <li><a href="<?=base_url ?>usuario/cerrarsesion"><i class="material-icons">input</i>Cerrar Sesión</a></li>
            </ul>
        </div>
    </div>
</div>
