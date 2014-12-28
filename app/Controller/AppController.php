<?php

/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses ( 'Controller','Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	public $components = array (
			'Session',
			'Auth' => array (
					'loginRedirect' => array (
							'controller' => 'pages',
							'action' => 'display' 
					),
					'logoutRedirect' => array (
							'controller' => 'pages',
							'action' => 'display'
							//'home' 
					),
					'authenticate' => array(
							'Form' => array(
									'userModel' => 'User',
									'passwordHasher' => 'Blowfish'
							)
					),
					'authorize' => array (
							'Controller' 
					) 
			) 
	); // Added this line
	
	public function beforeRender(){
	
		/*$id = $this->Auth->user('idUser');
	
		$this->loadModel('Userinfo');
		$data= $this->Userinfo->find('all',array(
				'conditions' => array('Userinfo.User_id' => $id)
		));
	
		foreach($data as $d){
			$product_purchase = $d['Userinfo']['product_purchase'];
		}*/
		//$this->Session->
		//$this->set('ciccio',$this->Auth-> user('name'));//$product_purchase);
	}
	
	public function isAuthorized($user) {
		// Admin can access every action
		if (isset ( $user ['role'] ) && ($user ['role'] === 'admin' or $user ['role'] === 'user')) {
			return true;
		}
		
		// Default deny
		return false;
	}
	
	public function isAdmin($user) {
		// Admin can access every action
		if (isset ( $user ['role'] ) && $user ['role'] === 'admin') {
			return true;
		}
	
		// Default deny
		return false;
	}
	
	public function afterFilter(){
		$this->Session->delete('tmparray');
	}
	
	// abilita tutti gli utenti alle view index e view
	public function beforeFilter() {
		$this->Auth->allow ( 'display','logout');//'index', 'view','add','delete'
	}
	// per il logout
	/*public function logout() {
		if ($this->Auth->user ()) {
			$this->redirect ( $this->Auth->logout () );
			$this->Session->setFlash ( "L\'utente è uscito regolarmente!" );
		} else {
			$this->redirect ( array (
					'controller' => 'pages',
					'action' => 'display',
					'home' 
			) );
			$this->Session->setFlash ( __ ( 'Not logged in' ), 'default', array (), 'auth' );
		}
	}*/
	
	public function user_for_filtering() {
		$user=$this->Session->read ( 'Auth.User' );
		$u_id='';
		if (! empty ( $user )) {
		//debug($user);
			if ($user['role']=='admin'){
				$u_id='%';
			}	else {
				$u_id=$user['id'];
			}
		}
		return $u_id;
	}
}
