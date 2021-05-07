<?php
include 'config/db.php';
include 'config/autoload.php';
session_start();
include 'partiels/header.php'; ?>
<body>
<?php 
include 'partiels/navBar.php'; 

 
$OperatorManager=new TourOperatorManager($pdo);
$ReviewManager = new ReviewManager($pdo);

if(isset($_POST['destination'])):?>
   <?php $allOperatorByDestination = $OperatorManager->getOperatorByDestination($_POST['destination']);
    foreach($allOperatorByDestination as $operatorByDestination):?>
        
        <?= $operatorByDestination->getName();?>
        
        <?= $operatorByDestination->getLink();?>
        <?php if($operatorByDestination->getIs_premium()=== false){
            echo '</br>This Operator is not Premium ';
        }else{
            echo '</br>This Operator is Premium ';
        } ?>
        
        <?php $allReviews = $ReviewManager->getReviewByOperator($operatorByDestination->getId());
        echo '<div class="commentaire-list'.$operatorByDestination->getId().'">';
        echo '</br>'.$operatorByDestination->getGrade();
        foreach($allReviews as $reviews):?>
            
            <?= $reviews->getMessage();?> 
            <?= $reviews->getAuthor(); ?>
            

        
        <?php  endforeach; echo '</div>';
        include 'forms/form-review.php';
        endforeach; endif?>

</body>
<?php include 'partiels/footer.php';
include 'partiels/footerScript.php'; ?>