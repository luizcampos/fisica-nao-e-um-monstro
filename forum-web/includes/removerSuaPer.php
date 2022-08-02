<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="../Imagem/Icone/16x16.png" >
<link href='https://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'/>
<link rel="stylesheet" type="text/css" href="../css/style.css"/>
<link rel="stylesheet" type="text/css" href="../css/menu.css"/>
<title>Sucesso...</title>
</head>
<body>
<div class="top"></div>
<div id="login" class=" form bradius" >
  <div class="message">
  <center><img src="../imagem/Icone/ok2 (9).png" />
  <label class="sucesso">Pergunta removida com sucesso!</label></center>
  
  </div>
  <div class="acomodar">
   
    <!--acomodar--> 
  </div>
  <!--login--> 
</div>
</div>

</body>
</html>
<?php 
try{
$pdo = new PDO('mysql:host=localhost;dbname=fisica','root',''); //coloco o banco
}catch(PDOException $e){
echo 'Erro'.$e->getMessage();

}
if(isset($_GET['id'])){
	$exibir=$_GET['id'];
	}

if(isset($_POST['remover'])){
	
$delete1 = "delete from respostas_forum where perguntas_forum_id_per=:exibir";
try {
		$result = $pdo->prepare($delete1);
		$result->bindParam(':exibir', $exibir, PDO::PARAM_STR);
		$result->execute();

$delete2 = "delete from perguntas_forum where id_per=:exibir";
try {
		$result = $pdo->prepare($delete2);
		$result->bindParam(':exibir', $exibir, PDO::PARAM_STR);
		$result->execute();

       header("Refresh: 2,../home.php"); exit;
		}catch(PDOException $e){
			echo 'Erro'.$e->getMessage();
			}


		
		}catch(PDOException $e){
			echo 'Erro'.$e->getMessage();
			}



	
	}

?>