<?php
App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

/**
 * User Model
 *
 */
class User extends AppModel {
	
	public function beforeSave($options = array()) {
		if (isset($this->data[$this->alias]['password'])) {
			$passwordHasher = new BlowfishPasswordHasher();
			$this->data[$this->alias]['password'] = $passwordHasher->hash(
					$this->data[$this->alias]['password']
			);
		}
		return true;
	}
	
	public $virtualFields = array(
			'nominativo' => 'CONCAT(User.nome, " ", User.cognome)',
	);
	
	public $validate = array (
			'nome' => array (
					'notEmpty' => array (
							'rule' => 'notEmpty'
					),
			),
			'cognome' => array (
					'notEmpty' => array (
							'rule' => 'notEmpty' 
					),
			),
			'username' => array (
					'notEmpty' => array (
							'rule' => 'notEmpty' 
					),
					'validEmailRule' => array (
							'rule' => 'email',
							'message' => 'Invalid email address' 
					),
					'uniqueEmailRule' => array (
							'rule' => 'isUnique',
							'message' => 'Email already registered' 
					) 
			),
			'password' => array (
					'required' => array (
							'rule' => array (
									'notEmpty' 
							),
							'message' => 'A password is required' 
					),
					'lunghezza'=>array(
							'rule' => array('minLength', '8'),
							'message' => 'La password deve contenere minimo 8 caratteri'
					)
			),
			
			'role' => array (
					'valid' => array (
							'rule' => array (
									'inList',
									array (
											'admin',
											'user' 
									) 
							),
							'message' => 'Please enter a valid role',
							'allowEmpty' => false 
					) 
			) 
	);
	public $hasMany = array (
			'UsersToPoint' => array (
					'className' => 'PointsUser',
					'foreignKey' => 'user_id',
					'dependent' => false,
					'conditions' => '',
					'fields' => '',
					'order' => '',
					'limit' => '',
					'offset' => '',
					'exclusive' => '',
					'finderQuery' => '',
					'counterQuery' => '' 
			),		
			'Refus' => array (
					'className' => 'Refus',
					'foreignKey' => 'user_id',
					'dependent' => false,
					'conditions' => '',
					'fields' => '',
					'order' => '',
					'limit' => '',
					'offset' => '',
					'exclusive' => '',
					'finderQuery' => '',
					'counterQuery' => '',
					'order'=>'created DESC'
			)
	);
	
	
	/*public $hasAndBelongsToMany = array(
			'Point' =>
			array(
					'className' => 'Point',
					'joinTable' => 'points_users',
					'foreignKey' => 'user_id',
					'associationForeignKey' => 'point_id',
					'unique' => true,
					'conditions' => '',
					'fields' => '',
					'order' => '',
					'limit' => '',
					'offset' => '',
					'finderQuery' => '',
					'with' => ''
			)
	);*/
	
	
}
