<?php

	header ('Content-type: text/html; charset=ISO-8859-1');
	require_once 'conexao.php';
	include("pegaIdUsuario.php");
 
 	//TITULO
	$query = "SELECT count(pontos_pon) as pontos_pon FROM pontuacao WHERE pontuacao.usuarios_id_usu='$idUsu' and Sub_Materia_id_sub_fk='1' and pontos_pon = '0'";
	$stmt = $con->prepare($query);
	$stmt->execute();
	$num = $stmt->rowCount();
	if($num>0){

   		 echo "<table class='table table-bordered table-hover'>";

         while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
         extract($row);
             
         echo "<tr>";
               echo "<td>{$pontos_pon}</td>";
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