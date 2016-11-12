<?php 
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');
App::uses('AppModel', 'Model');

	class User extends AppModel {

		public $hasAndBelongsToMany = array(
	        'VoteResponse' => array(
	            'className' => 'Response',
				'joinTable' => 'responses_users',
	            'foreignKey' => 'user_id',
				'associationForeignKey' => 'response_id'
	        )
	    );

		public $hasMany = array(
			'UserPosts' => array(
				'className' => 'Post',
				'foreignKey' => 'user_id'
				),
			'UserResponses' => array(
	            'className' => 'Responses',
	            'foreignKey' => 'user_id',
	        )
			);



		public $validate = array(

				'username' => array(
					'notBlank' => array(
						'rule' => 'notBlank',
						'message' => 'Se requiere especificar un usuario'
					),
					'isUnique' => array(
						'rule' => 'isUnique',
						'message' => 'El alias debe ser único.'
					),
				    'size' => array(
				        'rule' => array('lengthBetween', 2, 20),
				        'message' => 'El alias debe tener al menos 2 caracter y como máximo 20.'
				    )								
				),	
				'name' => array(
					'notBlank' => array(
						'rule' => 'notBlank',
						'message' => 'Se requiere especificar el nombre'
					),		
				    'letters' => array(
				        'rule' =>  array('custom', '/^[A-Za-zÁáÉéÍíÓóÚúÑñ]*$/'),
				        'message' => 'El apellido solo debe contener letras'
				    )
				),
				'surname' => array(
					'notBlank' => array(
						'rule' => 'notBlank',
						'message' => 'Se requiere especificar los apellidos'
					),		
				    'letters' => array(
				        'rule' =>  array('custom', '/^[A-Za-zÁáÉéÍíÓóÚúÑñ]*$/'),
				        'message' => 'El apellido solo debe contener letras'
				    )
				),
				'password' => array(
					'notBlank' => array(
						'rule' => 'notBlank',
						'message' => 'Se requiere especificar un usuario'
					),
				    'size' => array(
				        'rule' => array('minLength', '4'),
				        'message' => 'El password debe tener al menos 6 caracter y como máximo 20.'
				    )		
				),
				'email' => array(
					'notBlank' => array(
						'rule' => 'notBlank'
					),
					'isUnique' => array(
						'rule' => 'isUnique',
						'message' => 'El correo electrónico ya se encuentra registrado.'					
					)		
				)									
		);


		public function beforeSave($options = array()) {
			if(isset($this->data[$this->alias]['password'])) {
				$passwordHasher = new BlowfishPasswordHasher();
				$this->data[$this->alias]['password'] = $passwordHasher->hash($this->data[$this->alias]['password']);
			}
			return true;
		}




	}


?>