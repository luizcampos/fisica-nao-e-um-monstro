<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="Imagem/Icone/16x16.png" >
<title>Login</title>
<link href='https://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'/>
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
<?php 
include("includes/login.php"); 
?>
<div class="logoForum" align="center"><img src="Imagem/logoforum.png"  width="500px" height="299px" onmouseover="this.src='Imagem/logoforum2.png'" onmouseout="this.src='Imagem/logoforum.png'"  /></div>

<div id="login" class=" form bradius" >
  <div class="message"></div>
  <div class="logo"><a><img  src="Imagem/oie_transparent (22).png"    width="170" height="99" /></a></div>
  <div class="acomodar">
    <form action="" method="post" name="logar" onsubmit="return valida()">
      <label for="usuario">Usuário:</label>
      <input id="usuario" type="text" class="txt bradius" name="usuario" value=""/>
      <label for="senha">Senha:</label>
      <input id="senha" type="password" class="txt bradius" name="senha" value=""/>
      <input type="submit" name="logar" class="sb bradius" value="Entrar" />
      <br/>
           <label class="esqueceu bradius"><a href="lembrar.php"><p>Esqueceu sua senha ?</p></a></label>
           <br />
          
          <label class="esqueceu bradius"><a href="cadastro.php" title="Cadastre-se e faça parte dessa aventura"><p>Não possui conta? Cadastre-se</p></a></label>
    </form>
    <!--acomodar--> 
  </div>
  <!--login--> 
</div>
</div>
<?php
include("includes/footer.php");
?>
</body>
</html>