  <?php
  //iso é não utf-8
	header ('Content-type: text/html; charset=iso-8859-1');
	require_once 'conexao.php';
	include("pegaIdUsuario.php");
 
	
	//MONSTRO 1
	try{

		$query = "SELECT Monstrinho_id_mon FROM conquistas WHERE conquistas.usuarios_id_usu='$idUsu' and conquistas.Monstrinho_id_mon='1' ";
		$stmt = $con->prepare($query); //transforma a linguagem do BD
		$stmt->execute();
		$monstro1 = $stmt->rowCount();  //recebe o resultado
		
		 while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
             
            // creating new table row per record
                echo "{$Monstrinho_id_mon}";
				
 			//MONSTRO 1
			if($monstro1==1){
			
				$mon1 = 1; //se ele ganhou o monstro 1, a variavel mon1 recebe 1
			}
			else if ($monstro1==0){
			
				$mon1 = 0; 
			}
		}
	}catch(PDOException $e){
				echo 'Erro '.$e->getMessage();
				}
				
         

?>