<script type = "text/javascript" src="js/jquery.js"></script>
<script src="alertify/alertify.min.js"></script>
<link rel="stylesheet" href="alertify/css/alertify.min.css" />
<link rel="stylesheet" href="alertify/css/themes/default.min.css" />

<?php
include("conexao.php");

//Pegando o ID do usuario para Cadastrar
$usuariowva=isset ($_SESSION["usuariowva"])?$_SESSION["usuariowva"]:"";

//Selecionando id
$pega = "SELECT * FROM usuario WHERE nome_usu=:usuariowva";
try {
		$result = $pdo->prepare($pega);
		$result->bindParam(':usuariowva', $usuariowva, PDO::PARAM_STR);
		$result->execute();
		foreach ($result as $linha) {
			$id=$linha["id_usu"];
			$email=$linha["email_usu"];
		?>
		<form name="top" method="post" action="barraPesquisa.php?pg=1">
		<div id="top" >
		<div class="log"><img  src="imagem/logoforumTop.png" align:"left"/></div>
		<input  type="text" class="txts bradius" name="pesquisa" value="" placeholder="Pesquise sua dúvida"/>
		<input type="submit" id ="pesquise" class="btnPesquisar grow" name="pesquise" title="Pequise sua dúvida aqui!" value="Pesquisar"/>
       <div class="linha">|</div>
        <label class="alinhaUser">
		<img  class="user" id="imagem" src="imagem/Icone/user91 (2).png" align="left"><div class="usu"><?php echo " ".$usuariowva;?></div>
		</label>
        </div>
        
		<a href="?sair" onClick="return confirm('Deseja realmente sair ?')"> <input type="button" name="sair" id="cadastrar" class="sair" value="Sair&raquo;" /></a>
		</form>
     
	

        <?php
		if($linha["status_usu"]==2){
	session_destroy();
	session_unset(['usuariowva']);
	session_unset(['senhawva']);
	echo "<script>  alertify.alert('Sua conta foi bloqueada!Você não poderá acessar o Fórum durante um tempo determinado!').set('basic', true); </script>";
				header("Refresh: 5, index.php"); exit;
			}
			}
		
}catch(PDOException $e){
			echo 'Erro'.$e->getMessage();

		}
	
			 						
?>