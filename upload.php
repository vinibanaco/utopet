<?php
session_start();

if (
	isset($_SESSION['codigo_usu']) && 
	isset($_POST['especie_ani']) && 
	isset($_POST['sexo_ani']) && 
	isset($_POST['porte_ani']) && 
	isset($_POST['cor_ani']) && 
	isset($_POST['pelagem_ani']) && 
	(isset($_POST['data_ani']) || $_GET['estado_ani'] == "adocao") && 
	isset($_FILES['foto_ani']['tmp_name'])
) {
	require ("conecta.php");
	
	$codigo_usu = $_SESSION['codigo_usu'];

	$estado_ani = $_GET['estado_ani'];

	if ($estado_ani == "adocao") {
		$nome_ani = '';
		$data_ani = date('Y-m-d');
	} else {
		$nome_ani = $_POST['nome_ani'];
		$data_ani = $_POST['data_ani'];
	}

	$foto_ani         = $_FILES['foto_ani']['tmp_name'];
	$tamanho_foto_ani = $_FILES['foto_ani']['size'];
	$tipo_foto_ani    = $_FILES['foto_ani']['type'];
	$especie_ani      = $_POST['especie_ani'];
	$sexo_ani         = $_POST['sexo_ani'];
	$porte_ani        = $_POST['porte_ani'];
	$cor_ani          = $_POST['cor_ani'];
	$pelagem_ani      = $_POST['pelagem_ani'];
	$informacoes_ani  = $_POST['informacoes_ani'];

	if (substr($tipo_foto_ani, 0, 5) == "image") {
		if (strlen($informacoes_ani) <= 200) {
			$fp = fopen($foto_ani, "rb");
			$foto_ani = fread($fp, $tamanho_foto_ani);
			$foto_ani = addslashes($foto_ani);
			fclose($fp);

			$extensao = substr($_FILES['foto_ani']['name'], strrpos($_FILES['foto_ani']['name'], '.'));
			$nome_foto_ani = date("YmdHis") . $extensao;
			
			$queryInsercaoAnimais = "INSERT INTO animais (codigo_usu, estado_ani, nome_ani, foto_ani, nome_foto_ani, especie_ani, sexo_ani, porte_ani, cor_ani, pelagem_ani, data_ani, informacoes_ani) VALUES ('$codigo_usu', '$estado_ani', '$nome_ani', '$foto_ani', '$nome_foto_ani', '$especie_ani', '$sexo_ani', '$porte_ani', '$cor_ani', '$pelagem_ani', '$data_ani', '$informacoes_ani')";	
			
			mysqli_query($conexao, $queryInsercaoAnimais) or die ("Algo deu errado ao cadastrar o animal. Tente novamente.");

			echo 'Registro inserido com sucesso!';

			if ($estado_ani == "encontrado") {
				header ('Location: encontrados.php');
			} else if ($estado_ani == "perdido") {
				header ('Location: perdidos.php');
			} else {
				header ('Location: adocao.php');
			}

			if (mysqli_affected_rows($conexao) > 0) {
				echo "O animal foi cadastrado com sucesso.";
			} else {
				echo "Não foi possível fazer o cadastro do animal.";
			}
		} else {
			echo "
			<script>
				alert('As informações devem ter no máximo 200 caracteres.');
				window.history.back();
			</script>";
		}		
	} else {
		echo "Não foi possível carregar o arquivo. Apenas imagens são permitidas.";
	}
}
?>
