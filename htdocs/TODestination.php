<?php
include 'config/db.php';
include 'config/autoload.php';
include 'partiels/header.php'; ?>

<body>
<?php
include 'partiels/navBar.php';

$OperatorManager = new TourOperatorManager($pdo);
$ReviewManager = new ReviewManager($pdo);
$DestinationManager = new DestinationManager($pdo);
$ImageManager = new ImageManager($pdo);
if(isset($_POST['destination'])):
$allOperators = $OperatorManager->getPeersDestinationOperator($_POST['destination']);?>
<div class=''>
<?php
foreach ($allOperators as $peers) { 
   
 $imageDestination = $ImageManager->getImageByDestination($peers['destination']->getId());?>
     
     
        <div class="row">
            <div class="col-4">
                        <div class="carousel2 owl-carousel">
                            <?php foreach ($imageDestination as $image) :?>
                                    <img src="<?=$image->getPhoto_Link()?>" alt="" srcset="">                                                   
                            <?php endforeach; ?>
                        </div>
            </div>
        
                <div class="col-1"></div>
                <div class="col-7">
                    <div class="row">
                        <div class="col-12 namecarousel">
                            <h1><?= $peers['operator']->getName(); ?></h1>
                        </div>
                        
                    </div>

                    <div class="row">
                        <div class="col-4">
                            <h6> <?= $peers['destination']->getLocation(); ?> </h6>
                            
                        </div>
                        <div class="col-3">
                            <h6> Price  <?= $peers['destination']->getPrice(); ?></h6>
                           
                        </div>
                        <div class="col-5">
                            <?php if ($peers['operator']->getIs_premium() === false) {
                                echo '<img src="https://img.icons8.com/ios/50/000000/fairytale.png" alt="" srcset="">';
                            } else {
                                echo '<img src="https://img.icons8.com/fluent/25/000000/fairytale.png" alt="" srcset=""> ';
                            } ?>
                            <?php if ($peers['operator']->getIs_premium() === true) {
                                echo $peers['operator']->getLink();
                            } ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-5">
                        <form action="operator.php" method="post">
                            <button>See more</button>
                            <input type="hidden" name="id_tour_operator" value='<?=$peers['operator']->getId()?>'> 
                        </form>
                        </div>
                        
                        <div class="col-7">
                            <h6>Grade</h6>
                            <?php if ($peers['operator']->getGrade()=== null) {
                                echo "<i class='far fa-star'></i>
                                    <i class='far fa-star'></i>
                                    <i class='far fa-star'></i>
                                    <i class='far fa-star'></i>
                                    <i class='far fa-star'></i>";
                            }elseif($peers['operator']->getGrade() < 2){ 
                                echo "  <i class='fa fa-star text-warning' ></i>
                                        <i class='far fa-star'></i>
                                        <i class='far fa-star'></i>
                                        <i class='far fa-star'></i>
                                        <i class='far fa-star'></i>";
                            }elseif($peers['operator']->getGrade() < 3){ 
                                echo "  <i class='fa fa-star text-warning' ></i>
                                        <i class='fa fa-star text-warning' ></i>
                                        <i class='far fa-star'></i>
                                        <i class='far fa-star'></i>
                                        <i class='far fa-star'></i>";
                            }elseif($peers['operator']->getGrade() < 4){ 
                                echo "  <i class='fa fa-star text-warning' ></i>
                                        <i class='fa fa-star text-warning' ></i>
                                        <i class='fa fa-star text-warning' ></i>
                                        <i class='far fa-star'></i>
                                        <i class='far fa-star'></i>";

                            }elseif($peers['operator']->getGrade() < 5){ 
                                echo "  <i class='fa fa-star text-warning' ></i>
                                        <i class='fa fa-star text-warning' ></i>
                                        <i class='fa fa-star text-warning' ></i>
                                        <i class='fa fa-star text-warning' ></i>
                                        <i class='far fa-star'></i>";
                            }elseif($peers['operator']->getGrade() < 6){ 
                                echo "  <i class='fa fa-star text-warning' ></i>
                                        <i class='fa fa-star text-warning' ></i>
                                        <i class='fa fa-star text-warning' ></i>
                                        <i class='fa fa-star text-warning' ></i>
                                        <i class='fa fa-star text-warning' ></i>";
                            } echo $peers['operator']->getGrade() ;
                        ?>
                            
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?> 
</div>

    <?php endif; ?>
       
        
        <?php 
            include 'partiels/footer.php';
            include 'partiels/footerScript.php';
        ?>