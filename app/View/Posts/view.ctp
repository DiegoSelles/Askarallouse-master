      
        <script>
          function showAnswer(id) {
            if(document.getElementById){
              var hidden = document.getElementById(id);
              $(hidden).fadeIn(1000);
            }
          }

          function hideAnswer(id) {
            if(document.getElementById){
              var visible = document.getElementById(id);
              $(visible).fadeOut(500);
            }
          }          
        </script>



	
        <?php 
          if (isset($current_user)) {                
            echo $this->element('leftSidebar');         
            echo "<div class='col-md-8 col-lg-8'>"; 
          } else {
            echo "<div class='col-md-10 col-lg-10'>"; 
          }
        ?>        
          <div class="row small-query">
            <div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12">
              <div class="row">
                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                  <h2><?= $post['Post']['title']; ?></h2>
                  <p class="sizeP14"><?= $post['Post']['content']; ?></p>    
                </div>
                <div class="hidden-xs col-sm-2 col-md-2 col-lg-2"></div>
                <div class="col-xs-4 col-sm-2 col-md-2 col-lg-2">
                  <?php echo $this->Html->image('new_logo.jpg', array('alt' => 'avatar', 'class' => 'img-responsive center-block')); ?>
                  <p class="margin-none textCenter"><?php echo $post['User']['username']; ?></p>
                </div>
              </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
              <div class="row">
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                  <div class="answer">
                  <?php if(isset($current_user)) { ?>
                    <input type="button" class="btn btn-success" onclick="showAnswer('res')" value="Responder">
                  <?php } ?>
                  </div>
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                  <?php 
                    if($post['Post']['user_id'] == $current_user['id']) { 
                      echo $this->Form->postLink(__('Eliminar'), array('controller' => 'posts', 'action' => 'delete', $post['Post']['id']), array('class' => 'btn btn-danger', 'escape' => false), __('¿Está seguro de querer eliminar la pregunta?'));
                    }
                  ?>
                </div>
              </div>
            </div>
          </div>
          <p class="margin-none"><?php  $ant = new DateTime($post['Post']['initDate']);
          $act = new DateTime();
          $interval = $ant->diff($act); echo $interval->format('Pregunta creada hace: %a días %h horas y %i minutos ');?></p>
          <hr class="h-divider marginTop-none" >

          <div id="res" class="row answer" style="display:none;">
            <div class="row"> 
              <div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12">
            
                <button type="button" class="close" onclick="hideAnswer('res')"><span aria-hidden="true">&times;</span></button>

                <?php 
                  echo $this->Form->create('Response', array('controller' => 'responses', 'action'=>'add')); 
                  echo $this->Form->hidden('user_id', array('value' => $current_user['id']));
                  echo $this->Form->hidden('post_id', array('value' => $post['Post']['id']));
                  echo $this->Form->hidden('initDate', array('value' => date('Y-m-d H:i:s')));
                ?>
                <div class="form-group">
                  <label for="email"><?php __('Respuesta:')?></label>
                  <?php echo $this->Form->textarea('content', array('class' => 'form-control', 'rows' => '9')); ?>
                </div>  
                <button type="button" class="btn btn-default" onclick="hideAnswer('res')"><?php __('Cerrar')?></button>
                <?php 
                  echo $this->Form->submit(__('Enviar'), array('div' => false, 'class' => 'btn btn-success')); 
                  echo $this->Form->end(); 
                ?>
              </div>
            </div>
          </div>

          <?php 
            $num=1;
            foreach ($responses as $response ) { 
          ?>
            
          <div class="row answer">
            <div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12">
              <div class="row">
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1" align="center">
                  <div class="num">
                    <span title="num"><?php echo $num; ?></span>
                  </div>
                </div> 
                <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
                  <h5><?php echo $response['P']['content']; ?></h5> 
                </div>
                <div class="hidden-xs col-sm-2 col-md-2 col-lg-2"></div>
                <div class="col-xs-4 col-sm-2 col-md-2 col-lg-2">
                  <?php echo $this->Html->image('new_logo.jpg', array('alt' => 'avatar', 'class' => 'img-responsive center-block')); ?>
                  <p class="margin-none textCenter"><?php echo $response['users']['username']; ?></p>
                </div>
              </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
              <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-8 col-lg-8"></div>
                <div class="col-xs-3 col-sm-3 col-md-2 col-lg-2">
                  <div class="positive">
                  <?php
                    echo $this->Form->create('Response', array('action' => '/voteResponseUp/'.$response['P']['id']));
                    echo $this->Form->button("<span class='glyphicon glyphicon-thumbs-up'>".$response['0']['voteP']."</span>", array('type' => 'submit', 'div' => false, 'class' => 'btn btn-default'));
                    echo $this->Form->end(); 
                  ?>
                  </div>
                </div>
                <div class="col-xs-3 col-sm-3 col-md-2 col-lg-2">
                  <div class="negative">
                    <?php
                      echo $this->Form->create('Response', array('action' => '/voteResponseDown/'.$response['P']['id']));
                      echo $this->Form->button("<span class='glyphicon glyphicon-thumbs-down'>".$response['0']['voteN']."</span>", array('type' => 'submit', 'div' => false, 'class' => 'btn btn-default'));
                      echo $this->Form->end(); 
                    ?>
                  </div>
                </div>              
              </div>
            </div>
          </div>

          <hr class="h-divider">

          <?php 
              $num+=1;
            } 

          ?>

        </div>


        <?php echo $this->element('rightSidebar'); ?>
