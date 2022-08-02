  <?php
  	$idPer=1;
	$idSub=1;
	//$idPer=$idPer;
	
  	//ob_start(); // inicia o buffer de memória
	//include("proximaPergunta.php");
	//$conteudo = ob_get_contents(); // guarda o conteúdo do arquivo na 	variável (parseado normal).
	//ob_end_clean();
	
  	//iso e não utf-8
	
	require_once("conexao.php");
	
	/*
	if(isset($_POST['valor'])){
		
		$idSub = $_POST['valor'];
	
		echo $valorBotao;
	}
	
	else{
		$idSub = $idSub;
	}*/
	header ('Content-type: text/html; charset=iso-8859-1');
	$query = "SELECT conteudo_perg,numero_perg FROM perguntas_exercicios WHERE id_perg='$idPer' and Sub_Materia_id_sub='$idSub'";
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
        }
         
    //end table
    echo "</table>";
     
	}
 
// tell the user if no records found
	else{
		echo "<div class='noneFound'>Conteúdo em breve.</div>";
	}
 
?>