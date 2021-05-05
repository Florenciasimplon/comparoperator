<?php
$allReviewTourOperator = $ReviewManager->getAllReview();

foreach($allReviewTourOperator as $oneReview):?>
<div class="container">
  <div class="row">
    <div class="col-sm">
    <p>Review =  <?php echo $oneReview->getMessage();?> </p>
    </div>
    <div class="col-sm">
    <p> Author =  <?php echo $oneReview->getAuthor(); ?> </p>
    </div>
    <?php 
    $allOperatorByReview = $OperatorManager->getOperatorById($oneReview->getId_tour_operator());
    foreach($allOperatorByReview as $operatorReview):?>
    <div class="col-sm">
     <p> Operator = <?php echo $operatorReview->getName(); ?></p>
    </div>
    <?php endforeach; ?> 
    <div class="col-sm">
     <p> Grade given = <?php echo $oneReview->getGrade_review(); ?></p>
    </div>
    <div class="col-sm">
    
    <form action='../treatment/delete.php' method="post">
        <input type='hidden' name='idReview' value='<?php echo $oneReview->getId();?> '>
        <?php 
        $tourOperator= $OperatorManager->getOneOperator($operatorReview->getId());
        $moyengrade= $ReviewManager->getGradeByOperator($operatorReview->getId());
        if($moyengrade['grade_moyenne']===null){
           $OperatorManager->updateOperatorGrade($tourOperator, '0'); 
        }else{
            $OperatorManager->updateOperatorGrade($tourOperator, $moyengrade['grade_moyenne']); 
        }
        ?>
        <button type="submit" class="btn btn-primary" name="destinations">Delete Review</button>
    </form>
    </div>
    </div>
  </div>
</div>
  <?php endforeach; ?>  
    