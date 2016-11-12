
    <div class="navbar-wrapper">
      <div class="container">

        <nav class="navbar navbar-default">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li>
                <?php echo $this->Html->link("<span class='glyphicon glyphicon-home'></span>", array('controller' => 'posts', 'action' => 'index'), array('escape' => false)); ?>
                </li>
                <li><a href="#"><?php __('TAGS') ?></a></li>                                
              </ul>
              <ul class="nav navbar-nav navbar-right">
                <li><a data-toggle="modal" data-target="#reg" href="#"><?php __('Registro') ?></a></li>
                <li class="divider-vertical"></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php __('Login') ?> <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li id="login-menu">
                      <div class="container login">
                        <!--<form class="form-signin">-->           
                          <?php echo $this->Form->create('User', array('controller' => 'users', 'action'=>'login')); ?>
                          <h2 class="form-signin-heading text-white"><?php __('Identificarse') ?></h2>
                          <label for="inputEmail" class="sr-only"><?php __('Usuario') ?></label>
                          <!--<input id="inputEmail" class="form-control margin-login" placeholder="Usuario" required="" autofocus="" type="email">-->
                          <?php echo $this->Form->input('username', array('id' => 'inputEmail', 'class' => 'form-control margin-login', 'placeholder' => __('Usuario'))); ?>
                          <label for="inputPassword" class="sr-only"><?php __('Contraseña') ?></label>
                          <!--<input id="inputPassword" class="form-control" placeholder="Contraseña" required="" type="password">-->
                          <?php echo $this->Form->input('password',  array('id' => 'inputPassword', 'class' => 'form-control', 'type' => 'password', 'placeholder' => __('Contraseña'))); ?>
                          <div class="checkbox text-white">
                            <label>
                              <input value="remember-me" type="checkbox"><?php __('Recuerdame') ?></input>
                            </label>
                          </div>
                          <!--<button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>-->
                          <?php echo $this->Form->submit(__('Entrar'), array('class' => 'btn btn-lg btn-primary btn-block')); ?>
                        <!--</form>-->
                        <?php echo $this->Form->end(); ?>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </nav>

      </div>
    </div>



    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li class="active" data-target="#myCarousel" data-slide-to="0"></li>
        <li class="" data-target="#myCarousel" data-slide-to="1"></li>
        <li class="" data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="item active item-1">
          <div class="container">
            <div class="carousel-caption">
              <h1><?php __('Sobre nosotros')?></h1>
              <p><?php __('ASKarallouse es una comunidad de usuarios de TSW, como tú, para ayudarse mutuamente.')?></p>
              <a href="#about" class="btn btn-circle page-scroll">
              </a>
            </div>
          </div>
        </div>
        <div class="item item-2">
          <div class="container">
            <div class="carousel-caption">
              <h1><?php __('Comunidad ASKarallouse')?></h1>
              <p><?php __('Pregunta y responde cualquier duda.')?></p>
              <a href="#about" class="btn btn-circle page-scroll">
              </a>
            </div>
          </div>
        </div>
        <div class="item item-3">
          <div class="container">
            <div class="carousel-caption">
              <h1><?php __('¿A qué esperas?')?></h1>
              <p><?php __('Únete y comienza a preguntar.')?></p>
              <a class="btn btn-primary" data-toggle="modal" data-target="#reg"><?php __('Regístrate')?></a>
              <a href="#about" class="btn btn-circle page-scroll">
              </a>
            </div>
          </div>
        </div>
      </div>
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only"><?php __('Antes') ?></span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only"><?php __('Despues') ?></span>
      </a>
    </div>










<!-- http://getbootstrap.com/javascript/ -->
<div id="reg" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 class="txt-center">Registro</h3>
      </div>
      <div class="modal-body">
        <?php echo $this->Form->create('User', array('controller' => 'users', 'action'=>'add')); ?>
        <!--<h4>Usuario</h4>
        <input type="text" name="alias" class="form-control form-pers" placeholder="Usuario" />-->
        <?php echo $this->Form->input('username', array('class' => 'form-control form-pers', 'placeholder' => 'Username', 'label' => 'Alias Usuario')); ?>
        <!--<h4>Correo Electrónico</h4>
        <input type="text" name="email" class="form-control form-pers" placeholder="Correo Electrónico" />-->
        <?php echo $this->Form->input('name', array('class' => 'form-control form-pers', 'placeholder' => 'Nombre', 'label' => 'Nombre')); ?>
        <?php echo $this->Form->input('surname', array('class' => 'form-control form-pers', 'placeholder' => 'Apellidos', 'label' => 'Apellidos')); ?>  
        <?php echo $this->Form->input('email', array('class' => 'form-control form-pers', 'placeholder' => 'Correo electrónico', 'label' => 'Correo electrónico')); ?>    
        <!--h4>Contraseña</h4>-->            
        <!--<input type="password" name="pass" class="form-control form-pers" placeholder="Contraseña" />-->
        <?php echo $this->Form->input('password', array('class' => 'form-control form-pers', 'placeholder' => 'Contraseña', 'label' => 'Contraseña')); ?>
        <div class="clearfix"></div>
      </div>
      <div class="modal-footer">
        <?php 
        echo $this->Form->submit('Registrarse', array('class' => 'btn btn-success'));
        echo $this->Form->end();
        ?>
        <a href="#" data-dismiss="modal" class="btn">Cerrar</a>
      </div>
    </div>
  </div>
</div>  