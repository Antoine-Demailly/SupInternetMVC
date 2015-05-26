<?php

namespace WebSite\Controller;

use WebSite\Model\UserManager;
use WebSite\Model\CustomersAdminManager;
use WebSite\Model\ScootersAdminManager;
use WebSite\Model\Search;

abstract class AbstractBaseController {

	protected $router;
	protected $config;

	public function __construct(\WebSite\Model\Router $router, $config) {
		$this->router = $router;
		$this->config = $config;
	}

	protected function getConnection() {
		return \Doctrine\DBAL\DriverManager::getConnection($this->config['doctrine'], new \Doctrine\DBAL\Configuration());
	}

}