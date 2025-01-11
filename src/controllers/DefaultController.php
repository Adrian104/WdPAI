<?php

require_once 'AppController.php';

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
        $this->render('feed');
    }
    public function login() {
        $this->render('login');
    }
    public function register() {
        $this->render('register');
    }
    public function error() {
        $this->render('error');
    }
}