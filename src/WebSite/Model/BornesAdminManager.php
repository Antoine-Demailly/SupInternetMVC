<?php

namespace WebSite\Model;

class BornesAdminManager {

	private $_conn;

	public function __construct(\Doctrine\DBAL\Connection $dbal) {
		$this->_conn = $dbal;
	}

	public function getBornes() {
		$request = $this->_conn->prepare('SELECT  * FROM bornes;');
		$request->execute();
		$result = $request->fetchAll();

		if (!empty($result)) {
			return $result;
		}
		return false;
	}

	public function getBornesById($id) {
		$request = $this->_conn->prepare('SELECT  * FROM bornes WHERE id = :id;');
		$request->execute([
				'id' => $id
			]);
		$result = $request->fetch();

		if (!empty($result)) {
			return $result;
		}
		return false;
	}
}