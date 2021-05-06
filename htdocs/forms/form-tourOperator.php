<div class='bg-light border border-secondary m-5 p-5 rounded text-center'>
  <h5>Create New Destination</h5>
  <form class="form" action="../treatment/create.php" method="post">
    <div class='row '>
      <div class="col-lg-3">
        <label for="pseudo" class="form-label"></label>
        <input type="text" class="form-control" id="name" placeholder="Name" name="name">
      </div>
      <div class="col-lg-5">
        <label for="link" class="form-label">Link</label>
        <input type="text" class="form-control" id="link" name="link" placeholder="enter your website exemple : www.ComparOperator.com">
      </div>
      <div class="col-lg-3">
        <p>Premium member</p>
        <div class='row'>
          <div class="form-check col-lg-6">
            <input class="form-check-input" type="radio" name="is_premium" value="1" checked>
            <label class="form-check-label" for="is_premium">
              Yes
            </label>
          </div>
          <div class="form-check col-lg-6">
            <input class="form-check-input" type="radio" name="is_premium" value="0">
            <label class="form-check-label" for="is_premium">
              No
            </label>
          </div>
        </div>
      </div>
      <div class="col-lg-1">
        <button type="submit" class="btn btn-primary" name="destinations">Submit</button>
      </div>
    </div>
  </form>
</div>