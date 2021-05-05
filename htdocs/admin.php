<?php
include 'partiels/header.php';

    if (!empty($_GET["error"])) : ?>
        <div style="padding: 10px;background:gray;color:#fff;">
            <?=$_GET["error"]?>
        </div>
    <?php endif;?>

<div class='row align-items-center'>

    <div class="col-md-6">
    <?php include 'forms/form-adminAdd.php';?>
</div>

<div class="col-md-6">
    <?php include 'forms/form-adminUp.php'; ?> 
</div>

</div>
     <?php include 'partiels/footer.php'; ?>

</body>
</html>