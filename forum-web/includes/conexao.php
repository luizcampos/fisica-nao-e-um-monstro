<?php

try{
$pdo = new PDO('mysql:host=localhost;dbname=fisica','root',''); //coloco o banco
}catch(PDOException $e){
echo 'Erro'.$e->getMessage();

}
//$STMT = $pdo->prepare('INSERT INTO usuario(nome_usu,senha_usu,ano_usu,status_usu,nivel_usu) VALUES (:nome_usu,:senha_usu,:ano_usu,:status_usu,:nivel_usu)'); // Insere no Banco


//$STMT->execute(array('nome_usu'=>'Fernanda', 'senha_usu'=>'123','ano_usu'=>'1','status_usu'=>'1','nivel_usu'=>'1'));

?>