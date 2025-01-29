<?php

require_once __DIR__.'/../repository/UserRepository.php';

class LoginService
{
	public function login($email, $password)
	{
		$userRepository = new UserRepository();
		$user = $userRepository->getUser($email);

		if (!$user){
            return 'Użytkownik nie istnieje';
        }
        if (!password_verify($password, $user->getPassword())){
            return 'Podane hasło jest niepoprawne';
        }

		session_start();
		$_SESSION['uid'] = $userRepository->getUserId($email);
		return 'ok';
	}
}