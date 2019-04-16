<?php
	
	class Chapter{
		
		private $idChapter;
		private $idStories;
		private $numbers;
		private $title;
		private $storie;
		
		public function __construct(){
			
			$this->idChapter = 0;
			$this->idStories= 0;
			$this->numbers = 0;
			$this->title = "";
			$this->storie = "";
			
		}
		
		public function &__get($name){
			
			return $this->$name;
			
		}
		
		public function __set($name, $value){
			
			$this->$name = $value;
			
		}
		
	}
	
?>