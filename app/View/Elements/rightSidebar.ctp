          <div class="col-md-2 col-lg-2"> 
          <div class="panel panel-info margin-panel">
            <div class="panel-heading">
              <h3 class="panel-title"><?php __('Info') ?></h3>
            </div>
            <div class="panel-body">
              <h5> <span class="text-muted"><?php __('Usuario Registrados') ?></span> 3</h5>
              <h5> <span class="text-muted"><?php __('Usuarios online') ?></span> 1</h5>       
            </div>
            <ul class="list-group">
              <li class="list-group-item"><?php __('Usuarios nuevos') ?>
                <p class="list-group-item-text"><a href="#">...</a></p>
                <p class="list-group-item-text"><a href="#">...</a></p>
                <p class="list-group-item-text"><a href="#">...</a></p>      
              </li>
              <li class="list-group-item"><?php __('Preguntas Calientes') ?>
                <p class="list-group-item-text"><a href="#">...</a></p>
                <p class="list-group-item-text"><a href="#">...</a></p>
                <p class="list-group-item-text"><a href="#">...</a></p> 
              </li>    
            </ul>
          </div>
        </div> 

        <!-- MODAL PREGUNTA -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title txt-center" id="myModalLabel"><?php __('Pregunta') ?></h3>
              </div>
              <div class="modal-body">
                <!--<form role="form">-->
                <?php 
                echo $this->Form->create('Post', array('controller' => 'posts', 'action'=>'add')); 
                  echo $this->Form->hidden('user_id', array('value' => $current_user['id']));
                  echo $this->Form->hidden('initDate', array('value' => date('Y-m-d H:i:s')));

                ?>
                  <!--<div class="form-group">
                    <label for="email">Nueva pregunta:</label>
                    <input type="text" class="form-control" id="nuevaPregunta">
                  </div>-->
                  <div class="form-group">
                    <!--<label for="email">Título pregunta:</label>-->
                    <!--<input type="text" class="form-control" id="tituloPregunta">-->
                     <?php echo $this->Form->input('title', array('class' => 'form-control')); ?>
                  </div>
                  <!--<div class="form-group">
                    <label for="email">Tags:</label>
                    <input type="text" class="form-control" id="tags">
                  </div>-->
                  <div class="form-group">
                    <label for="email"><?php __('Descripción:') ?></label>
                    <!--<textarea placeholder="Descripción..." class="form-control txtarea-mod" id="descripcion" rows="3"></textarea>-->
                    <?php echo $this->Form->textarea('content', array('class' => 'form-control', 'rows' => '3')); ?>
                  </div>   
                <!--</form>-->
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?php __('Cerrar') ?></button>
                <!--<button type="button" class="btn btn-primary">Enviar</button>-->
                <?php 
                echo $this->Form->submit(__('Enviar'), array('div' => false, 'class' => 'btn btn-success')); 
                echo $this->Form->end(); 
                ?>
              </div>
            </div>
          </div>
        </div>
