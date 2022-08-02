

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="Imagem/Icone/16x16.png" >
<link href='https://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'/>
<script type = "text/javascript" src="js/jquery.js"></script>
<script type = "text/javascript" src="js/buttons.js"></script>
<link rel="stylesheet" type="text/css" href="css/home.css"/>
<link rel="stylesheet" type="text/css" href="css/menu.css"/>
<title>Adminstrar Usuários</title>
</head>
<body>
<?php
include("includes/header.php");
include("includes/pegaUsuario.php");
include("includes/menu.php"); 
include("includes/user-numero-perguntas.php");
include("includes/adm.php");
?>
<div id="pergunte" class="form bradius"  >Adminstrar usuários:
</div>

<div id="conteudoPer" class="form bradius" >

		<a href="verUsuarios.php?pg=1"><div class="contenedor3 push" id="uno" title="Mude o nivel de acesso do usuário para administrador ou usuário comum ">
			<img src="imagem/Icone/add88.png" class="icon2" align="left">
			<p class="texto2">adicionar adimistrador</p>
		</div>
		</a>
		
        <a href="verUsuariosBloque.php?pg=1"><div class="contenedor3 push" id="dos" title="bloquear/desbloquear um usuário que desrespeitou as normas do fórum">
			<img class="icon2" src="imagem/Icone/blocked5.png"  align="left">
			<p class="texto2">bloquear/desbloquear usuários</p>
		</div></a>

		<a href="verUsuariosRemo.php?pg=1"><div class="contenedor3 push" id="tres1" title="remover definitivamente um usuário">
			<img class="icon2" src="imagem/Icone/paper bin6.png"  align="left">
			<p class="texto2">remover usuários</p>
            
		</div></a>


</div>

</div>
  
<!--Rodapé-->

<?php
include("includes/footer.php");
?>
</body>
</html>