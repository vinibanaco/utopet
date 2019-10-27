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

	$codigo_usu = $_SESSION["codigo_usu"];
	
	$queryDadosUsuario = "SELECT nome_usu, login_usu, telefone_usu, email_usu FROM usuarios WHERE codigo_usu = '$codigo_usu'";
	$resultadosDadosUsuario = mysqli_query($conexao, $queryDadosUsuario);
	$resultadosUsuario = mysqli_fetch_array($resultadosDadosUsuario);

	require ("head.php");
	?>

		<title>Página do Usuário | UtoPet - Encontre seu Bichinho</title>

	<?php require ("header.php"); ?>

		<main id="main" class="main-usuario">
			<h2>Página do Usuário</h2>

			<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ SIDEBAR ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
			<aside class="sidebar-usuario">
				<figure>
					<img src="icons/user-white.png" alt="">
				</figure>
				<div class="conteudo-sidebar-usuario">
					<a class="btn-editar-usuario" href="editar-usuario.php">
						<img class="edit-blue" src="icons/edit-blue.png" alt="">
						<img class="edit-white" src="icons/edit-white.png" alt="">
					</a>
					<div class="dados-usuario">
						<p>Nome: <?= $resultadosUsuario['nome_usu'] ?></p>
						<p>Login: <?= $resultadosUsuario['login_usu'] ?></p>
						<p>Telefone: <?= $resultadosUsuario['telefone_usu'] ?></p>
						<p>E-mail: <?= $resultadosUsuario['email_usu'] ?></p>
					</div>
					<a class="btn-logout" href="logout.php"><span></span>Sair</a>
				</div>
			</aside>

			<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ CONTEÚDO ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
			<div class="conteudo">
				<section class="descricao descricao-usuario">
					<h2>Suas Publicações</h2>
					<p>Aqui você pode visualizar suas publicações feitas e editá-las se desejar.</p>
				</section>

				<!-- ~~~~~~~~~~~ ANIMAIS ENCONTRADOS ~~~~~~~~~~~ -->
				<h3>Animais Encontrados</h3>
				<div class="resultados">
					<?php
						$queryAnimaisEncontrados = "SELECT codigo_ani, codigo_usu, nome_foto_ani, especie_ani, sexo_ani, porte_ani, cor_ani, pelagem_ani, data_ani, nome_ani, informacoes_ani FROM animais WHERE codigo_usu = '$codigo_usu' AND estado_ani = 'encontrado' ORDER BY data_ani desc";		
						$resultadosAnimaisEncontrados = mysqli_query($conexao, $queryAnimaisEncontrados);
						$numeroResultadosEncontrados = mysqli_num_rows($resultadosAnimaisEncontrados);
		
						if ($numeroResultadosEncontrados > 0) {
							while ($animaisEncontrados = mysqli_fetch_array($resultadosAnimaisEncontrados)) {
					?>
						
						<div class="resultado">
							<div class="card">
								<figure><img src="ver-foto.php?codigo=<?= $animaisEncontrados['codigo_ani'] ?>&nome=<?= $animaisEncontrados['nome_foto_ani'] ?>" alt=""></figure>
								<div>
									<p>Espécie:
										<?php
											if ($animaisEncontrados['especie_ani'] == "cachorro") {
												echo " Cachorro";
											} else if ($animaisEncontrados['especie_ani'] == "gato") {
												echo " Gato";
											} else {
												echo " Outra";
											}
										?>
									</p>
									<p>Sexo:
										<?php
											if ($animaisEncontrados['sexo_ani'] == "macho") {
												echo " Macho";
											} else if ($animaisEncontrados['sexo_ani'] == "femea") {
												echo " Fêmea";
											} else {
												echo " Desconhecido";
											}
										?>
									</p>
									<p>Porte:
										<?php
											if ($animaisEncontrados['porte_ani'] == "pequeno") {
												echo " Pequeno";
											} else if ($animaisEncontrados['porte_ani'] == "medio") {
												echo " Médio";
											} else {
												echo " Grande";
											}
										?>
									</p>
									<p>Cor:
										<?php
											if ($animaisEncontrados['cor_ani'] == "clara") {
												echo " Clara";
											} else if ($animaisEncontrados['cor_ani'] == "cinza") {
												echo " Cinza ou acinzentada";
											} else if ($animaisEncontrados['cor_ani'] == "laranja") {
												echo " Laranja ou alaranjada";
											} else if ($animaisEncontrados['cor_ani'] == "escura") {
												echo " Escura";
											} else {
												echo " Outra";
											}
										?>
									</p>
									<p>Pelagem:
										<?php
											if ($animaisEncontrados['pelagem_ani'] == "curta") {
												echo " Curta";
											} else if ($animaisEncontrados['pelagem_ani'] == "longa") {
												echo " Longa";
											} else {
												echo " Ausente";
											}
										?>
									</p>
								</div>
								
								<span><?= date('d/m', strtotime($animaisEncontrados['data_ani'])); ?></span>
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
										<figure><img src="ver-foto.php?codigo=<?= $animaisEncontrados['codigo_ani'] ?>&nome=<?= $animaisEncontrados['nome_foto_ani'] ?>" alt=""></figure>
										<div class="popup-dados-animal">
											<p><strong>Nome:</strong>
												<?php
													if ($animaisEncontrados['nome_ani'] == "") {
														echo " Desconhecido";
													} else {
														echo $animaisEncontrados['nome_ani'];
													}
												?>
											</p>
											<p><strong>Espécie:</strong>
												<?php
													if ($animaisEncontrados['especie_ani'] == "cachorro") {
														echo " Cachorro";
													} else if ($animaisEncontrados['especie_ani'] == "gato") {
														echo " Gato";
													} else {
														echo " Outra";
													}
												?>
											</p>
											<p><strong>Sexo:</strong>
												<?php
													if ($animaisEncontrados['sexo_ani'] == "macho") {
														echo " Macho";
													} else if ($animaisEncontrados['sexo_ani'] == "femea") {
														echo " Fêmea";
													} else {
														echo " Desconhecido";
													}
												?>
											</p>
											<p><strong>Porte:</strong>
												<?php
													if ($animaisEncontrados['porte_ani'] == "pequeno") {
														echo " Pequeno";
													} else if ($animaisEncontrados['porte_ani'] == "medio") {
														echo " Médio";
													} else {
														echo " Grande";
													}
												?>
											</p>
											<p><strong>Cor:</strong>
												<?php
													if ($animaisEncontrados['cor_ani'] == "clara") {
														echo " Clara";
													} else if ($animaisEncontrados['cor_ani'] == "cinza") {
														echo " Cinza ou acinzentada";
													} else if ($animaisEncontrados['cor_ani'] == "laranja") {
														echo " Laranja ou alaranjada";
													} else if ($animaisEncontrados['cor_ani'] == "escura") {
														echo " Escura";
													} else {
														echo " Outra";
													}
												?>
											</p>
											<p><strong>Pelagem:</strong>
												<?php
													if ($animaisEncontrados['pelagem_ani'] == "curta") {
														echo " Curta";
													} else if ($animaisEncontrados['pelagem_ani'] == "longa") {
														echo " Longa";
													} else {
														echo " Ausente";
													}
												?>
											</p>
											<p><strong>Data do encontro:</strong>
												<?= date('d/m/Y', strtotime($animaisEncontrados['data_ani'])); ?>
											</p>
											<p><strong>Informações adicionais:</strong>
												<?php
													if ($animaisEncontrados['informacoes_ani'] == "") {
														echo " Sem informações adicionais.";
													} else {
														echo $animaisEncontrados['informacoes_ani'];
													}
												?>
											</p>

											<a href="editar-encontrado.php?codigo=<?= $animaisEncontrados['codigo_ani'] ?>" class="btn-editar">
												<img src="icons/edit-blue.png" alt="">									
											</a>
										</div> <!-- DADOS ANIMAL -->
										
										<div class="popup-dados-usuario">
											<h4>Dados do usuário</h4>
		
											<?php
												$codigo_usu = $animaisEncontrados['codigo_usu'];
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
											<p><strong>E-mail:</strong>
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
		
						<p class="sem-resultados">Você ainda não fez nenhuma publicação.</p>
		
					<?php
						}
					?>
				</div> <!-- RESULTADOS -->

				<!-- ~~~~~~~~~~~~ ANIMAIS PERDIDOS ~~~~~~~~~~~~ -->
				<h3>Animais Perdidos</h3>
				<div class="resultados">
					<?php
						$queryAnimaisPerdidos = "SELECT codigo_ani, codigo_usu, nome_foto_ani, especie_ani, sexo_ani, porte_ani, cor_ani, pelagem_ani, data_ani, nome_ani, informacoes_ani FROM animais WHERE codigo_usu = '$codigo_usu' AND estado_ani = 'perdido' ORDER BY data_ani desc";		
						$resultadosAnimaisPerdidos = mysqli_query($conexao, $queryAnimaisPerdidos);
						$numeroResultadosPerdidos = mysqli_num_rows($resultadosAnimaisPerdidos);
		
						if ($numeroResultadosPerdidos > 0) {
							while ($animaisPerdidos = mysqli_fetch_array($resultadosAnimaisPerdidos)) {
					?>
						
						<div class="resultado">
							<div class="card">
								<figure><img src="ver-foto.php?codigo=<?= $animaisPerdidos['codigo_ani'] ?>&nome=<?= $animaisPerdidos['nome_foto_ani'] ?>" alt=""></figure>
								<div>
									<p>Espécie:
										<?php
											if ($animaisPerdidos['especie_ani'] == "cachorro") {
												echo " Cachorro";
											} else if ($animaisPerdidos['especie_ani'] == "gato") {
												echo " Gato";
											} else {
												echo " Outra";
											}
										?>
									</p>
									<p>Sexo:
										<?php
											if ($animaisPerdidos['sexo_ani'] == "macho") {
												echo " Macho";
											} else if ($animaisPerdidos['sexo_ani'] == "femea") {
												echo " Fêmea";
											} else {
												echo " Desconhecido";
											}
										?>
									</p>
									<p>Porte:
										<?php
											if ($animaisPerdidos['porte_ani'] == "pequeno") {
												echo " Pequeno";
											} else if ($animaisPerdidos['porte_ani'] == "medio") {
												echo " Médio";
											} else {
												echo " Grande";
											}
										?>
									</p>
									<p>Cor:
										<?php
											if ($animaisPerdidos['cor_ani'] == "clara") {
												echo " Clara";
											} else if ($animaisPerdidos['cor_ani'] == "cinza") {
												echo " Cinza ou acinzentada";
											} else if ($animaisPerdidos['cor_ani'] == "laranja") {
												echo " Laranja ou alaranjada";
											} else if ($animaisPerdidos['cor_ani'] == "escura") {
												echo " Escura";
											} else {
												echo " Outra";
											}
										?>
									</p>
									<p>Pelagem:
										<?php
											if ($animaisPerdidos['pelagem_ani'] == "curta") {
												echo " Curta";
											} else if ($animaisPerdidos['pelagem_ani'] == "longa") {
												echo " Longa";
											} else {
												echo " Ausente";
											}
										?>
									</p>
								</div>
								
								<span><?= date('d/m', strtotime($animaisPerdidos['data_ani'])); ?></span>
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
										<figure><img src="ver-foto.php?codigo=<?= $animaisPerdidos['codigo_ani'] ?>&nome=<?= $animaisPerdidos['nome_foto_ani'] ?>" alt=""></figure>
										<div class="popup-dados-animal">
											<p><strong>Nome:</strong>
												<?php
													if ($animaisPerdidos['nome_ani'] == "") {
														echo " Desconhecido";
													} else {
														echo $animaisPerdidos['nome_ani'];
													}
												?>
											</p>
											<p><strong>Espécie:</strong>
												<?php
													if ($animaisPerdidos['especie_ani'] == "cachorro") {
														echo " Cachorro";
													} else if ($animaisPerdidos['especie_ani'] == "gato") {
														echo " Gato";
													} else {
														echo " Outra";
													}
												?>
											</p>
											<p><strong>Sexo:</strong>
												<?php
													if ($animaisPerdidos['sexo_ani'] == "macho") {
														echo " Macho";
													} else if ($animaisPerdidos['sexo_ani'] == "femea") {
														echo " Fêmea";
													} else {
														echo " Desconhecido";
													}
												?>
											</p>
											<p><strong>Porte:</strong>
												<?php
													if ($animaisPerdidos['porte_ani'] == "pequeno") {
														echo " Pequeno";
													} else if ($animaisPerdidos['porte_ani'] == "medio") {
														echo " Médio";
													} else {
														echo " Grande";
													}
												?>
											</p>
											<p><strong>Cor:</strong>
												<?php
													if ($animaisPerdidos['cor_ani'] == "clara") {
														echo " Clara";
													} else if ($animaisPerdidos['cor_ani'] == "cinza") {
														echo " Cinza ou acinzentada";
													} else if ($animaisPerdidos['cor_ani'] == "laranja") {
														echo " Laranja ou alaranjada";
													} else if ($animaisPerdidos['cor_ani'] == "escura") {
														echo " Escura";
													} else {
														echo " Outra";
													}
												?>
											</p>
											<p><strong>Pelagem:</strong>
												<?php
													if ($animaisPerdidos['pelagem_ani'] == "curta") {
														echo " Curta";
													} else if ($animaisPerdidos['pelagem_ani'] == "longa") {
														echo " Longa";
													} else {
														echo " Ausente";
													}
												?>
											</p>
											<p><strong>Data do encontro:</strong>
												<?= date('d/m/Y', strtotime($animaisPerdidos['data_ani'])); ?>
											</p>
											<p><strong>Informações adicionais:</strong>
												<?php
													if ($animaisPerdidos['informacoes_ani'] == "") {
														echo " Sem informações adicionais.";
													} else {
														echo $animaisPerdidos['informacoes_ani'];
													}
												?>
											</p>

											<a href="editar-perdido.php?codigo=<?= $animaisPerdidos['codigo_ani'] ?>" class="btn-editar">
												<img src="icons/edit-blue.png" alt="">									
											</a>
										</div> <!-- DADOS ANIMAL -->
										
										<div class="popup-dados-usuario">
											<h4>Dados do usuário</h4>
		
											<?php
												$codigo_usu = $animaisPerdidos['codigo_usu'];
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
											<p><strong>E-mail:</strong>
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
		
						<p class="sem-resultados">Você ainda não fez nenhuma publicação.</p>
		
					<?php
						}
					?>
				</div> <!-- RESULTADOS -->

				<!-- ~~~~~~~~~~~ ANIMAIS PARA ADOÇÃO ~~~~~~~~~~~ -->
				<h3>Animais para Adoção</h3>
				<div class="resultados">
					<?php
						$queryAnimaisAdocao = "SELECT codigo_ani, codigo_usu, nome_foto_ani, especie_ani, sexo_ani, porte_ani, cor_ani, pelagem_ani, data_ani, nome_ani, informacoes_ani FROM animais WHERE codigo_usu = '$codigo_usu' AND estado_ani = 'adocao' ORDER BY data_ani desc";		
						$resultadosAnimaisAdocao = mysqli_query($conexao, $queryAnimaisAdocao);
						$numeroResultadosAdocao = mysqli_num_rows($resultadosAnimaisAdocao);
		
						if ($numeroResultadosAdocao > 0) {
							while ($animaisAdocao = mysqli_fetch_array($resultadosAnimaisAdocao)) {
					?>
						
						<div class="resultado">
							<div class="card">
								<figure><img src="ver-foto.php?codigo=<?= $animaisAdocao['codigo_ani'] ?>&nome=<?= $animaisAdocao['nome_foto_ani'] ?>" alt=""></figure>
								<div>
									<p>Espécie:
										<?php
											if ($animaisAdocao['especie_ani'] == "cachorro") {
												echo " Cachorro";
											} else if ($animaisAdocao['especie_ani'] == "gato") {
												echo " Gato";
											} else {
												echo " Outra";
											}
										?>
									</p>
									<p>Sexo:
										<?php
											if ($animaisAdocao['sexo_ani'] == "macho") {
												echo " Macho";
											} else if ($animaisAdocao['sexo_ani'] == "femea") {
												echo " Fêmea";
											} else {
												echo " Desconhecido";
											}
										?>
									</p>
									<p>Porte:
										<?php
											if ($animaisAdocao['porte_ani'] == "pequeno") {
												echo " Pequeno";
											} else if ($animaisAdocao['porte_ani'] == "medio") {
												echo " Médio";
											} else {
												echo " Grande";
											}
										?>
									</p>
									<p>Cor:
										<?php
											if ($animaisAdocao['cor_ani'] == "clara") {
												echo " Clara";
											} else if ($animaisAdocao['cor_ani'] == "cinza") {
												echo " Cinza ou acinzentada";
											} else if ($animaisAdocao['cor_ani'] == "laranja") {
												echo " Laranja ou alaranjada";
											} else if ($animaisAdocao['cor_ani'] == "escura") {
												echo " Escura";
											} else {
												echo " Outra";
											}
										?>
									</p>
									<p>Pelagem:
										<?php
											if ($animaisAdocao['pelagem_ani'] == "curta") {
												echo " Curta";
											} else if ($animaisAdocao['pelagem_ani'] == "longa") {
												echo " Longa";
											} else {
												echo " Ausente";
											}
										?>
									</p>
								</div>
								
								<span><?= date('d/m', strtotime($animaisAdocao['data_ani'])); ?></span>
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
										<figure><img src="ver-foto.php?codigo=<?= $animaisAdocao['codigo_ani'] ?>&nome=<?= $animaisAdocao['nome_foto_ani'] ?>" alt=""></figure>
										<div class="popup-dados-animal">
											<p><strong>Nome:</strong>
												<?php
													if ($animaisAdocao['nome_ani'] == "") {
														echo " Desconhecido";
													} else {
														echo $animaisAdocao['nome_ani'];
													}
												?>
											</p>
											<p><strong>Espécie:</strong>
												<?php
													if ($animaisAdocao['especie_ani'] == "cachorro") {
														echo " Cachorro";
													} else if ($animaisAdocao['especie_ani'] == "gato") {
														echo " Gato";
													} else {
														echo " Outra";
													}
												?>
											</p>
											<p><strong>Sexo:</strong>
												<?php
													if ($animaisAdocao['sexo_ani'] == "macho") {
														echo " Macho";
													} else if ($animaisAdocao['sexo_ani'] == "femea") {
														echo " Fêmea";
													} else {
														echo " Desconhecido";
													}
												?>
											</p>
											<p><strong>Porte:</strong>
												<?php
													if ($animaisAdocao['porte_ani'] == "pequeno") {
														echo " Pequeno";
													} else if ($animaisAdocao['porte_ani'] == "medio") {
														echo " Médio";
													} else {
														echo " Grande";
													}
												?>
											</p>
											<p><strong>Cor:</strong>
												<?php
													if ($animaisAdocao['cor_ani'] == "clara") {
														echo " Clara";
													} else if ($animaisAdocao['cor_ani'] == "cinza") {
														echo " Cinza ou acinzentada";
													} else if ($animaisAdocao['cor_ani'] == "laranja") {
														echo " Laranja ou alaranjada";
													} else if ($animaisAdocao['cor_ani'] == "escura") {
														echo " Escura";
													} else {
														echo " Outra";
													}
												?>
											</p>
											<p><strong>Pelagem:</strong>
												<?php
													if ($animaisAdocao['pelagem_ani'] == "curta") {
														echo " Curta";
													} else if ($animaisAdocao['pelagem_ani'] == "longa") {
														echo " Longa";
													} else {
														echo " Ausente";
													}
												?>
											</p>
											<p><strong>Data do encontro:</strong>
												<?= date('d/m/Y', strtotime($animaisAdocao['data_ani'])); ?>
											</p>
											<p><strong>Informações adicionais:</strong>
												<?php
													if ($animaisAdocao['informacoes_ani'] == "") {
														echo " Sem informações adicionais.";
													} else {
														echo $animaisAdocao['informacoes_ani'];
													}
												?>
											</p>

											<a href="editar-adocao.php?codigo=<?= $animaisAdocao['codigo_ani'] ?>" class="btn-editar">
												<img src="icons/edit-blue.png" alt="">									
											</a>
										</div> <!-- DADOS ANIMAL -->
										
										<div class="popup-dados-usuario">
											<h4>Dados do usuário</h4>
		
											<?php
												$codigo_usu = $animaisAdocao['codigo_usu'];
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
											<p><strong>E-mail:</strong>
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
		
						<p class="sem-resultados">Você ainda não fez nenhuma publicação.</p>
		
					<?php
						}
					?>
				</div> <!-- RESULTADOS -->
			</div> <!-- CONTEÚDO -->
		</main>

		<?php require ("footer.php"); ?>

		<script src="js/menu-animation.js"></script>
		<script src="js/popup.js"></script>
	</body>
	</html>
<?php } ?>
