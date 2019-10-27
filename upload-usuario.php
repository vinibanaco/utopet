<?php
if (
	isset($_POST["nome_usu"]) && 
	isset($_POST["login_usu"]) && 
	isset($_POST["telefone_usu"]) && 
	isset($_POST["email_usu"]) && 
	isset($_POST["senha_usu"]) && 
	isset($_POST["confirmar_senha_usu"])
) {
	require ("conecta.php");

	$login_usu = $_POST["login_usu"];

	$queryVerificaUsuario = "SELECT codigo_usu FROM usuarios WHERE login_usu = '$login_usu'";
	$resultadosVerificaUsuario = mysqli_query($conexao, $queryVerificaUsuario);
	$numeroResultados = mysqli_num_rows($resultadosVerificaUsuario);

	if ($numeroResultados != 0) {
		echo "
		<script>
			alert('Esse nome de login já está sendo utilizado');
			window.history.back();
		</script>";
	} else {
		$nome_usu     = $_POST["nome_usu"];
		$telefone_usu = $_POST["telefone_usu"];
		$email_usu    = $_POST["email_usu"];
		$senha_usu    = $_POST["senha_usu"];

		$queryInsereUsuario= "INSERT INTO usuarios(nome_usu, login_usu, telefone_usu, email_usu, senha_usu) VALUES ('$nome_usu', '$login_usu', '$telefone_usu', '$email_usu', '$senha_usu')";
		mysqli_query($conexao, $queryInsereUsuario);
			
		if (mysqli_affected_rows($conexao) != 0) {
			echo "cadastrado com Sucesso";
			header('location: index.php');
		} else {
			echo "Cadastro não realizado";    
		}
	}
} else {
	echo "
	<script>
		alert('Preencha todos os campos necessários');
		window.history.back();
	</script>";
}
?>