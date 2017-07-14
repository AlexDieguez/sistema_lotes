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

?>

<h1>Bienvenido Cobranza: <?=$nombre_completo;?></h1>
<a href="<?=base_url()?>login/salir"><h3>Salir</h3></a>