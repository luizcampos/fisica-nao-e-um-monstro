$(function(){
	$('form#resposta').submit(function(){
		$.ajax({
		type:'POST',
		url:'../includes/respoder.php',
		data:{
			descricao: $('textarea[name=descricao]').val(),
			
			}
	
		}).done(function(e){
			$('div.form').append(e);
			
			});	
	});
});