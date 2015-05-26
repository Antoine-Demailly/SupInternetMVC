<?php

namespace WebSite\Model;

class ScootersAdminManager {

	private $_conn;

	public function __construct(\Doctrine\DBAL\Connection $dbal) {
		$this->_conn = $dbal;
	}

	public function getActiveScooters() {
		$request = $this->_conn->prepare('SELECT * FROM trottinette WHERE statut = 2');
		$request->execute();
		$result = $request->fetchAll();

		if (!empty($result)) {
			return $result;
		}
		return false;

	}

	public function getInactiveScooters() {
		$request = $this->_conn->prepare('SELECT * FROM trottinette WHERE statut = 0');
		$request->execute();
		$result = $request->fetchAll();

		if (!empty($result)) {
			return $result;
		}
		return false;
	}

	public function getMaintenanceScooters() {
		$request = $this->_conn->prepare('SELECT * FROM trottinette WHERE statut = 1');
		$request->execute();
		$result = $request->fetchAll();

		if (!empty($result)) {
			return $result;
		}
		return false;
	}

}