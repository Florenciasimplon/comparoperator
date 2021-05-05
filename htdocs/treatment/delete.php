<?php 
include '../config/db.php';
include '../config/autoload.php';

$ReviewManager= new ReviewManager($pdo);
$DestinationManager = new DestinationManager($pdo);
$OperatorManager = new TourOperatorManager($pdo);
$ImagenManager = new ImageManager($pdo);
if(isset($_POST['idOperator'])){
    $OperatorManager->deleteTourOperator($_POST['idOperator']);
    header("location: ../AdminModification.php?message= Tour Operator deleted");
}

elseif(isset($_POST['idDestination'])){
    $DestinationManager->deleteDestination($_POST['idDestination']);
    header("location: ../AdminModification.php?message= Destination deleted");
}
elseif(isset($_POST['idImagen'])){
    $ImagenManager->deleteImage($_POST['idImagen']);
    header("location: ../AdminModification.php?message= Imagen deleted");
}
elseif(isset($_POST['idReview'])){
    $ReviewManager->deleteReview($_POST['idReview']);
    header("location: ../AdminModification.php?message= Review deleted");
}