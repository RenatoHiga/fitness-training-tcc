<html>
	<head>
		<meta charset="utf-8">
		
		<!-- Compiled and minified CSS -->
		<link rel="stylesheet" href="materialize/css/materialize.css">

		<!-- Compiled and minified JavaScript -->
		<script src="materialize/js/materialize.js"></script>
		
		<script src="js/jquery.js"></script>
		
		<script>
			$(document).ready(function(){
				
				//Animations stuff.
				
				
				$("#title").animate({
					fontSize: '500%'
					
				},720,"swing");
				
				$("#btn_loginTeacher").animate({
					width: '100%',
					
					
				},720,"linear");
				
				$('.input_login').animate({
					opacity: 1
				}, 730, 'linear');
				
				$("#container_loader").hide();
				
				//Real programming...
				
				
				$("#btn_loginTeacher").click(function(){
					
					var email = $("#txt_emailTeacher").val();
					var password = $("#txt_passwordTeacher").val();
					
					if(email == "")
					{
						M.toast({html: "ALERTA! Você esqueceu do E-mail!", classes:'rounded'});
						$("#txt_emailTeacher").focus();
					}
					
					else if(password == "")
					{
						M.toast({html: "ALERTA! Você esqueceu de sua Senha!", classes:'rounded'});
						$("#txt_passwordTeacher").focus();
					}
					
					else
					{
						M.toast({html: "Por favor, aguarde um momento!", classes:'rounded'});
						
						$("#container_all").hide();
					
						$("#container_loader").show();
						
						$("#container_loader").animate({
							opacity: '1'
						},1000,"swing");
						
						$.post("php/TeacherLogin.php",{
							emailPHP:email,
							passwordPHP:password
						},
						
						function(resultado){
							
							if(resultado == "Deu certo!")
							{
								window.location.replace("teacher/Home.php");
							}
							
							else
							{
								M.toast({html: "Senha ou E-mail do Professor estão errados!", classes: 'rounded'});
								$("#container_loader").hide();
								
								$("#container_loader").animate({
									opacity: '0'
								});
								
								$("#container_all").show();
							}
						});
					}
				});
			});
		</script>
		
		<style>
			#title
			{
				font-size: 0px;
			}
			
			#btn_loginTeacher{
				width: 0px;
				
			}
			
			.input_login{
				opacity:0;
			}
			
			#container_loader{
				margin-top: 10%;
			}
			
			/* label color */
		   .input-field label {
			 color: #000;
		   }
		   
		    /* label underline focus color */
		   .row .input-field input {
			 border-bottom: 1px solid #000;
			 box-shadow: 0 1px 0 0 #000;
		   }
	 
			.input-field input:focus + label {
			  color: #388e3c !important;
			}
			 
			/* label underline focus color */
			 .row .input-field input:focus {
			   border-bottom: 1px solid #388e3c !important;
			   box-shadow: 0 1px 0 0 #388e3c !important
			 }
			 
			 #container-icon{
				width: 400px;
				height: 300px;
				position: relative;
			 }
			 
			 #img-icon{
				 height: 100%;
				 width: 100%;
			 }
			 
			 #container_loader{
				 opacity: 0;
			 }
			 
			 @media only screen and (max-width: 992px) {
			     #container_all{
			         margin-left: 15%;
			         margin-top: 25%;
			     }
			     
				
			 }
			
			#link_TeacherRegisterItself{
				color: #0d47a1;
			}
		</style>
	</head>
	
	<body class="yellow darken-4 center-align">
		<div class="container col m10 l12">
			
			<div class="row" id="container_all">
				
				<div class="row"><h1 class="center-align"  id="title">Sistema dos Professores</h1></div>
				    
				<div class="col m10 l12">
					
					<div class="row input_login">
						
						<div class="input-field col s12 center-align">
							<input type="email" id="txt_emailTeacher">
							<label for="txt_emailTeacher">E-mail do Professor</label>
						</div>
					
					</div>
						
					<div class="row input_login">
						
						<div class="input-field col s12">
							<input type="password" class="" id="txt_passwordTeacher">
							<label for="txt_passwordTeacher">Senha do Professor</label>
						</div>

					</div>
						
						<br/>
						
						<div class="row center-align">
							<div class="input-field col s12">
								<button class="btn green darken-2 waves-effect  hoverable" id="btn_loginTeacher">ENTRAR NO SISTEMA</button>
							</div>
						</div>
						
						<div class="row center-align">
							
								<a href="TeacherRegisterItself.php" id="link_TeacherRegisterItself">Não tenho registro</a>
							
						</div>
					</div>

			</div>
		</div>
		
			
		<div class="container" id="container_loader">
			<div class="container" id="container-icon">
				
					<img id="img-icon" src="images/images_teacher/gym-icon-muscleman.png">
				
			</div>
			
			<div class="progress center">
				<div class="indeterminate green darken-2"></div>
			</div>
		</div>
	</body>
</html>