<?php

namespace WebSite\Controller;

use WebSite\Model\MessageFlash;
use WebSite\Model\UserManager;

/**
 * Class UserController
 *
 * Controller of all User actions
 *
 * @package Website\Controller
 */


class UserController extends AbstractBaseController {

    /**
     * Recup all users and print it
     *
     * @return array
     */

    
    public function addUser($request) {
        if ($request['request']) { 

            if (isset($request['request']['email']) && isset($request['request']['password'])) {
                
                $userManager = new UserManager($this->getConnection());
                $register = $userManager->addUser($request['request']['email'],$request['request']['password']);

                if ($register == true) { 
                    $userId = $userManager->getIdUser($request['request']['email']);
                    if (!empty($userId)) {
                        $_SESSION['id'] = $userId;
                        $_SESSION['email'] = $request['request']['email'];
                        MessageFlash::addMessageFlash('success', 'Inscription réussie');
                        return [
                            'redirect_to' => $this->router->generateUrl('home')
                        ];
                    }
                } else {
                    MessageFlash::addMessageFlash('error', 'Nom d\'utilisateur déjà utilisé');
                    return [
                        'redirect_to' => $this->router->generateUrl('home')
                    ];
                }
            } 

        }

        MessageFlash::addMessageFlash('error', 'Une erreur s\'est produite');
        return [
            'redirect_to' => $this->router->generateUrl('home')
        ];
    }


    // Update User With Ajax
    public function updateUser($request) {
        
        $errors = 0;

        if (!empty($request['request'])) {

            $sent = $request['request'];

            if (!empty($sent['id'])) {
                // Check if is int
            } else { $errors++; }

            if (!empty($sent['prenom'])) {
                $sent['prenom'] = stripcslashes($sent['prenom']);
            } else { $errors++; }

            if (!empty($sent['nom'])) {
                $sent['nom'] = stripcslashes($sent['nom']);
            } else { $errors++; }

            if (!empty($sent['email'])) {
                $sent['email'] = stripcslashes($sent['email']);
            } else { $errors++; }

            if (!empty($sent['adresse'])) {
                $sent['adresse'] = stripcslashes($sent['adresse']);
            } else { $errors++; }

            if (!empty($sent['ville'])) {
                $sent['ville'] = stripcslashes($sent['ville']);
            } else { $errors++; }

            if (!empty($sent['code_postal'])) {
                $sent['code_postal'] = stripcslashes($sent['code_postal']);
            } else { $errors++; }

            if ($errors === 0) {

                $userManager = new UserManager($this->getConnection());
                $update = $userManager->updateUser($sent);

                if ($update) {
                    return ['json' => 'Utilisateur mis à jour.'];
                } else {
                    http_response_code(400);
                    return ['json' => 'Utilisateur non mis à jour !'];
                }

            } else {
                http_response_code(400);
                return ['json' => 'Il y a des erreurs avec le formulaire.'];
            }


        }

    }

    // Get User With Ajax
    public function getUser($request) {

        if (!empty($_GET['table']) && !empty($_GET['id_item'])) {
            if ($_GET['table'] == 'users') {


                $userManager = new UserManager($this->getConnection());
                $user = $userManager->getUser($_GET['id_item']);

                if ($user) {
                    return [
                    'html_view' => 'WebSite/View/edition/customersEdition.html.php',
                    'user' => $user];
                } else {
                    http_response_code(400);
                    return ['error' => 'Une erreur s\'est produite'];
                }

            }
        } else {
            http_response_code(400);
            return ['error' => 'Aucune données n\'a été reçu par le serveur'];
        }

    }


    
    public function deleteUser($request) {
        return [
            'redirect_to' => 'http://.......',

        ];
    }

    public function logoutUser($request) {
        
        session_unset();
        session_destroy();
        $_SESSION = null;

        return [
            'redirect_to' => $this->router->generateUrl('home'),
        ];
    }

    public function loginUser($request) {
        if ($request['request']) { 

            if (isset($request['request']['email']) && isset($request['request']['password'])) {
                
                $userManager = new UserManager($this->getConnection());
                $user = $userManager->connect($request['request']['email'],$request['request']['password']);

                if (!empty($user['id'])) { 
                    $_SESSION['id'] = $user['id'];
                    $_SESSION['prenom'] = $user['prenom'];
                    $_SESSION['nom'] = $user['nom'];
                    $_SESSION['email'] = $user['email'];

                    $message = 'Vous êtes connecté en tant que:<br>'.$_SESSION['prenom'].' '.$user['nom'];
                    MessageFlash::addMessageFlash('success',$message);
                    return [
                        'redirect_to' => $this->router->generateUrl('dashboard')
                    ];
                }
            }    

        }

        MessageFlash::addMessageFlash('error', 'Nom d\'utilisateur ou mot de passe incorrect.');
        return [
            'redirect_to' => $this->router->generateUrl('home')
        ];

    }
}
