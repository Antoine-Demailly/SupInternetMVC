<?php

namespace WebSite\Model;

class CustomersAdminManager {

	private $_conn;

	public function __construct(\Doctrine\DBAL\Connection $dbal) {
		$this->_conn = $dbal;
	}

	public function getActiveCustomers() {
		$request = $this->_conn->prepare('SELECT id,nom,prenom,email,adresse,code_postal,ville,date_inscription,statut FROM users WHERE statut = 2');
		$request->execute();
		$result = $request->fetchAll();

		if (!empty($result)) {
			return $result;
		}
		return false;

	}

	public function getInactiveCustomers() {
		$request = $this->_conn->prepare('SELECT id,nom,prenom,email,adresse,code_postal,ville,date_inscription,statut FROM users WHERE statut = 1');
		$request->execute();
		$result = $request->fetchAll();

		if (!empty($result)) {
			return $result;
		}
		return false;
	}

	public function getSubscriptionCustomers() {
		$request = $this->_conn->prepare('SELECT id,nom,prenom,email,adresse,code_postal,ville,date_inscription,statut FROM users WHERE statut = 0');
		$request->execute();
		$result = $request->fetchAll();

		if (!empty($result)) {
			return $result;
		}
		return false;
	}

}