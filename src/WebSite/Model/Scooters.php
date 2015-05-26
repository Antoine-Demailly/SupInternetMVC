<?php 

namespace WebSite\Model;

class Scooters {

	private $_conn;

	public function __construct(\Doctrine\DBAL\Connection $dbal) {
		$this->_conn = $dbal;
	}

	public function getScooters($id) {

		$statement = $this->_conn->prepare('SELECT *
            FROM trottinette WHERE id = :id');
        $statement->execute(array(":id" => $id));
        $scooters = $statement->fetch();

        if ($scooters) {
        	$statement = $this->_conn->prepare('SELECT *
            FROM bornes WHERE id = :id');
	        $statement->execute(array(":id" => $scooters['id_bornes']));
	        $bornes = $statement->fetch();
        }

        return [
        	'scooters' => $scooters,
        	'bornes' => $bornes
        ];
        
        
	}
}