<?php

  $user = $this->session->userdata('id_usuario');
  $nombre = $this->session->userdata('nombre');
  $a_paterno = $this->session->userdata('a_paterno');
  $a_materno = $this->session->userdata('a_materno');

  $nombre_completo = $nombre .' '.$a_paterno .' '.$a_materno;

if(!$user)
{
  redirect('login','refresh');
  exit();
}
$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
?>


    <div class="row profile">
        <div class="col-md-3">
            <div class="profile-sidebar">
                <!-- SIDEBAR USERPIC -->
                <div class="profile-userpic">
                    <img src="<?=base_url();?>assets/images/user.png" class="img-responsive" alt="">
                </div>
                <!-- END SIDEBAR USERPIC -->
                <!-- SIDEBAR USER TITLE -->
                <div class="profile-usertitle">
                    <div class="profile-usertitle-name">
                        <?=$nombre_completo;?>
                    </div>
                    <div class="profile-usertitle-job">
                        Cobranza
                    </div>
                </div>
                <!-- END SIDEBAR USER TITLE -->
                <!-- SIDEBAR BUTTONS -->
                <div class="profile-userbuttons">
                    <a href="#"><button type="button" class="btn btn-success btn-sm">Bio</button></a>
                    <a href="<?=base_url()?>login/salir"><button type="button" class="btn btn-danger btn-sm">Salir</button></a>
                </div>
                <!-- END SIDEBAR BUTTONS -->
                <!-- SIDEBAR MENU -->
                <div class="profile-usermenu">
                    <ul class="nav">
                        <li class="active">
                            <a href="index">
                            <i class="fa fa-dashboard"></i>
                            Panel </a>
                        </li>
                        <li>
                            <a href="lotes">
                            <i class="fa fa-home"></i>
                            Lotes </a>
                        </li>
                        <li>
                            <a href="abonar">
                            <i class="fa fa-money"></i>
                            Abonar </a>
                        </li>
                        <li>
                            <a href="alta">
                            <i class="fa fa-user-o"></i>
                            Alta Comprador </a>
                        </li>
                        <li>
                            <a href="reporte">
                            <i class="fa fa-bar-chart"></i>
                            Reporte del día </a>
                        </li>
                    </ul>
                </div>
                <!-- END MENU -->
            </div>
        </div>
        <div class="col-md-9">


  <div class="row">
  <?= validation_errors(); ?>
    <form class="col s12" action="<?=base_url(); ?>cobranza/alta_comprador" method="post" accept-charset="utf-8">
      <div class="row">
        <div class="input-field col s4">
          <i class="material-icons prefix"><i class='fa fa-user' aria-hidden='true'></i></i>
          <input id="icon_prefix" type="text" class="validate" id="Nombre" name="Nombre">
          <label for="icon_prefix">Nombre</label>
        </div>
        <div class="input-field col s4">
          <i class="material-icons prefix"><i class='fa fa-user' aria-hidden='true'></i></i>
          <input id="icon_prefix" type="tel" class="validate" id="Apellido_paterno" name="Apellido_paterno">
          <label for="icon_prefix">Apellido Paterno</label>
        </div>
        <div class="input-field col s4">
          <i class="material-icons prefix"><i class='fa fa-user' aria-hidden='true'></i></i>
          <input id="icon_prefix" type="text" class="validate" id="Apellido_Materno" name="Apellido_Materno">
          <label for="icon_prefix">Apellido Materno</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s4">
          <i class="material-icons prefix"><i class='fa fa-address-card' aria-hidden='true'></i></i>
          <input id="icon_prefix" type="text" class="validate" id="CURP" name="CURP">
          <label for="icon_prefix">CURP</label>
        </div>
        <div class="input-field col s4">
          <i class="material-icons prefix"><i class='fa fa-address-card' aria-hidden='true'></i></i>
          <input id="icon_prefix" type="tel" class="validate" id="Clave_INE" name="Clave_INE">
          <label for="icon_prefix">CLAVE INE</label>
        </div>
        <div class="input-field col s4">
          <i class="material-icons prefix"><i class='fa fa-address-card' aria-hidden='true'></i></i>
          <input id="icon_prefix" type="text" class="validate" id="RFC" name="RFC">
          <label for="icon_prefix">RFC</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s8">
          <i class="material-icons prefix"><i class='fa fa-home' aria-hidden='true'></i></i>
          <input id="icon_prefix" type="text" class="validate" id="Domicilio" name="Domicilio">
          <label for="icon_prefix">DOMICILIO</label>
        </div>
        <div class="input-field col s4">
          <i class="material-icons prefix"><i class='fa fa-phone' aria-hidden='true'></i></i>
          <input id="icon_prefix" type="tel" class="validate" id="Telefono_casa" name="Telefono_casa">
          <label for="icon_prefix">TELEFONO DE CASA</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s4">
          <i class="material-icons prefix"><i class='fa fa-mobile-phone' aria-hidden='true'></i></i>
          <input id="icon_prefix" type="tel" class="validate" id="Telefono_celular" name="Telefono_celular">
          <label for="icon_prefix">TELEFONO DE CELULAR</label>
        </div>
        <div class="input-field col s8">
          <i class="material-icons prefix"><i class='fa fa-envelope' aria-hidden='true'></i></i>
          <input id="icon_prefix" type="text" class="validate" id="correo_electronico" name="correo_electronico">
          <label for="icon_prefix">CORREO ELECTRONICO</label>
        </div>
          <button class="btn waves-effect waves-light" type="submit" name="guardar" id="guardar" value="Guardar">Dar de Alta<i class="material-icons right">send</i></button>
      </div>
    </form>
  </div>






    </div>
</div>
