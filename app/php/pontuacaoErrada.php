<?php

require_once("conexao.php");
include("pegaIdUsuario.php");

	ob_start(); 
	include("exibirPergunta.php");
	$conteudo = ob_get_contents();
	ob_end_clean();
	
	$resposta1 = 0;
	$resposta = 0;
	
header ('Content-type: text/html; charset=iso-8859-1');
	
$query3 = "SELECT id_pon FROM pontuacao WHERE Sub_Materia_id_sub_fk='1' and usuarios_id_usu='$idUsu' and perguntas_exercicios_id_perg ='$idPer'";
		
		try{

		$stmt = $con->prepare($query3); //transforma a linguagem do BD
		$stmt->execute();
		$alter = $stmt->rowCount();  //recebe o resultado
		
		//echo "$alter";
			
		//Se retornar 1 linha ou mais, ja foi registrado...
		if ($alter>0)
		{
			
		}
			
		else if ($alter==0)
		{

			$insert = "INSERT INTO pontuacao(perguntas_exercicios_id_perg,usuarios_id_usu,pontos_pon,Sub_Materia_id_sub_fk	) VALUES('$idPer','$idUsu','0','1')";
			 
							
			try {
				$stmt = $con->prepare($insert);
				$stmt->execute();
				$conta2 =$stmt->rowCount();
				
					if($conta2==1){
							
							$teste = "ooii";
							
					}
					
					//VERIFICA SE ELE TEM 5 PONTOS
					$query4 = "SELECT count(pontos_pon) AS pontos_pon FROM pontuacao WHERE Sub_Materia_id_sub_fk='1' and usuarios_id_usu='$idUsu' and pontos_pon='1'";
					
					try{

						$stmt = $con->prepare($query4); //transforma a linguagem do BD
						$stmt->execute();
						$alter2 = $stmt->rowCount();  //recebe o resultado
		
						//SE ELE TIVER REGISTRO
						if ($alter2>0)
						{
							while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        					extract($row);
							
								//echo "$pontos_pon";
								
								//SE FOR >= A 5
							}
							if($pontos_pon>=5 && $idPer==10)
								{
									$resposta = 10;
									
									echo "$resposta";
									
									if ($pontos_pon==5)
									{
										echo "$pontos_pon";
									}
									else if ($pontos_pon==6)
									{
										echo "$pontos_pon";
									}
									else if ($pontos_pon==7)
									{
										echo "$pontos_pon";
									}
									else if ($pontos_pon==8)
									{
										echo "$pontos_pon";
									}
									else if ($pontos_pon==9)
									{
										echo "$pontos_pon";
									}
									else if ($pontos_pon==10)
									{
										echo "$pontos_pon";
									}
								}
							if($pontos_pon<5 && $idPer==10)
								{
									$resposta = 11;
									
									echo "$resposta";
									
									if ($pontos_pon==1)
									{
										echo "$pontos_pon";
									}
									else if ($pontos_pon==2)
									{
										echo "$pontos_pon";
									}
									else if ($pontos_pon==3)
									{
										echo "$pontos_pon";
									}
									else if ($pontos_pon==4)
									{
										echo "$pontos_pon";
									}
								}
							if($pontos_pon>=5)
							{
								
							//VERIFICA SE ELE JA TEM O MONSTRO DA MATERIA
							$query5 = "SELECT conquistas.id_con FROM conquistas WHERE conquistas.Monstrinho_id_mon='1' and conquistas.usuarios_id_usu='$idUsu'";
							try{
								//echo "Vc tem 5 pontos";
								$stmt = $con->prepare($query5); 
								$stmt->execute();
								$alter3 = $stmt->rowCount(); 

								//SE ELE TIVER O MONSTRO
								if ($alter3>0)
								{
									
								}
								
								//SE ELE NÃO TIVER O MONSTRO, ELE GANHA
								else
								{
									
									$insert2 = "INSERT INTO conquistas (Monstrinho_id_mon,usuarios_id_usu) VALUES ('1', '$idUsu');";
			 
							
									try {
										$stmt = $con->prepare($insert2);
										$stmt->execute();
										$conta3 =$stmt->rowCount();
										
										 
									}catch(PDOException $e){
										echo 'Erro'.$e->getMessage();
									} 
								}
							}catch(PDOException $e){
									echo 'Erro'.$e->getMessage();
							} 
							}
						}
			}catch(PDOException $e){
				echo 'Erro'.$e->getMessage();
			} 
			
			}catch(PDOException $e){
				echo 'Erro'.$e->getMessage();
			} 
						}
        
		}catch(PDOException $e){
				echo 'Erro '.$e->getMessage();

			}
?>