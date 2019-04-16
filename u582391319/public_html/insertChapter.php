<?php

    session_start();

    include_once"autoload.php";

    if(!$_SESSION["ChapterInserted"]){

        $chapter = new Chapter();
        $chapter->idStories = $_POST["storieNumber"];
        $chapter->title = $_POST["chapterTitle"];
        $chapter->storie = $_POST["editorValue"];

        $crud = new CRUDChapter();
        
        if($crud->InsertChapter($chapter)){

            echo $chapter->idStories;

            $_SESSION["ChapterInserted"] == true;

        }

    }

?>