<?php
session_start();

if (!isset($_SESSION['codigo_usu'])) {
	echo "
	<script>
		alert('Preencha todos os campos necessários');
		window.history.back();
	</script>";
} else {
	session_unset();
	session_destroy();

	header ('Location: index.php');
}
?>
