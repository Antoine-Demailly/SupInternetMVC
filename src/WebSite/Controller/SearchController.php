<?php

namespace WebSite\Controller;

use WebSite\Model\MessageFlash;
use WebSite\Model\Search;

/**
 * Class AjaxRequestController
 *
 * Controller of Search Module
 *
 * @package Website\Controller
 */

class SearchController extends AbstractBaseController {

    public function searchAjax($request) {
        
            if (!empty($request['query']['s'])) {
                // $s = stripcslashes(str_replace('*','', $request['query']['s'])).'*';
                $s = stripcslashes(str_replace('*','', $request['query']['s']));

                $search = new Search($this->getConnection());
                $results = $search->getSearch($s);
                
                return ['json' => $results]; 

            } else {
                http_response_code(400);
                return ['json' => 'Une erreur s\'est produite'];
            }
        
    }
}