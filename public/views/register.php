<!DOCTYPE html>
<html>
	<head>
		<title>IT-Forum.net</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="/public/css/global-style.css">
		<link rel="stylesheet" href="/public/css/login-style.css">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
	</head>
	<body class="center-menu">
		<div style="transform: scale(1.5);">
            <div>
                <img id="logo" src="/public/img/logo.svg" alt="logo">
				<br><br><br>
            </div>
			<form action="register" method="POST">
				<input name="name" type="text" placeholder="Nazwa użytkownika">
				<input name="email" type="email" placeholder="E-Mail">
				<input name="password" type="password" placeholder="Hasło">
				<button class="login-btn">Zarejestruj się</button>
			</form>
        </div>
		<div class="circle green"></div>
		<div class="circle blue"></div>
	</body>
</html>