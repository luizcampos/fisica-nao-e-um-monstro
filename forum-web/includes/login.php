<?php 
ob_start();
session_start();
if(isset($_SESSION['usuariowva']) && (isset($_SESSION['senhawva']))){
	header("Location:home.php");exit;
	}
	
include("includes/conexao.php");

if(isset($_GET['acao'])){
	$acao =$_GET['acao'];
	if($acao=='negado'){
		
		echo "<script>alertify.alert('Erro:','Erro ao acessar, você precisa estar logado!!'); </script>";
		
		}
	
	}

if(isset($_POST['logar'])){
	
	//recuperar dados
	$usuario = trim(strip_tags($_POST['usuario']));
	$senha =trim(strip_tags($_POST['senha']));
	//Selecionar banco de dados 
	$select = "SELECT * from usuario WHERE BINARY nome_usu=:usuario AND BINARY senha_usu=:senha";
	
	try {
		$result = $pdo->prepare($select);
		$result->bindParam(':usuario', $usuario, PDO::PARAM_STR);
		$result->bindParam(':senha', $senha, PDO::PARAM_STR);
		$result->execute();
		$conta =$result->rowCount();
		if($conta==1){
		while($mostra =$result->FETCH(PDO::FETCH_OBJ)){
			if($mostra->status_usu ==2){
				echo "<script>  alertify.alert('Sua conta foi bloqueada!Você não poderá realizar login durante um tempo determinado!').set('basic', true); </script>";
				header("Refresh: 3, index.php"); exit;
				
				}
			else if($mostra->status_usu ==1){
				
				$usuario = $_POST['usuario'];
				$senha = $_POST['senha'];
				$_SESSION['usuariowva'] = $usuario;
				$_SESSION['senhawva'] = $senha;	
				echo "<script>  alertify.alert('Logado com sucesso!').set('basic', true); </script>";
			
				header("Refresh: 2, home.php"); exit;
				
				}
		}
		
		}
		else{

			echo "<script>  alertify.alert('Usuário ou senha incorretos(verifique se você digitou corretamente o padrão de letras maiúsculas e minúsculas inseridos durante seu cadastro)!').set('basic', true); </script>";
			header("Refresh: 5, index.php"); exit;
		
			}
		
		}catch(PDOException $e){
			echo 'Erro'.$e->getMessage();
			}
		
	}//se clicar no botão entrar do sistema 

?>