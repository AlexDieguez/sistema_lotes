  <div class="section"></div>
  <main>
    <center>
      <img class="responsive-img" style="width: 250px;" src="https://i.imgur.com/ax0NCsK.gif" />
      <div class="section"></div>

      <h5 class="indigo-text">INGRESO AL SISTEMA</h5>
      <div class="section"></div>

      <div class="container">
        <div class="z-depth-1 grey lighten-4 row" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">

          <?php
              messages_flash('danger',validation_errors(),'Errores del formulario', true);
              $error = $this->session->flashdata('error');
          ?>
          <?php if ($error) :?>
            <div id="card-alert" class="card pink lighten-5">
              <div class="card-content pink-text darken-1">
                <span class="card-title pink-text darken-1">Errores del formulario</span>
                  <p><?php echo $error; ?></p>
              </div>
            </div>
          <?php endif ?>

          <?=form_open(base_url().'login/acceso', 'class="col s12"')?>

            <div class='row'>
              <div class='input-field col s12'>
                <input class='validate' type='text' name='username' id='username' value="<?php echo set_value('username') ?>"/>
                <label for='username'>USUARIO</label>
              </div>
            </div>
            <div class='row'>
              <div class='input-field col s12'>
                <input class='validate' type='password' name='password' id='password' />
                <label for='password'>CONTRASEÑA</label>
              </div>
            </div>
            <center>
              <div class='row'>
                <button type='submit' value='Inicio de sesión' class='col s12 btn btn-large waves-effect indigo'>Iniciar sesión</button>
              </div>
            </center>
            <?=form_hidden('token',$token)?>
            <?php echo form_close(); ?>



        </div>
      </div>
    </center>

    <div class="section"></div>
    <div class="section"></div>
  </main>