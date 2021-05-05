<?php


$destinations= $DestinationManager->getOneDestination();
foreach ($destinations as $destination) :?>
    <?php echo $destination->getLocation();?> 
<form action='../operatorByDestination.php' method="post">
<input type='hidden' name='destination' value='<?php echo $destination->getLocation();?> '>
<button type="submit" class="btn btn-primary" name="destinations">See operators</button>
</form>
<?php endforeach; ?>