<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="Imagem/Icone/16x16.png" >
<link href='https://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'/>
<link rel="stylesheet" type="text/css" href="css/home.css"/>
<link rel="stylesheet" type="text/css" href="css/menu.css"/>
<script type = "text/javascript" src="js/jquery.js"></script>
<script type = "text/javascript" src="js/buttons.js"></script>
<script src="alertify/alertify.min.js"></script>
<link rel="stylesheet" href="alertify/css/alertify.min.css" />
<link rel="stylesheet" href="alertify/css/themes/default.min.css" />
    <?php 
include("includes/header.php");
include("includes/pegaUsuario.php");
include ("includes/menu.php");
include ("includes/responder.php");
include ("includes/nivel.php");
include("includes/adm.php");
//Pegando id da pergunta para exibir a correta
if(isset($_GET['id'])){
	$exibir=$_GET['id'];
}else
{
	header("Refresh: 2, home.php"); exit;
	}
include("includes/userAdm-numero-perguntas.php");	

$select = "SELECT * from usuario where id_usu=:id";
	try {
		$result = $pdo->prepare($select);
		$result->bindParam('id', $exibir, PDO::PARAM_INT);
		$result->execute();
		$conta =$result->rowCount();
		
				
		if($conta>0){
	
			while($mostra =$result->FETCH(PDO::FETCH_OBJ)){ 
			if($mostra->nivel_usu==1){
				$nivel ="usuário comum";
				}
			else if($mostra->nivel_usu==2){
				$nivel ="administrador";
				}

?>
<title><?php echo "Usuario : ".$mostra->nome_usu;?></title>
</head>
<body>
<div id="conteudoPer">
<div id="informacao">
<div id="t">Informações:</div>
<br />
<label><img src="imagem/Icone/user91.png"> Usuário : <?php echo $mostra->nome_usu."."?></label><br /><br />
<label><img src="imagem/Icone/email5.png">Email : <?php echo $mostra->email_usu."."?></label><br /><br />
<label><img src="imagem/Icone/keys38.png">Nivel : <?php echo $nivel."."?></label><br /><br />
<label><img src="imagem/Icone/tool481.png">Status : <?php if ($mostra->status_usu==2){ echo "bloqueado"; }else{echo "não está bloqueado"; }?></label><br /><br />
<label><img src="imagem/Icone/question53 (1).png"> Nº de perguntas : <?php echo $conta1."."?></label><br /><br />
<label><img src="imagem/Icone/warning40 (1).png"> Nº de respostas : <?php echo $conta2."."?></label>
</div>
<div id="informacao2">
<div id="t">Adicionar como Administrador</div>
<br />
*altere o nivel do usuário.
<br />
<form action="" method="post" name="nivel" >
<select class="txt3" name="muda" value="muda" id="muda">
<option value="0" ></option>
  <option value="1" for="muda">usuário comum</option>
  <option value="2" for="muda">administrador</option>
</select>
<input  type="submit" name="nivel" class="sb1 grow" value="Alterar"  />
</form>
</div>
</div>
<?php
}
	}
}catch(PDOException $e){
			echo 'Erro'.$e->getMessage();

		} 
?>

<?php



?>

