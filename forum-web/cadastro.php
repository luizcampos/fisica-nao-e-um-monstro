
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="Imagem/Icone/16x16.png" >
<title>Cadastro</title>
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

<body >
<?php 
include("includes/cadastrar.php");
?>
<div class="logoForum" align="center"><img src="Imagem/logoforum.png"  width="500px" height="299px" onMouseOver="this.src='Imagem/logoforum2.png'" onMouseOut="this.src='Imagem/logoforum.png'"  /></div>
<div id="cadastrar"><a href="Index.php" title="Faça login">Login&raquo;</a></div>
<div id="login" class=" form bradius">
  <div class="message"></div>
  <div class="logo2"><img src="Imagem/oie_transparent (23).png" width="230" height="98" /></div>
  <div class="acomodar">
    <form action="" name="cadastroUsu" method="post" onsubmit="return validacao()">
      <label for="usuario">Usuário:</label>
      <input id="usuario" type="text" class="txt bradius" name="usuario" value=""/>
      <label for="senha">Senha:</label>
      <label class="tamanho" ><font color="#999" size="2">&lowast;Sua senha deve conter no minimo 8 caracteres</font></label>
      <input id="senha" type="password" class="txt bradius" name="senha" value=""/>
      <label for="email">E-mail:</label>
      <input id="email" type="text" class="txt bradius" name="email" value=""/>
     <label for="codigo">Código:</label>
      <input id="codigo" type="text" class="txt bradius" name="codigo" readonly value="<?php echo $cod;  ?>"/></br></br>
     <div id="erro"><img src="imagem/Icone/warning.png" /><b> Importante!</b> Não esqueça de anotar o código acima, pois ele é de extrema importância caso você esqueça sua senha(não esquecendo o padrão de letras minúsculas e maiúsculas).</div>
      <input type="submit" name="cadastrar" class="sb bradius" value="Cadastrar" />

      
    </form>
    <!--acomodar--> 
  </div>
  <!--login--> 
</div>
<?php
include("includes/footer.php");
?>
</body>
	
</html>