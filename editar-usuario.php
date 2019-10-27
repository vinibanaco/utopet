<?php
session_start();

if (!isset($_SESSION['codigo_usu'])) {
	unset($_SESSION['codigo_usu']);
	echo "
	<script>
		alert('Usuário não logado');
		window.location.href = 'index.php';
	</script>";
} else {
	require ("conecta.php");

	$codigo_usu = $_SESSION['codigo_usu'];

	$querySelecionaUsuario = "SELECT nome_usu, login_usu, telefone_usu, email_usu, senha_usu FROM usuarios WHERE codigo_usu = '$codigo_usu'";
	$resultadosSelecionaUsuario = mysqli_query($conexao, $querySelecionaUsuario);
	$resultadosUsuario = mysqli_fetch_array($resultadosSelecionaUsuario);

	require ("head.php");
?>

		<title>Alterar Dados da Conta | UtoPet - Encontre seu Bichinho</title>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.1.62/jquery.inputmask.bundle.js"></script>
		<script src="js/data-format.js"></script>
		<script src="js/password-confirm.js"></script>

	<?php require ("header.php"); ?>

		<main id="main" class="main-cadastrar-usuario">
			<section class="cadastro">
				<h2>Alterar Dados da Conta</h2>
			
				<form action="update-usuario.php" enctype="multipart/form-data" method="post">
					<div class="dados dados-pessoa">
						<div>
							<label for="nome_usu">Nome:</label>
							<input type="text" name="nome_usu" value="<?= $resultadosUsuario['nome_usu'] ?>" required>
						</div>

						<div>
							<label for="login_usu">Login:</label>
							<input type="text" name="login_usu" value="<?= $resultadosUsuario['login_usu'] ?>" required>
						</div>
						
						<div>
							<label for="telefone_usu">Telefone:</label>
							<input id="tel" type="text" name="telefone_usu" value="<?= $resultadosUsuario['telefone_usu'] ?>" required>
						</div>
						
						<div>
							<label for="email_usu">E-mail:</label>
							<input type="email" name="email_usu" value="<?= $resultadosUsuario['email_usu'] ?>" required>
						</div>
						
						<div>
							<label for="senha_usu">Senha:</label>
							<input type="password" name="senha_usu" id="senha" value="<?= $resultadosUsuario['senha_usu'] ?>" required>
						</div>

						<div class="confirmar-senha-container">
							<div>
								<label for="confirmar_senha_usu">Confirmar senha:</label>
								<input type="password" name="confirmar_senha_usu" id="confirmar-senha" required>
							</div>
							<span class="mensagem-senha"></span>
						</div>
					</div>

					<div class="editar-btn-container">
						<div class="btn-atualizar">
							<input type="submit" name="submit" value="Atualizar">
						</div>
						<div class="btn-excluir">
							<button type="button" onclick="excluir()">Excluir conta</button>
						</div>
					</div>
				</form>
			</section>
		</main>

		<?php require ("footer.php"); ?>

		<script src="js/menu-animation.js"></script>

		<script>
			function confirmar(text, ok) {
				var confirmacao = confirm(text);
				if (confirmacao) {
					ok();
				}
			}

			function excluir() {
				confirmar(
					"Realmente deseja excluir essa conta?\n(Suas publicações não serão apagadas)",
					function () {
						window.location.href = "excluir-usuario.php";
					}
				)  
			}
		</script>
	</body>
	</html>
<?php } ?>
