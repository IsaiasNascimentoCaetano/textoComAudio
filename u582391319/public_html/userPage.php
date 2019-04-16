<!doctype html>
<html>	
<head>
	
	<meta charset="utf=8">
	<link rel="stylesheet" href="style.css">
	<title>Kurz</title>
	
</head>

<body>
	
	<script type="text/javascript" src="changePage.js"></script>

	<?php
						
		session_start();			
		include_once"autoload.php";
									
		//Loggin or create new user
		if(!isset($_SESSION["loggedin"])){
						
			//Create a new user
			if($_POST["type"] == "user"){
			
				$_SESSION["inLogin"] = true;
			
				$userData = new UserData();
				
				$userData->userName = $_POST["userName"];
				$userData->userEmail = $_POST["userEmail"];
				$userData->userPassword = $_POST["userPass"];
				$userData->userAge = $_POST["userAge"];
				$userData->userAbout = $_POST["userAbout"];
																								
				$crud = new CRUDUser();
				
				if(!$crud->GetUserEmail($userData->userEmail)){
									
					$crud->CreateUser($userData);
					$crud->CreateImageDirectory($userData->userEmail);
																
					//Insert user image
					if($_FILES["uploadFile"]["name"] != ""){
										
						$path = "profileImages/" . $crud->GetUserId($userData->userEmail) . "/" . $_FILES["uploadFile"]["name"];
						
						$file = array();
						$file["name"] = $_FILES["uploadFile"]["name"];	
						$file["tmp_name"] = $_FILES["uploadFile"]["tmp_name"];
								
						//Upload Image
						if(Upload::UploadImages($path,$file)){
					
							//insert path in DB
							$crud->InsertUserImage($path);
							$crud->UserImageUpdate($userData->userEmail, $path);
					
							$userImage = new UserImage();
							$userImage->imagePath = $path;
							
							//Set the UserImage object in UserData
							$userData->userImage = $userImage;		
							$userData->userId = $crud->GetUserId($_POST["userEmail"]);					
						
							$_SESSION["loggedin"] = true;
							$_SESSION["userData"] = serialize($userData);
															
						}
						else{
														
							//Path to default image
							$path = "profileImages/default.png";
						
							//insert path in DB
							$crud->InsertUserImage($path);
							$crud->UserImageUpdate($userData->userEmail, $path);
							$userImage = new UserImage();
							$userImage->imagePath = $path;
							
							//Set the UserImage object in UserData
							$userData->userImage = $userImage;
							$userData->userId = $crud->GetUserId($_POST["userEmail"]);					
												
							$_SESSION["loggedin"] = true;
							$_SESSION["userData"] = serialize($userData);
												
						}
															
					}				
					else{
					
						//Path to default image
						$path = "profileImages/default.png";
						
						//insert path in DB
						$crud->InsertUserImage($path);
						$crud->UserImageUpdate($userData->userEmail, $path);
						$userImage = new UserImage();
						$userImage->imagePath = $path;
							
						//Set the UserImage object in UserData
						$userData->userImage = $userImage;
						$userData->userId = $crud->GetUserId($_POST["userEmail"]);					
						$_SESSION["loggedin"] = true;
						$_SESSION["userData"] = serialize($userData);
					
					}
					
				}
				else{
					
					$_SESSION["anotherEmail"] = true;					
					header("Location: createUser.php");
															
				}
								
			}
			//login
			else if($_POST["type"] == "login"){
			
				$_SESSION["inLogin"] = true;
							
				$email = $_POST["loginEmail"];
				$name = $_POST["loginPassword"];
				
				$crud = new CRUDUser();
				
				$userData = $crud->Login($email,$name);
				
				if($userData != null){
					
					$_SESSION["loggedin"] = true;
					$_SESSION["userData"] = serialize($userData);
					
				}
				else{
					
					$_SESSION["wrongEmail"] = true;					
					header("Location: createUser.php");
					
				}
				
			}	
			
			//Just user can see this page			
			include_once"checkLogin.php";
			
		}		
		
	?>
		
	<div id="content">
		
		<div class="bord bord2">
		
		<div id="userProfile">
			
			<?php
				
				$userData = null;
				$userData = unserialize($_SESSION["userData"]);			
				
				echo '<img id="userProfileImage" src="'.$userData->userImage->imagePath.'">';
				echo '<p id="userProfileName">'. $userData->userName .' <a href="#">[editar]</a></p>';
				echo '<p id="userProfileAge">'. $userData->userAge .' anos <a href="#">[editar]</a></p>';
				echo '<p id="userProfileEmail">Email: '. $userData->userEmail .' <a href="#">[editar]</a></p>';
												
			?>
		</div>
		
		<div id="userAbout">
			
			<?php
				
				echo '<p class="title aboutTitle">Sobre mim:</p>';
				
				if($userData->userAbout != ""){
				
					echo '<pre id="about">' . $userData->userAbout . '</pre>';
				
				}
				else{
					
					echo '<pre id="about">Nada há ser exibido</pre>';
									
				}
				
			?>
			
		</div>
		
		</div>
		
		<div class="bord2 bord3">
		<div id="userStories">
			
			<p class="title userStoriesTitle">Minhas histórias:  </p>
	
		<?php
			
			//Get the user stories
			$crud = new CRUDStories();
			$stories = $crud->GetUserStories($userData);
			
			if(sizeof($stories) > 0){
			
				for($i = 0; $i < sizeof($stories); $i++){
				
					$link = "changePage({$stories[$i]->idStories})";

					if($i % 2 == 0 && $i != 0){
						
						echo '<div class="news another" onClick="'.$link.'">';
												
					}
					else{
						
						echo '<div class="news" onClick="'.$link.'">';	
												
					}
	
					date_default_timezone_set('America/Sao_Paulo');
					$dateP  = new DateTime($stories[$i]->publication);
					
					echo '<p class="textTitle"><a href="#">Título: '. $stories[$i]->title .'</a></p>';
					echo '<img src="'. $stories[$i]->sinopse->imageSinopse->imagePath .'" class="sinopseImage">';
					echo '<p class="sinopse"><a href="#">Sinopse: </a>' . $stories[$i]->sinopse->sinopse . '<p>';
					echo '<p class="genre"><a href="#">Gênero: </a>' . utf8_encode($stories[$i]->genre->genre) . '</p>';
					echo '<p class="author">Autor: <a href="#">'. $userData->userName .'</a></p>';
					echo '<p class="date">Data de publicação: ' . $dateP->format("d-m-Y") . '</p>';
					echo '<p class="note">Avaliação dos leitores: ' . $stories[$i]->avaliation .'</p>';
				
					echo '</div>';
				
				}
						
		}
			
		?>
								
		<p id="back"><a href="index.php">Ir para página inicial</a></p>
	
		</div>
		
		</div>
		
	</div>
	
	<?php
		
		include_once "Bar.php";
		
	?>
	
</body>
	
</html>