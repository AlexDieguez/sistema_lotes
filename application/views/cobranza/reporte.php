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
                            <a href="alta" target="_blank">
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

<div class="table-responsive">
<table class="table table-striped table-bordered table-hover dt-responsive nowrap" width="100%" id="table">
     <thead>
 <tr>
            <th>Fecha</th>
            <th>ID Lote</th>
            <th>Concepto</th>
            <th>Cantidad</th>
            <th>Reporte</th>
 </tr>
 </thead>
 <tbody>
 <?php
if($reporte !== FALSE) {
            foreach ($reporte as $row) {
            echo "
                   <tr>
                       <td></td>
                       <td></td>
                       <td></td>
                       <td></td>
                       <td><a href='" . base_url() . "cobranza/recibo/' target='_blank'><button type='button' class='btn btn-danger red' data-toggle='tooltip' data-placement='bottom' title=''><i class='fa fa-file-pdf-o' aria-hidden='true'></i></button></a></td>
                    </tr>
                ";
           }
}
?>
 </tbody>
 </table>
</div>

    </div>
</div>
