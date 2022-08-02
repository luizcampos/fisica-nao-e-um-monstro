<?php
$select = "SELECT nivel_usu from usuario where id_usu='$id'";
	try {
		$result = $pdo->prepare($select);
		$result->execute();
		$conta =$result->rowCount();
		if($conta>0){
			while($mostra =$result->FETCH(PDO::FETCH_OBJ)){ 
			
			if($mostra->nivel_usu==1){
    ?>


<br />
 
<div id="titulo">
		<!--<p id="header"><a href="home.php"><div align="center"><img src="Imagem/logoforum.png"  width="350px" height="209px" onmouseover="this.src='Imagem/logoforum2.png'" onmouseout="this.src='Imagem/logoforum.png'"  /></a></p>-->
	</div>
<br /><br/>
<header>
<div class="tabela">
  <div class="contenedor" id="um"> <a href="home.php"><img class="icon" src="Imagem/Icone/home.png"></a>
    <p class="texto">home</</p>
  </div>
  <div class="contenedor" id="dois"><a href="cadastroPergunta.php"><img class="icon" src="imagem/Icone/ask3 (1).png"></a>
    <p class="texto">pergunte</p>
  </div>
  <div class="contenedor" id="tres"><a href="verPerguntas.php?pg=1"><img class="icon" src="imagem/Icone/question (2).png"></a>
    <p class="texto">perguntas</p>
  </div>
  <div class="contenedor" id="quatro"><a href="minhaConta.php?pg=1"><img class="icon" src="Imagem/Icone/user.png"></a>
    <p class="texto">minha conta</p>
  </div>
  <nav>
<ul>
<li class="menu">Menu<img align="right" src="imagem/Icone/menu2 (1).png" /> </li>
 <li class="home"> <a href="home.php">home </a></li>
  <li class="pergunte" > <a href="cadastroPergunta.php">pergunte</a></li>
  <li class="perguntas"><a href="verPerguntas.php?pg=1">perguntas</a></li>
  <li class="conta"> <a href="minhaConta.php?pg=1">minha conta</a></li>
  </ul>
  </nav>
 
<?php
}//fecha if mostra
 else if($mostra->nivel_usu==2){
?>

 
<div id="titulo">
		<!--<p id="header"><a href="home.php"><div align="center"><img src="Imagem/logoforum.png"  width="350px" height="209px" onmouseover="this.src='Imagem/logoforum2.png'" onmouseout="this.src='Imagem/logoforum.png'"  /></a></p>-->
	</div>
<br /><br/>
<header>

<div class="tabela">
  <div class="contenedor2" id="um"> <a href="home.php"><img class="icon" src="Imagem/Icone/home.png"></a>
    <p class="texto">home</p>
  </div>
  <div class="contenedor2" id="dois"><a href="cadastroPergunta.php"><img class="icon" src="imagem/Icone/ask3 (1).png"></a>
    <p class="texto">pergunte</p>
  </div>
  <div class="contenedor2" id="tres"><a href="verPerguntas.php?pg=1"><img class="icon" src="imagem/Icone/question (2).png"></a>
    <p class="texto">perguntas</p>
  </div>
  <div class="contenedor2" id="quatro"><a href="minhaConta.php?pg=1"><img class="icon" src="Imagem/Icone/user.png"></a>
    <p class="texto">minha conta</p>
  </div>
   <div class="contenedor2" id="tres"><a href="admUsu.php?pg=1"><img class="icon" src="imagem/Icone/multiple25.png"></a>
    <p class="texto">adm usuários</p>
  </div>
  <div class="contenedor2" id="quatro"><a href="admPer.php?pg=1"><img class="icon" src="imagem/Icone/speech-bubble2.png"></a>
    <p class="texto">adm perguntas</p>
  </div>
  <br />
<nav>
<ul>
<li class="menu">Menu <img align="right" src="imagem/Icone/menu2 (1).png" /></li>
 <li class="home"> <a href="home.php">home </a></li>
  <li class="pergunte" > <a href="cadastroPergunta.php">pergunte</a></li>
  <li class="perguntas"><a href="verPerguntas.php?pg=1">perguntas</a></li>
  <li class="conta"> <a href="minhaConta.php?pg=1">minha conta</a></li>
  <li class="admu"> <a href="admUsu.php?pg=1">adm usuários</a></li>  
    <li class="admp"><a href="admPer.php?pg=1">adm perguntas</a></li> 
  </ul>
  </nav>
<?php

}//fecha else

}
		}
	}catch(PDOException $e){
			echo 'Erro'.$e->getMessage();

		} 
		
		
?>


</header>
