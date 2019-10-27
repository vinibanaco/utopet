<?php
session_start();

require ("conecta.php");

$login_usu = $_POST['login_usu'];
$senha_usu = $_POST['senha_usu'];

$sql = mysqli_query ($conexao, "SELECT * FROM usuarios WHERE login_usu = '$login_usu' AND senha_usu = '$senha_usu'");

if (mysqli_num_rows($sql) > 0){
	$rws = mysqli_fetch_array($sql);
	$_SESSION['codigo_usu']   = $rws['codigo_usu'];
	$_SESSION['nome_usu']     = $rws['nome_usu'];
	$_SESSION['login_usu']    = $rws['login_usu'];
	$_SESSION['telefone_usu'] = $rws['telefone_usu'];
	$_SESSION['email_usu']    = $rws['email_usu'];
	$_SESSION['senha_usu']    = $rws['senha_usu'];
	header('location: usuario.php');
	exit;
} else {
	unset ($_SESSION['login_usu']);
	unset ($_SESSION['senha_usu']);

	echo "
	<script>
		alert('Login ou senha incorretos');
		window.history.back();
	</script>";
	
	exit;
}
?>
