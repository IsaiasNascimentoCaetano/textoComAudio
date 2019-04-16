<?php
	
	class UserImage{
		
		private $imagePath;
				
		public function __construct(){
			
			$this->imagePath = "";	
			
		}
		
		public function &__get($name){
			
			return $this->$name;
			
		}
		
		public function __set($name, $value){
			
			$this->$name = $value;
			
		}
		
	}
	
?>