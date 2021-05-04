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

if(isset($_POST['destination'])){
    $allOperatorByDestination = $OperatorManager->getOperatorByDestination($_POST['destination']);
    foreach($allOperatorByDestination as $operatorByDestination){
        
        echo '</br>'.$operatorByDestination->getName();
        echo '</br>'.$operatorByDestination->getGrade();
        echo '</br>'.$operatorByDestination->getLink();
        if($operatorByDestination->getIs_premium()=== false){
            echo '</br>This Operator is not Premium ';
        }else{
            echo '</br>This Operator is Premium ';
        }
        
        $allReviews = $ReviewManager->getReviewByOperator($operatorByDestination->getId());
        
        foreach($allReviews as $reviews){
            
            echo '</br>'.$reviews->getMessage(); 
            echo '</br>'.$reviews->getAuthor(); 
            

        }include 'forms/form-review.php';
    }
}


    
         

?>
</body>
<?php include 'partiels/footer.php'; ?>