<?php
if((isset($_GET['user'])) && (isset($_GET['confirme']))){
$user = $_GET['user'];
$confirme= $_GET['confirme'];
echo' <label >Sua conta :</label>';
echo'<input  type="text"  class="txt bradius" readonly value="';
echo $user;
echo '"/>';
	if(isset($_POST['redefinir'])){
	$novaSenha = trim(strip_tags($_POST['novaSenha']));

		if($novaSenha!=""){
		$select = "SELECT nome_usu from usuario WHERE BINARY nome_usu=:user  and  BINARY codigoRec_usu=:confirme";
	//Atualizando senha
		try {
		$result = $pdo->prepare($select);
		$result->bindParam(':user', $user, PDO::PARAM_STR);
		$result->bindParam(':confirme', $confirme, PDO::PARAM_STR);
		$result->execute();
		$conta =$result->rowCount();
		if($conta==1){
		$update =  "Update usuario set senha_usu=:novaSenha where nome_usu=:user";
		
		try {
		$result = $pdo->prepare($update);
		$result->bindParam(':novaSenha', $novaSenha, PDO::PARAM_STR);
		$result->bindParam(':user', $user, PDO::PARAM_STR);
		$result->execute();
		$testa =$result->FETCH(PDO::FETCH_OBJ);
		echo '<div id="sugetao"><img src="imagem/Icone/exclamation.png" /> Sucesso! sua senha foi redefinida!</div>';
		header("Refresh: 3,index.php"); exit;
		
		}catch(PDOException $e){
			echo 'Erro'.$e->getMessage();
			}
		
		}else{
		echo '<br/><br/><div id="erro"><img src="imagem/Icone/warning.png" /> Desculpe, ocorreu algum e erro e não foi possivel redefinir sua senha </div>';
			header("Refresh: 3,lembrar.php"); exit;
			}
		}catch(PDOException $e){
			echo 'Erro'.$e->getMessage();
			}
		}
	}
}
?>