<?php
	
	class Stories{
	
		private $idStories;
		private $title;
		private $publication;
		private $avaliation;
		private $genre;
		private $idUser;
		private $sinopse;
		private $userData;
	 
	 	public function __construct(){
			 
			$this->idStories = 0;
			$this->avaliation = 0;
			$this->idUser= 0;
			$this->title = "";
			$this->publication = "";
			$this->genre = null;
			$this->sinopse = null;
			$this->userData = null;
			
		 }
		 
		 public function &__get($name){
			 
			 return $this->$name;
			 			 
		 }
		 
		 public function __set($name, $value){
			 
			 $this->$name = $value;
			 
		 }
	 	
	}
	
?>