<?php
	
	include("conexao.php");
	
	ob_start(); // inicia o buffer de memória
	include("exibirPergunta.php");
	$conteudo = ob_get_contents(); // guarda o conteúdo do arquivo na 	variável (parseado normal).
	ob_end_clean();
	
	header ('Content-type: text/html; charset=iso-8859-1');
 
	$query = "SELECT alternativa_resp FROM respostas_exercicios WHERE Perguntas_Exercicios_id_perg='$idPer' and letra_resp='e'";
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
                echo "<td>{$alternativa_resp}</td>";
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