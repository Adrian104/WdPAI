<?php

require_once __DIR__.'/../repository/UserRepository.php';

class RegisterService
{
	public function register($nick, $email, $password)
	{
		$userRepository = new UserRepository();
		$hash = password_hash($password, PASSWORD_DEFAULT);

		if ($userRepository->getUser($email))
			return 'Użytkownik o podanym adresie e-mail już istnieje';

		$user = $userRepository->setUser($nick, $email, $hash);
		return 'ok';
	}
}