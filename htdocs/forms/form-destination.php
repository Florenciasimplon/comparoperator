<?php

?>
<link href="../css/style.css?v=<?php echo time(); ?>"rel="stylesheet">

<form class="form" action="../treatment/create.php" method="post" enctype="multipart/form-data">
  <div class="mb-3">
    <input type='hidden' name='id_tour_operator' value='1'>
    <label for="text" class="form-label">Destination</label>
    <input type="text" class="form-control" id="destinations" name="location">
    <div class="custom-file">
        <input type="file" name="photo_link" class="custom-file-input" id="fileUpload">
    </div>
  </div>
  <div class="mb-3">
    <label for="price" class="form-label">price</label>
    <input type="text" class="form-control" id="price" name="price"><img src="https://img.icons8.com/color/40/000000/cheap-2--v3.png">
  </div>
  <button type="submit" class="btn btn-primary" name="destinations">Submit</button>
</form>