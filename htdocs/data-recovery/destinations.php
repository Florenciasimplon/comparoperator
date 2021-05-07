<?php


$destinations= $DestinationManager->getOneDestination();?>
<h6 class="DEST">Nos destinations</h6>
<div class="containe-carousel">
    <div class="wrapper">
        <div class="carousel owl-carousel">
            <?php
            foreach ($destinations as $destination) :?>
                <div class="card">
                    <div class="text-zone">
                        <h4><?=ucfirst($destination->getLocation())?></h4>
                         <form action='../operatorByDestination.php' method="post">
                            <input type='hidden' name='destination' value='<?php echo $destination->getLocation();?> '>
                            <button type="submit" class="btn  cardbtn" name="destinations">See operators</button>
                        </form>
                        </div>
                </div>
                 
            <?php endforeach; ?>
            
        </div>
    </div>
</div>