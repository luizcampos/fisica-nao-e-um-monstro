<?php
	if(isset($_GET['id'])){
	$exibir=$_GET['id'];
}
	
if(isset($_POST['nivel'])){

	//recuperar dados
	$nivel= trim(strip_tags($_POST['muda']));
	if ($nivel==0){
		echo "<script>alertify.alert('Erro:','Por favor, selecione uma opção !').set('label', 'ok!');</script> ";
		return false;
		
	}
	//ALTERANDO NIVEL DO USUÁRIO
	else {
		//Selecionando nivel 
		$select = "SELECT * from usuario where id_usu='$exibir'";
		try {
			$result = $pdo->prepare($select);
			$result->execute();
			$conta =$result->rowCount();
			$mostra =$result->FETCH(PDO::FETCH_OBJ);
			$n1=$mostra->nivel_usu;
			$status=$mostra->status_usu;
			if($conta==1){
				if ($nivel==1 && $status==2){
					echo "<script>alertify.alert('Erro:','Este usuário está bloqueado não é possivel alterar seu nivel!').set('label', 'ok!');</script> ";
					}
				else {
			//Alterarndo nivel	
			$update="UPDATE usuario SET nivel_usu=:nivel WHERE id_usu='$exibir'";
			try {
			$result = $pdo->prepare($update);
			$result->bindParam(':nivel', $nivel, PDO::PARAM_STR);
			$result->execute();
			$select2 = "SELECT * from usuario where id_usu='$exibir'";
		
			if($n1!=$nivel){
				echo "<script>alertify.alert('Sucesso:','Nível do usuário  alterado com sucesso !').set('label', 'ok!');</script> ";
				}
			else{
				echo "<script>alertify.alert('Erro:','Este ja é o nivel desse usuário!').set('label', 'ok!');</script> ";
				}
			
			
			}catch(PDOException $e){
				echo 'Erro'.$e->getMessage();

		}
}	}
		
	}catch(PDOException $e){
	echo 'Erro'.$e->getMessage();

	} 
	}
}

?>