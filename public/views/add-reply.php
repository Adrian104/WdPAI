<?php

require_once __DIR__.'/../../src/repository/ForumThreadRepository.php';

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $dataIn = htmlspecialchars($_POST['data-in']);
	$repo = new ForumThreadRepository();
	$repo->addReply($_GET['id'], $dataIn);
	header('Location: /thread?id='.$_GET['id']);
}
