
    <div class="navbar-wrapper">
      <div class="container-fluid no-padding-side">

        <nav class="navbar navbar-default  navbar-static-top no-margin-bottom">
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
                <li><a href="#"><?php__('TAGS')?></a></li>                                
              </ul>
              <ul class="nav navbar-nav navbar-right">

                <li class="divider-vertical"></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?= $current_user['username']; ?> <span class="caret"></span></a>
                  <ul class="dropdown-menu">

                      <?php 
                      //echo $this->Html->link(('Desconectarse'), '/users/logout',  ['class' => 'button']); 
                      echo $this->Html->link(__('Desconectarse'), array('controller' => 'users', 'action' => 'logout', 'class' => 'button')); 
                      ?>
                    
                    <li id="login-menu">

                    </li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </nav>

      </div>
    </div>




   <?php //echo $this->Html->link('Desconectarse', 'controller' => 'users', 'action' => 'logout'); ?>