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
				location.href="barraPesquisa5.php?pg=1";
				</script>';}

if(isset($pg)){$pg =  $_GET['pg'];}else {$pg =  1;}

$qtd = 5;
$inicio = ($pg*$qtd) - $qtd; 
$pesquise=utf8_decode(trim(strip_tags($_POST['pesquisa2'])));

$select = "SELECT * FROM usuario where nome_usu LIKE '%$pesquise%' and  status_usu=2  ORDER BY denuncias_usu DESC ";
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
<div class="tabela">
  <table>
    <tr class="borda2">
      <th colspan=><img src="imagem/Icone/search (2).png" /><?php echo " ".$conta." ".$r." ";?></th>
</tr>
</table>
</div>
    <?php 

      	if($conta>0){
			while($mostra =$result->FETCH(PDO::FETCH_OBJ)){ 
    ?>
  <div id="conteudoUsers" <?php if ($mostra->status_usu==2){?> class="bloqueado"<?php }else{?>class="nbloqueado"<?php }?>>
 <?php echo $mostra->nome_usu;?><br />
 Denuncias:<?php echo " ".$mostra->denuncias_usu;?>
<form method="post" action="includes/removerUsu2.php?id=<?php echo $mostra->id_usu?>"> <input class="desbloquear grow" id="remover"  type="submit" name="remover" value="Remover" />
          
		</div>
 
 </div>
			
 <?php
			}
		}



}catch(PDOException $e){
			echo 'Erro'.$e->getMessage();


		}
?>

