<?php 

namespace WebSite\Model;

class ScootersInBornes {

	private $_conn;

	public function __construct(\Doctrine\DBAL\Connection $dbal) {
		$this->_conn = $dbal;
	}

	public function getScooters($id) {

		$statement = $this->_conn->prepare('SELECT *
            FROM trottinette WHERE id_bornes = :id');
        $statement->execute(array(":id" => $id));
        return $statement->fetchAll();
        
	}
}