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
    if (isset($_POST['destination'])) :
        $allOperators = $OperatorManager->getPeersDestinationOperator($_POST['destination']); ?>
        <h1 class='card'><?= $_POST['destination']; ?></h1>

        <?php
        foreach ($allOperators as $peers) {

            $imageDestination = $ImageManager->getImageByDestination($peers['destination']->getId()); ?>
            <div class='border border-secondary m-xs-1 m-sm-3 m-md-5 p-1 rounded text-center card'>

                <div class="row align-items-center">
                    <div class="col-xs-12 col-md-4">
                        <div class="carousel2 owl-carousel">
                            <?php foreach ($imageDestination as $image) : ?>
                                <img class='round mt-1 mb-1' src="<?= $image->getPhoto_Link() ?>" alt="" srcset="">
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-1"></div>
                    <div class="col-xs-12 col-md-7 p-2">
                        <div class="row">
                            <div class="col-12">
                                <h1><?= $peers['operator']->getName(); ?></h1>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-6">
                                <h6><?= $peers['destination']->getPrice(); ?> 💲 </h6>

                            </div>
                            <div class="col-6">
                                <?php if ($peers['operator']->getIs_premium() === false) {
                                    echo '<img src="https://img.icons8.com/ios/25/000000/fairytale.png" alt="" srcset="">';
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
                                    <button class='btn btn-outline-secondary'>See more</button>
                                    <input type="hidden" name="id_tour_operator" value='<?= $peers['operator']->getId() ?>'>
                                </form>
                            </div>

                            <div class="col-7">
                                <?php if ($peers['operator']->getGrade() < 1) {
                                    echo "<i class='far fa-star'></i>
                                    <i class='far fa-star'></i>
                                    <i class='far fa-star'></i>
                                    <i class='far fa-star'></i>
                                    <i class='far fa-star'></i>";
                                } elseif ($peers['operator']->getGrade() < 2) {
                                    echo "  <i class='fa fa-star text-warning' ></i>
                                        <i class='far fa-star'></i>
                                        <i class='far fa-star'></i>
                                        <i class='far fa-star'></i>
                                        <i class='far fa-star'></i>";
                                } elseif ($peers['operator']->getGrade() < 3) {
                                    echo "  <i class='fa fa-star text-warning' ></i>
                                        <i class='fa fa-star text-warning' ></i>
                                        <i class='far fa-star'></i>
                                        <i class='far fa-star'></i>
                                        <i class='far fa-star'></i>";
                                } elseif ($peers['operator']->getGrade() < 4) {
                                    echo "  <i class='fa fa-star text-warning' ></i>
                                        <i class='fa fa-star text-warning' ></i>
                                        <i class='fa fa-star text-warning' ></i>
                                        <i class='far fa-star'></i>
                                        <i class='far fa-star'></i>";
                                } elseif ($peers['operator']->getGrade() < 5) {
                                    echo "  <i class='fa fa-star text-warning' ></i>
                                        <i class='fa fa-star text-warning' ></i>
                                        <i class='fa fa-star text-warning' ></i>
                                        <i class='fa fa-star text-warning' ></i>
                                        <i class='far fa-star'></i>";
                                } elseif ($peers['operator']->getGrade() < 6) {
                                    echo "  <i class='fa fa-star text-warning' ></i>
                                        <i class='fa fa-star text-warning' ></i>
                                        <i class='fa fa-star text-warning' ></i>
                                        <i class='fa fa-star text-warning' ></i>
                                        <i class='fa fa-star text-warning' ></i>";
                                }
                                echo $peers['operator']->getGrade();
                                ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>


    <?php endif; ?>


    <?php
    include __DIR__ . '/../partiels/footer.php';
    include __DIR__ . '/../partiels/footerScript.php';
    ?>