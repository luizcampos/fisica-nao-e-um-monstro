  <?php
  	$idPer=1;
	$idSub=1;
	//$idPer=$idPer;

	
  	//iso e não utf-8
	
	require_once("conexao.php");
	include("pegaIdUsuario.php");
	
	header ('Content-type: text/html; charset=iso-8859-1');
	//QUAL PERGUNTA O USUARIO JÁ FEZ??
	$perguntas = "SELECT pontuacao.perguntas_exercicios_id_perg FROM pontuacao WHERE pontuacao.usuarios_id_usu='$idUsu' and Sub_Materia_id_sub_fk='1' ORDER BY perguntas_exercicios_id_perg DESC";

	$stmt = $con->prepare($perguntas);
	$stmt->execute();
	$result = $stmt->rowCount();
	
	
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
 
    //SE RETORNAR 1, QUER DIZER QUE ELE JA FEZ O EXERCICIO UM, ENTAO O IDPER VAI SER 2 AGORA

	//se retornar 2 linhas, ele ja fez o exercicio 1 e 2, logo, será o 3
	if($result==0){

     		 $idPer = 1;
        }
    else if($result==1){

     		 $idPer = 2;
        }
	 else if($result==2){

     		 $idPer = 3;
        }
	 else if($result==3){

     		 $idPer = 4;
        }
	 else if($result==4){

     		 $idPer = 5;
        }
	 else if($result==5){

     		 $idPer = 6;
        }
	 else if($result==6){

     		 $idPer = 7;
        }
	 else if($result==7){

     		 $idPer = 8;
        }
	 else if($result==8){

     		 $idPer = 9;
        }
	 else if($result==9){

     		 $idPer = 10;
        }
	 else if($result==10){

     		 $idPer = 0;
			// echo "<div class='noneFound'>Conteúdo em breve.</div>";
			
			
        }
 
// tell the user if no records found
	else{
		
	}
	
  }
	
	//MOSTRA A PERGUNTA CORRETA, Q
	
	$query = "SELECT conteudo_perg,numero_perg FROM perguntas_exercicios WHERE Sub_Materia_id_sub='$idSub' and numero_perg='$idPer'";
	$stmt = $con->prepare($query);
	$stmt->execute();
 
	$num = $stmt->rowCount();
 
	if($num>0){
 
    // start table
    echo "<table class='table table-bordered table-hover'>";
         

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
             
            // creating new table row per record
            echo "<tr>";
                echo "<td>{$numero_perg} - {$conteudo_perg}</td>";
                echo "<td style='text-align:center;'>";
                    
                echo "</td>";
            echo "</tr>";
			$numero = $numero_perg;
        }
         
    //end table
    echo "</table>";
	
     
	}
 
// tell the user if no records found
	else{
		
	}
 
?>