<?php
	
	class Upload{

		public static function UploadImages($path, $file){
			
			$extension = pathinfo($file["name"], PATHINFO_EXTENSION); 	
					
			if($extension == "jpg" || $extension == "png" || $extension == "jpeg" ||
			   $extension == "JPG" || $extension == "PNG" || $extension == "JPEG"){
				
				move_uploaded_file($file["tmp_name"], $path);
				
				return true;
				
			}
			else{
				
				return false;
				
			}			
			
		}
		
		public static function UploadMusics($path, $file){
			
			$extension = pathinfo($file["name"], PATHINFO_EXTENSION);
			
			if($extension == "mp3" || $extension == "wav" || $extension == "ogg" ||
			   $extension == "MP3" || $extension == "WAV" || $extension	== "OGG"){
				   
				move_uploaded_file($file["tmp_name"], $path);
				
				return true;
				   
			}
			else{
				
				return false;	
				
			}
			
		}
	
	}
	
?>