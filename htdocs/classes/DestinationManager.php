<?php


class DestinationManager
{
 private $pdo;

 public function __construct(PDO $pdo)
 {
   $this->setPdo($pdo);
 }
 public function getPdo(){
    return $this->pdo; 
}
public function setPdo($pdo){
    $this->pdo = $pdo; 
}
/*******************************CREATE*********************************************************/
//creation destination 
public function createDestination(Destination $destination)
 { 
   $insertDestination = $this->pdo->prepare('INSERT INTO destinations(location, price, id_tour_operator) 
  VALUES(:location, :price, :id_tour_operator)');
   $insertDestination->bindValue(':location', $destination->getLocation(),PDO::PARAM_STR);
   $insertDestination->bindValue(':price', $destination->getPrice(), PDO::PARAM_INT);
   $insertDestination->bindValue(':id_tour_operator', $destination->getId_tour_operator(), PDO::PARAM_INT);
   $insertDestination->execute();
   $destination->hydrate([
     'id'=> $this->pdo->lastInsertId()
   ]);
   
 }

/*****************************UPDATE************************************************************/

//modifier prix destination
  public function updatePriceDestination(Destination $destination, $price)
  {
    $updatePriceDestination = $this->pdo->prepare('UPDATE destinations SET  price = :price WHERE id = :id');
    $updatePriceDestination->bindValue(':id', $destination->getId(), PDO::PARAM_INT);
    $updatePriceDestination->bindValue(':price', $price);
    
    $updatePriceDestination->execute();
  }


  /*****************************DELETE************************************************************/

  //delete Destination
  public function deleteDestination(Destination $destination)
  {
    $deleteDestination = $this->pdo->prepare('DELETE FROM destinations WHERE id = :id');
    $deleteDestination->bindValue(':id', $destination->getId(), PDO::PARAM_INT);
    $deleteDestination->execute();
  }
  
  
  /*************************************** GET INFORMATIONS ************************************/ 
  
  // List all Destination // 
  public function getAllDestination()
  {
    $destinations = [];
    
    $allDestinations = $this->pdo->prepare('SELECT * FROM  destinations');
    $allDestinations->execute();
    
    while ($donneesDestination = $allDestinations->fetch(PDO::FETCH_ASSOC))
    {
      array_push($destinations, new Destination ($donneesDestination)); 
  
    }
    
    return $destinations;
  }
 
  public function getAllNameDestination()
  {
    $destinationsName = [];
    
    $allNameDestinations = $this->pdo->prepare('SELECT DISTINCT location FROM  destinations');
    $allNameDestinations->execute();
    
    while ($donneesDestinationName = $allNameDestinations->fetch(PDO::FETCH_ASSOC))
    {
      array_push($destinationsName, new Destination ($donneesDestinationName)); 
  
    }
    
    return $destinationsName;
  }
}