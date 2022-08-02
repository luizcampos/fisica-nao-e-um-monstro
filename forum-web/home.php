<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="Imagem/Icone/16x16.png" >
<link href='https://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'/>
<link rel="stylesheet" type="text/css" href="css/home.css"/>
<link rel="stylesheet" type="text/css" href="css/menu.css"/>
<link rel="stylesheet" type="text/css" href="css/alertify.bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="css/alertify.core.css"/>
<link rel="stylesheet" type="text/css" href="css/alertify.default.css"/>
<script type = "text/javascript" src="js/jquery.js"></script>
<script type = "text/javascript" src="js/buttons.js"></script>
<script type = "text/javascript" src="js/alertify.js"></script>
<script type = "text/javascript" src="js/alertify.min.js"></script>

<title>Página Inicial</title>
</head>
<body>
<?php
include("includes/header.php");
include("includes/pegaUsuario.php");
include ("includes/menu.php");
?>
<?php 
$sql= "SELECT * from usuario ";
	try {
		$result = $pdo->prepare($sql);
		$result->execute();
		$totalRegistros =$result->rowCount();
		if ($totalRegistros==1){
			$r1="membro.";
			}
		else{
			$r1="membros.";
			}
		
		
	}catch(PDOException $e){
			echo 'Erro'.$e->getMessage();
		}

$sql2= "SELECT * from perguntas_forum ";
	try {
		$result = $pdo->prepare($sql2);
		$result->execute();
		$totalRegistros2 =$result->rowCount();
			if ($totalRegistros2==1){
			$r2="pergunta.";
			}
		else{
			$r2="perguntas.";
			}
		
		
	}catch(PDOException $e){
			echo 'Erro'.$e->getMessage();
		}
$sql3= "SELECT * from usuario  ORDER BY id_usu DESC LIMIT 1  ";
	try {
		$result = $pdo->prepare($sql3);
		$result->execute();
		$conta =$result->rowCount();
		if($conta>0){
		$totalRegistros3 =$result->FETCH(PDO::FETCH_OBJ);
		}
		
	}catch(PDOException $e){
			echo 'Erro'.$e->getMessage();
		} 
?>
<div id="pergunte" class="form bradius"  ><img src='imagem/Icone/money57.png' align="left" /><label>Estatísticas do Fórum</label></div>
<div class="espaco">
<br />
<label><?php echo $totalRegistros." ";?></label><?php echo $r1;?><br /><br />
<label><?php echo $totalRegistros2." ";?></label><?php echo $r2;?><br /><br />
<label><?php echo $totalRegistros3->nome_usu;?></label> membro mais novo. <br /><br />
</div>

    <?php 
include("functions/limitaConteudo.php");
?>
<div class="tabela">
  <table>
    <tr class="borda2">
      <th colspan="6"> <img src="imagem/Icone/question (2).png" />Todas perguntas</th>
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
//Selecionar ultimas perguntas 
$select = "SELECT * from perguntas_forum,usuario where usuario.id_usu=perguntas_forum.user_per ORDER BY id_per DESC LIMIT 5 ";
	try {
		$result = $pdo->prepare($select);
		$result->execute();
		$conta =$result->rowCount();
		if($conta>0){
			while($mostra =$result->FETCH(PDO::FETCH_OBJ)){ 
    ?>
    <tr id="linha" class="altura" >
      <td id="borda"><?php  echo utf8_encode($mostra->nome_usu)?></td>
      <td id="borda" class="larg"><?php echo $mostra->data_per;?></td>
      <td id="borda" class="larg"><?php echo $mostra->hora_per;?></td>
      <td id="borda"><?php   echo utf8_encode(limitarTexto($mostra->titulo_per,$limite=100))?></td>
      <td id="borda"><?php   echo  utf8_encode(limitarTexto($mostra->conteudo_per,$limite=100))?></td>
      <td id="borda"><a href="perguntaVisu.php?id=<?php echo $mostra->id_per?>&pg=1" target="_top"  class="button push" title="Visualizar esta pergunta">Ver</a></td></td>
    </tr>
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
  </table>
 
  <!--Fecha table--> 
</div>

<?php
?>

<!--Rodapé-->

<?php
include("includes/footer.php");
?>
</body>
</html>