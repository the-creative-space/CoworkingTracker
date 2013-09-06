<?php
App::uses('AppController', 'Controller');
/**
 * Connections Controller
 *
 * @property Connection $Connection
 */
class ConnectionsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Connection->recursive = 0;
		$this->set('connections', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Connection->exists($id)) {
			throw new NotFoundException(__('Invalid connection'));
		}
		$options = array('conditions' => array('Connection.' . $this->Connection->primaryKey => $id));
		$this->set('connection', $this->Connection->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Connection->create();
			if ($this->Connection->save($this->request->data)) {
				$this->flash(__('Connection saved.'), array('action' => 'index'));
			} else {
			}
		}
		$devices = $this->Connection->Device->find('list');
		$this->set(compact('devices'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Connection->exists($id)) {
			throw new NotFoundException(__('Invalid connection'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Connection->save($this->request->data)) {
				$this->flash(__('The connection has been saved.'), array('action' => 'index'));
			} else {
			}
		} else {
			$options = array('conditions' => array('Connection.' . $this->Connection->primaryKey => $id));
			$this->request->data = $this->Connection->find('first', $options);
		}
		$devices = $this->Connection->Device->find('list');
		$this->set(compact('devices'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Connection->id = $id;
		if (!$this->Connection->exists()) {
			throw new NotFoundException(__('Invalid connection'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Connection->delete()) {
			$this->flash(__('Connection deleted'), array('action' => 'index'));
		}
		$this->flash(__('Connection was not deleted'), array('action' => 'index'));
		$this->redirect(array('action' => 'index'));
	}
}
