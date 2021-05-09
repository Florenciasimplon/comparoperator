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

$allOperator = $OperatorManager->getAllOperator();

foreach ($allOperator as $operator) : ?>
  <div class='bg-light border border-secondary m-5 rounded card'>
    <div class="container pt-5 text-center">
      <div class="row">
        <div class="col-lg-3">
          <?php echo $operator->getName(); ?>
        </div>
        <div class="col-lg-4">
        <?php if ($operator->getIs_premium() === false) {
                                echo '<img src="https://img.icons8.com/ios/25/000000/fairytale.png" alt="" srcset="">';
                            } else {
                                echo '<img src="https://img.icons8.com/fluent/25/000000/fairytale.png" alt="" srcset=""> ';
                            } ?>


                            <?php if ($operator->getIs_premium() === true) {
                                echo $operator->getLink();
                                
                            } ?>
</div>

<div class="col-lg-3">
<?php if ($operator->getGrade()< 1) {
                                echo "<i class='far fa-star'></i>
                                    <i class='far fa-star'></i>
                                    <i class='far fa-star'></i>
                                    <i class='far fa-star'></i>
                                    <i class='far fa-star'></i>";
                            }elseif($operator->getGrade() < 2){ 
                                echo "  <i class='fa fa-star text-warning' ></i>
                                        <i class='far fa-star'></i>
                                        <i class='far fa-star'></i>
                                        <i class='far fa-star'></i>
                                        <i class='far fa-star'></i>";
                            }elseif($operator->getGrade() < 3){ 
                                echo "  <i class='fa fa-star text-warning' ></i>
                                        <i class='fa fa-star text-warning' ></i>
                                        <i class='far fa-star'></i>
                                        <i class='far fa-star'></i>
                                        <i class='far fa-star'></i>";
                            }elseif($operator->getGrade() < 4){ 
                                echo "  <i class='fa fa-star text-warning' ></i>
                                        <i class='fa fa-star text-warning' ></i>
                                        <i class='fa fa-star text-warning' ></i>
                                        <i class='far fa-star'></i>
                                        <i class='far fa-star'></i>";

                            }elseif($operator->getGrade() < 5){ 
                                echo "  <i class='fa fa-star text-warning' ></i>
                                        <i class='fa fa-star text-warning' ></i>
                                        <i class='fa fa-star text-warning' ></i>
                                        <i class='fa fa-star text-warning' ></i>
                                        <i class='far fa-star'></i>";
                            }elseif($operator->getGrade() < 6){ 
                                echo "  <i class='fa fa-star text-warning' ></i>
                                        <i class='fa fa-star text-warning' ></i>
                                        <i class='fa fa-star text-warning' ></i>
                                        <i class='fa fa-star text-warning' ></i>
                                        <i class='fa fa-star text-warning' ></i>";
                            } echo $operator->getGrade();
                        ?>  
        
        
        
        
        
        </div>
        <div class="col-lg-2">
        <form action='operator.php' method="post">
                            <input type='hidden' name='id_tour_operator' value='<?php echo $operator->getId();?> '>
                            <button type="submit" class="btn btn-outline-secondary m-1" name="destinations">See operator</button>
                        </form>
                        </div>              
    </div>
  </div>
                        </div>

<?php endforeach; ?>