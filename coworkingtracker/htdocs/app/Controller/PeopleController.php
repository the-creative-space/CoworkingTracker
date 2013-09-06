<?php
App::uses('AppController', 'Controller');
App::uses('RequestHandlerComponent', 'Controller/Component');
/**
 * People Controller
 *
 * @property Person $Person
 */
class PeopleController extends AppController {
	public $components = array(
		'RequestHandler',
	);

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Person->recursive = 0;	
		$this->set('people', $this->paginate());
	}
	
	public function get_membership() {
		$this->Person->recursive = 0;
		if (isset($this->request->params['membership_id'])) {
			$this->set('people', $this->Person->find('list',
				array(
					'conditions' => array('membership_id' => $this->request->params['membership_id']),
					'recursive' => -1,
				)
			));
		} else {
			$this->set('people', $this->paginate());
		}
		$this->set('_serialize', array('people'));	
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Person->exists($id)) {
			throw new NotFoundException(__('Invalid person'));
		}
		$options = array('conditions' => array('Person.' . $this->Person->primaryKey => $id));
		$this->set('person', $this->Person->find('first', $options));
	}
	
/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Person->create();
			if ($this->Person->save($this->request->data)) {
				$this->flash(__('Person saved.'), array('action' => 'index'));
			} else {
			}
		}
		$memberships = $this->Person->Membership->find('list');
		$this->set(compact('memberships'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Person->exists($id)) {
			throw new NotFoundException(__('Invalid person'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Person->save($this->request->data)) {
				$this->flash(__('The person has been saved.'), array('action' => 'index'));
			} else {
			}
		} else {
			$options = array('conditions' => array('Person.' . $this->Person->primaryKey => $id));
			$this->request->data = $this->Person->find('first', $options);
		}
		$memberships = $this->Person->Membership->find('list');
		$this->set(compact('memberships'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Person->id = $id;
		if (!$this->Person->exists()) {
			throw new NotFoundException(__('Invalid person'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Person->delete()) {
			$this->flash(__('Person deleted'), array('action' => 'index'));
		}
		$this->flash(__('Person was not deleted'), array('action' => 'index'));
		$this->redirect(array('action' => 'index'));
	}
}
