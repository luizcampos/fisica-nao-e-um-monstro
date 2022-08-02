<?php
error_reporting(0);
ini_set(“display_errors”, 0 );
?>
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

<title>Vizualize ou Responda</title>
</head>
<body>
<?php

include("includes/header.php");
include("includes/pegaUsuario.php");
include ("includes/menu.php");
include ("includes/responder.php");
include ("includes/denuncie.php");
?>

<!--Abre table-->
    <?php 
//Pegando id da pergunta para exibir a correta
if(isset($_GET['id'])){
	$exibir=$_GET['id'];
}else
{
	header("Refresh: 2, home.php"); exit;
	}
if(empty($_GET['pg'])){}else{$pg = $_GET['pg'];}
if (!is_numeric($pg)){echo '<script language= "JavaScript">
				location.href="perguntaVisu.php?id= "$exibir"&pg=1";
				</script>';}

if(isset($pg)){$pg =  $_GET['pg'];}else {$pg =  1;}

$qtd = 5;
$inicio = ($pg*$qtd) - $qtd; 
//Selecionar ultimas perguntas 

$select = "SELECT * from perguntas_forum,usuario where usuario.id_usu=perguntas_forum.user_per AND perguntas_forum.id_per=:id ORDER BY id_per DESC LIMIT 1";
	try {
		$result = $pdo->prepare($select);
		$result->bindParam('id', $exibir, PDO::PARAM_INT);
		$result->execute();
		$conta =$result->rowCount();
		
				
		if($conta>0){
	
			while($mostra =$result->FETCH(PDO::FETCH_OBJ)){ 
    ?>

    <!--Titulo da pegunta-->
     <div id="tituloPer" class="form bradius" ><center><?php echo utf8_encode($mostra->titulo_per)?></center>
    </div>
  	<!--Fecha titulo>
    
    <!--Conteudo da pergunta-->
    <div id="conteudoPer" class="form bradius" >
     <!--Exibe os dados do autor da pergunta-->
     <div class="usuario" >
    <img  src="imagem/Icone/user43.png">
    <p class="text">Autor da pergunta : <?php echo utf8_encode($mostra->nome_usu)?></p>
    <p class="text">Data : <?php echo $mostra->data_per;?></p>
    <p class="text">Hora : <?php echo $mostra->hora_per;?></p>
  	</div>

   <!--Fecha os dados do autor-->
   <div class="pergunta"><?php   echo  utf8_encode($mostra->conteudo_per)?></div>
  <br />
   <?php if ($mostra->nome_usu!=$usuariowva){?> <form action="" method="post">
  <div align="left"><input class="denuncie grow"  name="denunciar" type="submit" id="denunciar" title="Achou esse tópico ofensivo?Denuncie!" value="Denunciar"></div>
	</form>
    <?php
   }
   else if($mostra->nome_usu==$usuariowva){
	?>
    <form method="post" action="includes/removerSuaPer.php?id=<?php echo $mostra->id_per?>">
    <div align="left"><input class="denuncie grow"  name="remover" type="submit" id="remover" title="Remova sua pergunta" value="Remover"></div>
	</form>

    
     <?php
   }
 
	?>
    
    <div align="right"><input type="button" class="button3 grow" title="Responder esse tópico" value="Responder" />
    </div>  
	</div>
	<!--Fecha o conteudo da pergunta-->
	<br/>
  
     <div id="responder" class="form bradius" >
     <form action="" method="post" name="resposta" id="resposta">
   	<center> <textarea id="descricao" name="descricao" class="txtArea2 bradius" placeholder="Digite sua resposta" /></textarea></center>
    <div align="right"><input type="submit" id ="resposta" class="button2 grow" name="resposta" title="Envie sua resposta" value="Enviar" />
    <input type="reset" id ="cancelar" class="button2 grow" name="cancelar" title="Cancelar a resposta" value="Cancelar" />
    </form>
	</div>   
	</div>
 	<?php
		}
		}else{
			  echo '<br/><br/><div id="erro"><img src="imagem/Icone/warning.png" /> Desculpe, não existem perguntas </div>';
			echo '<div id="sugetao"><img src="imagem/Icone/exclamation.png" /> Que tal você fazer uma <a href="cadastroPergunta.php">agora?</a></div></tr>';
			
	 	}
	}catch(PDOException $e){
			echo 'Erro'.$e->getMessage();

		} 
		
			?>
       <?php
	include("includes/pegaRespostas.php");
	?>

     <style>
#paginas{
	width: 1047px;
	height: 20px;
	margin: 0 auto;
	left:0.5%;
	border: 1px solid #f1f1f1;
	padding: 15px;
	position: relative;
	background-color: #09f;
	color: #FFF;
	font: 300 18px Oswald;
	text-align: left;
	border-color: #3a87ad;
	box-shadow: 0 2px 16px  #3a87ad;
	-webkit-box-shadow: 0 2px 10px  #3a87ad;
	-moz-box-shadow: 0 2px 10px #3a87ad;
	text-align:center;
  font-size:16px;
  word-spacing: 6px;

}
#paginas a {
	color:#FFF;
	background:#3a87ad;
	height:auto;
	width:100%;
	padding:5px;
		}
#paginas a:hover {
	color:#3a87ad;
	background:#d9edf7;
		}
@media screen and (max-width: 1024px){
#paginas{
margin-left:50px;
width:850px;
	}
}
@media screen and (max-width: 380px) and (orientation:portrait){
#paginas{
margin-left:0px;
width:300px;
	}
}
<?php
if(isset($_GET['pg'])){
	$num_pg = $_GET['pg'];
	}
?>
#paginas a.ativo<?php echo $num_pg; ?>{color:#3a87ad;
	background:#d9edf7;}
</style>
<!-- Inicio Botoes Paginacao-->
<?php
 
 $sql= "SELECT * from respostas_Forum where perguntas_forum_id_per='$exibir'";
	try {
		$result = $pdo->prepare($sql);
		$result->execute();
		$totalRegistros =$result->rowCount();
		
	}catch(PDOException $e){
			echo 'Erro'.$e->getMessage();
		} 
	if($totalRegistros <= $qtd){}
	else { $paginas = ceil($totalRegistros/$qtd);
	if ($pg > $paginas){
		echo '<script language= "JavaScript">
				location.href=""perguntaVisu.php?id="$exibir"&pg=1";
				</script>';
		}
	   $links = 5;
	   if(isset($i)){}
	   else{  $i=1;}
 
 ?>
<!--abre paginas-->
<div  id="paginas" > <a href="perguntaVisu.php?id=<?php echo $exibir?>&pg=1" >&laquo;Inicio</a>
<?php
  if(isset($_GET['pg'])){
	  $numPag = $_GET['pg'];
	  }
	  
	  for ($i = $pg-$links; $i<= $pg-1;$i++){
		  if ($i<=0){}
		  else{
?>
     <a href="perguntaVisu.php?id=<?php echo $exibir?>&pg=<?php echo $i?>" class="ativo<?php echo $i; ?>"><?php echo $i;?></a>     
          
<?php }  }?>
<a href="#" class="ativo<?php echo $i; ?>"><?php echo $pg;?></a>

<?php
 for ($i = $pg+1;$i<= $pg+ $links;$i++){
	 if($i>$paginas){}
	 else{?>
		 
        <a href="perguntaVisu.php?id=<?php echo $exibir?>&pg=<?php echo $i;?>" class="ativo<?php echo $i; ?>"><?php echo $i;?></a> 
         
<?php   
		 }
	 
	 }
	
?>
<a href="perguntaVisu.php?id=<?php echo $exibir?>&pg=<?php echo $paginas;?>" >Final&raquo;</a> 
</div>
<!--fecha paginas-->
<?php
	 }
 ?>
<!--Fim Botoes Paginacao--> 
<!--Rodapé-->

    
<?php
include("includes/footer.php");
?>
</body>
</html>