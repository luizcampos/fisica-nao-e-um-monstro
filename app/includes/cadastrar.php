
<?php
$prefixo = rand(1,101);
	$tamanho2 = 14;
	$qtd2 = 50;
	$c2= "1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvxwyz";

		for($i = 0; $i<$qtd2; $i++)
		{
 		$cod = $prefixo;
 		for( $j = 0; $j< ( $tamanho2 - strlen($prefixo) ); $j++)
 		{
 		$cod .= $c2{mt_rand(0,61)};
 		}

		}
 		
include("includes/conexao.php");

if(isset($_POST['cadastrar'])){
	//recuperar dados
	$usuario = trim(strip_tags($_POST['usuario']));
	$senha = trim(strip_tags($_POST['senha']));
	$email = $_POST['email'];
	$codigo = utf8_decode(trim(strip_tags($_POST['codigo'])));
	$nivel = 1;
	$status = 1;
	
	}
				
	$select = "SELECT nome_usu from usuario WHERE  nome_usu=:usuario or email_usu=:email";
	try {
		$result = $pdo->prepare($select);
		$result->bindParam(':usuario', $usuario, PDO::PARAM_STR);
		$result->bindParam(':email', $email, PDO::PARAM_STR);
		$result->execute();
		$conta =$result->rowCount();
		//Condição de Cadastro
	if($conta==0){
		//Insere no banco de dados 
		$insert = "INSERT INTO usuario(nome_usu,senha_usu,email_usu,status_usu,nivel_usu,codigoRec_usu) VALUES(:usuario,:senha,:email,:status,:nivel,:codigo)";
		try {
		$result = $pdo->prepare($insert);
		$result->bindParam(':usuario', $usuario, PDO::PARAM_STR);
		$result->bindParam(':senha', $senha, PDO::PARAM_STR);
		$result->bindParam(':email', $email, PDO::PARAM_STR);
		$result->bindParam(':status', $status, PDO::PARAM_STR);
		$result->bindParam(':nivel',$nivel, PDO::PARAM_STR);
		$result->bindParam(':codigo',$codigo, PDO::PARAM_STR);
		$result->execute();
		$conta =$result->rowCount();
		if($conta==1){
			$usuario = $_POST['usuario'];
			$senha = $_POST['senha'];
			$_SESSION['usuariowva'] = $usuario;
			$_SESSION['senhawva'] = $senha;
			$_SESSION['emailwva'] = $email;
			
			echo "<script> alertify.alert('Cadastrado com sucesso!').set('basic', true)</script>;";
			header("Refresh: 2, index.php"); exit;
		}
		
		}catch(PDOException $e){
		echo 'Erro'.$e->getMessage();
		}
	}else{		echo "<script>  alertify.alert('Desculpe, mas já existe um usuário cadastrado com esse nome ou email. Por favor cadastre-se com outro!').set('basic', true);</script>";	
				header("Refresh: 4,cadastro.php"); exit;
			}
	}
		catch(PDOException $e){
			echo 'Erro'.$e->getMessage();

		}//se clicar no botão entrar do sistema 

		
?>