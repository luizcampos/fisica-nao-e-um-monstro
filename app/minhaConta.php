﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="Imagem/Icone/16x16.png" >
<link href='https://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'/>
<script type = "text/javascript" src="js/jquery.js"></script>
<script type = "text/javascript" src="js/buttons.js"></script>
<link rel="stylesheet" type="text/css" href="css/home.css"/>
<link rel="stylesheet" type="text/css" href="css/menu.css"/>
<title>Minha conta</title>
</head>
<body>
<?php
include("includes/header.php");
include("includes/pegaUsuario.php");
include("includes/menu.php"); 
include("includes/user-numero-perguntas.php")

?>
<div id="pergunte" class="form bradius"  ><img src='imagem/Icone/autor.png' align="left" /> Minha Conta</div>
<div id="conteudoPer" class="form bradius" >
<div id="">
<center>
<img src="" />
</center>
</div>
<div id="informacao">
<div id="t">Informações:</div>
<br />
<label><img src="imagem/Icone/user91.png"> Meu usuário : <?php echo $usuariowva."."?></label><br /><br />
<label><img src="imagem/Icone/email5.png">Email : <?php echo $email."."?></label><br /><br />
<label><img src="imagem/Icone/question53 (1).png"> Nº de perguntas : <?php echo $conta."."?></label><br /><br />
<label><img src="imagem/Icone/warning40 (1).png"> Nº de respostas : <?php echo $cont."."?></label>
</div>

<div id="minhaPer" >
<a href="ver-minhas-perguntas.php?pg=1"><label class="verp grow" title="Ver minhas perguntas">Minhas perguntas</label></a>
</div>

<div id="minhaResp">
<a href="ver-minhas-respostas.php?pg=1"><label class="verr grow" title="Vizualize as perguntas que você respondeu">Minhas Respostas</label></a>
</div>

</div>

  
<!--Rodapé-->

<?php
include("includes/footer.php");
?>
</body>
</html>