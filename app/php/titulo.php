<?php

	header ('Content-type: text/html; charset=ISO-8859-1');
	require_once 'conexao.php';

 
 	//TITULO
	$query = "SELECT conteudo_sub FROM sub_materia WHERE id_sub='1'";
	$stmt = $con->prepare($query);
	$stmt->execute();
	$num = $stmt->rowCount();
	if($num>0){

   		 echo "<table class='table table-bordered table-hover'>";

         while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
         extract($row);
             
         echo "<tr>";
               echo "<td>{$conteudo_sub}</td>";
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