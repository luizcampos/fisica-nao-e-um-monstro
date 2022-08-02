<?php
//bloquear paginas de usuários comuns;

include("conexao.php");

//Pegando o ID do usuario para Cadastrar
$usuariowva=isset ($_SESSION["usuariowva"])?$_SESSION["usuariowva"]:"";

//Selecionando id
$pega = "SELECT * FROM usuario WHERE nome_usu=:usuariowva";
try {
		$result = $pdo->prepare($pega);
		$result->bindParam(':usuariowva', $usuariowva, PDO::PARAM_STR);
		$result->execute();
		foreach ($result as $linha) {
			$nivel=$linha["nivel_usu"];
			
			if ($nivel==1){
				header("Refresh: 0, home.php"); exit;
				}
		}
		
}catch(PDOException $e){
			echo 'Erro'.$e->getMessage();

		}
	
			 						
?>