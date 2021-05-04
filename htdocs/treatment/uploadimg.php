<?php

function uploadImage(){

    if(isset($_FILES["photo_link"]) && $_FILES["photo_link"]["error"] == 0){
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $filename = $_FILES["photo_link"]["name"];
        $filetype = $_FILES["photo_link"]["type"];
        $filesize = $_FILES["photo_link"]["size"];
        
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed)) die("Erreur : Veuillez sélectionner un format de fichier valide.");
    
        $maxsize = 5 * 1024 * 1024;
        if($filesize > $maxsize) die("Error: La taille du fichier est supérieure à la limite autorisée.");
        
        if(in_array($filetype, $allowed)){
    
            if(file_exists(__DIR__."/../images/" . $_FILES["photo_link"]["name"])){
                header("Location: /index.php?message=".$_FILES["photo_link"]["name"] . " existe déjà.");
            } else{
                move_uploaded_file($_FILES["photo_link"]["tmp_name"], __DIR__."/../images/" . $_FILES["photo_link"]["name"]);
                $path = __DIR__."/../images/" . $_FILES['photo_link']['name'];
            } 
               
        }
    } 
}
