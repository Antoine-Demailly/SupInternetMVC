<?php 

namespace WebSite\Model;

class Maintenances {

	private $_conn;

	public function __construct(\Doctrine\DBAL\Connection $dbal) {
		$this->_conn = $dbal;
	}

	public function getMaintenances() {
        $statement = $this->_conn->prepare('SELECT * FROM maintenance
        	INNER JOIN trottinette ON maintenance.id_trottinette = trottinette.id');
        $statement->execute();
        $customers = $statement->fetchAll();

        return $customers;
	}
}