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
        $title = $service->getTitle();
        $forumThreads = $service->fetchForumThreads();
        $this->render('feed', ['forumThreads' => $forumThreads, 'title' => $title]);
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
        $user = $service->fetchUser($forumThread->getUserId());
        $replies = $service->fetchReplies($threadId);

        $this->render('thread', ['forumThread' => $forumThread, 'user' => $user, 'replies' => $replies]);
    }
    public function reply() {
        if (isset($_GET['id']))
            $threadId = $_GET['id'];

        $this->render('reply', ['threadId' => $threadId]);
    }
}