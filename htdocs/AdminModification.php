<?php
include 'config/db.php';
include 'config/autoload.php';
$DestinationManager = new DestinationManager($pdo);
$OperatorManager = new TourOperatorManager($pdo);
$ReviewManager = new ReviewManager($pdo);
$ImageManager = new ImageManager($pdo);


include 'partiels/header.php'; ?>

<body>
  <?php
  if (!empty($_GET["message"])) : ?>
    <div style="padding: 10px;background:gray;color:#fff;">
      <?= $_GET["message"] ?>
    </div>
  <?php endif; ?>
<div class='row justify-content-between text-center bg-primary bg-gradient p-3'>
<div class='col-lg-2 bg-info border border-dark rounded pt-2 AddDestinationBtn'>
  <p>Add Destination </p>
</div>
<div class='col-lg-2 bg-info border border-dark rounded pt-2 AddTourOperatorBtn'>
  <p>Add Tour Operator </p>
</div>
<div class='col-lg-2 bg-info border border-dark rounded pt-2 AllTourOperatorBtn'>
  <p>All Tour Operators </p>
</div>
<div class='col-lg-2 bg-info border border-dark rounded pt-2 AllDestinationsBtn'>
  <p>All Destinations </p>
</div>
<div class='col-lg-2 bg-info border border-dark rounded pt-2 AllReviewsBtn'>
  <p>All Reviews </p>
</div>

</div>


  <div id='seeFormDestination'>
  <?php
  include 'forms/form-destination.php'; 
  ?>
  </div>
  <div id='seeFormTourOperator'>
   <?php
  include 'forms/form-tourOperator.php'; 
  ?>
  </div>
  <div id='seeOperator'>
    <?php include 'data-recovery/allOperator.php';  ?>
  </div>
  <div id='seeReviews'>
    <?php include 'data-recovery/allReviews.php'; ?>
  </div>
  <div id='seeDestination'>
    <?php include 'data-recovery/allDestination.php'; ?>
  </div>
  <?php include 'partiels/footer.php'; ?>
</body>

</html>