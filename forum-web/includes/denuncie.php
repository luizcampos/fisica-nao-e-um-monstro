<?php
if(isset($_GET['id'])){
	$exibir=$_GET['id'];
	}
	try{
$pdo = new PDO('mysql:host=localhost;dbname=fisica','root',''); //coloco o banco
}catch(PDOException $e){
echo 'Erro'.$e->getMessage();

}

if(isset($_POST['denunciar'])){
		$select="SELECT * FROM `perguntas_forum` WHERE id_per=:exibir";
	try {
		$result = $pdo->prepare($select);
		$result->bindParam(':exibir', $exibir, PDO::PARAM_STR);
		$result->execute();
		$conta =$result->rowCount();
		if($conta==1){
		while($mostra =$result->FETCH(PDO::FETCH_OBJ)){
			$denuncia = $mostra->denuncias_per;
			$soma = $denuncia + 1;
		$update =  "Update perguntas_forum set denuncias_per=:soma where id_per=:exibir";
		
		try {
		$result = $pdo->prepare($update);
		$result->bindParam(':soma', $soma, PDO::PARAM_STR);
		$result->bindParam(':exibir', $exibir, PDO::PARAM_STR);
		$result->execute();
		echo "<script>alertify.alert('Obrigado...','Sua denuncia foi enviada!').set('label', 'ok!');</script>";
		$usuario=$mostra->user_per;
		}catch(PDOException $e){
			echo 'Erro'.$e->getMessage();
			}
			
			
			
		}
		}
		}catch(PDOException $e){
			echo 'Erro'.$e->getMessage();
			}
			
			
			
		$update2=  "Update usuario set denuncias_usu=denuncias_usu+1 where id_usu='$usuario'";
		
		try {
		$result2 = $pdo->prepare($update2);
		$result2->execute();
				
		}catch(PDOException $e){
			echo 'Erro'.$e->getMessage();
			}
	
			
	
}

?>