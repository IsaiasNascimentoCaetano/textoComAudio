<?php
	
	include_once "Upload.php";

	//I don't have a good name for this file
	$dir = __DIR__;
	$path = str_replace("classes","",$dir);

	$path = "/home/u582391319/public_html/" . $_POST["path"];

	//$path = "/var/www/Kurz/" . $_POST["path"];

	$tipe = $_POST["type"];
	
	$file = array();
	$file["name"] = $_FILES["uploadFile"]["name"];
	$file["tmp_name"] = $_FILES["uploadFile"]["tmp_name"];

	$path .= "/" . $file["name"];
	
	switch($tipe){

		case 1:

			if(Upload::UploadImages($path, $file)){

				$realPath = str_replace("/home/u582391319/public_html/","",$path);
				echo '<img style="max-width:900px;max-height:700px;width: auto;height: auto;" src="'.$realPath . '">';	
	
			}
			
			break;

		case 2:

			$tp = $_POST["tp"];

			if(Upload::UploadMusics($path,$file)){
			
				$realPath = str_replace("/home/u582391319/public_html/","",$path);
				$play = "'$realPath',$tp";				

				echo '<img class="play('.$play.')" src="play.png" style="width:13px;height:13px;">';
			
			}

			break;

	}

/*

$dir = __DIR__;
	$path = str_replace("classes","",$dir);

	$path = "/var/www/Kurz/" . $_POST["path"];
	$tipe = $_POST["type"];
	
	$file = array();
	$file["name"] = $_FILES["uploadFile"]["name"];
	$file["tmp_name"] = $_FILES["uploadFile"]["tmp_name"];

	$path .= "/" . $file["name"];

*/

?>