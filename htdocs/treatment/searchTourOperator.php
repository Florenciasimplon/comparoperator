
<?php
include '../config/db.php';
include '../config/autoload.php';

$OperatorManager = new TourOperatorManager($pdo);
$ReviewManager = new ReviewManager($pdo);
$DestinationManager = new DestinationManager($pdo);
$ImageManager = new ImageManager($pdo);

$operatorData = $OperatorManager->getListOperatorSearch($_POST['search']);
foreach ($operatorData as $operatorSearch) { ?>
    <div class="search border border-secondary m-xs-1 m-sm-3 m-md-5 p-1 rounded text-center">
        <div class="row">
            
        <div class="col-xs-12 col-lg-4">
                <?= $operatorSearch->getName(); ?>
            </div>

            <div class="col-xs-12 col-lg-4">
          <?php if ($operatorSearch->getGrade()< 1) {
                                echo "<i class='far fa-star'></i>
                                    <i class='far fa-star'></i>
                                    <i class='far fa-star'></i>
                                    <i class='far fa-star'></i>
                                    <i class='far fa-star'></i>";
                            }elseif($operatorSearch->getGrade() < 2){ 
                                echo "  <i class='fa fa-star text-warning' ></i>
                                        <i class='far fa-star'></i>
                                        <i class='far fa-star'></i>
                                        <i class='far fa-star'></i>
                                        <i class='far fa-star'></i>";
                            }elseif($operatorSearch->getGrade() < 3){ 
                                echo "  <i class='fa fa-star text-warning' ></i>
                                        <i class='fa fa-star text-warning' ></i>
                                        <i class='far fa-star'></i>
                                        <i class='far fa-star'></i>
                                        <i class='far fa-star'></i>";
                            }elseif($operatorSearch->getGrade() < 4){ 
                                echo "  <i class='fa fa-star text-warning' ></i>
                                        <i class='fa fa-star text-warning' ></i>
                                        <i class='fa fa-star text-warning' ></i>
                                        <i class='far fa-star'></i>
                                        <i class='far fa-star'></i>";

                            }elseif($operatorSearch->getGrade() < 5){ 
                                echo "  <i class='fa fa-star text-warning' ></i>
                                        <i class='fa fa-star text-warning' ></i>
                                        <i class='fa fa-star text-warning' ></i>
                                        <i class='fa fa-star text-warning' ></i>
                                        <i class='far fa-star'></i>";
                            }elseif($operatorSearch->getGrade() < 6){ 
                                echo "  <i class='fa fa-star text-warning' ></i>
                                        <i class='fa fa-star text-warning' ></i>
                                        <i class='fa fa-star text-warning' ></i>
                                        <i class='fa fa-star text-warning' ></i>
                                        <i class='fa fa-star text-warning' ></i>";
                            } echo $operatorSearch->getGrade();
                        ?>
</div>


 <div class="col-xs-12 col-lg-4">
                <?php 
                if ($operatorSearch->getIs_Premium() === false ) {
                    echo '<img src="https://img.icons8.com/ios/25/000000/fairytale.png" alt="" srcset="">';
                } else {
                    echo '<img src="https://img.icons8.com/fluent/25/000000/fairytale.png" alt="" srcset=""> ';
                } ?>
               <?php if ($operatorSearch->getIs_Premium() === true ) {
                   echo $operatorSearch->getLink(); }?>
            
        </div>

      

    <form action='../operator.php' method="post">
        <input type='hidden' name='id_tour_operator' value='<?= $operatorSearch->getId();?>'>
        <button type="submit" class="btn  cardbtn">more information</button>
    </form>
</div>
    </div>
<?php } ; ?>  
