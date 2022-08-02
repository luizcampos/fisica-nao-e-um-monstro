<?php

$prefixo = rand(1,101);
	$tamanho2 = 14;
	$qtd2 = 1;
	$c2= "1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvxwyz";

		for($i = 0; $i<$qtd2; $i++)
		{
 		$cod = $prefixo;
 		for( $j = 0; $j< ( $tamanho2 - strlen($prefixo) ); $j++)
 		{
 		$cod .= $c2{mt_rand(0,61)};
 		}
echo $cod;
		}


?>