<?php
include 'config/db.php';
include 'config/autoload.php';
session_start();
include 'partiels/header.php'; ?>
<body>
<?php 
include 'partiels/navBar.php'; 

$DestinationManager = new DestinationManager($pdo); 
$OperatorManager = new TourOperatorManager($pdo);
$ReviewManager = new ReviewManager($pdo);
include 'data-recovery/poc-promo.php';
include 'forms/search.php';
include 'data-recovery/destinations.php';

?>
<h1>test</h1>
<i class='fa fa-star' style='color:yellow; border:black;'></i>
<i class='far fa-star'></i>
<i class="fas fa-camera"></i> 
</body>
<?php include 'partiels/footer.php'; ?>