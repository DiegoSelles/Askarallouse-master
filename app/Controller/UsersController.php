<?php 

	class UsersController extends AppController {
	    public function beforeFilter() {
	    	parent::beforeFilter();

	        $this->Auth->allow('index', 'add');
	        $this->set('current_user', $this->Auth->user());
	    }
		public function index() {}

		public function login() {
			if($this->request->is('post')) {
				if($this->Auth->login()) {
					return $this->redirect($this->Auth->redirectUrl());
				}
				$this->Flash->error('¡Usuario y/o contraseña incorrectos!');
			}
			$this->redirect($this->referer());

		}

		public function logout() {
			$this->Session->destroy();
			$this->Flash->warning('Se ha cerrado la sesión.');		
			return $this->redirect($this->Auth->logout());
		}

		public function add() {
			if($this->request->is('post')) {
				$this->User->create();
				if($this->User->save($this->request->data)) {
					$this->Flash->success('EL usuario ha sido creado.');
					$this->redirect($this->referer());		
				}
				$this->Flash->error('EL usuario no se ha podido crear.');	
				$this->redirect($this->referer());			
			}
		}
	}


?>