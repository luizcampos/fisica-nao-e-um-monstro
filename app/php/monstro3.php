<?php

	header ('Content-type: text/html; charset=iso-8859-1');
	require_once 'conexao.php';
	include("pegaIdUsuario.php");

		//MONSTRO 2		
		try{

		$query3 = "SELECT Monstrinho_id_mon FROM conquistas WHERE conquistas.usuarios_id_usu='$idUsu' and conquistas.Monstrinho_id_mon='3'";
		$stmt3 = $con->prepare($query3); //transforma a linguagem do BD
		$stmt3->execute();
		$monstro3 = $stmt3->rowCount();  //recebe o resultado
		
		 while ($row3= $stmt3->fetch(PDO::FETCH_ASSOC)){
            extract($row3);
             
            // creating new table row per record
                echo "{$Monstrinho_id_mon}";
				
 			//MONSTRO 1
			if($monstro3==3){
			
				$mon3 = 3; //se ele ganhou o monstro 1, a variavel mon1 recebe 1
				
			}
			else if ($monstro3==0){
			
				$mon3 = 0; 
			}
		}
	}catch(PDOException $e){
				echo 'Erro '.$e->getMessage();
				}
				
?>