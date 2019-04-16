<?php
	
	class CRUDChapter extends DBConnection{
		
		public function __construct(){
			
			parent::__construct();
			
		}
		
		public function __destruct(){
			
			parent::__destruct();
			
		}
			
		public function CreateFolder($idStories){

			//Counts the number of chapters			
			$cont = $this->CountChapters($idStories);

			//Create the new folder
			$path = "storiesImage/".$idStories."/".$cont;
			
			if(!file_exists($path)){
				
				mkdir($path,0777);
				
			
			}
			return $path;
			
		}

		private function CountChapters($idStories){

			$sql = "SELECT 
					
						Chapter.IdChapter 
					
					FROM Chapter
					
					WHERE Chapter.IdStories = ?";
			
			$stmt = $this->connection->prepare($sql);
			$stmt->bind_param("i", $idStories);
			$stmt->execute();
			
			$stmt->bind_result($id);
			
			$cont = 0;
			
			while($stmt->fetch()){
								
				$cont++;
				
			}			
						
			$cont++;

			$stmt->close();

			return $cont;			

		}

		public function InsertChapter($chapter){

			$cont = $this->CountChapters($chapter->idStories);

			$sql = "INSERT INTO						
						Chapter(Numbers,IdStories,Title,Storie)
						VALUES(?,?,?,?) ";

			$stmt = $this->connection->prepare($sql);
			$stmt->bind_param("iiss",$cont,
									$chapter->idStories,
									$chapter->title,
									$chapter->storie);

			if($stmt->execute()){

				$stmt->close();
				return true;

			}
			else{

				$stmt->close();
				return false;

			}

		}		
		
		public function GetChapter($idStories,$idChapter){

			$sql = "SELECT Title,Storie
					FROM Chapter
					WHERE 
						
						IdStories = ? and
						IdChapter = ? ";

			$stmt = $this->connection->prepare($sql);

			$stmt->bind_param("ii",$idStories,$idChapter);
			$stmt->execute();

			$stmt->bind_result($title,$storie);

			$stmt->fetch();

			$chapter = new Chapter();
			$chapter->idChapter = $idChapter;
			$chapter->idStories = $idStories;
			$chapter->title = $title;
			$chapter->storie = $storie;

			$stmt->close();
			
			return $chapter;

		}

		public function GetChaptersTitleAndId($idStories){

			$sql = "SELECT IdChapter,Title
					FROM Chapter
					WHERE IdStories = ?";

			$chapters = array();

			$stmt = $this->connection->prepare($sql);

			$stmt->bind_param("i",$idStories);
			$stmt->execute();

			$stmt->bind_result($idChapter,$title);

			while($stmt->fetch()){

				$newChapter = new Chapter();

				$newChapter->idChapter = $idChapter;
				$newChapter->idStories = $idStories;
				$newChapter->title = $title;

				$chapters[] = $newChapter;

			}

			$stmt->close();
			
			return $chapters;

		}

	}
	
?>