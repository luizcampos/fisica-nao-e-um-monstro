  <?php
  
	ob_start(); // inicia o buffer de memória
	include("exibirPergunta.php");
	$conteudo = ob_get_contents(); // guarda o conteúdo do arquivo na 	variável (parseado normal).
	ob_end_clean();
	
	header ('Content-type: text/html; charset=iso-8859-1');
	require_once 'conexao.php';

 
	$query = "SELECT alternativa_id_alt_fk FROM perguntas_exercicios WHERE perguntas_exercicios.id_perg='$idPer' and perguntas_exercicios.Sub_Materia_id_sub='1'";
	
	
	try{

		$stmt = $con->prepare($query); //transforma a linguagem do BD
		$stmt->execute();
		$alter = $stmt->rowCount();  //recebe o resultado
		
		 while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
		
		echo $alternativa_id_alt_fk;
		if($alter==1){
			
			$resposta = 1; //se a alternativa certa for a, ele guarda e retorna 1
	
		}
		else if ($alter==2){
			
			$resposta = 2;
		}
		else if ($alter==3){
			
			$resposta = 3;
		}
		else if ($alter==4){
			
			$resposta = 4;
		}
		else if ($alter==5){
			
			$resposta = 5;
		}
         
      }
		}catch(PDOException $e){
				echo 'Erro '.$e->getMessage();

			}
?>