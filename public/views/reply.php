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
				<h1>Dodaj odpowiedź</h1>
				<div style="width: 100%; display: flex; justify-content: center; margin-top: 20px;">
					<form action="/public/views/add-reply.php?id=<?= $threadId ?>" method="POST" style="display: flex; flex-direction: column; width: 100%;">
						<textarea name="data-in" class="data-in"></textarea>
						<button class="add-reply" type="submit" style="margin-bottom: 10px;">Dodaj odpowiedź</button>
						<button class="cancel-reply" type="button" onclick="window.history.back();">Anuluj</button>
					</form>
				</div>
			</div>
        </main>
	</body>
</html>
