<?php
$select = "SELECT * from perguntas_forum,usuario usuario where usuario.id_usu=perguntas_forum.user_per and perguntas_forum.user_per='$id' ";
	try {
		$result = $pdo->prepare($select);
		$result->execute();
		$conta =$result->rowCount();
	
	}catch(PDOException $e){
			echo 'Erro'.$e->getMessage();

		}
$selecione = "SELECT * from respostas_forum,usuario usuario where usuario.id_usu=respostas_forum.id_usu_fk and respostas_forum.id_usu_fk='$id' ";
	try {
		$result = $pdo->prepare($selecione);
		$result->execute();
		$cont =$result->rowCount();
	
	}catch(PDOException $e){
			echo 'Erro'.$e->getMessage();

		}


?>