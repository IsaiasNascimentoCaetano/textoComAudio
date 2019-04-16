<?php
	
	class CRUDUser extends DBConnection{
		
		public function __construct(){
			
			parent::__construct();
						
		}
		
		public function __desctruct(){
			
			parent::__destruct();
			
		}
				
		public function CreateUser($userData){
			
			$sql = "INSERT INTO UserData(UserName,UserEmail,UserPassword,UserAge,UserAbout) 
					Values (?,?,?,?,?)";						
			
			$stmt = $this->connection->prepare($sql);
			
			$stmt->bind_param("sssis",
							  $userData->userName,
							  $userData->userEmail,
							  sha1($userData->userPassword),
							  $userData->userAge,
							  $userData->userAbout
							  );
				
			if(!$stmt->execute()){
			
				echo "Execute Failed " . $stmt->errno;
				echo "<br>Error: " . $stmt->error;
				
			}
			
			$stmt->close();
			
		}
		
		//Checks if already have the email
		public function GetUserEmail($email){
			
			$sql = "SELECT UserEmail FROM UserData Where UserEmail = ?";
			
			$stmt = $this->connection->prepare($sql);
			$stmt->bind_param("s", $email);
			$stmt->execute();
			
			$stmt->bind_result($emaild);
			$stmt->fetch();
						
			if($emaild != null){
									
				$stmt->close();
				return true;
				
			}
			else{
				
							
				$stmt->close();
				return false;
				
			}
						
		}
				
		public function GetUserId($email){
			
			$sql = "SELECT IdUserData FROM UserData Where UserEmail = ?";
			
			$stmt = $this->connection->prepare($sql);
			
			$stmt->bind_param("s",$email);
			$stmt->execute();
			
			$stmt->bind_result($id);
			$stmt->fetch();
			
			$i = $id;
			
			$stmt->close();
			
			return $i;
			
		}
		
		public function InsertUserImage($path){
		
			$sql = "INSERT INTO UserImage(ImagePath)
					VALUES(?)";
					
			$stmt = $this->connection->prepare($sql);
			$stmt->bind_param("s",$path);
			$stmt->execute();
			$stmt->close();
			
		}
		
		public function UserImageUpdate($email,$path){
			
			$id = $this->GetIdUserImage($path);
			
			$sql = "UPDATE UserData SET IdUserImage = ? WHERE UserEmail = ?";
			
			$stmt = $this->connection->prepare($sql);
			$stmt->bind_param("is",$id,$email);
			
			$stmt->execute();
			$stmt->close();			
			
		}
		
		private function GetIdUserImage($path){
			
			$sql = "SELECT IdUserImage FROM UserImage 
					where ImagePath = ?";	
			
			$stmt = $this->connection->prepare($sql);
			$stmt->bind_param("s",$path);
			$stmt->execute();
			
			$stmt->bind_result($idImage);
			$stmt->fetch();
			
			$id = $idImage;
			
			$stmt->close();
			
			return $id;
			
		}
		
		public function CreateImageDirectory($email){
						
			$id = $this->GetUserId($email);
			$path = "profileImages/".$id;
			mkdir($path,0777);
			
		}
		
		public function Login($email, $password){
			
			$sql = "SELECT IdUserData FROM UserData 
					WHERE UserEmail = ? and UserPassword = ?";
					
			$stmt = $this->connection->prepare($sql);
			$stmt->bind_param("ss", $email, sha1($password));
			$stmt->execute();
			
			$stmt->store_result();			
			
			$stmt->bind_result($idU);
			$stmt->fetch();
			
			$id = $idU;
						
			if($id > 0){
														
				$userData = $this->GetUserData($id);
				$userData->userEmail = $email;
				$userData->userPassword = sha1($password);
			
				$stmt->close();
							
				return $userData;
				
			}
			else{
			
				$stmt->close();
							
				return null;
				
			}
			
		}

		private function GetUserData($id){
				
			$sql = "SELECT 
			
						UserData.UserName,
						UserData.UserAge,
						UserData.UserAbout,
						UserImage.ImagePath 
						
					FROM UserData 
					
						inner join UserImage on UserImage.IdUserImage = UserData.IdUserImage
					
					AND UserData.IdUserData = ? ";
			
			$stmt = $this->connection->prepare($sql);
			$stmt->bind_param("i", $id);
			$stmt->execute();
					
			$stmt->bind_result($userName, $userAge, $userAbout, $imagePath);
			$stmt->fetch();
			
			//Get the data
			$userData = new UserData();
			
			$userData->userId = $id;
			$userData->userName = $userName;
			$userData->userAge = $userAge;
			$userData->userAbout = $userAbout;
			
			$userImage = new UserImage();			
			$userImage->imagePath = $imagePath;
			
			$userData->userImage = $userImage;
						
			$stmt->close();
			
			return $userData;
				
		}
				
	}
	
?>