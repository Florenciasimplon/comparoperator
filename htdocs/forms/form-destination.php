<?php

?>
<div class='bg-light border border-secondary m-5 p-5 rounded text-center'>
  <h5>Create New Destination</h5>
  <form class="form" action="../treatment/create.php" method="post" enctype="multipart/form-data">
    <div class='row align-items-end'>
      <div class="col-lg-4">
        <input type='hidden' name='id_tour_operator' value='1'>
        <label for="text" class="form-label">Destination</label>
        <input type="text" class="form-control" id="destinations" name="location">

      </div>
      <div class="col-lg-4">
        <div class='row align-items-end'>
          <div class="col-lg-8">
            <label for="price" class="form-label">price</label>
            <input type="text" class="form-control" id="price" name="price">
          </div>
          <div class="col-lg-4">
            <img src="https://img.icons8.com/color/40/000000/cheap-2--v3.png">
          </div>
        </div>
      </div>
      <div class='col-lg-4 text-center'>
        <button type="submit" class="btn btn-primary" name="destinations">Submit</button>
      </div>
      <div class="custom-file bg-white border border-secondary rounded w-50 marginCenter mt-2 p-3">
        <h6>Add Image</h6>
        <input type="file" name="photo_link" class="custom-file-input btn-sm" id="fileUpload">
      </div>

    </div>
  </form>
</div>