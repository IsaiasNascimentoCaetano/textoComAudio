<?php
	
	class ImageSinopse{
		
		private $imagePath;
		
		public function __construct(){
			
			$imagePath = "";
			
		}
		
		public function &__get($name){
			
			return $this->$name;
			
		}
		
		public function __set($name, $value){
			
			$this->$name = $value;
			
		}
		
	}
	
?>