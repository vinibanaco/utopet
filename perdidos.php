<?php
session_start();
require ("conecta.php");
require ("head.php");
?>

	<title>Animais Perdidos | UtoPet - Encontre seu Bichinho</title>

<?php require ("header.php"); ?>

	<main id="main" class="main-perdidos">
		<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ SIDEBAR ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
		<aside id="aside" class="sidebar-container">
			<div class="btn-sidebar">
				<button type="button" onclick="sidebar()">
					Filtrar Busca
					<svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg" id="svg-sidebar" class="svg-sidebar">
						<path d="M1171 960q0 13-10 23l-466 466q-10 10-23 10t-23-10l-50-50q-10-10-10-23t10-23l393-393-393-393q-10-10-10-23t10-23l50-50q10-10 23-10t23 10l466 466q10 10 10 23z" fill="#fff"/>
					</svg>
				</button>
			</div>

			<div id="sidebar" class="sidebar">
				<form id="form-sidebar" action="encontrados.php" method="get">
					<p> Filtrar Busca </p>
					<div class="filtro">
						<h3>Espécie</h3>
						<div>
							<input type="radio" name="especie" id="cachorro" value="cachorro">
							<label for="cachorro">Cachorro</label>
						</div>
						<div>
							<input type="radio" name="especie" id="gato" value="gato">
							<label for="gato">Gato</label>
						</div>
						<div>
							<input type="radio" name="especie" id="outra-especie" value="outra-especie">
							<label for="outra-especie">Outra</label>
						</div>
					</div>

					<div class="filtro">
						<h3>Sexo</h3>
						<div>
							<input type="radio" name="sexo" id="macho" value="macho">
							<label for="macho">Macho</label>
						</div>
						<div>
							<input type="radio" name="sexo" id="femea" value="femea">
							<label for="femea">Fêmea</label>
						</div>
					</div>

					<div class="filtro">
						<h3>Porte</h3>
						<div>
							<input type="radio" name="porte" id="pequeno" value="pequeno">
							<label for="pequeno">Pequeno</label>
						</div>
						<div>
							<input type="radio" name="porte" id="medio" value="medio">
							<label for="medio">Médio</label>
						</div>
						<div>
							<input type="radio" name="porte" id="grande" value="grande">
							<label for="grande">Grande</label>
						</div>
					</div>

					<div class="filtro">
						<h3>Cor</h3>
						<div>
							<input type="radio" name="cor" id="clara" value="clara">
							<label for="clara">Clara</label>
						</div>
						<div>
							<input type="radio" name="cor" id="cinza" value="cinza">
							<label for="cinza">Cinza ou acinzentada</label>
						</div>
						<div>
							<input type="radio" name="cor" id="laranja" value="laranja">
							<label for="laranja">Laranja ou alaranjada</label>
						</div>
						<div>
							<input type="radio" name="cor" id="escura" value="escura">
							<label for="escura">Escura</label>
						</div>
						<div>
							<input type="radio" name="cor" id="outra-cor" value="outra-cor">
							<label for="outra-cor">Outra</label>
						</div>
					</div>

					<div class="filtro">
						<h3>Pelagem</h3>
						<div>
							<input type="radio" name="pelagem" id="curta" value="curta">
							<label for="curta">Curta</label>
						</div>
						<div>
							<input type="radio" name="pelagem" id="longa" value="longa">
							<label for="longa">Longa</label>
						</div>
						<div>
							<input type="radio" name="pelagem" id="ausente" value="ausente">
							<label for="ausente">Ausente</label>
						</div>
					</div>

					<div class="flex-container">
						<div class="data">
							<h3>Data do encontro</h3>
							<input type="date" name="data" max="<?= date('Y-m-d') ?>">
						</div>

						<div class="btn-container">
							<div class="btn-filtrar">
								<input type="submit" value="Filtrar">
							</div>

							<div class="btn-limpar">
								<input type="reset" value="Limpar">
							</div>
						</div>
					</div>
				</form>
			</div> <!-- SIDEBAR -->
		</aside>

		<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ CONTEÚDO ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
		<section class="img-destaque img-destaque-perdidos">
			<h2>Animais Perdidos</h2>

			<a class="btn-cadastrar-animal" href="cadastrar-perdido.php">
				<img src="icons/plus.png" alt="" title="Publique um animal">
			</a>
		</section>

		<section class="descricao">
			<p>Se você encontrou algum animal na rua, procure aqui para ver se há alguém buscando por ele. Preencha o filtro com as características do animal encontrado para facilitar na busca.</p>
			<p><strong>Obs.:</strong> Algumas características podem variar dependendo da interpretação de cada um, então tente buscar sem algumas delas caso não tenham preenchido de acordo com o esperado.</p>

			<br>

			<p>Perdeu seu animalzinho? <a href="cadastrar-perdido.php">Publique-o</a></p>
		</section>

		<div class="resultados">
			<?php
				$caracteristicas = "";

				if (isset($_GET['especie'])) {
					$caracteristicas .= " AND especie_ani = '" . $_GET['especie'] . "'";
				}

				if (isset($_GET['sexo'])) {
					$caracteristicas .= " AND sexo_ani = '" . $_GET['sexo'] . "'";
				}

				if (isset($_GET['porte'])) {
					$caracteristicas .= " AND porte_ani = '" . $_GET['porte'] . "'";
				}

				if (isset($_GET['cor'])) {
					$caracteristicas .= " AND cor_ani = '" . $_GET['cor'] . "'";
				}

				if (isset($_GET['pelagem'])) {
					$caracteristicas .= " AND pelagem_ani = '" . $_GET['pelagem'] . "'";
				}

				if (isset($_GET['data'])) {
					$caracteristicas .= " AND data_ani >= '" . $_GET['data'] . "'";
				}

				if ($caracteristicas == "") {
					$queryDadosAnimais = "SELECT codigo_ani, codigo_usu, nome_foto_ani, especie_ani, sexo_ani, porte_ani, cor_ani, pelagem_ani, data_ani, nome_ani, informacoes_ani FROM animais WHERE estado_ani = 'perdido' ORDER BY data_ani desc";
				} else {
					$queryDadosAnimais = "SELECT codigo_ani, codigo_usu, nome_foto_ani, especie_ani, sexo_ani, porte_ani, cor_ani, pelagem_ani, data_ani, nome_ani, informacoes_ani FROM animais WHERE estado_ani = 'perdido' $caracteristicas ORDER BY data_ani desc";
				}
				
				$resultadosDadosAnimais = mysqli_query($conexao, $queryDadosAnimais);
				$numeroResultados = mysqli_num_rows($resultadosDadosAnimais);

				if ($numeroResultados > 0) {
					while ($resultadosAnimais = mysqli_fetch_array($resultadosDadosAnimais)) {
			?>
				
				<div class="resultado">
					<div class="card">
						<figure><img src="ver-foto.php?codigo=<?= $resultadosAnimais['codigo_ani'] ?>&nome=<?= $resultadosAnimais['nome_foto_ani'] ?>" alt=""></figure>
						<div>
							<p>Espécie:
								<?php
									if ($resultadosAnimais['especie_ani'] == "cachorro") {
										echo " Cachorro";
									} else if ($resultadosAnimais['especie_ani'] == "gato") {
										echo " Gato";
									} else {
										echo " Outra";
									}
								?>
							</p>
							<p>Sexo:
								<?php
									if ($resultadosAnimais['sexo_ani'] == "macho") {
										echo " Macho";
									} else if ($resultadosAnimais['sexo_ani'] == "femea") {
										echo " Fêmea";
									} else {
										echo " Desconhecido";
									}
								?>
							</p>
							<p>Porte:
								<?php
									if ($resultadosAnimais['porte_ani'] == "pequeno") {
										echo " Pequeno";
									} else if ($resultadosAnimais['porte_ani'] == "medio") {
										echo " Médio";
									} else {
										echo " Grande";
									}
								?>
							</p>
							<p>Cor:
								<?php
									if ($resultadosAnimais['cor_ani'] == "clara") {
										echo " Clara";
									} else if ($resultadosAnimais['cor_ani'] == "cinza") {
										echo " Cinza ou acinzentada";
									} else if ($resultadosAnimais['cor_ani'] == "laranja") {
										echo " Laranja ou alaranjada";
									} else if ($resultadosAnimais['cor_ani'] == "escura") {
										echo " Escura";
									} else {
										echo " Outra";
									}
								?>
							</p>
							<p>Pelagem:
								<?php
									if ($resultadosAnimais['pelagem_ani'] == "curta") {
										echo " Curta";
									} else if ($resultadosAnimais['pelagem_ani'] == "longa") {
										echo " Longa";
									} else {
										echo " Ausente";
									}
								?>
							</p>
						</div>
						
						<span><?= date('d/m', strtotime($resultadosAnimais['data_ani'])); ?></span>
					</div>

					<div class="popup-container">
						<div class="transp-popup"></div>
						<div class="popup">
							<button class="btn-close-popup">
								<svg xmlns="http://www.w3.org/2000/svg" width="40px" height="40px" viewBox="0 0 40 40" enable-background="new 0 0 23 28">
									<line x1="5" y1="5" x2="35" y2="35" stroke="#424242" stroke-width="5" stroke-linecap="round" stroke-miterlimit="10"></line>
									<line x1="35" y1="5" x2="5" y2="35" stroke="#424242" stroke-width="5" stroke-linecap="round" stroke-miterlimit="10"></line>
								</svg>
							</button>
							<div class="dados-popup">
								<figure><img src="ver-foto.php?codigo=<?= $resultadosAnimais['codigo_ani'] ?>&nome=<?= $resultadosAnimais['nome_foto_ani'] ?>" alt=""></figure>
								<div class="popup-dados-animal">
									<p><strong>Nome:</strong>
										<?php
											if ($resultadosAnimais['nome_ani'] == "") {
												echo " Desconhecido";
											} else {
												echo $resultadosAnimais['nome_ani'];
											}
										?>
									</p>
									<p><strong>Espécie:</strong>
										<?php
											if ($resultadosAnimais['especie_ani'] == "cachorro") {
												echo " Cachorro";
											} else if ($resultadosAnimais['especie_ani'] == "gato") {
												echo " Gato";
											} else {
												echo " Outra";
											}
										?>
									</p>
									<p><strong>Sexo:</strong>
										<?php
											if ($resultadosAnimais['sexo_ani'] == "macho") {
												echo " Macho";
											} else if ($resultadosAnimais['sexo_ani'] == "femea") {
												echo " Fêmea";
											} else {
												echo " Desconhecido";
											}
										?>
									</p>
									<p><strong>Porte:</strong>
										<?php
											if ($resultadosAnimais['porte_ani'] == "pequeno") {
												echo " Pequeno";
											} else if ($resultadosAnimais['porte_ani'] == "medio") {
												echo " Médio";
											} else {
												echo " Grande";
											}
										?>
									</p>
									<p><strong>Cor:</strong>
										<?php
											if ($resultadosAnimais['cor_ani'] == "clara") {
												echo " Clara";
											} else if ($resultadosAnimais['cor_ani'] == "cinza") {
												echo " Cinza ou acinzentada";
											} else if ($resultadosAnimais['cor_ani'] == "laranja") {
												echo " Laranja ou alaranjada";
											} else if ($resultadosAnimais['cor_ani'] == "escura") {
												echo " Escura";
											} else {
												echo " Outra";
											}
										?>
									</p>
									<p><strong>Pelagem:</strong>
										<?php
											if ($resultadosAnimais['pelagem_ani'] == "curta") {
												echo " Curta";
											} else if ($resultadosAnimais['pelagem_ani'] == "longa") {
												echo " Longa";
											} else {
												echo " Ausente";
											}
										?>
									</p>
									<p><strong>Data do desaparecimento:</strong>
										<?= date('d/m/Y', strtotime($resultadosAnimais['data_ani'])); ?>
									</p>
									<p><strong>Informações adicionais:</strong>
										<?php
											if ($resultadosAnimais['informacoes_ani'] == "") {
												echo " Sem informações adicionais.";
											} else {
												echo $resultadosAnimais['informacoes_ani'];
											}
										?>
									</p>

									<a href="editar-encontrado.php?codigo=<?= $resultadosAnimais['codigo_ani'] ?>" class="btn-editar">
										<img src="icons/edit-blue.png" alt="">									
									</a>
								</div> <!-- DADOS ANIMAL -->
								
								<div class="popup-dados-usuario">
									<h4>Dados do usuário</h4>

									<?php
										$codigo_usu = $resultadosAnimais['codigo_usu'];
										$queryDadosUsuarios = "SELECT nome_usu, telefone_usu, email_usu FROM usuarios WHERE codigo_usu = '$codigo_usu'";
										$resultadosDadosUsuarios = mysqli_query($conexao, $queryDadosUsuarios);
										$resultadosUsuarios = mysqli_fetch_array($resultadosDadosUsuarios);
									?>

									<p><strong>Nome:</strong>
										<?= $resultadosUsuarios['nome_usu'] ?>
									</p>
									<p><strong>Telefone:</strong>
										<?= $resultadosUsuarios['telefone_usu'] ?>
									</p>
									<p><strong>Email:</strong>
										<?= $resultadosUsuarios['email_usu'] ?>
									</p>
								</div> <!-- DADOS USUÁRIO -->
							</div> <!-- DADOS POPUP -->
						</div>  <!-- POPUP -->
					</div> <!-- POPUP CONTAINER -->
				</div> <!-- RESULTADO -->
			
			<?php
					}
				} else {
			?>

				<p class="sem-resultados">Nenhum resultado encontrado</p>

			<?php
				}
			?>
		</div> <!-- RESULTADOS -->
	</main>

	<?php require ("footer.php"); ?>
	
	<script src="js/menu-animation.js"></script>
	<script src="js/sidebar-animation.js"></script>
	<script src="js/popup.js"></script>
	<script src="js/animacao-popup-editar.js"></script>
</body>
</html>

<?php mysqli_free_result($resultadosDadosAnimais); ?>