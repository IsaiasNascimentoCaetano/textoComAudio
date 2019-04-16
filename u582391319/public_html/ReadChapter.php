<?php

    session_start();

    ini_set('memory_limit', '80M');

    include_once "autoload.php";

    //Get the chapter
    $idStorie = $_GET["idStorie"];
    $idChapter = $_GET["idChapter"];

    $crud = new CRUDChapter();
    $chapter = $crud->GetChapter($idStorie, $idChapter);

?>
<!doctype html>
<html>

<head>
		
		<meta charset="utf-8">
		<title>Kurz</title>
		<link rel="stylesheet" href="style.css">
	
</head>

<body>

<script src="audio.js" type="text/javascript">
</script>

<div id="content">

    <audio id="audioLoop" src="" preload="auto" loop></audio>
    <audio id="audioEfect" src="" preload="auto" ></audio>

    <div id="miniContent">

    <?php
        
        $secure_swap = str_replace('<img class=','<img onclick=',$chapter->storie);
        
        //Print the title os chapter
        echo "<h3>{$chapter->title}</h3>";
        
        echo $secure_swap;

    ?>

    </div>

</div>

<?php

	include_once "Bar.php";

?>

</body>	

</html>