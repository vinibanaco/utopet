<?php
require ("conecta.php");

if (isset($_GET['codigo'])) {
	$codigo = $_GET['codigo'];
	$queryFoto = "SELECT foto_ani FROM animais WHERE codigo_ani = $codigo";
	$resultadoFoto = mysqli_query($conexao, $queryFoto);

	$nome = $_GET['nome'];
	$extensao = strtolower(substr($nome,-3));

	$foto = mysqli_fetch_object($resultadoFoto);
	
	header("content-type: image/" . $extensao);
	echo $foto -> foto_ani;
} else {
	echo "Ocorreu um problema ao visualizar a imagem =(";
}
?>