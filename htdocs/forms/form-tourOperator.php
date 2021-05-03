<form class="form" action="../treatment/create-destination.php" method="post">
<div class="mb-3">
  <label for="pseudo" class="form-label"></label>
  <input type="text" class="form-control" id="name" placeholder="Name" name="name">
</div>
<div class="mb-3">
    <label for="link" class="form-label">Link</label>
    <input type="text" class="form-control" id="link" name="link" placeholder="enter your website exemple : www.ComparOperator.com">
  </div>
  <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="is_premium">
  <option selected>Premium member</option>
  <option value="1">Yes</option>
  <option value="0">No</option>
</select>
<button type="submit" class="btn btn-primary" name="destinations">Submit</button>
</form>