<?php
session_start();

if (
	isset($_SESSION['codigo_usu']) && 
	isset($_POST["nome_usu"]) && 
    isset($_POST["login_usu"]) && 
    isset($_POST["telefone_usu"]) && 
    isset($_POST["email_usu"]) && 
    isset($_POST["senha_usu"]) && 
    isset($_POST["confirmar_senha_usu"])
) {
    require ("conecta.php");

	$codigo_usu   = $_SESSION['codigo_usu'];
	$nome_usu     = $_POST["nome_usu"];
    $login_usu    = $_POST["login_usu"];
    $telefone_usu = $_POST["telefone_usu"];
    $email_usu    = $_POST["email_usu"];
	$senha_usu    = $_POST["senha_usu"];
	
	$queryUpdateUsuario = "UPDATE usuarios SET nome_usu = '$nome_usu', login_usu = '$login_usu', telefone_usu = '$telefone_usu', email_usu = '$email_usu', senha_usu = '$senha_usu' WHERE codigo_usu = '$codigo_usu'";
	mysqli_query($conexao, $queryUpdateUsuario) or die ("Algo deu errado ao alterar seus dados. Tente novamente.");

	echo "Dados atualizados!";

	header ('Location: usuario.php');

	if (mysqli_affected_rows($conexao) > 0) {
		echo "Dados atualizados com sucesso!";
	} else {
		echo "Não foi possível atualizar os dados.";
	}
} else {
	echo "
	<script>
		alert('Preencha todos os campos necessários');
		window.history.back();
	</script>";
}
?>