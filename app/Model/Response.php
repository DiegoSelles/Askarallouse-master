<?php 

	class Response extends AppModel {

        public $hasAndBelongsToMany = array(
            'ResponseVote' => array(
                'className' => 'User',
                'joinTable' => 'responses_users',
                'foreignKey' => 'response_id',
                'associationForeignKey' => 'user_id'
            )
        );

        public $belongsTo=array(
            'UserResponses' => array(
                'className' => 'User',
                'foreignKey' => 'user_id'
                ),
            'PostResponses' => array(
                'className' => 'Post',
                'foreignKey' => 'post_id'
                )
        );
	}


?>