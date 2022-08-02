<?php
if(isset($_REQUEST['sair'])){
	session_destroy();
	session_unset(['usuariowva']);
	session_unset(['senhawva']);
	header("Location:index.php");
	}
?>