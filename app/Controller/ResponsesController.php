<?php 

	class ResponsesController extends AppController {

		public function beforeFilter() {
			parent::beforeFilter();
		}

		public function index() {}

		public function add() {
			if($this->request->is('post')) {
				$this->Response->create();
				if($this->Response->save($this->request->data)) {
					$this->Flash->success('La respuesta ha sido creada correctamente.');
					return $this->redirect($this->referer());
				}
				$this->Flash->warning('La respuesta no se ha creado correctamente.');				
			}
		}

		public function voteResponseUp($id = null){

			if(!$id) {
				throw new NotFoundException("Datos erróneos");
			}

			if($this->isValidVote($id, $this->Session->read('Auth.User.id'))){
				$this->Response->query("INSERT INTO responses_users (user_id, response_id, vote) VALUES ('".$this->Session->read('Auth.User.id')."', '".$id."', 1)");
				$this->Flash->success('Gracias por tu voto.');			
			}

			$this->redirect($this->referer());	
		}

		public function voteResponseDown($id = null){

			if(!$id) {
				throw new NotFoundException("Datos erróneos");
			}
			if($this->isValidVote($id, $this->Session->read('Auth.User.id'))){
				$this->Response->query("INSERT INTO responses_users (user_id, response_id, vote) VALUES ('".$this->Session->read('Auth.User.id')."', '".$id."', 0)");
				$this->Flash->success('Gracias por tu voto.');		
			}

			$this->redirect($this->referer());
		}

		private function isValidVote($response_id, $user_id) {
			$checkVote = $this->Response->query("SELECT count(*) as valid FROM responses_users WHERE user_id = ".$user_id." && response_id = ".$response_id."");

			if($checkVote["0"]["0"]['valid']==0) {
				return true;
			} else {
				$this->Flash->warning('Ya ha votado esta respuesta.');	
				return false;
			}
			return $checkVote;
		}
		
	}


?>

