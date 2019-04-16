<?php
	
	class Genre{
		
		private $idGenre;
		private $genre;
		
		public function __construct(){
			
			$this->idGenre = 0;
			$this->genre = "";
			
		}
		
		public function &__get($name){
			
			return $this->$name;
			
		}
		
		public function __set($name, $value){
			
			$this->$name = $value;
			
		}
		
	}
	
?>