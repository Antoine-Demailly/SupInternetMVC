<?php 

namespace WebSite\Controller;

use WebSite\Model\MessageFlash;
use WebSite\Model\ScootersInBornes;



class BornesController extends AbstractBaseController {

	public function scootersInBornes($request) {
        
            if (!empty($request['query']['id'])) {
                
                $scootersBornes = new ScootersInBornes($this->getConnection());
                $results = $scootersBornes->getScooters($request['query']['id']);
                
                return [
                'html_view' => 'WebSite/View/edition/bornesEdition.html.php',
                'bornes' => $results];

            } else {
                http_response_code(400);
                return ['json' => 'Une erreur s\'est produite'];
            }
        
    }

}