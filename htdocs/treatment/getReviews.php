<?php
include '../config/db.php';
include '../config/autoload.php';

$ReviewManager = new ReviewManager($pdo);
$OperatorManager= new TourOperatorManager($pdo);
$operatorData= $OperatorManager->getOperatorById($_POST['id_tour_operator']);
$allReviews = $ReviewManager->getReviewByOperator($_POST['id_tour_operator']);
$operator = new TourOperator($operatorData);


foreach ($allReviews as $review) :?>
        
        <div class='row text-start'>
                    <div class='col-xs-12 col-sm-4'>
                        <?= $review->getAuthor(); ?>
                    </div>
                    
                    <div class='col-xs-12 col-sm-4'>
                        <?= $review->getMessage(); ?>
                    </div>
                    
                    <div class= 'col-xs-12 col-sm-4 text-end'>
                        <?php switch ($review->getGrade_review()) {
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
    
<?php endforeach;