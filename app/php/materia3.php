  <?php
  //iso é não utf-8
	header ('Content-type: text/html; charset=ISO-8859-1');
	require_once 'conexao.php';
 
 	$idSub=3;
	
	$query = "SELECT conteudo_cont FROM conteudo WHERE Sub_Materia_id_sub='$idSub'";
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
                echo "<td>{$conteudo_cont}</td>";
                echo "<td style='text-align:center;'>";
                    
                echo "</td>";
            echo "</tr>";
			
				
       		 }
         
    echo "</table>";
	
	}
 
// tell the user if no records found
	else{
		echo "<div class='noneFound'>Conteúdo em breve.</div>";
	}
 
?>