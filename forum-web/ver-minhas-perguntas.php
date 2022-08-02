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
<title>Minha conta</title>
</head>
<body>
<?php
include("includes/header.php");
include("includes/pegaUsuario.php");
include("includes/menu.php"); 
include("includes/user-numero-perguntas.php")

?>
<div id="pergunte" class="form bradius"  ><a href="minhaConta.php?pg=1"><img src='imagem/Icone/left arrow1.png' align="left" /></a><font color="#0099FF">||</font>Voltar</div>

  
<!--Rodapé-->
<?php	
include("functions/limitaConteudo.php");

if(empty($_GET['pg'])){}else{$pg = $_GET['pg'];}
if (!is_numeric($pg)){echo '<script language= "JavaScript">
				location.href="ver-minhas-perguntas.php?pg=1";
				</script>';}

if(isset($pg)){$pg =  $_GET['pg'];}else {$pg =  1;}

$qtd = 5;
$inicio = ($pg*$qtd) - $qtd; 
			
			
			
//Selecionar ultimas perguntas 
$select = "SELECT * from perguntas_forum,usuario where usuario.id_usu=perguntas_forum.user_per  and usuario.nome_usu = '$usuariowva' ORDER BY id_per DESC LIMIT $inicio, $qtd ";
	try {
		$result = $pdo->prepare($select);
		$result->execute();
		$conta =$result->rowCount();
?>
<!--Abre table-->
<div class="acomodar">
<div class="tabela">
  <table class="tab">
    <tr class="borda2">
      <th colspan="6"> <img src="imagem/Icone/question (2).png" />Minhas Perguntas</th>
    </tr>
    <tr >
      <th class="borda2" ><img src="imagem/Icone/autor.png" /> Autor</th>
      <th class="borda2"><img src="imagem/Icone/data.png" /> Data</th>
      <th class="borda2"><img src="imagem/Icone/clock.png" /> Hora</th>
      <th id="coluna" class="borda2"><img src="imagem/Icone/question (2).png" /> Título da pergunta</th>
      <th  id="coluna" class="borda2" ><img src="imagem/Icone/resumo.png" /> Resumo</th>
      <th class="borda2"></th>
    </tr>

<?php
		
		if($conta>0){
			while($mostra =$result->FETCH(PDO::FETCH_OBJ)){ 
    ?>
	<tr id="linha" class="altura" >
      <td id="borda"><?php  echo utf8_encode($mostra->nome_usu)?></td>
      <td id="borda" class="larg"><?php echo $mostra->data_per;?></td>
      <td id="borda" class="larg"><?php echo $mostra->hora_per;?></td>
      <td id="borda"><?php   echo utf8_encode(limitarTexto($mostra->titulo_per,$limite=100))?></td>
      <td id="borda"><?php   echo  utf8_encode(limitarTexto($mostra->conteudo_per,$limite=100))?></td>
      <td id="borda"><a href="perguntaVisu.php?id=<?php echo $mostra->id_per?>&pg=1" target="_top" class="button push" title="Visualizar esta pergunta">Ver</a></td></td>
    </tr>
	
	<?php
		}
		}
	}catch(PDOException $e){
			echo 'Erro'.$e->getMessage();

		} 
			?>
  </table>
  </div>
  <!--Fecha table--> 
</div>
<style>
#paginas{
		margin-left:150px;
	display: table; 
	width: 1043px;
	top:0px;
	height: 20px;
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
.paginas a {
	color:#FFF;
	background:#3a87ad;
	height:auto;
	width:100%;
	padding:5px;
		}
.paginas a:hover {
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
.paginas a.ativo<?php echo $num_pg; ?>{color:#3a87ad;
	background:#d9edf7;}
</style>
<!-- Inicio Botoes Paginacao-->
<?php
 
 $sql= "SELECT * from perguntas_forum,usuario where usuario.id_usu=perguntas_forum.user_per and usuario.nome_usu = '$usuariowva' ";
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
				location.href="ver-minhas-perguntas.php?pg=1";
				</script>';

		}
	   $links = 5;
	   if(isset($i)){}
	   else{  $i=1;}
 
 ?>
<!--abre paginas-->
<div class="paginas" id="paginas" > <a href="ver-minhas-perguntas.php?pg=1" >&laquo;Inicio</a>
<?php
  if(isset($_GET['pg'])){
	  $numPag = $_GET['pg'];
	  }
	  
	  for ($i = $pg-$links; $i<= $pg-1;$i++){
		  if ($i<=0){}
		  else{
?>
     <a href="ver-minhas-perguntas.php?pg=<?php echo $i?>" class="ativo<?php echo $i; ?>"><?php echo $i;?></a>     
          
<?php }  }?>
<a href="#" class="ativo<?php echo $i; ?>"><?php echo $pg;?></a>

<?php
 for ($i = $pg+1;$i<= $pg+ $links;$i++){
	 if($i>$paginas){}
	 else{?>
		 
        <a href="ver-minhas-perguntas.php?pg=<?php echo $i;?>" class="ativo<?php echo $i; ?>"><?php echo $i;?></a> 
         
<?php   
		 }
	 
	 }
	
?>
<a href="ver-minhas-perguntas.php?pg=<?php echo $paginas;?>" >Final&raquo;</a> 

<!--fecha paginas-->
<?php
	 }
 ?>
 </div>
<!--Fim Botoes Paginacao--> 

<?php
include("includes/footer.php");
?>