<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="Imagem/Icone/24x24.png" >
<link href='https://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'/>
<script type = "text/javascript" src="js/jquery.js"></script>
<script type = "text/javascript" src="js/buttons.js"></script>
<link rel="stylesheet" type="text/css" href="css/home.css"/>
<link rel="stylesheet" type="text/css" href="css/menu.css"/>
<script src="alertify/alertify.min.js"></script>
<link rel="stylesheet" href="alertify/css/alertify.min.css" />
<link rel="stylesheet" href="alertify/css/themes/default.min.css" />

<title>Faça sua pergunta!</title>
</head>

<body>
<?php
include("includes/conexao.php");
include("includes/header.php");
include("includes/pegaUsuario.php");
include("includes/menu.php"); 
							    							
?>

<div id="pergunte" class="form bradius"  ><img src='Imagem/Icone/question.png' align="left" />Tire suas dúvidas</div>
<div id="login" class="form bradius" >
  <div class="acomodar" align="left">

    <form action="" method="post" name="perguntas" >
    <?php
	include("includes/cadastraPergunta.php");
	?>
      <img src="" align="right" style="margin-right:2cm">
      <label for="tituloPostagem">Título da pergunta:</label>
      <input id="tituloPostagem" type="text" class="txt bradius" name="titulo" value=""/>
      <br/>
      <label for="data">Data:</label>
 <!--Pegando a Dta-->
<?php
date_default_timezone_set("America/Sao_Paulo");
$data = date('Y-m-d');


?>
<input id='dataPostagem' id='dataPostagem'  name='data' class='txt bradius' type='text' readonly name='nome' size='10' value="<?php echo $data;?>">


      <br/>
      <label for"descricao" >Descrição:</label>
      <textarea id="descricao" name="descricao" class="txtArea bradius" /></textarea>
      <br/>
      <div align="center" >
        <table bgcolor="#FFFFFF">
          <tr>
            <td><input type="submit" name="postar" class="sb1 grow" value="Postar" title="Envie sua dúvida!" /></td>
            <td><input type="reset" name="cancelar" class="sb1 grow" value="Cancelar" title="Cancele a pergunta!" /></td>
          </tr>
        </table>
      </div>
    </form>
    <!--acomodar--> 
  </div>
  <!--login--> 
</div>
<!--rodapé-->
<?php
include("includes/footer.php");
?>
</body>
</html>
