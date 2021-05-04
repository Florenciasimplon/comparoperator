<?php
include 'config/db.php';
include 'config/autoload.php';
session_start();
include 'partiels/header.php'; ?>
<body>
<?php 
include 'partiels/navBar.php'; 

$DestinationManager = new DestinationManager($pdo); 
$manager=new Manager($pdo);
include 'data-recovery/destinations.php';

$allOperator = $manager->getAllOperator();

foreach($allOperator as $operator){
    echo '</br>'.$operator->getName();
    echo '</br>'.$operator->getGrade();
    echo '</br>'.$operator->getLink();
    if($operator->getIs_premium()=== false){
        echo '</br>This Operator is not Premium ';
    }else{
        echo '</br>This Operator is Premium ';
    }
}


?>
<h1>test</h1>
</body>
<?php include 'partiels/footer.php'; ?>