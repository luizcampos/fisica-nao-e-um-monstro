//Botao Fechar 
$(function() {
	action='cad-postagem.php';
	$('.close').click(function(){ 
		$('.alert').hide();         
	});
	
});
//Verifica o tamanho da pagina
$(function() {
$('.menu').click(function(){ 
$('.home').toggle("slow");
$('.pergunte').toggle("slow");
$('.perguntas').toggle("slow");
$('.conta').toggle("slow");	
$('.admu').toggle("slow");
$('.admp').toggle("slow");
document.getElementById("#pergunte").style.marginTop = "100px";
})
	
if(screen.width<=400){
	
$('.contenedor').hide();	
$('.contenedor2').hide();
$('.home').hide();
$('.pergunte').hide();
$('.perguntas').hide();
$('.conta').hide();	
$('.admu').hide();
$('.admp').hide();
 
	}
if(screen.width>400){
$('nav').hide();
	
	}


});

//Botao Cancelar
$(function() {
	action='cad-postagem.php';

	$('.sb2').click(function(){
	document.getElementById("tituloPostagem").value = "";
	document.getElementById("descricao").value = "";	
	    
	});
	
});

$(function() {
	action='cad-postagem.php';

	$('.sb1').click(function(){
	 //Página de Cadastro de Perguntas 
 if(document.perguntas.titulo.value=="" || document.perguntas.descricao.value=="" ){
	alertify.alert('Erro:','Por favor, preencha todos os campos!').set('label', 'ok!'); 
		 if(document.perguntas.titulo.value==""){
		document.perguntas.titulo.focus();
		return false;
		}
		else if(document.perguntas.descricao.value==""){
		document.perguntas.descricao.focus();
		return false;
			
			}
		}
	    
	});
	
});

$(function() {
	action='perguntaVisu.php';
	$(document).ready( function(){
$('#responder').hide()
$('.txtArea2').hide();	
$('#enviar').hide();
$('#cancelar').hide();
			})
$('.button3').click(function(){
	$('#responder').show('fast') 
	$('.txtArea2').show('slow');	
	$('#enviar').show('slow');
	$('#cancelar').show('slow');
	});
	
$('#cancelar').click(function(){ 
	$('#responder').hide('slow') 
	$('.txtArea2').hide('fast');	
	$('#enviar').hide('fast');
	$('#cancelar').hide('fast');
	});

	
	
});

$(function() {
	action='adicionaAdm.php';

	$('.sb1').click(function(){
	 //Página de Cadastro de Perguntas 
 if(document.nivel.muda.value=="0"){
	alertify.alert('Erro:','Por favor, selecione uma opção !').set('label', 'ok!'); 
	
		return false;
			
			
		}
	    
	});
	
});
