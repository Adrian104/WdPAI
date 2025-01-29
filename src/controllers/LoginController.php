<?php

require_once 'AppController.php';
require_once __DIR__.'/../service/LoginService.php';
require_once __DIR__.'/../service/FeedService.php';

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
        $service = new FeedService();
        $forumThreads = $service->fetchForumThreads();

		if ($ret === 'ok')
			return $this->render('feed', ['forumThreads' => $forumThreads, 'title' => 'Najnowsze dyskusje']);
		else
			return $this->render('login', ['messages'=>[$ret]]);
	}
}