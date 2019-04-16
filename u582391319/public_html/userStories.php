<?php
			
	session_start();
	include_once"autoload.php";
				
	if(!$_SESSION["loggedin"]){
		
		header("Location: index.php");
	
	}
		
	//if is a new storie
	if(isset($_POST["isNewStorie"]) && $_POST["isNewStorie"] == "yes" && $_SESSION["insertNewStorie"]){	
		
		$stories = new Stories();
	
		$stories->title = $_POST["storieTitle"];
		$stories->genre = new Genre();
		$stories->genre->idGenre = $_POST["storieGenre"];
	
		$userData = unserialize($_SESSION["userData"]);
		$stories->idUser = $userData->userId;
		
		$crud = new CRUDStories();
		$crud->InsertStories($stories);
	  		
		$sinopse = new Sinopse();
		$sinopse->sinopse = $_POST["storieSinopse"];
			 
		//Get file to upload
		$file = array();
		$file["name"] = $_FILES["uploadFile"]["name"];	
		$file["tmp_name"] = $_FILES["uploadFile"]["tmp_name"];
		
		
		//upload image sinopse
		$crud->InsertSinopse(
			
			$sinopse,
			$crud->InsertImageSinopse($stories,$userData,$file),
			$stories,
			$userData
			
		);
		
		$_SESSION["insertNewStorie"] = false;

		//Get Stories
		$stories = $crud->GetUserStories($userData);
							
	}
	else{
		
		$userData = unserialize($_SESSION["userData"]);
		
		$crud = new CRUDStories();
		//Get Stories
		$stories = $crud->GetUserStories($userData);
				
	}
		
?>
<!doctype html>
<html>
	
	<head>
		
		<meta charset="utf=8">
		<link rel="stylesheet" href="style.css">
		<title>Kurz</title>
		
	</head>
	
	<body>
		
		<div id="content">		
			
			<p id="titleUserStoriesPage">Minhas histórias</p>
		
			<?php
			
				if($stories > 0){
			
					for($i = 0; $i < sizeof($stories); $i++){
			
						echo '<div class="listUserStories">';
			
						echo '<p class="titleStorieUser">'. $stories[$i]->title .'</p>';
						echo '<img class="listUserImage" src="'. $stories[$i]->sinopse->imageSinopse->imagePath . '">';
						
						echo '<ul class="optionStorieUser">';
						
						echo '<li><a href="newChapter.php?history='. $stories[$i]->idStories .'">Novo capítulo </a></li>';						
						echo '<li><a href="StoriePage.php?id=' . $stories[$i]->idStories . '">Ver capítulos </a></li>';						
						echo '<li><a href="#">Editar história </a></li>';
						
						echo '<ul>';
													
						echo '</div>';
			
					}
			
				}
			
			?>	
											
			<p id="back"></p>
			
		</div>
		
					
		<?php
			
			include_once "Bar.php";
			
		?>
		
	</body>
	
</html>