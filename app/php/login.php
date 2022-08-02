<?php 
include("conexao.php");
include("pegaIdUsuario.php");

if(isset($_POST['nome']) && isset($_POST['senha'])){
	

//recuperar dados

	$usuario= trim(strip_tags($_POST['nome']));
	$senha = trim(strip_tags($_POST['senha']));
	

	//Selecionar banco de dados 
	$select = "SELECT * from usuario WHERE BINARY nome_usu=:usuario AND BINARY senha_usu=:senha";
	
	try {
		$result = $con->prepare($select);
		$result->bindParam(':usuario', $usuario, PDO::PARAM_STR);
		$result->bindParam(':senha', $senha, PDO::PARAM_STR);
		$result->execute();
		$conta =$result->rowCount();
		if($conta==1){
			$usuario = $_POST['nome'];
			$senha = $_POST['senha'];
			$_SESSION['usuariowva'] = $usuario;
			$_SESSION['senhawva'] = $senha;
			echo "1";
			
			//header("Refresh: 2, home.php"); exit;
		
	
		}else{

			echo "0";
			
			}
		
		
		}catch(PDOException $e){
			echo 'Erro'.$e->getMessage();
			}
			
		
}//se clicar no botão entrar do sistema 


?>