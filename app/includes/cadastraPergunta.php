<?php
date_default_timezone_set("America/Sao_Paulo");
//Cadastrando Pergunta
if(isset($_POST['postar'])){
	$titulo =utf8_decode(trim(strip_tags($_POST['titulo'])));
	$data= trim(strip_tags($_POST['data']));
	$descricao =utf8_decode($_POST['descricao']);
	$id;
	$hora = date('H:i:s');
//Inserindo no Banco	
$insert = "INSERT INTO perguntas_forum(titulo_per, conteudo_per, data_per,hora_per,user_per) VALUES (:titulo,:descricao,:data,:hora, :id)";
	try {
		$result = $pdo->prepare($insert);
		$result->bindParam(':titulo', $titulo, PDO::PARAM_STR);
		$result->bindParam(':data', $data, PDO::PARAM_STR);
		$result->bindParam(':hora', $hora, PDO::PARAM_STR);
		$result->bindParam(':descricao', $descricao, PDO::PARAM_STR);
		$result->bindParam(':id', $id, PDO::PARAM_STR);
		$result->execute();
		$conta =$result->rowCount();
		if($conta>0){
			
			echo '<div class="alert alert-success bradius">
	
			 <img src="imagem/Icone/success.png"/><strong> Sucesso!</strong> Sua pergunta foi postada!</td>
			  <div id="fecha" class="close" ><font size="+4"&>&times;</font></a></div>
              </div>';
		}
		
		}
		catch(PDOException $e){
			echo 'Erro'.$e->getMessage();

		}
		
	}
?>