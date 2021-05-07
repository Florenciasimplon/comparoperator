<?php
include '../config/db.php';
include '../config/autoload.php';

$ReviewManager = new ReviewManager($pdo);
$OperatorManager= new TourOperatorManager($pdo);
$operatorData= $OperatorManager->getOperatorById($_POST['id_tour_operator']);
$allReviews = $ReviewManager->getReviewByOperator($_POST['id_tour_operator']);
$operator = new TourOperator($operatorData);
echo '</br>'. $operator->getGrade();

foreach ($allReviews as $review) :?>
        
        <?= $review->getMessage();?> 
        <?= $review->getAuthor(); ?>
    
<?php endforeach;