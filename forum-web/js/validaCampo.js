// Validação de Campos
function validacao(){ 
//Página de Cadastro
	if(document.cadastroUsu.usuario.value=="" || document.cadastroUsu.senha.value=="" || document.cadastroUsu.email.value==""){
		alertify.alert('Erro:','Por favor, preencha todos os campos!').set('label', 'ok!'); 
		if(document.cadastroUsu.usuario.value==""){
		document.cadastroUsu.usuario.focus();
		return false;
		}
		else if(document.cadastroUsu.senha.value==""){
		document.cadastroUsu.senha.focus();
		return false;
		}
		else if(document.cadastroUsu.email.value==""){
		document.cadastroUsu.email.focus();
		return false;
		}

		}
	if(document.cadastroUsu.usuario.value.length <3 ){
		alertify.alert('Erro:','Seu usuário deve conter no mínimo 3 caracteres!').set('label', 'ok!');
		document.cadastroUsu.usuario.focus();
		return false;

		}
		if(document.cadastroUsu.usuario.value.length >16 ){
		alertify.alert('Erro:','Seu usuário deve conter no máximo 16 caracteres!').set('label', 'ok!');
		document.cadastroUsu.usuario.focus();
		return false;

		}
	if(document.cadastroUsu.senha.value.length <8 ){
		alertify.alert('Erro:','Sua senha deve conter no mínimo 8 caracteres!').set('label', 'ok!');
		document.cadastroUsu.senha.focus();
		return false;

		}
		if(document.cadastroUsu.senha.value.length >25 ){
		alertify.alert('Erro:','Sua senha deve conter no máximo 25 caracteres!').set('label', 'ok!');
		document.cadastroUsu.senha.focus();
		return false;

		}
		
	
	
 //Fecha cadastro

}
//Login 
function valida(){ 
if(document.logar.usuario.value=="" || document.logar.senha.value==""){
		alertify.alert('Erro:','Por favor, preencha todos os campos!').set('label', 'ok!'); 
		if(document.logar.usuario.value==""){
		document.logar.usuario.focus();
		return false;
		}
		else if(document.logar.senha.value==""){
		document.logar.senha.focus();
		return false;
		}
}

}
//Recuperação de senha
function vali(){ 
if(document.lembre.codigo.value=="" ){
		alertify.alert('Erro:','Por favor, preencha todos os campos!').set('label', 'ok!'); 
		document.lembre.codigo.focus();
		return false;
		}
}
function vali2(){ 
if(document.redefinir.novaSenha.value=="" ){
		alertify.alert('Erro:','Por favor, preencha todos os campos!').set('label', 'ok!'); 
		document.redefinir.novaSenha.focus();
		return false;
		}
if(document.redefinir.novaSenha.value.length <8 ){
	alertify.alert('Erro:','Sua senha deve conter no mínimo 8 caracteres!').set('label', 'ok!'); 
		document.redefinir.novaSenha.focus();
		return false;

		}
		if(document.redefinir.novaSenha.value.length >25 ){
		alertify.alert('Erro:','Sua senha deve conter no máximo 25 caracteres!').set('label', 'ok!'); 
		document.redefinir.novaSenha.focus();
		return false;

		}		
}