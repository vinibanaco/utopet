<?php
	require ("conecta.php");
	
	if (isset($_GET['codigo'])) {
		$codigo = $_GET['codigo'];
		$query = "SELECT imagem FROM tabela_imagens WHERE codigo = $codigo";
		$resultado = mysqli_query($conexao, $query);

		$nome = $_GET['nome'];
		$extensao = strtolower(substr($nome,-3));

		$imagem = mysqli_fetch_object($resultado);
		
		header("content-type: image/" . $extensao);
		echo $imagem -> imagem;
	} else {
		echo "Ocorreu um problema ao visualizar a imagem =(";
	}
?>