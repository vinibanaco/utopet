<?php
session_start();
require ("head.php");
?>
		
	<title>ONGs de Jundiaí | UtoPet - Encontre seu Bichinho</title>
	<script src="js/slider.js"></script>

<?php require ("header.php"); ?>

	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ MAIN ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
	<main id="main" class="main-home">
		<section class="img-destaque-ongs">
			<h2>ONGs de Jundiaí</h2>
		</section>

		<section class="como-agir ongs-container">
			<p>Existem algumas ONGs (Organizações Não Governamentais) que buscam ajudar os animais abandonados e conscientizar a população. Aqui estão algumas delas:</p>

			<div class="itens-abrigar ongs">
				<div class="item item1">
					<img src="imagens/ong-bicho-legal-logo.jpg" alt="Logo da ONG Bicho Legal">
					<div>
						<p><span class="nome-topico">ONG Bicho Legal:</span> Sua atuação tem um caráter preventivo com relação a orientação popular. A ONG realiza ações educativas que visam diminuir o número de abandonos e maus-tratos e sensibilizar o cidadão comum, incentivando a guarda responsável.</p>
						<div class="ong-contato">
							<h5>Contato:</h5>
							<ul>
								<li>E-mail: <a href="mailto:bicho.legal@yahoo.com.br">bicho.legal@yahoo.com.br</a></li>
								<li>Site: <a href="http://www.bicholegal.org.br/contato.php" target="_blank">http://www.bicholegal.org.br/contato.php</a></li>
							</ul>
						</div>
					</div>
				</div>

				<div class="item item2">
					<img src="imagens/turma-do-abrigo-logo.png" alt="Logo da Turma do Abrigo">
					<div>
						<p><span class="nome-topico">Turma do Abrigo:</span> Esta ONG fornece abrigo e tratamento de doenças para animais de rua. Também promove eventos beneficentes, para arrecadar alimento e remédio, além de feiras de adoção.</p>
						<div class="ong-contato">
							<h5>Contato:</h5>
							<ul>
								<li>Facebook: <a href="https://pt-br.facebook.com/turmadoabrigojundiai/">https://pt-br.facebook.com/turmadoabrigojundiai/</a></li>
							</ul>
						</div>
					</div>
				</div>

				<div class="item item3">
					<img src="imagens/sos-animais-abandonados-logo.jpg" alt="Logo da SOS Animais Abandonados">
					<div>
						<p><span class="nome-topico">SOS Animais Abandonados:</span> É um grupo de voluntários que, em pareceria com a população, leva animais abandonados para tratamento veterinário e para abrigos transitórios até que seja possível realoca-los em um lar definitivo. A ONG também promove feiras de adoção.</p>
						<div class="ong-contato">
							<h5>Contato:</h5>
							<ul>
								<li>Facebook: <a href="https://pt-br.facebook.com/sos.abandonados/">https://pt-br.facebook.com/sos.abandonados/</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</section>
	</main>

	<?php require ("footer.php"); ?>

	<script src="js/menu-animation.js"></script>
</body>
</html>