<?php
session_start();
require ("head.php");
?>

	<title>Home | UtoPet - Encontre seu Bichinho</title>
	<script src="js/slider.js"></script>

<?php require ("header.php"); ?>

	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ MAIN ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
	<main id="main" class="main-home">
		<section class="slider">
			<div class="btn-esquerda">
				<img src="icons/angle-left.png" alt="Anterior">
			</div>
			<div class="slides">
				<div class="slide slide1">
					<div class="imagem-slide"></div>
					<div class="texto-slide">
						<h2>Animais Encontrados</h2>
						<p>Veja se alguém encontrou o seu bichinho ou publique um</p>
						<button onclick="window.location = 'encontrados.php';">Visitar</button>
					</div>
				</div>
				<div class="slide slide2">
					<div class="imagem-slide"></div>
					<div class="texto-slide">
						<h2>Animais Perdidos</h2>
						<p>Olhe os animais procurados ou publique o seu</p>
						<button onclick="window.location = 'perdidos.php';">Visitar</button>
					</div>
				</div>
				<div class="slide slide3">
					<div class="imagem-slide"></div>
					<div class="texto-slide">
						<h2>Animais para Adoção</h2>
						<p>Procure um animal de rua para adotar ou publique algum</p>
						<button onclick="window.location = 'adocao.php';">Visitar</button>
					</div>
				</div>
				<div class="slide slide4">
					<div class="imagem-slide"></div>
					<div class="texto-slide">
						<h2>ONGs de Jundiaí</h2>
						<p>Conheça as principais voluntárias e seus serviços</p>
						<button onclick="window.location = 'ongs.php';">Visitar</button>
					</div>
				</div>
				<div class="slide slide5">
					<div class="imagem-slide"></div>
					<div class="texto-slide">
						<h2>Sobre Nós</h2>
						<p>Conheça mais sobre o projeto e seus criadores</p>
						<button onclick="window.location = 'sobrenos.php';">Visitar</button>
					</div>
				</div>
			</div>
			<div class="btn-direita">
				<img src="icons/angle-right.png" alt="Próximo">
			</div>
		</section>

		<section class="como-agir">
			<h2>O que fazer ao encontrar um animal na rua?</h2>
			<p>Antes de tomar qualquer atitude em relação ao animal, é importante lembrar que ele pode estar com frio, fome e medo, portanto, é necessário ser prudente quanto ao que fazer. Nós não nos responsabilizamos por danos causados a qualquer pessoa ou animal.</p>

			<br>
			
			<p><strong>Observação:</strong> Sempre procure saber se o animal está realmente abandonado. Em alguns casos ele pode estar perdido.</p>

			<h3>Se não puder abrigá-lo</h3>
			<p>Caso encontre um animal na rua e não tenha condições ou sinta-se inseguro em ajudá-lo, por precaução, deixe-o no local e avise as autoridades sobre onde você o encontrou. O telefone de contato do Canil Municipal de Jundiaí é: (11) 4492-9087.</p>

			<h3>Caso decida abrigá-lo</h3>
			<div class="itens-abrigar">
				<div class="item item1">
					<img src="imagens/cachorro-triste.jpg" alt="Cachorro triste">
					<p><span class="nome-topico">1) Seja cauteloso:</span> Antes de tudo, é preciso tomar cuidado ao se aproximar do animal, pois ele pode atacar devido as dores ou traumas que pode ter sofrido. Como ele provavelmente não está acostumado com o contato de estranhos, tende a apresentar um comportamento agressivo, por isso é recomendado que se aproxime lentamente e com comida, para mostrar que ele não está sob ameaça.</p>
				</div>
				
				<div class="item item2">
					<img src="imagens/seringa.png" alt="Seringa">
					<p><span class="nome-topico">2) Quarentena:</span> Após retirá-lo da rua, ele deve permanecer em quarentena até que se tenha certeza de seu estado de saúde, para evitar a proliferação de doenças para outros animais. É recomendável que, após abrigá-lo, busque um veterinário para prevenir complicações.</p>
				</div>
				
				<div class="item item3">
					<img src="imagens/comidas.png" alt="Comidas">
					<p><span class="nome-topico">3) Alimentação:</span> Ao cuidar do animal, inicialmente se deve alimentá-lo com comidas leves e água, evitando sal e óleo que são prejudiciais para a saúde do animal.</p>
				</div>
				
				<div class="item item4">
					<img src="imagens/abrigo2.png" alt="Abrigo">
					<p><span class="nome-topico">4) Abrigo:</span> Caso você não tenha mais condições de cuidar do animal, tente conseguir abrigo em alguma ONG. Porém, grande parte delas sofrem com superlotação, então, no caso de não conseguir um auxílio, busque ajuda de amigos ou conhecidos.</p>
				</div>				
			</div>
		</section>
	</main>

	<?php require ("footer.php"); ?>

	<script src="js/menu-animation.js"></script>
</body>
</html>
