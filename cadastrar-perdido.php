<?php
session_start();

if (!isset($_SESSION['codigo_usu'])) {
	unset($_SESSION['codigo_usu']);
	echo "
	<script>
		alert('Usuário não logado');
		window.location.href = 'perdidos.php';
	</script>";
} else {
	require ("head.php");
?>

		<title>Cadastrar Animal Perdido | UtoPet - Encontre seu Bichinho</title>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.1.62/jquery.inputmask.bundle.js"></script>
		<script src="js/data-format.js"></script>
		<script src="js/password-confirm.js"></script>
		
	<?php require ("header.php"); ?>

		<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ MAIN ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
		<main id="main" class="main-cadastrar-animal">
			<section class="cadastro">
				<h2>Cadastrar Animal Perdido</h2>
			
				<form action="upload.php?estado_ani=perdido" enctype="multipart/form-data" method="post">
					<div class="dados dados-animal">
						<div class="nome-container">
							<div>
								<label for="nome_ani">Nome:</label>
								<input type="text" name="nome_ani">
							</div>
							<p>*Deixe esse campo em branco caso não saiba ou não tenha um nome</p>
						</div>

						<div class="foto-container">
							<div>
								<label for="foto_ani">Foto:</label>
								<input type="file" name="foto_ani" required>
							</div>
							<p>*Formatos suportados: .jpg, .png e .gif</p>
						</div>
						
						<div>
							<label for="especie_ani">Espécie:</label>
							<select name="especie_ani" required>
								<option value="cachorro">Cachorro</option>
								<option value="gato">Gato</option>
								<option value="outro">Outro</option>
							</select>
						</div>

						<div>
							<label for="sexo_ani">Sexo:</label>
							<select name="sexo_ani" required>
								<option value="macho">Macho</option>
								<option value="femea">Fêmea</option>
								<option value="desconhecido">Desconhecido</option>
							</select>
						</div>

						<div>
							<label for="porte_ani">Porte:</label>
							<select name="porte_ani" required>
								<option value="pequeno">Pequeno</option>
								<option value="medio">Médio</option>
								<option value="grande">Grande</option>
							</select>
						</div>

						<div>
							<label for="cor_ani">Cor:</label>
							<select name="cor_ani" required>
								<option value="clara">Clara</option>
								<option value="cinza">Cinza ou acinzentada</option>
								<option value="laranja">Laranja ou alaranjada</option>
								<option value="escura">Escura</option>
								<option value="outra">Outra</option>
							</select>
						</div>

						<div>
							<label for="pelagem_ani">Pelagem:</label>
							<select name="pelagem_ani" required>
								<option value="curta">Curta</option>
								<option value="longa">Longa</option>
								<option value="ausente">Ausente</option>
							</select>
						</div>

						<div>
							<label for="data_ani">Data do desaparecimento:</label>
							<input type="date" name="data_ani" required>
						</div>

						<div class="informacoes-container">
							<label for="informacoes_ani">Informações adicionais:</label>
							<p>*Preencha com características do animal, como marcas características na pelagem, estado de saúde e outras informações que achar relevante. Ela não deve extrapolar o limite de 200 caracteres.</p>
							<textarea name="informacoes_ani" rows="10"></textarea>
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
<?php } ?>
