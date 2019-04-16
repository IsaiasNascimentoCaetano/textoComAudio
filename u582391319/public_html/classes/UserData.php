<?php
			
	class UserData{
		
		private $userId;
		private $userName;
		private $userEmail;
		private $userPassword;
		private $userAge;
		private $userAbout;
		private $userImage;
		
		public function __construct(){
			
			$this->userId       = 0;			
			$this->userAge      = 0;
			$this->userName     = "";
			$this->userEmail    = "";
			$this->userImage    = null;
			
		}
		
		public function &__get($name){
			
			return $this->$name;
			
		}	
		
		public function __set($name, $value){
			
			$this->$name = $value;
			
		}
			
		
	} 
	
?>