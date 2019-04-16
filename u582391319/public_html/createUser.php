<?php
	
	//Checks if the user already logged in
	session_start();
		
	if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true){
				
		header("Location: index.php");
		
	}
	
	
?>
<!doctype html>
<html>
<head>
	
	<meta charset="utf-8">
	<title>Kurz</title>
	<link rel="stylesheet" href="style.css">
	
</head>
<body>
	
	<div id="content">
		
		<p class="title">Insira seu email e senha</p>
		
		<form class="form" action="userPage.php" method="post" autocomplete="off">
			
			<?php
				
				if(isset($_SESSION["wrongEmail"]) && $_SESSION["wrongEmail"]){
					
					echo'<input type="email" required="" name="loginEmail" 
						  		style="background-color: red" value="O Email ou a senham podem estar incorretos!" 
								autocomplete="off">
								  
						 <br>
						 
						 <input type="password" required="" name="loginPassword" 
						  		style="background-color: red" value="" autocomplete="off" placeholder="Senha:">';
										
					$_SESSION["wrongEmail"] = false;
					
				}	
				else{
					
					echo'<input type="email" required="" name="loginEmail" placeholder="Email:" autocomplete="off" value="">
						 <br>
						 <input type="password" required="" name="loginPassword" placeholder="Senha:" autocomplete="off">';
					
				}
				
			?>
						
			<br>
			<input type="submit" value="Logar e ser feliz">
			<input type="hidden" name="type" value="login" >
			
		</form>
			
		<p class="title">Primeira vez? Crie um usuário</p>
		
		<form class="form" action="userPage.php" method="POST" enctype="multipart/form-data">
			
			<input type="text" required="" name="userName" placeholder="Nome: ">
			<br>
				
			<?php
				
				if(isset($_SESSION["anotherEmail"]) && $_SESSION["anotherEmail"]){
			
					echo '<input type="email" required="" name="userEmail" style="background-color: red" 
								 value="Email existente, escolha outro!" autocomplete="off">';
					
					$_SESSION["anotherEmail"] = false;
					
				}
				else{
					
					echo '<input type="email" required="" name="userEmail" placeholder="Email:" autocomplete="off">';
					
				}		
							
			?>
				
			<br>
			<input type="password" required="" name="userPass" placeholder="Senha:" autocomplete="off">
			<br>
			<input type="number" required="" name="userAge" placeholder="Idade:" min="1" max="160" step="1">
			<br>
			<textarea name="userAbout" cols="50" rows="5" placeholder="Sobre você (opcional): "></textarea>
			<br>
			<p id="labelImage">Foto de perfil(opcional):<br>
				<input type="file" name="uploadFile" accept="file_extensio|image/,.jpg,.jpeg,.png">
			</p>
			<br>
			<input type="submit" value="Registrar e ser feliz">
			<input type="hidden" name="type" value="user">
						
		</form>
		
	</div>
	
	<?php
	
		include_once "Bar.php";
		
	?>
	
</body>
</html>