<div class='bg-light border border-secondary m-5 p-5 rounded text-center'>
<form class="form" method="post">
<div class="row">
<div class="col-4 mb-3">
  <label for="pseudo" class="form-label"></label>
  <input type="text" class="form-control" placeholder="Pseudo" id='author<?php echo $operatorByDestination->getId()?>' name="author">

<select class="form-select form-select-lg mb-3" aria-label="form-select-lg example" id='grade_review<?php echo $operatorByDestination->getId()?>' name="grade_review">
  <option selected value='null'>Grade</option>
  <option value="1">1 sur 5</option>
  <option value="2">2 sur 5</option>
  <option value="3">3 sur 5</option>
  <option value="4">4 sur 5</option>
  <option value="5">5 sur 5</option>
</select>

</div>

<div class="col-8 mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Write a comment</label>
  <textarea class="form-control" rows="3" id='message<?php echo $operatorByDestination->getId()?>' name="message"></textarea>
</div>

<button type="submit" class="btn btn-primary sendForm" data-id-to='<?php echo $operatorByDestination->getId()?>' name="destinations">Submit</button>
</div>
</form> 
</div>
