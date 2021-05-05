<?php 
include '../config/db.php';
include '../config/autoload.php';



$ReviewManager= new ReviewManager($pdo);
$DestinationManager = new DestinationManager($pdo);
$OperatorManager = new TourOperatorManager($pdo);
$ImageManager = new ImageManager($pdo);
include '../treatment/uploadimg.php';


// Create Destination 
if(isset($_POST['location']) && isset($_POST['price'])){
    $destination= new Destination(['location'=> $_POST['location'], 'price'=>$_POST['price'], 'id_tour_operator'=>$_POST['id_tour_operator']]);
    $DestinationManager->createDestination($destination);
    uploadImage();
    $image = new Image(["photo_link"=>"/images/" . $_FILES["photo_link"]["name"],"id_destination" =>$destination->getId()]);
    $ImageManager->createPhotoLink($image);
    header("location: ../AdminModification.php?message= New Destination created");

}
//create Operator
else if(isset($_POST['name']) && isset($_POST['link'])&& isset($_POST['is_premium'])){
    $tourOperator= new TourOperator(['name'=> $_POST['name'], 'link'=>$_POST['link'], 'is_premium'=>$_POST['is_premium'], 'grade'=> '0']);
    $OperatorManager->createTourOperator($tourOperator);
    header("location: ../AdminModification.php?message= New Tour Operator created");
}
//create Review
else if(isset($_POST['message']) && isset($_POST['author'])){

    $review= new Review(['message'=> $_POST['message'], 'author'=>$_POST['author'], 'id_tour_operator'=>$_POST['id_tour_operator'], 'grade_review'=>$_POST['grade_review']=='null'? null:$_POST['grade_review']]);
    $ReviewManager->createReview($review);
    $tourOperator= $OperatorManager->getOneOperator($_POST['id_tour_operator']);
    $moyengrade= $ReviewManager->getGradeByOperator($_POST['id_tour_operator']);
    var_dump($moyengrade);
    $OperatorManager->updateOperatorGrade($tourOperator, $moyengrade['grade_moyenne']);
}
//image
else if(isset($_POST['idDestination']) && isset($_FILES['photo_link'])){
   
uploadImage();
$image = new Image(["photo_link"=>"/images/" . $_FILES["photo_link"]["name"],"id_destination" =>$_POST['idDestination']]);
$ImageManager->createPhotoLink($image);
header("location: ../AdminModification.php?message= Photo added");
}
