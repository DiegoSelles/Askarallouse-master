  
  <div id="buscar" class="container-fluid">
    <div class="container header-ppal">
      <!--<img class="img-rounded img-responsive header-img" align="left" src="img/ASKarallouse_logo.png" alt="logo"/>-->
      <?php echo $this->Html->image('ASKarallouse_logo.png', array('alt' => 'logo', 'class' => 'img-rounded img-responsive header-img', 'align' => 'left')); ?>
        <div class="row">
          <div class="col-lg-4 pull-right"> 
            <?php echo $this->Form->create('Post', array('controller' => 'posts', 'action' => 'search', 'type' => 'get' )); ?>
            <div class="input-group">
              <!--<input type="text" class="form-control" placeholder="Buscar...">-->
              <?php 
                echo $this->Form->input('search', array('class' => 'form-control', 'placeholder' => __('Buscar...'), 'div' => false, 'type' => 'text', 'label' => false));
              ?>
              <span class="input-group-btn">
                <!--<button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span></button>-->
                <?php 
                  echo $this->Form->button("<span class='glyphicon glyphicon-search'></span>", array('type' => 'submit', 'div' => false, 'class' => 'btn btn-default')); 
                ?>
              </span>
            </div>
            <?php echo $this->Form->end(); ?>
          </div>
        </div>
    </div>
  </div>
