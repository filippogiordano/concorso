<?php
App::uses ( 'AppController', 'Controller' );
App::uses ( 'CakeEmail', 'Network/Email' );
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {
	public function beforeFilter() {
		parent::beforeFilter ();
		// Allow users to register and logout.
		$this->Auth->allow ( 'add', 'logout' );
	}
	public function login() {
		if ($this->request->is ( 'post' )) {
			if ($this->Auth->login ()) {
				return $this->redirect ( $this->Auth->redirect () );
			}
			$this->Session->setFlash ( __ ( 'Invalid username or password, try again' ) );
		}
	}
	public function logout() {
		// $this->redirect(array('controller'=>'pages','action'=>'index','admin'=>0));
		return $this->redirect ( $this->Auth->logout () );
	}
	
	/*
	 * public function admin_logout() {
	 * return $this->redirect(array('controller'=>'Users','action'=>'logout', 'admin'=>0));
	 * }
	 */
	
	/*
	 * public function beforeFilter() {
	 * parent::beforeFilter();
	 * $this->Auth->allow('add');
	 * }
	 */
	/**
	 * Components
	 *
	 * @var array
	 */
	public $components = array (
			'Paginator',
			'Password' 
	);
	
	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		if ($this->isAdmin ( $this->Auth->user () )) {
			$this->redirect ( array (
					'action' => 'admin_index',
					'admin' => 1 
			) );
		} else {
			$this->redirect ( array (
					'action' => 'edit' 
			) );
		}
	}
	public function admin_index() {
		$this->User->recursive = 0;
		$this->Paginator->settings = array (
				'sort' => 'nominativo' 
		);
		$this->set ( 'users', $this->Paginator->paginate () );
	}
	
	/**
	 * view method
	 *
	 * @throws NotFoundException
	 * @param string $id        	
	 * @return void
	 */
	public function view($id = null) {
		if (! $this->User->exists ( $id ) or ! ($id === $this->Auth->user ()['id'])) {
			$this->redirect ( array (
					'controller' => 'pages',
					'action' => 'home' 
			) );
		}
		$options = array (
				'conditions' => array (
						'User.' . $this->User->primaryKey => $id 
				) 
		);
		$this->set ( 'user', $this->User->find ( 'first', $options ) );
	}
	public function admin_view($id = null) {
		if (! $this->User->exists ( $id )) {
			throw new NotFoundException ( __ ( 'Invalid user' ) );
		}
		$options = array (
				'conditions' => array (
						'User.' . $this->User->primaryKey => $id 
				) 
		);
		$this->set ( 'user', $this->User->find ( 'first', $options ) );
	}
	
	/**
	 * add method
	 *
	 * @return void
	 */
	public function admin_add() {
		if ($this->request->is ( 'post' )) {
			$this->User->create ();
			$this->request->data ['User'] ['password'] = $this->Password->generatePassword ();
			if ($this->User->save ( $this->request->data )) {
				$this->Session->setFlash ( "L'utente e' stato creato" );
				$Email = new CakeEmail ( 'gmail' );
				$Email->from ( array (
						'giordanofilippo@gmail.com' => 'Concorso MEF' 
				) );
				$Email->to ( $this->request->data ['User'] ['username'] );
				$Email->subject ( 'Applicazione Concorso Mef - credenziali' );
				$Email->emailFormat ( 'html' );
				$Email->charset = "utf-8";
				$Email->send ( "Ciao " . ucwords ( $this->request->data ['User'] ['nome'] . " " . $this->request->data ['User'] ['cognome'] ) . ",<BR>
				adesso puoi ad accedere al sistema per prepararti al concorso e mettere alla prova la tua cultura<BR>
				Le tue credenziali sono:<BR>
				- username: <strong>" . $this->request->data ['User'] ['username'] . "</strong><BR>
				- password: <strong>" . $this->request->data ['User'] ['password'] . "</strong><BR>
				Per accedere all'applicazione clicca <a href='http://10.10.8.169/gestrif/users/login'>qui</a>.<BR> 
				Ti consiglio di cambiare la password sin dal primo accesso cliccando su home->cambio password.<BR>
				Le passwords devono contenere almeno 8 caratteri alfanumerici.<BR>
				BUON LAVORO!!!<BR>" );
				return $this->redirect ( array (
						'action' => 'index' 
				) );
			} else {
				$this->Session->setFlash ( __ ( 'The user could not be saved. Please, try again.' ) );
			}
		}
	}
	public function edit() {
		$user = $this->Session->read ( 'Auth.User' );
		$id = $user ['id'];
		$username=$user ['username'];
		$usernom = ucwords ( $user ['nominativo'] );
		$this->set ( 'usernom', $usernom );
		if (! $this->User->exists ( $id )) {
			throw new NotFoundException ( __ ( 'Invalid user' ) );
		}
		if ($this->request->is ( array (
				'post',
				'put' 
		) )) {
			if ($this->request->data ['User'] ['controllo'] == $this->request->data ['User'] ['password']) {
				$this->request->data ['User'] ['id'] = $id;
				$this->request->data ['User'] ['username'] = $username;
				if ($this->User->save ( $this->request->data )) {
					$this->Session->setFlash ( __ ( 'The password has been changed. Login using the new one.' ) );
					return $this->redirect ( array (
							'action' => 'logout' 
					) );
					// debug($tmp,true);
				} else {
					$this->Session->setFlash ( __ ( 'The user could not be saved. Please, try again.' ) );
				}
			} else {
				$this->Session->setFlash ( __ ( 'The passwords are not the same. Please, try again.' ) );
				return $this->redirect ( array (
						'action' => 'edit' 
				) );
			}
		} else {
			$options = array (
					'conditions' => array (
							'User.' . $this->User->primaryKey => $id 
					) 
			);
			$this->request->data = $this->User->find ( 'first', $options );
		}
	}
	/**
	 * edit method
	 *
	 * @throws NotFoundException
	 * @param string $id        	
	 * @return void
	 */
	public function admin_edit($id = null) {
		if (! $this->User->exists ( $id )) {
			throw new NotFoundException ( __ ( 'Invalid user' ) );
		}
		if ($this->request->is ( array (
				'post',
				'put' 
		) )) {
			$this->request->data ['User'] ['password'] = $this->Password->generatePassword ();
			if ($this->User->save ( $this->request->data )) {
				$this->Session->setFlash ( "L'utente e' stato salvato" );
				$Email = new CakeEmail ( 'asptrapani' );
				$Email->from ( array (
						'gestionerifiuti@asptrapani.it' => 'Gestione Rifiuti' 
				) );
				$Email->to ( $this->request->data ['User'] ['username'] );
				$Email->emailFormat ( 'html' );
				$Email->charset = "utf-8";
				$Email->subject ( 'Applicazione Concorso Mef - Gestione credenziali di accesso' );
				$Email->send ( "Ciao " . ucwords ( $this->request->data ['User'] ['nome'] . " " . $this->request->data ['User'] ['cognome'] ) . ",<BR>
				i tuoi dati di accesso al sistema sono stati aggiornati dall'amministratore.<BR>
				Le tue nuove credenziali sono:<BR>
				- username: <strong>" . $this->request->data ['User'] ['username'] . "</strong><BR>
				- password: <strong>" . $this->request->data ['User'] ['password'] . "</strong><BR>
				Per accedere all'applicazione clicca <a href='http://10.10.8.169/gestrif/users/login'>qui</a>.<BR> 
				Si consiglia di cambiare la password sin dal primo accesso cliccando su home->cambio password.<BR>
				Le passwords devono contenere almeno 8 caratteri alfanumerici.<BR>
				BUON LAVORO!!!<BR>" );
				return $this->redirect ( array (
						'action' => 'index' 
				) );
			} else {
				$this->Session->setFlash ( __ ( 'The user could not be saved. Please, try again.' ) );
			}
		} else {
			$options = array (
					'conditions' => array (
							'User.' . $this->User->primaryKey => $id 
					) 
			);
			$this->request->data = $this->User->find ( 'first', $options );
		}
	}
	
	/**
	 * delete method
	 *
	 * @throws NotFoundException
	 * @param string $id        	
	 * @return void
	 */
	public function admin_delete($id = null) {
		$this->User->id = $id;
		if (! $this->User->exists ()) {
			throw new NotFoundException ( __ ( 'Invalid user' ) );
		}
		$this->request->allowMethod ( 'post', 'delete' );
		if ($this->User->delete ()) {
			$this->Session->setFlash ( __ ( 'The user has been deleted.' ) );
		} else {
			$this->Session->setFlash ( __ ( 'The user could not be deleted. Please, try again.' ) );
		}
		return $this->redirect ( array (
				'action' => 'index' 
		) );
	}
}
