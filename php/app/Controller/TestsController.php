<?php
App::uses ( 'AppController', 'Controller' );

class TestsController extends AppController {
	public $components = array (
			'Paginator' 
	);
		
	public function index($count=0) {
		$u=$this->Auth->user ();
		if ($u) {
			$this->loadModel('Memory');
			//debug($memoria);
			$this->loadModel('Question');
			//togliere count
			$memoria=$this->Memory->find('first',array('conditions'=>array('user_id'=>$u['id'])));
			$qorder=explode(',', $memoria['Memory']['qorder']);
			//debug($qorder);
			$tot=count($qorder);
			$this->Session->read('Test.order');
			$order=range('a', 'c');
			if (!$this->Session->check('Test.order', $order)){
				shuffle($order);
				$this->Session->write('Test.order', $order);
			} else {
				$order=$this->Session->read('Test.order');
			}
			$selected=null;
			if (! $this->passedArgs == null) {
				if (array_key_exists ( 'selected', $this->passedArgs )){
					$selected = $this->passedArgs ['selected'];
				}
			}
			if ($this->request->is ( 'post' )) {
				$this->Question->create ();
				$memoria=$this->Memory->find('first',array('conditions'=>array('user_id'=>$u['id'])));
				if ($this->request->data ['Question'] ['risposta'] == "a"){
					if ($memoria['Memory']['count']+1<$tot ) {
						$memoria['Memory']['points']++;
						$memoria['Memory']['count']++;
						$this->Memory->save($memoria['Memory']);
						shuffle($order);
						$this->Session->write('Test.order',$order);
						return $this->redirect ( array (
								'action' => 'index',
						) );
					} else {
						$this->Session->setFlash ( __ ( 'Hai finito il test' ) );
					}
				} else {
					$memoria['Memory']['points']=$memoria['Memory']['points']-3;
					$this->Memory->save($memoria['Memory']);
					$this->Session->setFlash ( __ ( 'Risposta errata' ) );
				}
			}
			$test=$this->Question->findById($qorder[$memoria['Memory']['count']]);
			$answers=$this->Question->find('first',array('fields'=>array('a','b','c')));
			$answers=$answers['Question'];
			$points=$memoria['Memory']['points'];
			$domandan=$memoria['Memory']['count'];
			$this->set(compact('test','answers','order','selected','points','domandan','tot'));
			//debug($selected);
		}  else {
					$this->redirect ( array (
							'controller'=>'users',
							'action' => 'login' 
					) );
				}
	}
	
	

}
