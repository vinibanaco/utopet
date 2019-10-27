<?php
	require ("conecta.php");
?>

<!DOCTYPE html>
<html>
<head lang="pt-br">
	<meta charset="UTF-8">
	<title> Armazenando imagens no banco de dados Mysql </title>
</head>

<body>
	<h2> Selecione um novo arquivo de imagem </h2>

	<form enctype="multipart/form-data" action="upload.php" method="post">
		<input type="hidden" name="MAX_FILE_SIZE" value="4194304">

		<input name="evento" type="text"><br>
		<input name="descricao" type="textarea"><br>
		<input name="imagem" type="file"><br>
		<input name="submit" type="submit" value="Salvar">
	</form>
	
	<br>

	<table border="1">
		<tr>
			<td align="center">Código</td>
			<td align="center">Evento</td>
			<td align="center">Descrição</td>
			<td align="center">Nome</td>
			<td align="center">Tamanho</td>
			<td align="center">Tipo</td>
			<td align="center">Visualizar imagem</td>
			<td align="center">Excluir imagem</td>
		</tr>
		<?php
			$querySelecao = "SELECT codigo, descricao, evento, imagem, nome_imagem, tamanho_imagem, tipo_imagem FROM tabela_imagens";
			$resultado = mysqli_query($conexao, $querySelecao);

			while ($aquivos = mysqli_fetch_array($resultado)) {
		?>
				<tr>
					<td align="center">
						<?=$aquivos['codigo'];?>
					</td>
					<td align="center">
						<?=$aquivos['evento']; ?>
					</td>
					<td align="center">
						<?=$aquivos['descricao']; ?>
					</td>
					<td align="center">
						<?=$aquivos['nome_imagem']; ?>
					</td>
					<td align="center">
						<?=$aquivos['tamanho_imagem']; ?>
					</td>
					<td align="center">
						<?=$aquivos['tipo_imagem']; ?>
					</td>
					<td align="center">
						<img src="ver_imagem.php?codigo=<?=$aquivos['codigo']?>&nome=<?=$aquivos['nome_imagem']?>" alt="" width="230px">
					</td>
					<td align="center">
						<a href="excluir_imagem.php?codigo=<?=$aquivos['codigo']?>">Excluir</a>
					</td>
				</tr>
		<?php } ?>
	</table>
</body>
</html>

<?php
	mysqli_free_result($resultado);
?>