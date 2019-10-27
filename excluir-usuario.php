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

	$queryExcluirUsuario = "DELETE FROM usuarios WHERE codigo_usu = '$codigo_usu'";
	mysqli_query($conexao, $queryExcluirUsuario) or die ("Erro ao excluir o usuário");

	session_unset();
	session_destroy();

	header('location: index.php');
}
?>