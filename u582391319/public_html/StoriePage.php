<doctype html>
<html>

<head>

    <meta charset="utf=8">
	<link rel="stylesheet" href="style.css">
	<title>Kurz</title>

</head>

<body>

    <?php
    
        session_start();

        include_once "autoload.php";

        $idStorie = $_GET["id"];

        //Get chapters
        $crud = new CRUDChapter();
        $chapters = $crud->GetChaptersTitleAndId($idStorie);
                        
    ?>

    <div id="content">
    
        <h2 id="titleOfStoriePage">Capítulos</h2>

        <div id="chaptersTitle">

            <?php
            
                echo "<ul>";

                for($i = 0; $i < sizeof($chapters); $i++){

                    echo '<li><p><a href="ReadChapter.php?idStorie='.$idStorie.'&idChapter='.$chapters[$i]->idChapter.'">'. $chapters[$i]->title .'</a></p></li>';

                }

                echo "</ul>";

            ?>

        </div>
       	

        <?php 
        

        include_once "Bar.php";

        ?>

    </div>

    	
</body>

</html>