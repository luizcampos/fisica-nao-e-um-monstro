<?php

	header ('Content-type: text/html; charset=iso-8859-1');
	require_once 'conexao.php';
	include("pegaIdUsuario.php");

		//MONSTRO 2		
		try{

		$query2 = "SELECT Monstrinho_id_mon FROM conquistas WHERE conquistas.usuarios_id_usu='$idUsu' and conquistas.Monstrinho_id_mon='2'";
		$stmt2 = $con->prepare($query2); //transforma a linguagem do BD
		$stmt2->execute();
		$monstro2 = $stmt2->rowCount();  //recebe o resultado
		
		 while ($row2= $stmt2->fetch(PDO::FETCH_ASSOC)){
            extract($row2);
             
            // creating new table row per record
                echo "{$Monstrinho_id_mon}";
				
 			//MONSTRO 1
			if($monstro2==2){
			
				$mon2 = 2; //se ele ganhou o monstro 1, a variavel mon1 recebe 1
				
			}
			else if ($monstro2==0){
			
				$mon2 = 0; 
			}
		}
	}catch(PDOException $e){
				echo 'Erro '.$e->getMessage();
				}
				
?>