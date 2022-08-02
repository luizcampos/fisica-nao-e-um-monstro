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
<script type = "text/javascript" src="js/alertify.js"></script>
<script type = "text/javascript" src="js/alertify.min.js"></script>
<title>Todas Perguntas</title>
</head>
<body>
<?php
include("includes/header.php");
include("includes/pegaUsuario.php");
include("includes/menu.php"); 
include("functions/limitaConteudo.php");
include("includes/adm.php");
if(empty($_GET['pg'])){}else{$pg = $_GET['pg'];}
if (!is_numeric($pg)){echo '<script language= "JavaScript">
				location.href="barraPesquisa.php?pg=1";
				</script>';}

if(isset($pg)){$pg =  $_GET['pg'];}else {$pg =  1;}

$qtd = 5;
$inicio = ($pg*$qtd) - $qtd; 
$pesquise=utf8_decode(trim(strip_tags($_POST['pesquisa2'])));

$select = "SELECT * FROM perguntas_forum where titulo_per LIKE '%$pesquise%' or conteudo_per LIKE '%$pesquise%' ORDER BY denuncias_per DESC";
try {
		$result = $pdo->prepare($select);
		$result->execute();
		$conta =$result->rowCount();
	
	if ($conta==1 ){
		$r="resultado encontrado.";
		}
	else {
		$r="resultados encontrados.";
		}

?>

<!--Abre table-->
<div class="acomodar">
<div class="tabela">
  <table>
    <tr class="borda2">
      <th colspan="4"><img src="imagem/Icone/search (2).png" /><?php echo " ".$conta." ".$r." ";?></th>
</tr>
    <?php 

      	if($conta>0){
			while($mostra =$result->FETCH(PDO::FETCH_OBJ)){ 
    ?>
    <tr id="linha" class="altura" >
      <td id="borda" class="larg4"><?php echo "Denuncias: ".$mostra->denuncias_per ?></td>
      <td id="borda" class="larg4"><?php   echo utf8_encode(limitarTexto($mostra->titulo_per,$limite=100))?></td>
      <td id="borda" class="larg3"><?php   echo  utf8_encode(limitarTexto($mostra->conteudo_per,$limite=100))?></td>
      <td id="borda"  ><form method="post" action="includes/excluiPergunta2.php?id=<?php echo $mostra->id_per?>"><input  name="remover" id="remover" type="submit" class="button push" title="Visualizar esta pergunta" value="Remover"></form></td></td>
    </tr>
			
 <?php
			}
		}



}catch(PDOException $e){
			echo 'Erro'.$e->getMessage();


		}
?>

