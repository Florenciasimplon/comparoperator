<?php
include '../config/db.php';
include '../config/autoload.php';

$OperatorManager = new TourOperatorManager($pdo);
$ReviewManager = new ReviewManager($pdo);
$DestinationManager = new DestinationManager($pdo);
$ImageManager = new ImageManager($pdo);


$allDestinationsSearch = $DestinationManager-> getListDestinationSearch($_POST['search']);
//Destination
foreach ($allDestinationsSearch as $destinationSearch) { ?>
    <div class="search">
        <div class="row">
        <div class='col-4'>
        <?php
        // image
        $imageDestinationSearch = $ImageManager->getImageByDestination($destinationSearch->getId()); 
                foreach($imageDestinationSearch as $imageSearch){?>
                <img src="<?=$imageSearch->getPhoto_link()?>" alt="" srcset="">
        </div><?php } ;?>
        <div class='col-1'></div>
        <div class='col-7'>
        <div class="row">
            <div class="col-4">
                <?= $destinationSearch->getLocation(); ?>
            </div>
            <div class="col-6">
                <?= $destinationSearch->getPrice(); ?>
            </div>
        </div>
        </div>       
         <?php 
                //operator 
                $destinationOperatorSearch = $OperatorManager->getOperatorByDestination($destinationSearch->getLocation()); 
                foreach($destinationOperatorSearch as $operatorDestinationSearch){?>
                <div class="col-4">
                <?= $operatorDestinationSearch->getName(); ?>
                 </div>
                <?php 
                if ($operatorDestinationSearch->getIs_premium() === false) {
                    echo '</br>This Operator is not Premium ';
                } else {
                    echo '</br>This Operator is Premium ';
                } ?>
                <?= $operatorDestinationSearch->getGrade(); ?>
               <?php if ($operatorDestinationSearch->getIs_premium() === true) {
                   echo $operatorDestinationSearch->getLink(); }?>
            </div>
        </div>
    </div>
        <form action='../operator.php' method="post">
        <input type='hidden' name='id_tour_operator' value='<?= $operatorDestinationSearch->getId();?>'>
        <button type="submit" class="btn  cardbtn">more information</button>
    </form>


    <?php 
};};  ?>