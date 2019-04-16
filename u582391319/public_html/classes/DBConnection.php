<?php
	
define("SERVER","localhost");
define("USER","u582391319_isa");
define("PASSWORD", "BAiEF7nxugrpbxVMeF");
define("DATABASE", "u582391319_kurz");

abstract class DBConnection{
	
	protected $connection;
	
	public function __construct(){
		
		$this->connection = new mysqli(SERVER,USER,PASSWORD,DATABASE);
		
		if($this->connection->connect_errno){
			
			echo "Erro de conexão com o servidor de banco de dados";
						
		}
		
	} 
	
	public function __destruct(){
		
		$this->connection->close();
		
	}
		
}
	
?>