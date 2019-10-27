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

	$estado_ani = $_GET['estado'];
	$codigo_ani = $_GET['codigo'];
	$codigo_usu = $_SESSION['codigo_usu'];

	$queryExcluirAnimal = "DELETE FROM animais WHERE codigo_ani = '$codigo_ani' AND codigo_usu = '$codigo_usu'";
	mysqli_query($conexao, $queryExcluirAnimal) or die ("Erro ao excluir o animal");

	if ($estado_ani == "encontrado") {
		header ('Location: encontrados.php');
	} else if ($estado_ani == "perdido") {
		header ('Location: perdidos.php');
	} else {
		header ('Location: adocao.php');
	}
}
?>