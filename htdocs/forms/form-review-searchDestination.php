<form class="form" method="post">
<div class="mb-3">

  <label for="pseudo" class="form-label"></label>
  <input type="text" class="form-control" placeholder="Pseudo" id='author<?php echo $operatorDestinationSearch->getId()?>' name="author">
</div>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Write a comment</label>
  <textarea class="form-control" rows="3" id='message<?php echo $operatorDestinationSearch->getId()?>' name="message"></textarea>
</div>
<select class="form-select form-select-lg mb-3" aria-label="form-select-lg example" id='grade_review<?php echo $operatorDestinationSearch->getId()?>' name="grade_review">
  <option selected value='null'><i class='far fa-star'></i></option>
  <option value="1">⭐</option>
  <option value="2">⭐⭐</option>
  <option value="3">⭐⭐⭐</option>
  <option value="4">⭐⭐⭐⭐</option>
  <option value="5">⭐⭐⭐⭐⭐</option>
</select>
<button type="submit" class="btn btn-primary sendFormSearchDestination" data-id-to='<?php echo $operatorDestinationSearch->getId()?>' name="destinations">Submit</button>
</form> 