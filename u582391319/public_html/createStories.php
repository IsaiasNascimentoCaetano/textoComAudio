<?php
	
	session_start();
	include_once"autoload.php";
		
	if(!$_SESSION["loggedin"]){
		
		header("Location: index.php");
		
	}
	
	$_SESSION["insertNewStorie"] = true;

	$sinopseDescrition = "Aqui você deve colocar uma pequena descrição de como será a história.".
						 "É possível modificar depois.";
		
	$rules = array();
	
	$rules[0] = "Poste apenas histórias de sua autoria.";
	$rules[1] = "Não crie histórias que incentivem ou disseminem discriminações.";
	$rules[2] = "Não coloque conteúdo pornográfico";
	$rules[3] = "Crie títulos e sinopses com nomes adequados";
	$rules[4] = "Não postar propagandas textuais ou visuais para sites externos ou produtos.";
	$rules[5] = "Se alguma dessas regras for quebrada, a história será excluída permamentemente.";
	$rules[6] = "Caso algum usuário veja irregularidades em sua história, ele pode mandar uma sujestão.";
		
	//Get genre
	$crud = new CRUDStories();	
	$genre = $crud->GetGenre(); 
		
?>
<!DOCTYPE html>
<html>
	
	<head>
		
		<meta charset="utf-8">
		<title>Kurz</title>
		<link rel="stylesheet" href="style.css">
		
		
	</head>
	
	<body>
		
		<div id="content">
			
			<h3 class="title titleCreateStorie">Nova história</h3>			
			
			<form class="form formCreateStorie" action="userStories.php" method="post" enctype="multipart/form-data">
				
				<h4>Título da história:</h4>
				<input type="text" name="storieTitle" placeholder="Insira o título da história: " required="">
				
				<h4>Gênero:</h4>
				<select name="storieGenre">
					
					<?php
						
						for($i = 0; $i < sizeof($genre); $i++){
							
							echo '<option value="' . utf8_encode($genre[$i]["IdGenre"]) . '">' . utf8_encode($genre[$i]["Genre"]) . '</option>';
							
						}
						
					?>
								
				</select>
				
				<h4>Sinopse: </h4>
				<textarea name="storieSinopse" required="" placeholder="<?php echo $sinopseDescrition;?>" rows="10"></textarea>
				
				<h4>Imagem da história (não obrigatório): </h4>
				<input type="file" name="uploadFile" accept="file_extensio|image/,.jpg,.jpeg,.png">
				
				<br>
				<input type="hidden" value="yes" name="isNewStorie">
				<input type="submit" value="próximo passo">
										
			</form>
			
			<div id="storieRules">
				
				<h3>Regras:</h3></br>
				
				<p>Todas as regras abaixos devem ser seguidas:</p>
								
				<?php
					
					for($i = 0; $i < sizeof($rules); $i++){
						
						echo "<p>" . ($i+1) . "-" . $rules[$i] . "</p>";
						
					}
					
				?>
				
			</div>
			
								
			<p id="back"><a href="index.php"></a></p>
	
			
		</div>
		
		
		<?php
				
			include_once "Bar.php";
		
		?>
		
	</body>
	
</html>