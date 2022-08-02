<?php

include 'conexao.php';
include("pegaIdUsuario.php");

if(isset($_POST['nome2'])){
	//recuperar dados
	$nome2 = trim(strip_tags($_POST['nome2']));
	}
	
	//verifica se tem algum usuário com o mesmo nome
	try {
	$select = "SELECT nome_usu FROM usuarios where nome_usu=':nome2'";
	
		$result = $con->prepare($select);
		$result->bindParam(':nome2', $nome, PDO::PARAM_STR);
		$result->execute();
		$conta =$result->rowCount();
		

			//Condição de Cadastro
			if($conta==1){
			//Insere no banco de dados 
			$update = "update usuario set nome_usu=':nome2'";
	
							echo "<script>alert('Editado com sucesso!');document.location='editar.html';</script>";
		
		}
		
	}catch(PDOException $e){
				echo 'Erro'.$e->getMessage();
		} 
?>

