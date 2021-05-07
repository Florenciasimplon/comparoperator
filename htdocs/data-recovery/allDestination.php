<?php


$allDestination = $DestinationManager->getAllDestination();

foreach ($allDestination as $destination) : ?>
  <div class='bg-light border border-secondary m-5 rounded'>
    <div class="container pt-5 text-center">
      <div class="row">
        <div class="col-lg-4">
          <h6>Location</h6>
          <?php echo $destination->getLocation(); ?>
        </div>
        <div class="col-lg-4">
          <h6>Price</h6>
          <?php echo $destination->getPrice(); ?>
        </div>
        <div class=" col-lg-4 text-center">
          <button type="submit" class="btn btn-primary buttonAccesUpdateDestination mb-1 btn-sm" name="destinations" id='<?php echo $destination->getId(); ?>'>Update Destination</button>
          <div class=''>
            <form action='../treatment/delete.php' method="post">
              <input type='hidden' name='idDestination' value='<?php echo $destination->getId(); ?> '>
              <button type="submit" class="btn btn-danger btn-sm mb-4" name="destinations">Delete Destination</button>
            </form>
          </div>
        </div>
      </div>
      
        <div class="row">
        <?php
      $allImages = $ImageManager->getImageByDestination($destination->getId());
      foreach ($allImages as $imagen) : ?>
          <div class="col-lg-3 m-2">
            <img src="<?php echo $imagen->getPhoto_Link(); ?>" alt="" srcset="" class="imageModification">
            <form action='../treatment/delete.php' method="post">
              <input type='hidden' name='idImagen' value='<?php echo $imagen->getId(); ?> '>
              <button type="submit" class="btn btn-danger" name="destinations">Delete Photo</button>
            </form>
          </div>
        <?php endforeach; ?>
        </div>
        <div class='accesUpdatePrice' id='accesUpdatePrice<?=$destination->getId()?>'>
          <form action='../treatment/update.php' method="post" >
            <input type='hidden' name='idDestination' value='<?php echo $destination->getId(); ?> '>
            <input type='text' name='price'>
            <button type="submit" class="btn btn-primary" name="destinations">Update Price</button>
          </form>
        </div>
        <button type="submit" class="btn btn-primary buttonAccesAddPhoto m-1 btn-sm" id="<?=$destination->getId()?>" name="destinations">Add Photo</button>
        <div class='m-3 accesAddPhoto' id="accesAddPhoto<?=$destination->getId()?>">
          <form class="form" action="../treatment/create.php" method="post" enctype="multipart/form-data">
            <input type='hidden' name='idDestination' value='<?php echo $destination->getId(); ?>'>
            <div class="custom-file">
              <input type="file" name="photo_link" class="custom-file-input btn-sm" id="fileUpload">
              <button type="submit" class="btn btn-primary" name="destinations">Submit</button>
            </div>
          </form>
        </div>
    </div>
  </div>
<?php endforeach; ?>