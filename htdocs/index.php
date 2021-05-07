<?php
include 'config/db.php';
include 'config/autoload.php';
include 'partiels/header.php'; ?>
<body>
<?php 
include 'partiels/navBar.php'; 

$DestinationManager = new DestinationManager($pdo); 
$OperatorManager = new TourOperatorManager($pdo);
$ReviewManager = new ReviewManager($pdo);
include 'data-recovery/poc-promo.php';
include 'forms/search.php';
?>
<div id='resultSearchDestination'></div> 
<div id='resultSearchTourOperator'></div> 
<?php include 'data-recovery/destinations.php';
include 'data-recovery/gallery.php';?>


</body>
<?php include 'partiels/footer.php'; 

include 'partiels/footerScript.php'; 
?>
