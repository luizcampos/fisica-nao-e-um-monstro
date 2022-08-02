// JavaScript Document

//se clicar em tal botão, ele guarda o valor do botão e aparece como título na outra pagina.
nome="";   //variavel global, sem var

function guardarNome1(){

	nome = document.getElementById("notacao").value;
	window.location.href = 'materia.html';
	alert(nome);
}
function guardarNome2(){

	nome = document.getElementById("poten").value;
	window.location.href = 'materia.html';
}
function guardarNome3(){

	nome = document.getElementById("regra").value;
	window.location.href = 'materia.html';
}
function guardarNome4(){

	nome = document.getElementById("teorema").value;
	window.location.href = 'materia.html';
}
function guardarNome5(){

	nome = document.getElementById("unidades").value;
	window.location.href = 'materia.html';
}