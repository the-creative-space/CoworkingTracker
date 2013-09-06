<?php
App::uses('AppController', 'Controller');
/**
 * Memberships Controller
 *
 * @property Membership $Membership
 */
class MembershipsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Membership->recursive = 0;
		$this->set('memberships', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Membership->exists($id)) {
			throw new NotFoundException(__('Invalid membership'));
		}
		$options = array('conditions' => array('Membership.' . $this->Membership->primaryKey => $id));
		$this->set('membership', $this->Membership->find('first', $options));
	}
	
/**
 * List the connections on a certain day
 * @return void
 *
 */
	public function list_by_day() {
		if (isset($this->request->params['get_date'])) {
			$dayStart = $this->request->params['get_date'] . ' 00:00:00';
			$dayEnd = $this->request->params['get_date'] . ' 23:59:59.999';
			$niceTime = $this->request->params['get_date'];
		} else {
			$dayStart = date("Y-m-d ") . '00:00:00';
			$dayEnd = date("Y-m-d ") . '23:59:59.999';
			$niceTime = date("Y-m-d");
		}
		if (isset($this->request->params['membership_id']) && $this->request->params['membership_id'] >= '0') {
			$conditions = array(
				'Membership.id = Person.membership_id',
				'Membership.id = ' . $this->request->params['membership_id'],
			);
			$memberId = $this->request->params['membership_id'];
		} else {
			$conditions = array(
				'Membership.id = Person.membership_id',
			);
			$memberId = '$';
		}
		//pr($dayStart);
		$connections = $this->Membership->Person->Device->Connection->find('all', array(
			'conditions' => array(
				'Connection.start_time >=' => $dayStart,
				'Connection.start_time <=' => $dayEnd,
			),
			'fields' => array(
						'*',
						'SUM(TIMESTAMPDIFF(SECOND, Connection.start_time, Connection.end_time)) AS Seconds',
						'COUNT(DISTINCT Device.id) AS DeviceCount',
				),
			'joins' => array(
				array ('table' => 'devices',
					'alias' => 'Device',
					'type' => 'INNER',
					'conditions' => array(
						'Device.person_id !=' => null,
						'Device.id = Connection.device_id',
					),
				),
				array ('table' => 'people',
					'alias' => 'Person',
					'type' => 'INNER',
					'conditions' => array(
						'Person.id = Device.person_id',
					),
				),
				array ('table' => 'memberships',
					'alias' => 'Membership',
					'type' => 'INNER',
					'conditions' => $conditions,
				),
			),
			'group' => array(
				'Person.id',
			),
			'order' => array(
				'Membership.id',
			),
			'recursive' => -1,
		));
		$settings = $this->Membership->find('list', array(
			'conditions' => array(),
			'fields'     => array('Membership.id', 'Membership.name'),
		));
		//pr($settings);
		$memberCheck = '';
		if ($memberId >= 0) {
			foreach ($settings as $key => $value):
				if ($key == $memberId) {
					$memberCheck = 'made by ' . $value;
				}
			endforeach;
		} 
		$this->set(compact('connections', 'niceTime', 'settings', 'memberId', 'memberCheck'));
	}
/**
 * List the connections on a certain month of the year
 * @return void
 *
 */
	public function list_by_month() {
		if (isset($this->request->params['year'])) {
			$niceYear = $this->request->params['year'];
		} else {
			$niceYear = date("Y");
		}
		if (isset($this->request->params['month'])) {
			$niceMonth = $this->request->params['month'];
		} else {
			$niceMonth = date("m");
		}
		if (isset($this->request->params['membership_id']) && $this->request->params['membership_id'] >= '0') {
			$conditions = array(
				'Membership.id = Person.membership_id',
				'Membership.id = ' . $this->request->params['membership_id'],
			);
			$memberId = $this->request->params['membership_id'];
		} else {
			$conditions = array(
				'Membership.id = Person.membership_id',
			);
			$memberId = '$';
		}
		//pr($dayStart);
		$connections = $this->Membership->Person->Device->Connection->find('all', array(
			'conditions' => array(
				'DATE_FORMAT(Connection.start_time, '.'"%Y"'.')' => $niceYear,
				'DATE_FORMAT(Connection.start_time, '.'"%m"'.')' => $niceMonth,
			),
			'fields' => array(
						'*',
						'SUM(TIMESTAMPDIFF(SECOND, Connection.start_time, Connection.end_time)) AS Seconds',
						'COUNT(DISTINCT Device.id) AS DeviceCount',			
				),
			'joins' => array(
				array ('table' => 'devices',
					'alias' => 'Device',
					'type' => 'INNER',
					'conditions' => array(
						'Device.person_id !=' => null,
						'Device.id = Connection.device_id',
					),
				),
				array ('table' => 'people',
					'alias' => 'Person',
					'type' => 'INNER',
					'conditions' => array(
						'Person.id = Device.person_id',
					),
				),
				array ('table' => 'memberships',
					'alias' => 'Membership',
					'type' => 'INNER',
					'conditions' => $conditions,
				),
			),
			'group' => array(
				'Person.id',
			),
			'order' => array(
				'Membership.id',
			),
			'recursive' => -1,
		));
		$settings = $this->Membership->find('list', array(
			'conditions' => array(),
			'fields'     => array('Membership.id', 'Membership.name'),
		));
		$monthArray = array('January', 'Febuary', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
		$monthName = $monthArray[$niceMonth - 1];
		//pr($monthArray);
		$memberCheck = '';
		if ($memberId >= 0) {
			foreach ($settings as $key => $value):
				if ($key == $memberId) {
					$memberCheck = 'made by ' . $value;
				}
			endforeach;
		} 
		$this->set(compact('connections', 'niceYear', 'niceMonth', 'monthName', 'settings', 'memberId', 'memberCheck'));
	}
/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Membership->create();
			if ($this->Membership->save($this->request->data)) {
				$this->flash(__('Membership saved.'), array('action' => 'index'));
			} else {
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Membership->exists($id)) {
			throw new NotFoundException(__('Invalid membership'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Membership->save($this->request->data)) {
				$this->flash(__('The membership has been saved.'), array('action' => 'index'));
			} else {
			}
		} else {
			$options = array('conditions' => array('Membership.' . $this->Membership->primaryKey => $id));
			$this->request->data = $this->Membership->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Membership->id = $id;
		if (!$this->Membership->exists()) {
			throw new NotFoundException(__('Invalid membership'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Membership->delete()) {
			$this->flash(__('Membership deleted'), array('action' => 'index'));
		}
		$this->flash(__('Membership was not deleted'), array('action' => 'index'));
		$this->redirect(array('action' => 'index'));
	}
}
