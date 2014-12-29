<?php
App::uses ( 'AppController', 'Controller' );

class SelectsController extends AppController {
	public $components = array (
			'Paginator' 
	);
	
	public function index() {
		if ($this->Auth->user () ) {
			$this->loadModel('Question');
			$choices=$this->Question->find('list',array('fields'=>'materia', 'group'=>'materia'));
			$this->set('choices',$choices);
		}
	}
	
	public function initialize($materia) {
		//$this->render('index','default');
		$u=$this->Auth->user ();
		if ($u and isset($materia) ) {
			$this->loadModel('Question');
			$qorder=$this->Question->find('list',array('fields'=>'id','conditions'=>array('materia'=>$materia)));
			shuffle($qorder);
			$qorder=(implode(",", $qorder));
			$this->loadModel('Memory');
			
			$this->Memory->deleteAll(array('user_id'=>$u['id']));
			
			$record=array('Memory'=>array('qorder'=>$qorder,'user_id'=>$u['id'],'count'=>0,'points'=>0));
			if($this->Memory->save($record)){
				$this->redirect(array('controller'=>'tests','action'=>'index'));
			} else {
				$this->Session->setFlash("Errore di sistema!!!");
				$this->redirect(array('action'=>'index'));
			}
		}
	}

}
