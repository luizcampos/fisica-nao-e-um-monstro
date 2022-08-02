//Botao Fechar 
$(function() {
	action='cad-postagem.php';
	$('.close').click(function(){ 
		$('.alert').hide();         
	});
	
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
	action='minhaConta.php';

$(document).ready( function(){

$('.verpe').hide()
$('.tab').hide()
$('.paginas').hide()

})
	
$('.verp').click(function(){
	
	$('.t').hide('fast')
	$('#informacao').hide('fast')
	$('.verpe').show()
	$('.tab').show()
	$('.paginas').show()
	 $(".verp").animate({ "margin-top" : "0px" }) 
	 $(".verpe").animate({ "margin-top" : "0px" })
	  $(".verr").animate({ "margin-top" : "0px" })

	});
	
$('.verr').click(function(){
	$('.t').hide('fast')
	$('#informacao').hide('fast') 
	$('.verpe').show()
	 $(".verp").animate({ "margin-top" : "0px" }) 
	 $(".verpe").animate({ "margin-top" : "0px" })
	  $(".verr").animate({ "margin-top" : "0px" })
	});
$('.verpe').click(function(){
	$('.t').show('slow')
	$('#informacao').show('fast')
	$('.verpe').hide() 
	$('.tab').hide()
	$('.paginas').hide()
	});
	


	
	
});

