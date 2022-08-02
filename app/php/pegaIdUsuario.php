<?php

ob_start();
session_start();
//include("login.php");
	include("conexao.php");
	//Pegando o ID do usuario para Cadastrar
	$usuariowva=isset ($_SESSION["usuariowva"])?$_SESSION["usuariowva"]:"";

	//Selecionando id
	$pega = "SELECT id_usu FROM usuario WHERE nome_usu=:usuariowva";
	try {
		$result = $con->prepare($pega);
		$result->bindParam(':usuariowva', $usuariowva, PDO::PARAM_STR);
		$result->execute();
		foreach ($result as $linha) {
			$idUsu=$linha["id_usu"];

	}
	}catch(PDOException $e){
		
			echo 'Erro'.$e->getMessage();
	}
?>