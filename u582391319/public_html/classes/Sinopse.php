<?php
	
	class Sinopse{
		
		private $idSinopse;
		private $sinopse;
		private $imageSinopse;
		
		public function __construct(){
			
			$this->idSinopse = 0;
			$this->sinopse = "";	
			$this->imageSinopse = null;		
			
		}
		
		public function &__get($name){
			
			return $this->$name;
			
		}
		
		public function __set($name, $value){
			
			$this->$name = $value;
			
		}
		
	}
	
?>