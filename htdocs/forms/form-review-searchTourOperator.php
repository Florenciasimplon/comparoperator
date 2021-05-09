
<form class="form" method="post">
<div class="row">
<div class="col-xs-12 col-sm-4">

  <label for="pseudo" class="form-label"></label>
  <input type="text" class="form-control m-1" placeholder="Pseudo" id='author<?php echo $operatorData['id']?>' name="author">


<select class="form-select m-1" id='grade_review<?php echo $operatorData['id']?>' name="grade_review">
  <option selected value='null'>Grade</option>
  <option value="1">1 sur 5</option>
  <option value="2">2 sur 5</option>
  <option value="3">3 sur 5</option>
  <option value="4">4 sur 5</option>
  <option value="5">5 sur 5</option>
</select>
</div>
<div class="col-xs-12 col-sm-8 ">
  <label for="exampleFormControlTextarea1" class="form-label">Write a comment</label>
  <textarea class="form-control" rows="2" id='message<?php echo $operatorData['id']?>' name="message"></textarea>
</div>
<div class="col-12 text-end">
<button type="submit" class="btn btn-primary sendFormSearchTourOperator w-25" data-search-to='<?php echo $operatorData['id']?>' name="destinations">Submit</button>
</div>
</div>
</form> 
