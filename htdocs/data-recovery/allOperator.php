<?php


$allOperator = $OperatorManager->getAllOperator();

foreach ($allOperator as $operator) : ?>
  <div class='bg-light border border-secondary m-5 rounded'>
    <div class="container pt-5 text-center">
      <div class="row">
        <div class="col-lg-3">
          <h6>Name</h6>
          <?php echo $operator->getName(); ?>
        </div>
        <div class="col-lg-1">
          <h6>Grade</h6>
          <?php echo $operator->getGrade(); ?>
        </div>
        <div class="col-lg-4">
          <h6>Link</h6>
          <?php echo $operator->getLink(); ?>
        </div>
        <div class="col-lg-4">
          <h6>Premium</h6>
          <?php if ($operator->getIs_premium() === false) {
            echo 'This Operator is not Premium ';
          } else {
            echo 'This Operator is Premium ';
          } ?>
        </div>
      </div>
    </div>

    <div class=" mt-3 mb-3 text-center">
      <button type="submit" class="btn btn-primary buttonAccesUpdateOperator" id='<?php echo $operator->getId(); ?>' name="destinations">Delete or Update Operator</button>
    </div>
    <div class='container mb-5 accesUpdateOperator' id='accesUpdateOperator<?php echo $operator->getId(); ?>'>
      <div class="row justify-content-around align-items-end ">
        <div class="col-lg-3 text-center">
          <form action='../treatment/delete.php' method="post">
            <input type='hidden' name='idOperator' value='<?php echo $operator->getId(); ?> '>

            <button type="submit" class="btn btn-danger btn-delete-item" name="destinations">Delete Operator</button>
          </form>
        </div>
        <div class="col-lg-6">
          <form action='../treatment/update.php' method="post">
            <input type='hidden' name='idOperator' value='<?php echo $operator->getId(); ?> '>
            <div class="mb-3">
              <label for="link" class="form-label"></label>
              <input type="text" class="form-control" placeholder="" name='link' placeholder="enter your website exemple : www.ComparOperator.com">
            </div>
            <button type="submit" class="btn btn-primary" name="destinations">Update Link</button>
          </form>
        </div>
        <div class="col-lg-3">
          <form action='../treatment/update.php' method="post">
            <input type='hidden' name='idOperator' value='<?php echo $operator->getId(); ?> '>

            <?php if ($operator->getIs_premium() === true) : ?>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="premium" id="flexRadioDisabled" disabled value='true'>
                <label class="form-check-label" for="flexRadioDisabled">
                  Not Premium
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="premium" id="flexRadioCheckedDisabled" checked value='false'>
                <label class="form-check-label" for="flexRadioCheckedDisabled">
                  Premium
                </label>
              </div>
            <?php else : ?>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="premium" id="flexRadioDisabled" checked value='true'>
                <label class="form-check-label" for="flexRadioDisabled">
                  Not Premium
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="premium" id="flexRadioCheckedDisabled" disabled value='false'>
                <label class="form-check-label" for="flexRadioCheckedDisabled">
                  Premium
                </label>
              </div>

            <?php endif ?>
            <button type="submit" class="btn btn-primary" name="destinations">update Premium</button>
          </form>
        </div>
      </div>
    </div>
  </div>





<?php endforeach; ?>