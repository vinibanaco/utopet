<?php require ("head.php"); ?>

	<title>Cadastrar Usuário | UtoPet - Encontre seu Bichinho</title>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.1.62/jquery.inputmask.bundle.js"></script>
	<script src="js/data-format.js"></script>
	<script src="js/password-confirm.js"></script>

<?php require ("header.php"); ?>

	<main id="main" class="main-cadastrar-usuario">
		<section class="cadastro">
			<h2>Cadastrar Usuário</h2>
		
			<form action="upload-usuario.php" enctype="multipart/form-data" method="post">
				<div class="dados dados-pessoa">
					<div>
						<label for="nome_usu">Nome:</label>
						<input type="text" name="nome_usu" required>
					</div>

					<div>
						<label for="login_usu">Login:</label>
						<input type="text" name="login_usu" required>
					</div>
					
					<div>
						<label for="telefone_usu">Telefone:</label>
						<input id="tel" type="text" name="telefone_usu" required>
					</div>
					
					<div>
						<label for="email_usu">E-mail:</label>
						<input type="email" name="email_usu" required>
					</div>
					
					<div>
						<label for="senha_usu">Senha:</label>
						<input type="password" name="senha_usu" id="senha" required>
					</div>

					<div class="confirmar-senha-container">
						<div>
							<label for="confirmar_senha_usu">Confirmar senha:</label>
							<input type="password" name="confirmar_senha_usu" id="confirmar-senha" required>
						</div>
						<span class="mensagem-senha"></span>
					</div>
				</div>

				<div class="btn-cadastrar">
					<input type="submit" name="submit" value="Cadastrar">
				</div>
			</form>
		</section>
	</main>

	<?php require ("footer.php"); ?>

	<script src="js/menu-animation.js"></script>
</body>
</html>
