<?php
require ("conecta.php");

$codigo_ani = $_GET['codigo'];
$email = $_POST['email'];
$senha = $_POST['senha'];

$querySelecionaAnimal = "SELECT codigo_usu FROM animais WHERE codigo_ani = '$codigo_ani'";
$resultadosSelecionaAnimal = mysqli_query($conexao, $querySelecionaAnimal);
$dadosAnimal = mysqli_fetch_array($resultadosSelecionaAnimal);

$codigo_usu = $dadosAnimal['codigo_usu'];

$querySelecionaUsuario = "SELECT email_usu, senha_usu FROM usuarios WHERE codigo_usu = '$codigo_usu'";
$resultadosSelecionaUsuario = mysqli_query($conexao, $querySelecionaUsuario);
$dadosUsuario = mysqli_fetch_array($resultadosSelecionaUsuario);

if ($dadosUsuario['email_usu'] == $email && $dadosUsuario['senha_usu'] == $senha) {
	include ("editar-encontrado.php");
} else {
	echo "
	<script>
		alert('E-mail e/ou senha incorretos');
		window.history.back();
	</script>";
}
?>