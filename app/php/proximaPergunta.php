  <?php
	
	ob_start(); // inicia o buffer de memória
	include("exibirPergunta.php");
	$conteudo = ob_get_contents(); // guarda o conteúdo do arquivo na 	variável (parseado normal).
	ob_end_clean();
	
	$numero++;
	
	echo $numero;

?>