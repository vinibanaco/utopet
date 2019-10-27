</head>

<body>
	<h1>UtoPet - Encontre seu Bichinho</h1>

	<header>
		<a class="logo-container" href="index.php">
			<img class="logo-menu" src="imagens/logo.png" alt="Logo" title="Home">
			<p>UtoPet</p>
		</a>

		<div class="btn-menu">
			<button id="hamburger" class="hamburger hamburger--emphatic" type="button" onclick="menu()">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</button>
		</div>
	</header>

	<nav id="nav">
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="encontrados.php">Animais Encontrados</a></li>
			<li><a href="perdidos.php">Animais Perdidos</a></li>
			<li><a href="adocao.php">Animais para Adoção</a></li>
			<li><a href="ongs.php">ONGs de Jundiaí</a></li>
			
			<?php
			if (isset($_SESSION['login_usu'])) {
				echo '<li><a href="usuario.php">Página do Usuário</a></li>';
			} else {
				echo '<li><button onclick="abreLogin(); menu();">Login</button></li>';
			}
			?>

			<li><a href="sobrenos.php">Sobre Nós</a></li>
		</ul>
	</nav>

	<div id="transp-menu" class="transp-menu" onclick="menu()"></div>

	<div class="container-login-popup">
		<div class="fecha-login-popup" onclick="fechaLogin()"></div>
		<form class="login-popup" action="login.php" method="post">
			<div class="imgcontainer">
				<button class="close" onclick="fechaLogin()">
					<svg xmlns="http://www.w3.org/2000/svg" width="40px" height="40px" viewBox="0 0 40 40" enable-background="new 0 0 23 28">
						<line x1="5" y1="5" x2="35" y2="35" stroke="#424242" stroke-width="5" stroke-linecap="round" stroke-miterlimit="10"></line>
						<line x1="35" y1="5" x2="5" y2="35" stroke="#424242" stroke-width="5" stroke-linecap="round" stroke-miterlimit="10"></line>
					</svg>
				</button>
				<figure class="avatar">
					<img src="icons/user-white.png" alt="Avatar">
				</figure>
			</div>
		
			<div class="nome-login-container">
				<label for="email_usu">Login:</label>
				<input type="text" name="login_usu" required>
			</div>
	
			<div class="senha-login-container">
				<label for="senha_usu">Senha:</label>
				<input type="password" name="senha_usu" required>
			</div>
			
			<input type="submit" class="btn-logar" value="Entrar">

			<a href="cadastrar-usuario.php" class="btn-cadastrar-usu">Cadastrar-se</a>
		</form>
	</div>