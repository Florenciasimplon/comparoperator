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
    <div class='border border-secondary m-xs-1 m-sm-3 m-md-5 p-1 rounded text-center card fs-5'>
    
                <div class="row">
                        <div class="col-xs-12 col-lg-6 fs-3">
                <?= $destinationSearch->getLocation(); ?>
            </div>
            <div class="col-xs-12 col-lg-6">
                <?= $destinationSearch->getPrice(); ?>💲
            </div>
                </div>
               
         <?php 
                //operator 
                $destinationOperatorSearch = $OperatorManager->getOperatorByDestination($destinationSearch->getLocation()); 
                ?>
 <div class="row">

                <div class="col-xs-12 col-lg-4 fs-4">
                <?= $destinationOperatorSearch[0]->getname(); ?>
                </div>

                <div class="col-xs-12 col-lg-4">
                <?php 
                if ($destinationOperatorSearch[0]->getIs_Premium() === false) {
                    echo '<img src="https://img.icons8.com/ios/25/000000/fairytale.png" alt="" srcset="">';
                } else {
                    echo '<img src="https://img.icons8.com/fluent/25/000000/fairytale.png" alt="" srcset=""> ';
                } ?>
               <?php if ($destinationOperatorSearch[0]->getIs_Premium() === true) {
                   echo $destinationOperatorSearch[0]->getLink(); }?>
            
        </div>

        <div class="col-xs-12 col-lg-4">
          <?php if ($destinationOperatorSearch[0]->getGrade()< 1) {
                                echo "<i class='far fa-star'></i>
                                    <i class='far fa-star'></i>
                                    <i class='far fa-star'></i>
                                    <i class='far fa-star'></i>
                                    <i class='far fa-star'></i>";
                            }elseif($destinationOperatorSearch[0]->getGrade() < 2){ 
                                echo "  <i class='fa fa-star text-warning' ></i>
                                        <i class='far fa-star'></i>
                                        <i class='far fa-star'></i>
                                        <i class='far fa-star'></i>
                                        <i class='far fa-star'></i>";
                            }elseif($destinationOperatorSearch[0]->getGrade() < 3){ 
                                echo "  <i class='fa fa-star text-warning' ></i>
                                        <i class='fa fa-star text-warning' ></i>
                                        <i class='far fa-star'></i>
                                        <i class='far fa-star'></i>
                                        <i class='far fa-star'></i>";
                            }elseif($destinationOperatorSearch[0]->getGrade() < 4){ 
                                echo "  <i class='fa fa-star text-warning' ></i>
                                        <i class='fa fa-star text-warning' ></i>
                                        <i class='fa fa-star text-warning' ></i>
                                        <i class='far fa-star'></i>
                                        <i class='far fa-star'></i>";

                            }elseif($destinationOperatorSearch[0]->getGrade() < 5){ 
                                echo "  <i class='fa fa-star text-warning' ></i>
                                        <i class='fa fa-star text-warning' ></i>
                                        <i class='fa fa-star text-warning' ></i>
                                        <i class='fa fa-star text-warning' ></i>
                                        <i class='far fa-star'></i>";
                            }elseif($destinationOperatorSearch[0]->getGrade() < 6){ 
                                echo "  <i class='fa fa-star text-warning' ></i>
                                        <i class='fa fa-star text-warning' ></i>
                                        <i class='fa fa-star text-warning' ></i>
                                        <i class='fa fa-star text-warning' ></i>
                                        <i class='fa fa-star text-warning' ></i>";
                            } echo $destinationOperatorSearch[0]->getGrade();
                        ?>
</div>
                        </div>
        <form action='../pages/destination.php' method="post">
        <input type='hidden' name='id' value='<?= $destinationSearch->getId();?>'>
        <button type="submit" class="btn btn-outline-secondary ">more information</button>
    </form>
</div>
    <?php 
};?>


<?php  ?>