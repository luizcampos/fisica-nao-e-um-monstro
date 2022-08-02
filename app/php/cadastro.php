<?php

include("conexao.php");

if(isset($_POST['nome']) && isset($_POST['senha']) && isset($_POST['email'])&& isset($_POST['codigo'])){
	//recuperar dados
	$nome = trim(strip_tags($_POST['nome']));
	$senha = trim(strip_tags($_POST['senha']));
	$email = trim(strip_tags($_POST['email']));
	$codigo = utf8_decode(trim(strip_tags($_POST['codigo'])));
	}
	
	//verifica se tem algum usuário com o mesmo nome
	try {
	$select = "SELECT nome_usu from usuario WHERE  nome_usu=:usuario";
	
		$result = $con->prepare($select);
		$result->bindParam(':usuario', $nome, PDO::PARAM_STR);
		$result->execute();
		$conta =$result->rowCount();
		

			//Condição de Cadastro
			if($conta==0){
			//Insere no banco de dados 
			$insert = "INSERT INTO usuario(nome_usu,senha_usu,status_usu,nivel_usu,email_usu,codigoRec_usu) VALUES(:usuario,:senha,1,1,:email,:codigo)";
	
			try {
				$stmt = $con->prepare($insert);
				$stmt->bindParam(':usuario', $nome, PDO::PARAM_STR);
				$stmt->bindParam(':senha', $senha, PDO::PARAM_STR);
				$stmt->bindParam(':email', $email, PDO::PARAM_STR);
				$stmt->bindParam(':codigo',$codigo, PDO::PARAM_STR);
				$stmt->execute();
				$conta2 =$stmt->rowCount();
				
					if($conta2==1){
							$nome = $_POST['nome'];
							$senha = $_POST['senha'];
							$email = $_POST['email'];
							$_SESSION['usuariowva'] = $nome;
							$_SESSION['senhawva'] = $senha;
							$_SESSION['emailwva'] = $email;
							echo "<script>swal('Cadastrado com sucesso!');document.location='bemvindo.html';</script>";
		
					}
			}catch(PDOException $e){
				echo 'Erro'.$e->getMessage();
			} 
		}
		
	}catch(PDOException $e){
				echo 'Erro'.$e->getMessage();
		} 

?>

