<?php

require_once 'AppController.php';
require_once __DIR__.'/../service/LoginService.php';

class LoginController extends AppController
{
	public function login()
	{
		if (!$this->isPost())
			return $this->render('login');

		$email = $_POST['email'];
		$password = $_POST['password'];
		$service = new LoginService();
		$ret = $service->login($email, $password);

		if ($ret === 'ok')
			return $this->render('feed');
		else
			return $this->render('login', ['messages'=>[$ret]]);
	}
}