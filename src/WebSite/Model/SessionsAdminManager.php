<?php

namespace WebSite\Model;

class SessionsAdminManager {

	private $_conn;

	public function __construct(\Doctrine\DBAL\Connection $dbal) {
		$this->_conn = $dbal;
	}

	public function getActiveSessions() {
		$request = $this->_conn->prepare('SELECT * FROM session 
			INNER JOIN users ON session.id_users = users.id
			INNER JOIN bornes ON session.id_bornes_depart = bornes.id
			INNER JOIN trottinette ON session.id_trottinette = trottinette.id');
		$request->execute();
		$result = $request->fetchAll();

		if (!empty($result)) {
			return $result;
		}
		return false;

	}

}