<?php
	$host = "localhost";
	$user = "root";
	$pass = "";
	$data = "utopet";
	
	$conexao = mysqli_connect($host, $user, $pass, $data);
	
	if (!$conexao) {
		echo "Error: Falha ao conectar-se com o banco de dados. Tente novamente mais tarde.";
		exit;
	}
?>