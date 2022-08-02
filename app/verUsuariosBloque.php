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
<title>Adicionar admistrador </title><hr />

</head>
<body>
<?php
include("includes/header.php");
include("includes/pegaUsuario.php");
include("includes/menu.php"); 
include("includes/adm.php");
?>


<!--Abre table-->
<div id="pergunte" class="form bradius"  ><img src='imagem/Icone/autor.png' align="left" /> Usuários</div>
<div id="conteudoUsers"><font color="#b94a48">*os usuários em vermelho estão bloqueados.</font>
<div class="contenedor3 " id="pes">
<form name="top" method="post" action="barraPesquisa4.php?pg=1">
<input  type="text" class="txts bradius" name="pesquisa2" value="" placeholder="pesquise o usuário que deseja encontrar aqui."/>
<br />
<input type="submit" id ="pesquise" class="btnPesquisar grow" name="pesquise"  value="Pesquisar"/>
 </form>
		</div>
</div>

    <?php 
include("functions/limitaConteudo.php");

if(empty($_GET['pg'])){}else{$pg = $_GET['pg'];}
if (!is_numeric($pg)){echo '<script language= "JavaScript">
				location.href="verUsuarios.php?pg=1";
				</script>';}

if(isset($pg)){$pg =  $_GET['pg'];}else {$pg =  1;}

$qtd = 5;
$inicio = ($pg*$qtd) - $qtd; 
			

		 
			
//Selecionar ultimas perguntas 
$select = "SELECT * from usuario ORDER BY denuncias_usu DESC LIMIT $inicio, $qtd ";
	try {
		$result = $pdo->prepare($select);
		$result->execute();
		$conta =$result->rowCount();
		if($conta>0){
			while($mostra =$result->FETCH(PDO::FETCH_OBJ)){

		
    ?>
    
   
  <div id="conteudoUsers" <?php if ($mostra->status_usu==2){?> class="bloqueado"<?php }else{?>class="nbloqueado"<?php }?>>
 <?php echo $mostra->nome_usu;?><br />
 Denuncias:<?php echo " ".$mostra->denuncias_usu;?>
          <?php if ($mostra->status_usu==1){?> <form method="post" action="includes/bloquear.php?id=<?php echo $mostra->id_usu?>"> <input class="bloquear grow" id="bloquear"  type="submit" name="bloquear" value="Bloquear"></form>
			<?php }else{
				?> <form method="post" action="includes/bloquear.php?id=<?php echo $mostra->id_usu?>"> <input class="desbloquear grow" id="desbloquear"  type="submit" name="desbloquear" value="Desbloquear"<?php }?>
          
		</div>
 
 </div>
	<?php

			}
			}else{
			  echo '<br/><br/><div id="erro"><img src="imagem/Icone/warning.png" /> Desculpe, não existem usuários </div>';
			
			
	 	}
	}catch(PDOException $e){
			echo 'Erro'.$e->getMessage();

		} 
			?>

 
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
 
 $sql= "SELECT * from usuario";
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
				location.href="verUsuarios.php?pg=1";
				</script>';
		}
	   $links = 5;
	   if(isset($i)){}
	   else{  $i=1;}
 
 ?>
<!--abre paginas-->
<div class="paginas" id="paginas" > <a href="verUsuarios.php?pg=1" >&laquo;Inicio</a>
<?php
  if(isset($_GET['pg'])){
	  $numPag = $_GET['pg'];
	  }
	  
	  for ($i = $pg-$links; $i<= $pg-1;$i++){
		  if ($i<=0){}
		  else{
?>
     <a href="verUsuarios.php?pg=<?php echo $i?>" class="ativo<?php echo $i; ?>"><?php echo $i;?></a>     
          
<?php }  }?>
<a href="#" class="ativo<?php echo $i; ?>"><?php echo $pg;?></a>

<?php
 for ($i = $pg+1;$i<= $pg+ $links;$i++){
	 if($i>$paginas){}
	 else{?>
		 
        <a href="verUsuarios.php?pg=<?php echo $i;?>" class="ativo<?php echo $i; ?>"><?php echo $i;?></a> 
         
<?php   
		 }
	 
	 }
	
?>
<a href="verUsuarios.php?pg=<?php echo $paginas;?>" >Final&raquo;</a> 
</div>

<!--fecha paginas-->
<?php
	 }
 ?>
  </div>
<!--Fim Botoes Paginacao--> 
<!--Rodapé-->

<?php
include("includes/footer.php");
?>
</body>
</html>