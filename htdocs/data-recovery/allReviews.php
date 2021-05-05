<?php
$allReviewTourOperator = $ReviewManager->getAllReview();

foreach($allReviewTourOperator as $oneReview):?>
 <div class='bg-light border border-secondary m-5 rounded'>
    <div class="container pt-5 text-center">
      <div class="row">
       
        <?php 
        $allOperatorByReview = $OperatorManager->getOperatorById($oneReview->getId_tour_operator());
        foreach($allOperatorByReview as $operatorReview):?>
            <div class="col-lg-3">
            <h6>Operator</h6>
            <?php echo $operatorReview->getName(); ?>
            </div>
            <?php endforeach; ?> 
            
            <div class="col-lg-3">
            <h6>Message</h6>
            <?php echo $oneReview->getMessage();?>
            </div>
            <div class="col-lg-3">
            <h6>Author</h6>
            <?php echo $oneReview->getAuthor(); ?>
            </div>
            <div class="col-lg-3">
            <h6>Grade Given</h6>
            <?php echo $oneReview->getGrade_review(); ?>
            </div>
     
    </div>
    
    <div class="mt-3 mb-3 text-center">
    
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
  <?php endforeach; ?>  
