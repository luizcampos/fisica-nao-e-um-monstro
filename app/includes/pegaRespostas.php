<?php
//Pegando id da pergunta para exibir a correta
if(isset($_GET['id'])){
	$exibir=$_GET['id'];
	}
//Selecionar ultimas perguntas 
$select = "SELECT * from perguntas_forum,respostas_forum,usuario
		   where usuario.id_usu = respostas_forum.id_usu_fk
		   AND perguntas_forum.id_per = respostas_forum.perguntas_forum_id_per 
		   AND respostas_forum.perguntas_forum_id_per  = :id
		   ORDER BY id_res DESC LIMIT $inicio, $qtd";
	try {
		$result = $pdo->prepare($select);
				$result->bindParam('id', $exibir, PDO::PARAM_INT);
		$result->execute();
		$cont =$result->rowCount();
		if ($cont==1 ){
		$r="resposta neste tópico.";
		}
	else {
		$r=" respostas neste tópico.";
		}
		if($cont>0){
	
			while($mostra =$result->FETCH(PDO::FETCH_OBJ)){ 
    ?>
    <!--Conteudo da pergunta-->
    <div id="conteudoPer" class="form bradius" >
     <!--Exibe os dados do autor da pergunta-->
     <div class="usuario" >
     <img  src="imagem/Icone/user43.png">
    <p class="text">Autor da resposta : <?php echo utf8_encode($mostra->nome_usu);?></p>
    <p class="text">Data : <?php echo $mostra->data_res;?></p>
    <p class="text">Hora : <?php echo $mostra->hora_res;?></p>
  	</div>
   <!--Fecha os dados do autor-->
   <div class="pergunta"><?php   echo  utf8_encode($mostra->conteudo_res)?></div> 
   <br />
      <?php if ($mostra->id_usu_fk==$id){?> <form action="includes/removerSuaRes.php?id=<?php echo $mostra->id_res?>" method="post">
  <div align="left"><input class="denuncie grow"  name="removerResposta" type="submit" id="remover" title="Remova sua resposta" value="Remover"></div>
	</form>
    <?php
   }
?> 
  </div>

    </div>
	<!--Fecha o conteudo da pergunta-->
	<br/>
    
 	<?php
		}
		}else{
			  echo '<br/><br/><div id="erro"><img src="imagem/Icone/warning.png" /> Desculpe, não existem respostas</div>';
					
	 	}
	}catch(PDOException $e){
			echo 'Erro'.$e->getMessage();

		} 
		
?>
