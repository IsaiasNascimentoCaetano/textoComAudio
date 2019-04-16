<?php
	
	session_start();
	
	include_once"autoload.php";
		
	if(!$_SESSION["loggedin"]){
		
		header("Location: index.php");
		
	}

	//Check if the storie is from the user
	$check = new CRUDStories();
	$userForCheck = unserialize($_SESSION["userData"]);
	
	if(!$check->CheckStorie($userForCheck->userId ,$_GET["history"])){
		
		header("Location: userStories.php");

	}	
	
	//Creates the folderz
	$storieNumber = $_GET["history"];

	$crud = new CRUDChapter();
	$path = $crud->CreateFolder($storieNumber);

	$storieNumber = '"'. $storieNumber .'"';
	$_SESSION["ChapterInserted"] = false;	

?>

<!doctype html>
<html>
	
	<head>
		
		<meta charset="utf=8">
		<link rel="stylesheet" href="style.css">
		<title>Kurz</title>
		
	</head>
	
	<body onload="initFrame()">
		
		<script src="scripts.js" type="text/javascript">
						
		</script>
		
		<div id="content">
						
			<p class="newChapter">Novo capítulo</p>
						
			<form id="formChapter" method="post" onsubmit="insertChapter()">
				
				<input type="text" required="" class="chapterTitle" name="chapterTitle" placeholder="Digite o título:" >
				
				<p class="newChapter writeHere">Escreva aqui o capítulo</p>
				
				<input type="button" id="italics" class="buttons" value="Italico" onclick="italic()">
				<input type="button" id="bolds" class="buttons" value="Negrito" onclick="bold()">
				<input type="button" id="underlines" class="buttons" value="Sublinhado" onclick="underline()">
					
				<select onChange="changeFont(this.value)">
					
					<?php
						
						$value = array("Arial","Verdana","Calibri","Helvetica","Impact","Tahoma");
						
						for($i = 0; $i < sizeof($value); $i++){
							
							echo '<option value="' . $value[$i] . '">' . $value[$i] . '</option>';
							
						}
						
					?>
										
				</select>
				
				<select onChange="changeFontSize(this.value)">
					
					<?php
												
						for($i = 1; $i <7; $i++){
							
							switch($i){
								
								case 3:
								
									echo '<option selected value="' . $i . '">'.$i .'</option>';
									break;
								
								default:
														
									echo '<option value="' . $i . '">'.$i .'</option>';
									break;
								
							}
									
						}
						
					?>
										
				</select>
				
				
				<input class="buttons" type="button" value="Carregar imagens" onclick="callDivImage()">
				<input type="button" class="buttons" value="Carregar música" onclick="callDivMusic()">
				
				<iframe id="editor" ></iframe>
				<input type="hidden" id="editorValue" name="editorValue" value="i">
				<input type="hidden" name="storieNumber" value=<?php echo $storieNumber;?> >
				<input type="submit" onclick="getData()" id="newChapterSubmit" value="Salvar Capítulo" >
								
			</form>
			
		
			<form id="hiddenImageForm" enctype="multipart/form-data" onsubmit="sendImage()">
				
				<label>Escolha a imagem:</label>		
				<br><br>
				<input type="file" class="file" name="uploadFile" accept="file_extensio|image/,.jpg,.jpeg,.png" required="">
				<br><br>					
				<input type="submit" value="Enviar imagem">
				<input type="hidden" name="type" value="1">
				<input type="hidden" name="path" <?php echo 'value="'. $path .'"';?> >
				<input type="button"  value="Cancelar" onClick="exitDiv()">
				
				
			</form>
			
			
			<form id="hiddenMusicForm" enctype="multipart/form-data" onsubmit="sendMusic()">
				
				<label>Escolha a Música (Máximo de 8MB) :(</label>		
				<br><br>
				<input type="file" class="file" name="uploadFile" accept="file_extensio|audio/,.mp3,.wav,.ogg" required="">
				<br><br>
				<label>Que tipo de música será?</label>		
				<br><br>
				<input type="radio" name="tp" value="1">Musica de fundo(loop)<br>
				<input type="radio" name="tp" value="2">Voz ou efeito sonoro
				<br><br>					
				<input type="submit" value="Enviar música">
				<input type="hidden" name="type" value="2">
				<input type="hidden" name="path" <?php echo 'value="'. $path .'"';?> >
				<input type="button"  value="Cancelar" onClick="exitDiv()">

			</form>
				
		</div>
				
		<?php
			
			include_once"Bar.php";
			
		?>
		
	</body>
	
</html>