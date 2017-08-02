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

<?php foreach ($lista as $v)
{
    $id = $v->id_comprador;
    $nombre_completo = $v->Nombre ." ". $v->Apellido_paterno ." ". $v->Apellido_Materno;
    $concepto = $v->debe;
    $saldo = $v->saldo;
    $haber = $v->haber;
}
?>

  <div class="row">
  <?= validation_errors(); ?>
    <form class="col s12" action="<?=base_url(); ?>cobranza/registro_abono" method="post" accept-charset="utf-8">
      <div class="row">
        <div class="input-field col s2">
          <i class="material-icons prefix"><i class='fa fa-ticket' aria-hidden='true'></i></i>
          <input id="icon_prefix" type="text" class="validate" readonly>
          <label for="icon_prefix">ID-<?=$id;?></label>
        </div>
        <div class="input-field col s7">
          <i class="material-icons prefix"><i class='fa fa-user' aria-hidden='true'></i></i>
          <input id="icon_prefix" type="tel" class="validate" readonly>
          <label for="icon_prefix"><?=$nombre_completo;?></label>
        </div>
        <div class="input-field col s3">
          <i class="material-icons prefix"><i class='fa fa-dollar' aria-hidden='true'></i></i>
          <input id="icon_prefix" type="text" class="validate" id="haber2" name="haber2">
          <label for="icon_prefix">Abono</label>
        </div>
        <input type="hidden" name="debe" id="debe" value="<?=$concepto;?>">
        <input type="hidden" name="haber" id="haber" value="<?=$haber;?>">
        <input type="hidden" name="saldo" id="saldo" value="<?=$saldo;?>">
          <button class="btn waves-effect waves-light" type="submit" name="guardar" id="guardar" value="Guardar">Abonar<i class="material-icons right">send</i></button>
      </div>
    </form>
  </div>






    </div>
</div>
