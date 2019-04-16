<?php
	
	class CRUDStories extends DBConnection{
		
		public function __construct(){
			
			parent::__construct();
			
		}
		
		public function __destruct(){
			
			parent::__destruct();
			
		}
		public function GetGenre(){
			
			$genre = array();
			
			$sql = "SELECT * FROM Genre";
			
			$stmt = $this->connection->prepare($sql);
			$stmt->execute();
			
			$stmt->bind_result($idGenre,$genreDB);
			
			while($stmt->fetch()){
								
				$genre[] = array(
					
					"IdGenre" => $idGenre,
					"Genre" => $genreDB
					
				);
								
			}
			
			$stmt->close();
			
			return $genre;
			
		}
		
		public function InsertStories($storie){
			
			date_default_timezone_set('America/Sao_Paulo');
			$today = date("Y-m-d H:i:s");
			
			$sql = "INSERT INTO Stories(Title,Publication,Avaliation,IdGenre,IdUserData)
					VALUES(?,'".$today."',?,?,?)";
						
			$stmt = $this->connection->prepare($sql);
			
									
			$stmt->bind_param("siii",
							  $storie->title,
							  $storie->avaliation,
							  $storie->genre->idGenre,
							  $storie->idUser						  
							  );
										  
			$stmt->execute();
			$stmt->close();
			
		}
						
		public function InsertImageSinopse($storie, $user, $file){
			
			//get id of storie
			$id = $this->GetIdStorie($storie, $user);
						
			//Create the ImageSinopse folder
			$path = $this->CreateImageDirectory($id);
			
			//Upload the image
			if($file["name"] != ""){
			
				$path .= "/" . $file["name"];
			
				if(!Upload::UploadImages($path,$file)){
								
					$path = "storiesImage/default.png";
					
				}
			
			}
			else{
				
				$path = "storiesImage/default.png";
				
			}
					
			//Insert path database			
			$sql = "INSERT INTO ImageSinopse(ImagePath) VALUES(?)";
					
			$stmt = $this->connection->prepare($sql);
			$stmt->bind_param("s", $path);
			$stmt->execute();
			
			$stmt->close();	
			
			return $path;
			
		}
		
		private function CreateImageDirectory($id){
			
			$path = "storiesImage/".$id;
			mkdir($path,0777);
			
			return $path;
			
		}
		
		private function GetIdStorie($storie,$user){
			
			$sql = "SELECT IdStories FROM Stories WHERE Title = ? and IdUserData = ?";
									
			$stmt = $this->connection->prepare($sql);
			
			$stmt->bind_param("si",
							  $storie->title,
							  $user->userId		
							  );
										  
			$stmt->execute();
			
			$stmt->bind_result($idStories);
			$stmt->fetch();
			
			$id = $idStories;
			
			$stmt->close();
			
			return $id;
			
		}
		
		public function InsertSinopse($sinopse,$path,$storie, $user){
			
			$idImage = $this->GetIdImageSinopse($path);
			$idStorie =$this->GetIdStorie($storie, $user);
			
			$sql = "INSERT INTO Sinopse(IdStories,Sinopse,IdImageSinopse) VALUES(?,?,?)";
			
			$stmt = $this->connection->prepare($sql);
			
			$stmt->bind_param("isi",
							  $idStorie,
							  $sinopse->sinopse,
							  $idImage
							  );
			
			$stmt->execute();
			
		}
		
		private function GetIdImageSinopse($path){
		
			$sql = "SELECT IdImageSinopse FROM ImageSinopse WHERE ImagePath = ? ";
			
			$stmt = $this->connection->prepare($sql);
			
			$stmt->bind_param("s",$path);
							  
			$stmt->execute();
			
			$stmt->bind_result($idImage);
			
			$stmt->fetch();
			
			$id = $idImage;
			
			$stmt->close();
			
			return $id;	
			
		}
		
		//Get Storie and sinopse
		public function GetUserStories($user){
			
			$stories = array();
			
			$sql = "SELECT 
						
						Stories.IdStories,
						Stories.Title,
						Stories.Publication,
						Stories.Avaliation,
						Genre.Genre,
						Sinopse.Sinopse,
						ImageSinopse.ImagePath 
						
					FROM Stories 
						
						INNER JOIN Genre on Genre.IdGenre = Stories.IdGenre
						INNER JOIN Sinopse on Sinopse.IdStories = Stories.IdStories
						INNER JOIN ImageSinopse on ImageSinopse.IdImageSinopse = Sinopse.IdImageSinopse
					
					AND Stories.IdUserData = ?
					ORDER BY Stories.Publication DESC";
			
			
			$stmt = $this->connection->prepare($sql);
			$stmt->bind_param("i", $user->userId);	
			$stmt->execute();
			
			$stmt->bind_result($idStories,$title,$publication,$avaliation,$genreBd,$sinopseDb,$imagePath);
			
			while($stmt->fetch()){
				
				$storie = new Stories();
				
				$storie->idStories = $idStories;
				$storie->title = $title;
				$storie->publication = $publication;
				$storie->avaliation = $avaliation;
				
				$genre = new Genre();
				$genre->genre = $genreBd;
				$storie->genre = $genre;
				
				$imageSinopse = new ImageSinopse();
				$imageSinopse->imagePath = $imagePath;
				
				$sinopse = new Sinopse();
				$sinopse->sinopse = $sinopseDb;
				$sinopse->imageSinopse = $imageSinopse;
				
				$storie->sinopse = $sinopse;
				
				
				$stories[] = $storie;
								
			}
			
			$stmt->close();
			
			return $stories;
			
		}
			
		public function GetMoreRecentStories(){
			
			$stories = array();
			
			$sql = "SELECT 
						
						Stories.IdStories,
						Stories.Title,
						Stories.Publication,
						Stories.Avaliation,
						Genre.Genre,
						Sinopse.Sinopse,
						ImageSinopse.ImagePath,
						UserData.UserName
						
					FROM Stories 
						
						INNER JOIN Genre on Genre.IdGenre = Stories.IdGenre
						INNER JOIN Sinopse on Sinopse.IdStories = Stories.IdStories
						INNER JOIN ImageSinopse on ImageSinopse.IdImageSinopse = Sinopse.IdImageSinopse
						INNER Join UserData on UserData.IdUserData = Stories.IdUserData
					
					ORDER BY Stories.Publication DESC";
			
			
			$stmt = $this->connection->prepare($sql);
			$stmt->execute();
			
			$stmt->bind_result($idStories, $title,$publication,$avaliation,
							   $genreDb, $sinopseBd,$imagePath, $userName);
							
			
			while($stmt->fetch()){
				
				$storie = new Stories();
				
				$storie->idStories = $idStories;
				$storie->title = $title;
				$storie->publication = $publication;
				$storie->avaliation = $avaliation;
				
				$genre = new Genre();
				$genre->genre = $genreDb;
				$storie->genre = $genre;
				
				$imageSinopse = new ImageSinopse();
				$imageSinopse->imagePath = $imagePath;
				
				$sinopse = new Sinopse();
				$sinopse->sinopse = $sinopseBd;
				$sinopse->imageSinopse = $imageSinopse;
				$storie->sinopse = $sinopse;
				
				$userData = new UserData();
				$userData->userName = $userName;
				$storie->userData = $userData;				
								
				$stories[] = $storie;
								
			}
			
			$stmt->close();
			
			return $stories;
			
		}
				
		//Check if the storie is from user
		public function CheckStorie($idUser, $idStorie){

			$sql = "SELECT Stories.IdStories
					FROM Stories 
					WHERE IdStories = ? and IdUserData = ?";
			
			$stmt = $this->connection->prepare($sql);

			$stmt->bind_param("ii",$idStorie,$idUser);
			$stmt->execute();

			$stmt->bind_result($row);
			$stmt->fetch();

			if($row != null){

				$stmt->close();
				return true;

			}
			else{

				$stmt->close();
				return false;

			}

		}

	}
			
?>