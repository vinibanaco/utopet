<?php
session_start();

if (
	isset($_SESSION['codigo_usu']) && 
	isset($_POST['especie_ani']) && 
	isset($_POST['sexo_ani']) && 
	isset($_POST['porte_ani']) && 
	isset($_POST['cor_ani']) && 
	isset($_POST['pelagem_ani']) && 
	(isset($_POST['data_ani']) || $_GET['estado_ani'] == "adocao")
) {
	require ("conecta.php");

	$codigo_ani = $_GET['codigo'];
	$estado_ani = $_GET['estado_ani'];

	if ($estado_ani == "adocao") {
		$nome_ani = '';
		$data_ani = date('Y-m-d');
	} else {
		$nome_ani = $_POST['nome_ani'];
		$data_ani = $_POST['data_ani'];
	}

	$opcionais = "";
	if (file_exists($_FILES['foto_ani']['tmp_name']) || is_uploaded_file($_FILES['foto_ani']['tmp_name'])) {
		$foto_ani         = $_FILES['foto_ani']['tmp_name'];
		$tamanho_foto_ani = $_FILES['foto_ani']['size'];
		$tipo_foto_ani    = $_FILES['foto_ani']['type'];

		if (substr($tipo_foto_ani, 0, 5) == "image") {
			$fp = fopen($foto_ani, "rb");
			$foto_ani = fread($fp, $tamanho_foto_ani);
			$foto_ani = addslashes($foto_ani);
			fclose($fp);

			$extensao = strtolower(substr($_FILES['foto_ani']['name'],-4));
			$nome_foto_ani = date("YmdHis") . $extensao;

			$opcionais = "foto_ani = '$foto_ani', nome_foto_ani = '$nome_foto_ani', ";
		} else {
			echo "
			<script>
				alert('Não foi possível carregar o arquivo. Apenas imagens são permitidas.');
				window.history.back();
			</script>";
		}
	}

	$especie_ani     = $_POST['especie_ani'];
	$sexo_ani        = $_POST['sexo_ani'];
	$porte_ani       = $_POST['porte_ani'];
	$cor_ani         = $_POST['cor_ani'];
	$pelagem_ani     = $_POST['pelagem_ani'];
	$informacoes_ani = $_POST['informacoes_ani'];

	$queryUpdateAnimal = "UPDATE animais SET estado_ani = '$estado_ani', nome_ani = '$nome_ani', $opcionais especie_ani = '$especie_ani', sexo_ani = '$sexo_ani', porte_ani = '$porte_ani', cor_ani = '$cor_ani', pelagem_ani = '$pelagem_ani', data_ani = '$data_ani', informacoes_ani = '$informacoes_ani' WHERE codigo_ani = '$codigo_ani'";
	mysqli_query($conexao, $queryUpdateAnimal) or die ("Algo deu errado ao cadastrar o animal. Tente novamente.");

	if ($estado_ani == "encontrado") {
		header ('Location: encontrados.php');
	} else if ($estado_ani == "perdido") {
		header ('Location: perdidos.php');
	} else {
		header ('Location: adocao.php');
	}

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
