
<?php
include '../config/db.php';
include '../config/autoload.php';

$OperatorManager = new TourOperatorManager($pdo);
$ReviewManager = new ReviewManager($pdo);
$DestinationManager = new DestinationManager($pdo);
$ImageManager = new ImageManager($pdo);

$operatorData = $OperatorManager->getListOperatorSearch($_POST['search']);
foreach ($operatorData as $operatorSearch) { ?>
    <div class="search">
        <div class="row">
            <div class="col-4">
                <?= $operatorSearch->getName(); ?>
            </div>
            <div class="col-6">
                <?= $operatorSearch->getLink(); ?>
                <?php if ($operatorSearch->getIs_premium() === false) {
                    echo '</br>This Operator is not Premium ';
                } else {
                    echo '</br>This Operator is Premium ';
                } ?>
            </div>
        </div>
    </div>


    <?php $allReviews = $ReviewManager->getReviewByOperator($operatorSearch->getId());
    echo $operatorSearch->getId();
    echo $operatorSearch->getGrade();
    ?>
    <form action='../operator.php' method="post">
        <input type='hidden' name='id_tour_operator' value='<?= $operatorSearch->getId();?>'>
        <button type="submit" class="btn  cardbtn">more information</button>
    </form>

<?php } ; ?>