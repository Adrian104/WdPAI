<?php

require_once 'AppController.php';
require_once __DIR__.'/../service/RegisterService.php';

class RegisterController extends AppController
{
	public function register()
	{
		if (!$this->isPost())
			return $this->render('register');

		$nick = $_POST['name'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$service = new RegisterService();
		$ret = $service->register($nick, $email, $password);

		if ($ret === 'ok')
			return $this->render('feed');
		else
			return $this->render('register', ['messages'=>[$ret]]);
	}
}