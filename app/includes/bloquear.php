<?php
try{
$pdo = new PDO('mysql:host=localhost;dbname=fisica','root',''); //coloco o banco
}catch(PDOException $e){
echo 'Erro'.$e->getMessage();

}
if(isset($_GET['id'])){
	$exibir=$_GET['id'];
	}
//Bloqueando
if(isset($_POST['bloquear'])){
	 $update1="UPDATE usuario SET status_usu='2' WHERE id_usu='$exibir'";
			try {
			$result = $pdo->prepare($update1);
			$result->execute();
			
			}catch(PDOException $e){
				echo 'Erro'.$e->getMessage();
			}
$select = "SELECT * from usuario where id_usu='$exibir' ";
	try {
		$result = $pdo->prepare($select);
		$result->execute();
		$conta =$result->rowCount();
		if($conta>0){
	while($mostra =$result->FETCH(PDO::FETCH_OBJ)){
		echo "<script>   window.setTimeout(function(){history.go(-1)},2000);   </script>  ";?> 
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
  <label class="sucesso">Usuário bloqueado com sucesso!</label></center>
  
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
			}
			}
			
			}catch(PDOException $e){
				echo 'Erro'.$e->getMessage();
	
	}
}
//Desbloqueando
if(isset($_POST['desbloquear'])){
		 $update2="UPDATE usuario SET status_usu='1',denuncias_usu='0' WHERE id_usu='$exibir'";
			try {
			$result = $pdo->prepare($update2);
			$result->execute();
			
			}catch(PDOException $e){
				echo 'Erro'.$e->getMessage();
			}
$select2 = "SELECT * from usuario where id_usu='$exibir' ";
	try {
		$result = $pdo->prepare($select2);
		$result->execute();
		$conta =$result->rowCount();
		if($conta>0){
	while($mostra =$result->FETCH(PDO::FETCH_OBJ)){
		echo "<script>   window.setTimeout(function(){history.go(-1)},2000);   </script>  ";?> 
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
  <label class="sucesso">Usuário desbloqueado com sucesso!</label></center>
  
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
			}
			}
			
			}catch(PDOException $e){
				echo 'Erro'.$e->getMessage();
	
	}

	
	
	}
			
?>