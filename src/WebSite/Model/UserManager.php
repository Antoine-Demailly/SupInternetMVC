<?php

namespace WebSite\Model;

class UserManager {

	private $_conn;

	public function __construct(\Doctrine\DBAL\Connection $dbal) {
		$this->_conn = $dbal;
	}

	public function connect($email,$pass) {

		
		$request = $this->_conn->prepare('SELECT * FROM users WHERE email = :email');
	    $response = $request->execute ([
	    'email' => $email,
	    ]);
	    $result = $request->fetch();
	    
	    if (!empty($result['salt'])) {

	    	$resultHash = $this->hashPassword($pass,$result['salt']);
	    	$pass = $resultHash['pass'];

	    	$request = $this->_conn->prepare('SELECT * FROM users WHERE email = :email AND password = :password');
		    $response = $request->execute ([
		    'email' => $email,
		    'password' => $pass
		    ]);
		    $result = $request->fetch();

		    if (!empty($result['id'])) { 
		    	return $result;
		    } 
	    }

	    

	    return false;
	}

	// Need to complete
	public function addUser($sent) {


	    $nbUser = $this->countUserByPseudo($sent['email']);

	    if (!$nbUser) {

	    	$resultHash = $this->hashPassword($sent['password']);
	    	$sent['password'] = $resultHash['pass'];
	    	$salt = $resultHash['salt'];
	        
	        $request = $this->_conn->prepare('INSERT INTO users(nom,prenom,email,password,salt) VALUES (:nom,:prenom,:email,:password,:salt)');
	        $response = $request->execute ([
	        'nom' => $sent['nom'],
	        'prenom' => $sent['prenom'],
	        'email' => $sent['email'],
	        'password' => $sent['password'],
	        'salt' => $salt
	        ]);
	        return $response;
	    } else {
	    	return false;   
	    }
	}

	public function updateUser($sent) {
		$request = $this->_conn->prepare('UPDATE users SET email = :email, prenom = :prenom, nom = :nom, adresse = :adresse, ville = :ville, code_postal = :code_postal WHERE  id= :id;');
	        $response = $request->execute ([
	        'email' => $sent['email'],
	        'prenom' => $sent['prenom'],
	        'nom' => $sent['nom'],
	        'adresse' => $sent['adresse'],
	        'ville' => $sent['ville'],
	        'code_postal' => $sent['code_postal'],
	        'id' => $sent['id']
	        ]);

	   return $response;
	}

	public function getUser($id) {
		$statement = $this->_conn->prepare('SELECT id,prenom,nom,email,adresse,code_postal,ville,date_inscription FROM users WHERE id = :id');
        $statement->execute([
            ':id' => $id,
        ]);
        return $statement->fetch();
	}

	private function countUserByPseudo($email) {

	    $request = $this->_conn->prepare('SELECT COUNT(*) as nbuser FROM users WHERE email = :email');
	    $request->execute ([
	    'email' => $email
	    ]);
	    $result = $request->fetch();

	    return $result['nbuser'];
	}

	public function getIdUser($email) {
	    $request = $this->_conn->prepare('SELECT id FROM users WHERE email = :email');
	    $request->execute ([
	    'email' => $email
	    ]);
	    $result = $request->fetch();

	    return $result['id'];
	}

	private function hashPassword($password,$privateSalt = false) {
		$config = \Symfony\Component\Yaml\Yaml::parse(file_get_contents(__DIR__.'/../../../app/config/config.yml'));

		if ($privateSalt == false) {
			$length = strlen($config['security']['secret']);
			$privateSalt = '';
			$count = 0; $max = 24;
			for (;;) {
				if ($count == $max)
					break;
				$rand = mt_rand(0,$length -1);
				$privateSalt = $privateSalt . $config['security']['secret'][$rand];
				$count++;
			}
		}
		

		$password = hash('sha512', $password.$config['security']['secret'].$privateSalt);
		return [
			'pass' => $password,
			'salt' => $privateSalt
		];
	}
}