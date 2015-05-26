<?php 

namespace WebSite\Model;

class Dashboard {

	private $_conn;

	public function __construct(\Doctrine\DBAL\Connection $dbal) {
		$this->_conn = $dbal;
	}

	public function getDashboard() {

        $statement = $this->_conn->prepare('SELECT COUNT(*) AS count FROM users');
        $statement->execute();
        $customers = $statement->fetch();

        $statement = $this->_conn->prepare('SELECT COUNT(*) AS count FROM session WHERE statut = 0');
        $statement->execute();
        $sessions = $statement->fetch();

        $statement = $this->_conn->prepare('SELECT COUNT(*) AS count FROM bornes');
        $statement->execute();
        $bornes = $statement->fetch();

        $statement = $this->_conn->prepare('SELECT COUNT(*) AS count FROM maintenance');
        $statement->execute();
        $maintenance = $statement->fetch();

        return [
            'customers' => $customers,
            'sessions' => $sessions,
            'bornes' => $bornes,
            'maintenance' => $maintenance
        ];

	}
}