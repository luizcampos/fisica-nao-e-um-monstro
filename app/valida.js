// JavaScript Document
//Validação
					
			function validacao(){ 
					
					if(document.frmCliente.nome.value.length <3 ){
						alert('Erro: Seu usuário deve conter no mínimo 3 caracteres!');
						document.cadastroUsu.usuario.focus();
						return false;
					}
					if(document.frmCliente.nome.value.length >16 ){
						alert('Erro: Seu usuário deve conter no máximo 16 caracteres!');
						document.cadastroUsu.usuario.focus();
						return false;
					}
					if(document.frmCliente.senha.value.length <8 ){
						alert('Erro: Sua senha deve conter no mínimo 8 caracteres!');
						document.cadastroUsu.senha.focus();
						return false;

					}
					if(document.frmCliente.senha.value.length >25 ){
						alert('Erro: Sua senha deve conter no máximo 25 caracteres!');
						document.cadastroUsu.senha.focus();
						return false;

					}
			}