<?php

//Selecionar ultimas perguntas 
include("includes/conexao.php");

//Selecionar banco de dados 
	$select = "SELECT * from perguntas ORDER BY id_per DESC";
	
	try {
		$result = $pdo->prepare($select);
		$result->execute();
		$conta =$result->rowCount();
		if($conta>0){
			while($mostra =$result->FETCH(PDO::FETCH_OBJ)){ 
      			echo $mostra->titulo_per;
			}
		}else{
			echo "NÃO HÁ PERGUNTAS";
			
	 	}
		
		}
		catch(PDOException $e){
			echo 'Erro'.$e->getMessage();

		} 

?>