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
  public function updatePriceDestination($idDestination, $price)
  {
    $updatePriceDestination = $this->pdo->prepare('UPDATE destinations SET  price = :price WHERE id = :id');
    $updatePriceDestination->bindValue(':id', $idDestination, PDO::PARAM_INT);
    $updatePriceDestination->bindValue(':price', $price);
    
    $updatePriceDestination->execute();
  }


  /*****************************DELETE************************************************************/

  //delete Destination
  public function deleteDestination($destination)
  { 
    $deletePhoto = $this->pdo->prepare('DELETE FROM photos WHERE id_destination = :id_destination');
    $deletePhoto->bindValue(':id_destination', $destination, PDO::PARAM_INT);
    $deletePhoto->execute();

    $deleteDestination = $this->pdo->prepare('DELETE FROM destinations WHERE id = :id');
    $deleteDestination->bindValue(':id', $destination, PDO::PARAM_INT);
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
  public function getOneDestination()
  {
    $destinations = [];
    
    $allDestinations = $this->pdo->prepare('SELECT DISTINCT location FROM  destinations');
    $allDestinations->execute();
    
    while ($donneesDestination = $allDestinations->fetch(PDO::FETCH_ASSOC))
    {
      array_push($destinations, new Destination ($donneesDestination)); 
  
    }
    
    return $destinations;
  }
  public function getListDestinationSearch($search)
  {
    $destinationsBySearch = [];
    $allDestinationsSearch = $this->pdo->prepare('SELECT * FROM  destinations 
    WHERE location LIKE :search');
    $search="%".$search."%";
    $allDestinationsSearch->bindValue(':search', $search ,PDO::PARAM_STR);
    $allDestinationsSearch->execute();

    while ($donneesDestinationSearch = $allDestinationsSearch->fetch(PDO::FETCH_ASSOC))
    {
      array_push($destinationsBySearch, new Destination ($donneesDestinationSearch)); 
  
    }

    return $destinationsBySearch;
    

  }
  public function getListDestinationByIdTO($id)
  {
    $destinationsByIdTO = [];
    $allDestinationsByIdTO = $this->pdo->prepare('SELECT * FROM  destinations 
    WHERE id_tour_operator = :id_tour_opererator');
    $allDestinationsByIdTO->bindValue(':id_tour_opererator', $id ,PDO::PARAM_INT);
    $allDestinationsByIdTO->execute();

    while ($donneesDestinationByIdTO = $allDestinationsByIdTO->fetch(PDO::FETCH_ASSOC))
    {
      array_push($destinationsByIdTO, new Destination ($donneesDestinationByIdTO)); 
  
    }

    return $destinationsByIdTO;
    

  }
  
}