<?php

	header ('Content-type: text/html; charset=ISO-8859-1');
	require_once 'conexao.php';

 
 	//TITULO
	$query = "SELECT count(id_perg) as id_perg FROM perguntas_exercicios";
	$stmt = $con->prepare($query);
	$stmt->execute();
	$num = $stmt->rowCount();
	if($num>0){

   		 echo "<table class='table table-bordered table-hover'>";

         while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
         extract($row);
             
         echo "<tr>";
               echo "<td>{$id_perg}</td>";
               echo "<td style='text-align:center;'>";     
         	   echo "</td>";
         echo "</tr>";
     }    
   		 echo "</table>";
	}
	
		else{
			
				echo "<div class='noneFound'>Conteúdo em breve.</div>";
			}
?>