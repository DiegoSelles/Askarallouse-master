<?php 

	class Post extends AppModel {
        public $belongsTo='User';

		 public $validate = array(
            'title' => array(
                'rule' => 'notBlank'
            ),
            'content' => array(
                'rule' => 'notBlank'
            )
        );

	}


?>