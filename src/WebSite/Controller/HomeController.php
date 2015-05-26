<?php
namespace WebSite\Controller;

/**
 * Class UserController
 *
 * Controller of Home action
 *
 * @package Website\Controller
 */

class HomeController extends AbstractBaseController {
    public function homeAction($request) {

    	if (!empty($request['session']['id'])) {
    		return [
            	'redirect_to' => $this->router->generateUrl('dashboard')
        	];
    	}

    	return [
    		'html_view' => 'WebSite/View/home/authAdmin.html.php',
    		'page_author' => 'Antoine Demailly',
    		'page_description' => 'Connexion à l\'interface d\'administration de Trottilib.fr',
    		'page_title' => 'Trottilib - Interface d\'adminisration - Login' 
    	];
        
    }

}