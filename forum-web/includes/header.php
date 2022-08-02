<?php
ob_start();
session_start();

if(!isset($_SESSION['usuariowva']) && (!isset($_SESSION['senhawva']))){
	header("Location:index.php?acao=negado");exit;
	}
include("includes/conexao.php");
include("includes/logout.php");


?>


