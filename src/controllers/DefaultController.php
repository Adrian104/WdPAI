<?php

require_once 'AppController.php';
require_once __DIR__.'/../service/FeedService.php';

class DefaultController extends AppController {

    public function index() {
        $this->render('landing-page');
    }
    public function about() {
        $this->render('about');
    }
    public function faq() {
        $this->render('faq');
    }
    public function feed() {
        $service = new FeedService();
        $forumThreads = $service->fetchForumThreads();
        $this->render('feed', ['forumThreads' => $forumThreads]);
    }
    public function register() {
        $this->render('register');
    }
    public function error() {
        $this->render('error');
    }
    public function thread() {
        if (isset($_GET['id']))
            $threadId = $_GET['id'];

        $service = new FeedService();
        $forumThread = $service->fetchForumThread($threadId);
        $this->render('thread', ['forumThread' => $forumThread]);
    }
}