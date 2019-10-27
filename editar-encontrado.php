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

	$codigo_ani = $_GET['codigo'];
	$codigo_usu = $_SESSION['codigo_usu'];

	$querySelecionaAnimal = "SELECT nome_ani, especie_ani, sexo_ani, porte_ani, cor_ani, pelagem_ani, data_ani, informacoes_ani FROM animais WHERE codigo_ani = '$codigo_ani' AND codigo_usu = $codigo_usu";
	$resultadosSelecionaAnimal = mysqli_query($conexao, $querySelecionaAnimal);
	$resultadosAnimal = mysqli_fetch_array($resultadosSelecionaAnimal);

	require ("head.php");
?>

		<title>Alterar Dados do Animal | UtoPet - Encontre seu Bichinho</title>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.1.62/jquery.inputmask.bundle.js"></script>
		<script src="js/data-format.js"></script>
		<script src="js/password-confirm.js"></script>
		
	<?php require ("header.php"); ?>

		<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ MAIN ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
		<main id="main" class="main-cadastrar-animal">
			<section class="cadastro">
				<h2>Alterar Dados do Animal</h2>
			
				<form action="update.php?codigo=<?= $codigo_ani ?>&estado_ani=encontrado" enctype="multipart/form-data" method="post">
					<div class="dados dados-animal">
						<div class="nome-container">
							<div>
								<label for="nome_ani">Nome:</label>
								<input type="text" name="nome_ani" value="<?= $resultadosAnimal['nome_ani'] ?>">
							</div>
							<p>*Deixe esse campo em branco caso não saiba o nome</p>
						</div>

						<div class="foto-container">
							<div>
								<label for="foto_ani">Foto:</label>
								<input type="hidden" name="MAX_FILE_SIZE" value="4194304">
								<input type="file" name="foto_ani">
							</div>
							<p>*Apenas imagens são permitidas</p>
						</div>
						
						<div>
							<label for="especie_ani">Espécie:</label>
							<select name="especie_ani" required>
								<option value="cachorro" <?= ($resultadosAnimal['especie_ani'] == 'cachorro') ? 'selected' : '' ?>>Cachorro</option>
								<option value="gato" <?= ($resultadosAnimal['especie_ani'] == 'gato') ? 'selected' : '' ?>>Gato</option>
								<option value="outro" <?= ($resultadosAnimal['especie_ani'] == 'outro') ? 'selected' : '' ?>>Outro</option>
							</select>
						</div>

						<div>
							<label for="sexo_ani">Sexo:</label>
							<select name="sexo_ani" required>
								<option value="macho" <?= ($resultadosAnimal['sexo_ani'] == 'macho') ? 'selected' : '' ?>>Macho</option>
								<option value="femea" <?= ($resultadosAnimal['sexo_ani'] == 'femea') ? 'selected' : '' ?>>Fêmea</option>
								<option value="desconhecido" <?= ($resultadosAnimal['sexo_ani'] == 'desconhecido') ? 'selected' : '' ?>>Desconhecido</option>
							</select>
						</div>

						<div>
							<label for="porte_ani">Porte:</label>
							<select name="porte_ani" required>
								<option value="pequeno" <?= ($resultadosAnimal['porte_ani'] == 'pequeno') ? 'selected' : '' ?>>Pequeno</option>
								<option value="medio" <?= ($resultadosAnimal['porte_ani'] == 'medio') ? 'selected' : '' ?>>Médio</option>
								<option value="grande" <?= ($resultadosAnimal['porte_ani'] == 'grande') ? 'selected' : '' ?>>Grande</option>
							</select>
						</div>

						<div>
							<label for="cor_ani">Cor:</label>
							<select name="cor_ani" required>
								<option value="clara" <?= ($resultadosAnimal['cor_ani'] == 'clara') ? 'selected' : '' ?>>Clara</option>
								<option value="cinza" <?= ($resultadosAnimal['cor_ani'] == 'cinza') ? 'selected' : '' ?>>Cinza ou acinzentada</option>
								<option value="laranja" <?= ($resultadosAnimal['cor_ani'] == 'laranja') ? 'selected' : '' ?>>Laranja ou alaranjada</option>
								<option value="escura" <?= ($resultadosAnimal['cor_ani'] == 'escura') ? 'selected' : '' ?>>Escura</option>
								<option value="outra" <?= ($resultadosAnimal['cor_ani'] == 'outra') ? 'selected' : '' ?>>Outra</option>
							</select>
						</div>

						<div>
							<label for="pelagem_ani">Pelagem:</label>
							<select name="pelagem_ani" required>
								<option value="curta" <?= ($resultadosAnimal['pelagem_ani'] == 'curta') ? 'selected' : '' ?>>Curta</option>
								<option value="longa" <?= ($resultadosAnimal['pelagem_ani'] == 'longa') ? 'selected' : '' ?>>Longa</option>
								<option value="ausente" <?= ($resultadosAnimal['pelagem_ani'] == 'ausente') ? 'selected' : '' ?>>Ausente</option>
							</select>
						</div>

						<div>
							<label for="data_ani">Data do encontro:</label>
							<input type="date" name="data_ani" id="data" value="<?= $resultadosAnimal['data_ani'] ?>" required>
						</div>

						<div class="informacoes-container">
							<label for="informacoes_ani">Informações adicionais:</label>
							<p>*Preencha com características do animal, como marcas características na pelagem, estado de saúde e outras informações que achar relevante. Ela não deve extrapolar o limite de 200 caracteres.</p>
							<textarea name="informacoes_ani" rows="10"><?= $resultadosAnimal['informacoes_ani'] ?></textarea>
						</div>
					</div>

					<div class="editar-btn-container">
						<div class="btn-atualizar">
							<input type="submit" name="submit" value="Atualizar">
						</div>
						<div class="btn-excluir">
							<button type="button" onclick="excluir()">Excluir animal</button>
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
					"Realmente deseja excluir essa publicação?",
					function () {
						window.location.href = "excluir-animal.php?estado=encontrado&codigo=" + <?= $codigo_ani ?>;
					}
				)  
			}
		</script>
	</body>
	</html>

<?php } ?>
