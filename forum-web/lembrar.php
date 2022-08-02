<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="Imagem/Icone/16x16.png" >
<title>Login</title>
<link href='https://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'/>
<script type = "text/javascript" src="js/jquery.js"></script>
<script type = "text/javascript" src="js/validaCampo.js"></script>
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<script type = "text/javascript" src="js/jquery.js"></script>
<script type = "text/javascript" src="js/validaCampo.js"></script>
<script type = "text/javascript" src="js/jquery.js"></script>
<script type = "text/javascript" src="js/buttons.js"></script>
<script src="alertify/alertify.min.js"></script>
<link rel="stylesheet" href="alertify/css/alertify.min.css" />
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<link rel="stylesheet" href="alertify/css/themes/default.min.css" />
</head>
<body>


<div class="logoForum" align="center"><img src="Imagem/logoforum.png"  width="500px" height="299px" onmouseover="this.src='Imagem/logoforum2.png'" onmouseout="this.src='Imagem/logoforum.png'"  /></div>
<div id="cadastrar"><a href="Index.php" title="Faça login">Login&raquo;</a></div>
<div id="login" class=" form bradius" >
  <div class="message"></div>
  <div class="acomodar">
  
    <form action="" method="post" name="lembre" id="lembre" onsubmit="return vali()" >
    <?php
	include("includes/recuperaSenha.php");
	?>
      <label >Digite seu código:</label>
      <label class="tamanho" ><font color="#999" size="2">&lowast;Digite o código que você recebeu durante seu cadastro(segundo o padrão de letras minusculas e maiusculas) </font></label>
      <input id="codigo" type="text" class="txt bradius" name="codigo" value=""/>

      <input type="submit" name="recuperar" class="sb bradius" value="Redefinir  senha" />
    </form>
    <!--acomodar--> 
  </div>
  <!--login--> 
</div>
</div>
</body>
</html>