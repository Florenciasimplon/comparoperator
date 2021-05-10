<?php
include __DIR__ . '/../config/db.php';
include __DIR__ . '/../config/autoload.php';
include __DIR__ . '/../partiels/header.php'; ?>

<body>
    <?php
    include __DIR__ . '/../partiels/navBar.php';

    $OperatorManager = new TourOperatorManager($pdo);
    $ReviewManager = new ReviewManager($pdo);
    $DestinationManager = new DestinationManager($pdo);
    $ImageManager = new ImageManager($pdo);

    if (isset($_POST['id_tour_operator'])) :
        $operatorData = $OperatorManager->getOperatorById($_POST['id_tour_operator']);
    ?>
        <h1 class='text-center namecarousel'><?= $operatorData['name'] ?></h1>
        <div class='border border-secondary m-xs-1 m-sm-3 m-md-5 p-xs-1 p-sm-2 p-md-5 rounded text-center card'>
            <div class='row text-center'>
                <div class="col-12 col-sm-3 ">
                    <?php if ($operatorData['is_premium'] === '0') {
                        echo '<img src="https://img.icons8.com/ios/50/000000/fairytale.png" alt="" srcset="">';
                    } else {
                        echo '<img src="https://img.icons8.com/fluent/25/000000/fairytale.png" alt="" srcset=""> ';
                    } ?>
                </div>
                <div class='col-12 col-sm-6'>
                    <?php if ($operatorData['is_premium'] === '1') {
                        echo $operatorData['link'];
                    } ?>
                </div>

                <div class="col-12 col-sm-3">
                    <?php if ($operatorData['grade'] === null) {
                        echo "<i class='far fa-star'></i>
                                    <i class='far fa-star'></i>
                                    <i class='far fa-star'></i>
                                    <i class='far fa-star'></i>
                                    <i class='far fa-star'></i>";
                    } elseif ($operatorData['grade'] < 2) {
                        echo "  <i class='fa fa-star text-warning' ></i>
                                        <i class='far fa-star'></i>
                                        <i class='far fa-star'></i>
                                        <i class='far fa-star'></i>
                                        <i class='far fa-star'></i>";
                    } elseif ($operatorData['grade'] < 3) {
                        echo "  <i class='fa fa-star text-warning' ></i>
                                        <i class='fa fa-star text-warning' ></i>
                                        <i class='far fa-star'></i>
                                        <i class='far fa-star'></i>
                                        <i class='far fa-star'></i>";
                    } elseif ($operatorData['grade'] < 4) {
                        echo "  <i class='fa fa-star text-warning' ></i>
                                        <i class='fa fa-star text-warning' ></i>
                                        <i class='fa fa-star text-warning' ></i>
                                        <i class='far fa-star'></i>
                                        <i class='far fa-star'></i>";
                    } elseif ($operatorData['grade'] < 5) {
                        echo "  <i class='fa fa-star text-warning' ></i>
                                        <i class='fa fa-star text-warning' ></i>
                                        <i class='fa fa-star text-warning' ></i>
                                        <i class='fa fa-star text-warning' ></i>
                                        <i class='far fa-star'></i>";
                    } elseif ($operatorData['grade'] < 6) {
                        echo "  <i class='fa fa-star text-warning' ></i>
                                        <i class='fa fa-star text-warning' ></i>
                                        <i class='fa fa-star text-warning' ></i>
                                        <i class='fa fa-star text-warning' ></i>
                                        <i class='fa fa-star text-warning' ></i>";
                    }
                    echo $operatorData['grade'];
                    ?>
                </div>
            </div>
            <?php
            $allDestinations = $DestinationManager->getListDestinationByIdTO($_POST['id_tour_operator']);

            foreach ($allDestinations as $destination) { ?>
                <div class="d-flex justify-content-center text-center">

                    <div class='btnReviewOperatorEtDestination w-25 p-1 cardBtn "' id='<?= $destination->getId() ?>'> <?= $destination->getLocation() ?> ↕️ </div>

                </div>

                <div class="hideDestination1" id='hideDestination1<?= $destination->getId() ?>'>


                    <?php
                    $imageDestination = $ImageManager->getImageByDestination($destination->getId()); ?>

                    <div class="row align-items-center">
                        <div class="col-12">
                            <h3 class='m-1'><?= $destination->getLocation(); ?></h3>
                            <h3 class='m-1'> <?= $destination->getPrice(); ?> 💲</h3>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-12 mx-auto">
                            <div class="carousel2 owl-carousel">
                                <?php foreach ($imageDestination as $image) : ?>
                                    <img class='w-25 h-25 mt-1 mb-1 mx-auto' src="../<?= $image->getPhoto_Link() ?>" alt="" srcset="">
                                <?php endforeach; ?>
                            </div>
                        </div>




                    </div>

                </div>

            <?php } ?>
            <div class="text-center m-2">
                <button class='btnFormSearchAjax btn btn-outline-secondary text-center' id='<?= $destination->getId(); ?>'>See Reviews ↕️ </button>
            </div>

            <?php $allReviews = $ReviewManager->getReviewByOperator($operatorData['id']); ?>
            <div class='reviewsAll' id='reviewsAll<?= $destination->getId(); ?>'>

                <div class='bg-light border border-secondary m-xs-1 m-sm-3 m-md-5 p-1 p-sm-2 p-md-5 rounded text-center'>
                    <div class="reviewSearchTourOperator<?= $operatorData['id'] ?>">
                        <?php foreach ($allReviews as $reviews) : ?>
                            <div class='row text-start'>
                                <div class='col-xs-12 col-sm-4'>
                                    <?= $reviews->getAuthor(); ?>
                                </div>

                                <div class='col-xs-12 col-sm-4'>
                                    <?= $reviews->getMessage(); ?>
                                </div>

                                <div class='col-xs-12 col-sm-4 text-end'>
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

                    <?php include __DIR__ . '/../forms/form-review-searchTourOperator.php'; ?>
                </div>
            </div>

        </div>
    <?php endif; ?>

    <?php
    include __DIR__ . '/../partiels/footer.php';
    include __DIR__ . '/../partiels/footerScript.php';
    ?>