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

if(isset($_POST['id'])){ 
$detinationData = $DestinationManager->getDestinationById($_POST['id']);
$operatorData = $OperatorManager->getOperatorById($detinationData['id_tour_operator']);



    $imageDestination = $ImageManager->getImageByDestination($_POST['id']);?>
<div class='border border-secondary m-xs-1 m-sm-3 m-md-5 p-1 rounded text-center'>
      <div class="row">
         <div class="col-12 namecarousel">
            <h1><?= $operatorData['name']; ?></h1>
        </div>
                        
        </div>

        <div class="row align-items-center">
            <div class="col-xs-12 col-sm-4">
                        <div class="carousel2 owl-carousel">
                            <?php foreach ($imageDestination as $image) :?>
                                    <img src="<?=$image->getPhoto_Link()?>" alt="" srcset="">                                                   
                            <?php endforeach; ?>
                        </div>
            </div>
        
                <div class="col-xs-12 col-sm-1"></div>
                <div class="col-xs-12 col-sm-7">
                   

                    <div class="row mt-xs-0 mt-sm-0 mt-lg-5">
                        <div class="col-xs-12 col-lg-4">
                            <h6> <?= $detinationData['location']; ?> </h6>
                            
                        </div>
                        <div class="col-xs-12 col-lg-3">
                            <h6> Price  <?= $detinationData['price']; ?></h6>
                           
                        </div>
                        <div class="col-xs-12 col-lg-5">
                            <?php if ($operatorData['is_premium'] === '0') {
                                echo '<img src="https://img.icons8.com/ios/50/000000/fairytale.png" alt="" srcset="">';
                            } else {
                                echo '<img src="https://img.icons8.com/fluent/25/000000/fairytale.png" alt="" srcset=""> ';
                            } ?>
                            <?php if ($operatorData['is_premium'] === '1') {
                                echo $operatorData['link'];
                            } ?>
                        </div>
                    </div>

                    <div class="row mt-xs-0 mt-sm-0 mt-lg-5 mb-1">
                        
                        
                        <div class="col-xs-12 col-md-7">
                            <?php if ($operatorData['grade']=== null) {
                                echo "<i class='far fa-star'></i>
                                    <i class='far fa-star'></i>
                                    <i class='far fa-star'></i>
                                    <i class='far fa-star'></i>
                                    <i class='far fa-star'></i>";
                            }elseif($operatorData['grade'] < 2){ 
                                echo "  <i class='fa fa-star text-warning' ></i>
                                        <i class='far fa-star'></i>
                                        <i class='far fa-star'></i>
                                        <i class='far fa-star'></i>
                                        <i class='far fa-star'></i>";
                            }elseif($operatorData['grade'] < 3){ 
                                echo "  <i class='fa fa-star text-warning' ></i>
                                        <i class='fa fa-star text-warning' ></i>
                                        <i class='far fa-star'></i>
                                        <i class='far fa-star'></i>
                                        <i class='far fa-star'></i>";
                            }elseif($operatorData['grade'] < 4){ 
                                echo "  <i class='fa fa-star text-warning' ></i>
                                        <i class='fa fa-star text-warning' ></i>
                                        <i class='fa fa-star text-warning' ></i>
                                        <i class='far fa-star'></i>
                                        <i class='far fa-star'></i>";

                            }elseif($operatorData['grade'] < 5){ 
                                echo "  <i class='fa fa-star text-warning' ></i>
                                        <i class='fa fa-star text-warning' ></i>
                                        <i class='fa fa-star text-warning' ></i>
                                        <i class='fa fa-star text-warning' ></i>
                                        <i class='far fa-star'></i>";
                            }elseif($operatorData['grade'] < 6){ 
                                echo "  <i class='fa fa-star text-warning' ></i>
                                        <i class='fa fa-star text-warning' ></i>
                                        <i class='fa fa-star text-warning' ></i>
                                        <i class='fa fa-star text-warning' ></i>
                                        <i class='fa fa-star text-warning' ></i>";
                            } echo $operatorData['grade'];
                        ?>
                        </div>
                        
                        <div class="col-xs-12 col-md-5">
                            <button class='btnFormSearchAjax btn btn-outline-secondary' id='<?=$_POST['id'];?>'>See Reviews</button>
                        </div>
                    </div>
                </div>
            </div>

    <?php    $allReviews = $ReviewManager->getReviewByOperator($operatorData['id']);?>
   
<div class='reviewsAll' id='reviewsAll<?=$_POST['id'];?>'> 
<div class='bg-light border border-secondary m-xs-1 m-sm-3 m-md-5 p-1 p-sm-2 p-md-5 rounded'> 
            <div class="reviewSearchTourOperator<?=$operatorData['id']?>">
    <?php foreach ($allReviews as $reviews) : ?>
                <div class='row text-start'>
                    <div class='col-xs-12 col-sm-4'>
                        <?= $reviews->getAuthor(); ?>
                    </div>
                    
                    <div class='col-xs-12 col-sm-4'>
                        <?= $reviews->getMessage(); ?>
                    </div>
                    
                    <div class= 'col-xs-12 col-sm-4 text-end'>
                        <?php switch ($reviews->getGrade_review()) {
                            case null:
                                echo "<i class='far fa-star'></i>
                                    <i class='far fa-star'></i>
                                    <i class='far fa-star'></i>
                                    <i class='far fa-star'></i>
                                    <i class='far fa-star'></i>";
                                break;
                            case 1:
                                echo "  <i class='fa fa-star text-warning' ></i>
                                        <i class='far fa-star'></i>
                                        <i class='far fa-star'></i>
                                        <i class='far fa-star'></i>
                                        <i class='far fa-star'></i>";
                                break;

                            case 2:
                                echo "  <i class='fa fa-star text-warning' ></i>
                                        <i class='fa fa-star text-warning' ></i>
                                        <i class='far fa-star'></i>
                                        <i class='far fa-star'></i>
                                        <i class='far fa-star'></i>";
                                break;

                            case 3:
                                echo "  <i class='fa fa-star text-warning' ></i>
                                        <i class='fa fa-star text-warning' ></i>
                                        <i class='fa fa-star text-warning' ></i>
                                        <i class='far fa-star'></i>
                                        <i class='far fa-star'></i>";
                                break;

                            case 4:
                                echo "  <i class='fa fa-star text-warning' ></i>
                                        <i class='fa fa-star text-warning' ></i>
                                        <i class='fa fa-star text-warning' ></i>
                                        <i class='fa fa-star text-warning' ></i>
                                        <i class='far fa-star'></i>";
                                break;

                            case 5:
                                echo "  <i class='fa fa-star text-warning' ></i>
                                        <i class='fa fa-star text-warning' ></i>
                                        <i class='fa fa-star text-warning' ></i>
                                        <i class='fa fa-star text-warning' ></i>
                                        <i class='fa fa-star text-warning' ></i>";
                                break;
                        } ?>
                    </div>
                </div>
    

            <?php endforeach; ?>
       </div>
       
    
        <?php include 'forms/form-review-searchTourOperator.php';?>
    </div>
    </div>
</div>
   
<?php }else{
    include 'data-recovery/allDestinationUser.php';
}; ?>
        <?php 
            include 'partiels/footer.php';
            include 'partiels/footerScript.php';
        ?>