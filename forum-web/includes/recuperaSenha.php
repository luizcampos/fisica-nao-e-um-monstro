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
if(isset($_POST['recuperar'])){
	
	//recuperar dados
	$codigo = trim(strip_tags($_POST['codigo']));
	if ($codigo!=""){
	//Selecionar banco de dados 
	$select = "SELECT codigoRec_usu,nome_usu from usuario WHERE BINARY codigoRec_usu=:codigo";
	
	try {
		$result = $pdo->prepare($select);
		$result->bindParam(':codigo', $codigo, PDO::PARAM_STR);
		$result->execute();
		$conta =$result->rowCount();
		$nome = $result->FETCH(PDO::FETCH_OBJ);
		if($conta==1){
		echo '<div id="sugetao"><img src="imagem/Icone/exclamation.png" /> Sucesso! Aguarde alguns segundos para redefinir sua senha!</div>';
		header("Refresh: 3,redefinir.php?user=$nome->nome_usu&confirme=$nome->codigoRec_usu&$cod"); exit;
				
	        }else{
				echo '<div id="erro"><img src="imagem/Icone/warning.png" />Erro !Código inserido invalido, verifique se digitou  seu código corretamente </div>';
				header("Refresh: 3, lembrar.php"); exit;
				}
		
		}catch(PDOException $e){
			echo 'Erro'.$e->getMessage();
			}
	}
	}//se clicar no 


  ?>    