<?php
App::uses('AppController', 'Controller');
/**
 * Devices Controller
 *
 * @property Device $Device
 */
class DevicesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Device->recursive = 0;
		$this->set('devices', $this->paginate());
	}
	
/**
  * Check if there are device's without a person link to it
  * @return void
  *
  */
	public function new_devices() {
		$newDevices = $this->Device->find('all', array(
			'conditions' => array(
				'Device.person_id' => null,				
			),
			'fields' => array(
						'Device.id',
						'Device.mac',
						'Connection.start_time',
						'Connection.end_time',
					),
			'joins' => array(
				array(
					'table' => 'connections',
					'alias' => 'Connection',
					'type' => 'INNER',
					'conditions' => array(
						'Connection.device_id = Device.id',
					),	
				),
			),
			'group' =>array(
				'Device.id HAVING MAX(Connection.start_time)',
			),
			'recursive' => -1,
		));
		//pr($newDevices);
		$this->set(compact('newDevices'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Device->exists($id)) {
			throw new NotFoundException(__('Invalid device'));
		}
		$options = array('conditions' => array('Device.' . $this->Device->primaryKey => $id));
		$this->set('device', $this->Device->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Device->create();
			if ($this->Device->save($this->request->data)) {
				$this->flash(__('Device saved.'), array('action' => 'index'));
			} else {
			}
		}
		$people = $this->Device->Person->find('list');
		$this->set(compact('people'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Device->exists($id)) {
			throw new NotFoundException(__('Invalid device'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Device->save($this->request->data)) {
				//$last = $this->Person->getLastInsertId();
				$this->flash(__('The device has been saved.'), array('action' => 'index'));
			} else {
				if($this->request->data['Person']['membership_id'] == "create") {
					$this->Device->Person->Membership->create();
					$data =	$this->request->data['Membership'];									
					$this->Device->Person->Membership->save($data, $validate = false);
					$this->request->data['Person']['membership_id'] =  $this->Device->Person->Membership->id;
				} 
				
				if($this->request->data['Device']['person_id'] == "create") {
					$this->Device->Person->create();
					$data = $this->request->data['Person'];
					$this->Device->Person->save($data, $validate = false);
					$this->request->data['Device']['person_id'] =  $this->Device->Person->id;
				}
				
				$this->Device->create();
				$data = $this->request->data['Device'];
				$this->Device->save($data, $validate = false);
				$this->flash(__('The data has been saved.'), array('action' => 'index'));				
			}
		} else {
			$options = array('conditions' => array('Device.' . $this->Device->primaryKey => $id));
			$this->request->data = $this->Device->find('first', $options);
		}
		$people = $this->Device->Person->find('list');
		$memberships = $this->Device->Person->Membership->find('list');
		
		$this->set(compact('people', 'memberships'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Device->id = $id;
		if (!$this->Device->exists()) {
			throw new NotFoundException(__('Invalid device'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Device->delete()) {
			$this->flash(__('Device deleted'), array('action' => 'index'));
		}
		$this->flash(__('Device was not deleted'), array('action' => 'index'));
		$this->redirect(array('action' => 'index'));
	}

}
