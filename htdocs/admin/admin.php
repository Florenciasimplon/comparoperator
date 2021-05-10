<?php
session_start();

include __DIR__.'/../partiels/header.php';

    if (!empty($_GET["error"])) : ?>
        <div style="padding: 10px;background:gray;color:#fff;">
            <?=$_GET["error"]?>
        </div>
    <?php endif;?>

<div class='row align-items-center'>

<div class="col-12">
    <?php include __DIR__.'/../forms/form-adminUp.php'; ?> 
</div>

</div>
     <?php include __DIR__.'/../partiels/footerScript.php'; ?>

</body>
</html>