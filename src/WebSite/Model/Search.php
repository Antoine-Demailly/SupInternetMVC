<?php 

namespace WebSite\Model;

class Search {

	private $_conn;

	public function __construct(\Doctrine\DBAL\Connection $dbal) {
		$this->_conn = $dbal;
	}

	// public function getSearch($s) {

	// 	$statement = $this->_conn->prepare('SELECT *
 //            FROM data_search WHERE MATCH(mot_cle,nom_champ) AGAINST (:req IN BOOLEAN MODE);');
 //        $statement->execute(array(":req" => $s));
 //        return $statement->fetchAll();
        
	// }

	public function getSearch($s) {

		$statement = $this->_conn->prepare('SELECT *
            FROM data_search WHERE mot_cle LIKE :req OR nom_champ LIKE :req ');
        $statement->execute(array(":req" => '%'.$s.'%'));
        return $statement->fetchAll();
        
	}
}