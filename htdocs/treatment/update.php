<?php

// modifier prix 
//modifier photo
//modifier url 
//modifier premium 
 
include '../config/db.php';
include '../config/autoload.php';
include '../treatment/uploadimg.php';

$ReviewManager= new ReviewManager($pdo);
$DestinationManager = new DestinationManager($pdo);
$OperatorManager = new TourOperatorManager($pdo);
$ImagenManager = new ImageManager($pdo);


if(isset($_POST['price'])){
    $DestinationManager->updatePriceDestination($_POST['idDestination'], $_POST['price']);
    header("location: ../AdminModification.php?message= The price was changed");
}

elseif(isset($_POST['photo'])){
    $ImageManager->updatePhotoLink($_POST['idPhoto'], $_POST['photo']);
    uploadImage();
    header("location:../AdminModification.php?message= The photo was changed");
}

elseif(isset($_POST['link'])){
    $OperatorManager->updateOperatorLink($_POST['idOperator'], $_POST['link']);
    header("location:../AdminModification.php?message= The link was changed");
}
elseif(isset($_POST['premium'])){
    $OperatorManager->updateOperatorToPremium($_POST['idOperator'], $_POST['premium']=='true'? 1:0);
    header("location: ../AdminModification.php?message= The premium category was changed");
}
