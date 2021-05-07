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

$operatorData = $OperatorManager->getOperatorById($_POST['id_tour_operator']);
$allDestinations = $DestinationManager->getListDestinationByIdTO($_POST['id_tour_operator']);
foreach ($allDestinations as $destination) { 
    $imageDestination = $ImageManager->getImageByDestination($destination->getId());?>
     
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
                            <h1><?= $operatorData['name']; ?></h1>
                        </div>
                        
                    </div>

                    <div class="row">
                        <div class="col-4">
                            <h6> <?= $destination->getLocation(); ?> </h6>
                            
                        </div>
                        <div class="col-4">
                            <h6> Price  <?= $destination->getPrice(); ?></h6>
                           
                        </div>
                        <div class="col-4">
                            <?php if ($operatorData['is_premium'] === false) {
                                echo '<img src="https://img.icons8.com/ios/50/000000/fairytale.png" alt="" srcset="">';
                            } else {
                                echo '<img src="https://img.icons8.com/fluent/25/000000/fairytale.png" alt="" srcset=""> ';
                            } ?>
                            <?php if ($operatorData['is_premium'] === true) {
                                echo 'Link Tour Operator' . $operatorData['link'];
                            } ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-4">
                            <button class='btnSeeReviewsSearch' id='<?=$destination->getId();?>'>See Reviews</button>
                        </div>
                        <div class="col-4">
                            <button class="btnSeeAddReviewsSearch" id='<?=$destination->getId();?>'>Add Reviews</button>
                        </div>
                        <div class="col-4">
                            <h6>Grade  <?= $operatorData['grade']; ?></h6>
                            
                        </div>
                    </div>
                </div>
            </div>


    <?php    $allReviews = $ReviewManager->getReviewByOperator($operatorData['id']);?>

            <div class="reviewSearchTourOperator<?=$operatorData['id']?>">
    <?php foreach ($allReviews as $reviews) : ?>
                <div class='row'>
                    <div class='col-3'>
                        <?= $reviews->getAuthor(); ?>
                    </div>
                    <div class='col-1'></div>
                    <div class='col-5'>
                        <?= $reviews->getMessage(); ?>
                    </div>
                    <div class='col-1'></div>
                    <div class='col-2'>
                        <?php switch ($reviews->getGrade_review()) {
                            case null:
                                echo '0';
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
        <div class='seeFormSearchReviewTourOperator' id='seeFormSearchReviewTourOperator<?=$destination->getId();?>'>   
        <button class="" id='lessFormSearchReviewTourOperator<?=$destination->getId();?>'>Add Reviews</button>
        <?php include 'forms/form-review-searchTourOperator.php';?>
        </div> 
        <div class='seeSearchReviewTourOperator' id='seeSearchReviewTourOperator<?=$destination->getId();?>'>  
        <?php include 'forms/form-review-searchTourOperator.php';
        }; ?>
        </div>
            </div>
        
        </div>
        <?php 
            include 'partiels/footer.php';
            include 'partiels/footerScript.php';
        ?>