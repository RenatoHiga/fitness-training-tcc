$("#btn_exitSystem").click(function(){
					var toastHTML = '<span>Hey! Deseja REALMENTE sair?</span><a class="btn-flat toast-action" href="../php/includes/sessionLogOut.php">Sim</a><button class="btn-flat toast-action" id="btn_No_exitToast">Não</button>';
					M.toast({html: toastHTML, displayLength: 100000});
					
					$("#btn_No_exitToast").click(function(){
						M.Toast.dismissAll();
					});
					
					$("#btn_No_exitToast").click(function(){
						M.Toast.dismissAll();
					});
				});