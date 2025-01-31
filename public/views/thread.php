<!DOCTYPE html>
<html>
	<head>
		<title>IT-Forum.net</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="/public/css/global-style.css">
		<link rel="stylesheet" href="/public/css/main-style.css">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
		<script src="/public/js/main.js"></script>
	</head>
	<body>
		<header>
			<nav class="top-bar">
				<a href="javascript:switch_left_bar()" id="hamburger-menu">
					<img src="/public/img/menu.svg" alt="menu">
				</a>
				<a href="/feed/all" id="logo">
					<img src="/public/img/logo.svg" alt="logo">
				</a>
				<a href="" id="profile-menu">
					<img src="/public/img/profile.svg" alt="profile">
				</a>
			</nav>
			<nav class="left-bar" id="left-bar-id">
				<ul>
					<span>Dyskusje</span>
					<a href="/feed/new">Nowe</a>
					<a href="/feed/popular">Popularne</a>
					<a href="/feed/liked">Lubiane</a>
					<a href="/feed/top">Najczęściej oglądane</a>
					<span>Moje dyskusje</span>
					<a href="">Dodaj</a>
					<a href="">Przeglądaj</a>
					<span>Pozostałe</span>
					<a href="/faq">FAQ</a>
					<a href="/about">O forum</a>
				</ul>
			</nav>
		</header>
        <main>
			<div class="thread-container">
				<h1 style="margin-left: 20px"><?= $forumThread->getTitle() ?></h1>
				<div class="thread-image-element-2" style="margin: 0px 20px">
					<img src="/public/img/heart.svg" alt="menu">
					<span style="margin: 0px 3px;"></span>
					<?= $forumThread->getScore() ?>
					<span style="margin: 0px 10px;"></span>
					<img src="/public/img/eye.svg" alt="menu">
					<span style="margin: 0px 3px;"></span>
					<?= $forumThread->getViews() ?>
					<span style="margin-left: auto;"><?= $forumThread->getTags() ?>
				</div>
				<br><br>
				<div class="thread-box">
					<div style="display: flex; center; align-items: center;">
						<img src="/public/img/profile2.svg" style="margin: 10px 0px;">
						<span><?= $user->getNick() ?></span>
						<span class="publish-date"><?= $forumThread->getPublishDate() ?></span>
					</div>
					<p style="margin: 0px;"><?= $forumThread->getContent() ?></p>
				</div>
				<br>
				<?php foreach($replies as $reply): ?>
					<br>
					<div class="reply-box">
						<div style="display: flex; center; align-items: center;">
							<img src="/public/img/profile2.svg" style="margin: 10px 0px;">
							<span><?= $reply->getUser() ?></span>
						</div>
						<p style="margin: 0px;"><?= $reply->getContent() ?></p>
					</div>
				<?php endforeach; ?>
				<br><br><br>
				<a style="text-decoration: none;" href="/reply?id=<?= $forumThread->getId() ?>" class="reply-btn">Dodaj odpowiedź</a>
				<br><br><br><br><br><br>
			</div>
			<div class="gradient"></div>
        </main>
	</body>
</html>
