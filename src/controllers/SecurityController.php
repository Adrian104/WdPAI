<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';
class SecurityController extends AppController
{
    public function login(){
        $userRepository = new UserRepository();

        if (!$this->isPost()){
            return $this->render('login');
        }

        $email=$_POST['email'];
        $password=$_POST['password'];
        $user = $userRepository->getUser($email);

        if (!$user){
            return $this->render('login', ['messages'=>['Użytkownik nie istnieje']]);
        }
        if (!password_verify($password, $user->getPassword())){
            return $this->render('login', ['messages'=>['Podane hasło jest niepoprawne']]);
        }

        return $this->render('feed');
    }

	public function register() {
		$userRepository = new UserRepository();

		if (!$this->isPost()){
            return $this->render('register');
        }

		$name=$_POST['name'];
		$email=$_POST['email'];
        $password=$_POST['password'];

		$userRepository->setUser($name, $email, $password);
	}
}