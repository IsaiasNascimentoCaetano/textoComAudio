<?php
	
	class Images{
		
		private $idImages;
		private $imagePath;
		
		public function __construct(){
			
			$this->idImages = 0;
			$this->imagePath = "";	
			
		}
		
		public function __get($name){
			
			return $this->$name;
			
		}
		
		public function __set($name, $value){
			
			$this->$name = $value;
			
		}
		
	}
	
?>