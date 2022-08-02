<?php
date_default_timezone_set("America/Sao_Paulo");
if(isset($_POST['resposta']) && isset($_GET['id'])){
$hora =date('H:i:s');
$data = date('Y-m-d');
$descricao =utf8_decode($_POST['descricao']);
$id;
$idPergunta=$_GET['id'];
if($descricao==""){
	echo "<script>  alertify.alert('Erro:','Por favor, preencha o campo para enviarmos sua resposta!').set('label', 'ok!');  </script>";
	
	
	}else{
$insert = "INSERT INTO respostas_forum(perguntas_forum_id_per,id_usu_fk,conteudo_res,data_res,hora_res) VALUES (:idPergunta,:id,:descricao,:data,:hora)";
	try {
		$result = $pdo->prepare($insert);
		$result->bindParam(':idPergunta', $idPergunta, PDO::PARAM_STR);
		$result->bindParam(':id',$id, PDO::PARAM_STR);
		$result->bindParam(':descricao', $descricao, PDO::PARAM_STR);
		$result->bindParam(':data', $data, PDO::PARAM_STR);
		$result->bindParam(':hora', $hora, PDO::PARAM_STR);
		$result->execute();
		$conta =$result->rowCount();

		
		
		}
		catch(PDOException $e){
			echo 'Erro'.$e->getMessage();
			}
	
}
}
?>
