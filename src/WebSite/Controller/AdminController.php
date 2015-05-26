<?php

namespace WebSite\Controller;

use WebSite\Model\MessageFlash;
use WebSite\Model\BornesAdminManager;
use WebSite\Model\SessionsAdminManager;
use WebSite\Model\CustomersAdminManager;
use WebSite\Model\ScootersAdminManager;
use WebSite\Model\Dashboard;
use WebSite\Model\Maintenances;

/**
 * Class AdminController
 *
 * Controller of all Admin actions
 *
 * @package Website\Controller
 */

class AdminController extends AbstractBaseController {

 
	public function dashboardAction($request) {
		if (empty($request['session']['id'])) {
    		return [
            	'redirect_to' => $this->router->generateUrl('home')
        	];
    	}

        $dashboard = new Dashboard($this->getConnection());
        $dashboardInfo = $dashboard->getDashboard();

    	return [
    		'html_view' => 'WebSite/View/admin/dashboard.html.php',
    		'page_author' => 'Antoine Demailly',
    		'page_description' => 'Interface d\'administration de Trottilib.fr - Tableau de bord',
    		'page_title' => 'Trottilib - Interface d\'adminisration - Tableau de bord',
            'customers' => $dashboardInfo['customers'],
            'sessions' => $dashboardInfo['sessions'],
            'bornes' => $dashboardInfo['bornes'],
            'maintenance' => $dashboardInfo['maintenance']
    	];
	}

    public function sessionsAction($request) {
        if (empty($request['session']['id'])) {
            return [
                'redirect_to' => $this->router->generateUrl('home',['user' => 'toto','id'=>5])
            ];
        }

        $sessions = new SessionsAdminManager($this->getConnection());
        $sessionsResults = $sessions->getActiveSessions();

        return [
            'html_view' => 'WebSite/View/admin/sessions.html.php',
            'page_author' => 'Antoine Demailly',
            'page_description' => 'Interface d\'administration de Trottilib.fr - Sessions',
            'page_title' => 'Trottilib - Interface d\'adminisration - Sessions',
            'sessions' => $sessionsResults,
        ];
    }


    public function customersAction($request) {
        if (empty($request['session']['id'])) {
            return [
                'redirect_to' => $this->router->generateUrl('home')
            ];
        }

        $customersManager = new CustomersAdminManager($this->getConnection());
        $activeCustomers = $customersManager->getActiveCustomers();
        $inactiveCustomers = $customersManager->getInactiveCustomers();
        $subscriptionCustomers = $customersManager->getSubscriptionCustomers();

        return [
            'html_view' => 'WebSite/View/admin/customers.html.php',
            'page_author' => 'Antoine Demailly',
            'page_description' => 'Interface d\'administration de Trottilib.fr - Clients',
            'page_title' => 'Trottilib - Interface d\'adminisration - Clients',
            'active' => $activeCustomers,
            'inactive' => $inactiveCustomers,
            'subscription' => $subscriptionCustomers
        ];
    }

    public function scootersAction($request) {
        if (empty($request['session']['id'])) {
            return [
                'redirect_to' => $this->router->generateUrl('home')
            ];
        }

        $customersManager = new ScootersAdminManager($this->getConnection());
        $activeScooters = $customersManager->getActiveScooters();
        $inactiveScooters = $customersManager->getInactiveScooters();
        $maintenanceScooters = $customersManager->getMaintenanceScooters();

        return [
            'html_view' => 'WebSite/View/admin/scooters.html.php',
            'page_author' => 'Antoine Demailly',
            'page_description' => 'Interface d\'administration de Trottilib.fr - Trottinettes',
            'page_title' => 'Trottilib - Interface d\'adminisration - Trottinettes',
            'active' => $activeScooters,
            'inactive' => $inactiveScooters,
            'maintenance' => $maintenanceScooters
        ];
    }

    public function bornesAction($request) {
        if (empty($request['session']['id'])) {
            return [
                'redirect_to' => $this->router->generateUrl('home')
            ];
        }

        $bornesManager = new BornesAdminManager($this->getConnection());
        $bornes = $bornesManager->getBornes();

        return [
            'html_view' => 'WebSite/View/admin/bornes.html.php',
            'page_author' => 'Antoine Demailly',
            'page_description' => 'Interface d\'administration de Trottilib.fr - Bornes',
            'page_title' => 'Trottilib - Interface d\'adminisration - Bornes',
            'bornes' => $bornes
        ];
    }

    public function maintenancesAction($request) {
        if (empty($request['session']['id'])) {
            return [
                'redirect_to' => $this->router->generateUrl('home')
            ];
        }

        $maintenances = new Maintenances($this->getConnection());
        $maintenancesResults = $maintenances->getMaintenances();

        return [
            'html_view' => 'WebSite/View/admin/maintenances.html.php',
            'page_author' => 'Antoine Demailly',
            'page_description' => 'Interface d\'administration de Trottilib.fr - Maintenances',
            'page_title' => 'Trottilib - Interface d\'adminisration - Maintenances',
            'maintenances' => $maintenancesResults
        ];
    }

}