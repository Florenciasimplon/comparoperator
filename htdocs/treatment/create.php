<?php 
$bdd = 'mysql:host=127.0.0.1;dbname=ComparOperator';
$user = 'root';
$password = '';

try {
    $pdo = new PDO($bdd, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    print 'erreur!:' . $e->getMessage() . '<br/>';
    die('');
}
include '../config/autoload.php';



$managerReview= new ReviewManager($pdo);
$managerDestination = new DestinationManager($pdo);
$managerOperator = new TourOperatorManager($pdo);
include '../treatment/uploadimg.php';



if(isset($_POST['location']) && isset($_POST['price'])){
    $destination= new Destination(['location'=> $_POST['location'], 'price'=>$_POST['price'], 'id_tour_operator'=>$_POST['id_tour_operator']]);
    $managerDestination->createDestination($destination);
    uploadImage();
    $ImageManager = new ImageManager($pdo);
    $image = new Image(["photo_link"=>"/images/" . $_FILES["photo_link"]["name"],"id_destination" =>$destination->getId()]);
    $ImageManager->createPhotoLink($image);

}

else if(isset($_POST['name']) && isset($_POST['link'])&& isset($_POST['is_premium'])){
    $tourOperator= new TourOperator(['name'=> $_POST['name'], 'link'=>$_POST['link'], 'is_premium'=>$_POST['is_premium'], 'grade'=> '0']);
    $managerOperator->createTourOperator($tourOperator);
}

else if(isset($_POST['message']) && isset($_POST['author'])){

    $review= new Review(['message'=> $_POST['message'], 'author'=>$_POST['author'], 'id_tour_operator'=>$_POST['id_tour_operator'], 'grade_review'=>$_POST['grade_review']=='null'? null:$_POST['grade_review']  ]);
    $managerReview->createReview($review);
    $tourOperator= $manager->getOneOperator($_POST['id_tour_operator']);
    $moyengrade= $managerReview->getGradeByOperator($_POST['id_tour_operator']);
    var_dump($moyengrade);
    $manager->updateOperatorGrade($tourOperator, $moyengrade['grade_moyenne']);
}