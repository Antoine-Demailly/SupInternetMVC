<?php 

namespace WebSite\Controller;

use WebSite\Model\MessageFlash;
use WebSite\Model\Scooters;



class ScootersController extends AbstractBaseController {

	public function getScooters($request) {
        
            if (!empty($request['query']['id'])) {
                

                $scooters = new Scooters($this->getConnection());
                $results = $scooters->getScooters($request['query']['id']);
                
                return ['json' => $results]; 

            } else {
                http_response_code(400);
                return ['json' => 'Une erreur s\'est produite'];
            }
        
    }

}