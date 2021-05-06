<?php
include '../config/db.php';
include '../config/autoload.php';

$ReviewManager = new ReviewManager($pdo);
$OperatorManager= new TourOperatorManager($pdo);
$operatorData= $OperatorManager->getOperatorById($_POST['id_tour_operator']);
$allReviews = $ReviewManager->getReviewByOperator($_POST['id_tour_operator']);
$operator = new TourOperator($operatorData);
echo '</br>'. $operator->getGrade();
var_dump($operator);
var_dump($allReviews);
foreach ($allReviews as $review) {
    echo '</br>'.$review->getMessage(); 
    echo '</br>'.$review->getAuthor(); 
    
}