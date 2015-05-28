<?php 

namespace WebSite\Controller;

use WebSite\Model\MessageFlash;
use WebSite\Model\ScootersInBornes;
use WebSite\Model\BornesAdminManager;



class BornesController extends AbstractBaseController {

	public function scootersInBornes($request) {
        
            if (!empty($request['query']['id'])) {
                
                $scootersBornes = new ScootersInBornes($this->getConnection());
                $results['scooters'] = $scootersBornes->getScooters($request['query']['id']);
                
                $bornes = new BornesAdminManager($this->getConnection());
                $results['bornes'] = $bornes->getBornesById($request['query']['id']);

                return [
                'html_view' => 'WebSite/View/edition/bornesEdition.html.php',
                'scooters' => $results['scooters'],
                'bornes' => $results['bornes']
                ];

            } else {
                http_response_code(400);
                return ['json' => 'Une erreur s\'est produite'];
            }
        
    }

}