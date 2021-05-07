
<form class="form" method="post">
<div class="mb-3">

  <label for="pseudo" class="form-label"></label>
  <input type="text" class="form-control" placeholder="Pseudo" id='author<?php echo $operatorByDestination->getId()?>' name="author">
</div>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Write a comment</label>
  <textarea class="form-control" rows="3" id='message<?php echo $operatorByDestination->getId()?>' name="message"></textarea>
</div>
<select class="form-select form-select-lg mb-3" aria-label="form-select-lg example" id='grade_review<?php echo $operatorByDestination->getId()?>' name="grade_review">
  <option selected value='null'>Grade</option>
  <option value="1">1 sur 5</option>
  <option value="2">2 sur 5</option>
  <option value="3">3 sur 5</option>
  <option value="4">4 sur 5</option>
  <option value="5">5 sur 5</option>
</select>
<button type="submit" class="btn btn-primary sendForm" data-id-to='<?php echo $operatorByDestination->getId()?>' name="destinations">Submit</button>
</form> 
