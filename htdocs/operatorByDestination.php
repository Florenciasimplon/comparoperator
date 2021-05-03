<?php
include 'config/db.php';
include 'config/autoload.php';
session_start();
include 'partiels/header.php'; ?>
<body>
<?php 
include 'partiels/navBar.php'; 

 
$manager=new Manager($pdo);

var_dump($_POST['destination']);
if(isset($_POST['destination'])){
    $allOperatorByDestination = $manager->getOperatorByDestination($_POST['destination']);
    foreach($allOperatorByDestination as $operatorByDestination){
        
        echo '</br>'.$operatorByDestination->getName();
        echo '</br>'.$operatorByDestination->getGrade();
        echo '</br>'.$operatorByDestination->getLink();
        if($operatorByDestination->getIs_premium()=== false){
            echo '</br>This Operator is not Premium ';
        }else{
            echo '</br>This Operator is Premium ';
        }
        var_dump($operatorByDestination);
        $allReviews = $manager->getReviewByOperator($operatorByDestination->getId());
        var_dump($allReviews);
        foreach($allReviews as $reviews){
            
            echo '</br>'.$reviews->getMessage(); 
            echo '</br>'.$reviews->getAuthor(); 

        }
    }
}


    
         

?>
</body>
<?php include 'partiels/footer.php'; ?>