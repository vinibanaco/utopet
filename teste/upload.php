<?php
	if (isset($_POST['submit'])) {
		require ("conecta.php");

		$nomeEvento = $_POST['evento'];
		$descricaoEvento = $_POST['descricao'];
		$imagem = $_FILES['imagem']['tmp_name'];
		$tamanho = $_FILES['imagem']['size'];
		$tipo = $_FILES['imagem']['type'];
		
		if (substr($tipo, 0, 5) == "image") {
			$fp = fopen($imagem, "rb");
			$conteudo = fread($fp, $tamanho);
			$conteudo = addslashes($conteudo);
			fclose($fp);

			$extensao = strtolower(substr($_FILES['imagem']['name'],-4));
			$nome = date("YmdHis") . $extensao;
			
			$queryInsercao = "INSERT INTO tabela_imagens (descricao, evento, imagem, nome_imagem, tamanho_imagem, tipo_imagem) VALUES ('$descricaoEvento', '$nomeEvento', '$conteudo', '$nome', '$tamanho', '$tipo')";
			
			mysqli_query($conexao, $queryInsercao) or die ("Algo deu errado ao inserir o registro. Tente novamente.");
			
			echo 'Registro inserido com sucesso!'; 
			header('Location: index.php');
			if (mysqli_affected_rows($conexao) > 0) {
				print "A imagem foi salva na base de dados.";
			} else {
				print "Não foi possível salvar a imagem na base de dados.";
			}
		} else {
			print "Não foi possível carregar o arquivo. Apenas imagens são permitidas.";
		}
	}
?>