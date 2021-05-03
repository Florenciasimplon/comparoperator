<?php


class Manager
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
   
   
 }
//creation Tour Operator 
public function createTourOperator(TourOperator $tourOperator)
{ 
  $insertTourOperator = $this->pdo->prepare('INSERT INTO tour_operators(name, grade, link, is_premium) 
 VALUES(:name, :grade, :link, :is_premium)');
  $insertTourOperator->bindValue(':name', $tourOperator->getName(), PDO::PARAM_STR);
  $insertTourOperator->bindValue(':grade', $tourOperator->getGrade(), PDO::PARAM_STR);
  $insertTourOperator->bindValue(':link', $tourOperator->getLink(), PDO::PARAM_STR);
  $insertTourOperator->bindValue(':is_premium', $tourOperator->getIs_premium(),PDO::PARAM_BOOL);
  $insertTourOperator->execute();
  
  
}
public function createReview(Review $review)
{ 
  $insertReview = $this->pdo->prepare('INSERT INTO reviews(message, author, id_tour_operator) 
 VALUES(:message, :author, :id_tour_operator)');
  $insertReview->bindValue(':message', $review->getMessage(), PDO::PARAM_STR);
  $insertReview->bindValue(':author', $review->getAuthor(), PDO::PARAM_STR);
  $insertReview->bindValue(':id_tour_operator', $review->getId_tour_operator(), PDO::PARAM_INT);
  $insertReview->execute();
  
}

/*****************************UPDATE************************************************************/
//modifier les tourOperatorPremium 
  public function updateOperatorToPremium(TourOperator $tourOperator, $is_premium)
  {
    $updateOperatorToPremium = $this->pdo->prepare('UPDATE tour_operators SET  is_premium = :is_premium WHERE id = :id');
    $updateOperatorToPremium->bindValue(':id', $tourOperator->getId(), PDO::PARAM_INT);
    $updateOperatorToPremium->bindValue(':is_premium', $is_premium);
    
    $updateOperatorToPremium->execute();
  }

//modifier prix destination
  public function updatePriceDestination(Destination $destination, $price)
  {
    $updatePriceDestination = $this->pdo->prepare('UPDATE destinations SET  price = :price WHERE id = :id');
    $updatePriceDestination->bindValue(':id', $destination->getId(), PDO::PARAM_INT);
    $updatePriceDestination->bindValue(':price', $price);
    
    $updatePriceDestination->execute();
  }

  //modifier review message
  public function updateReviewMessage(Review $review, $message)
  {
    $updatePriceDestination = $this->pdo->prepare('UPDATE reviews SET  message = :message WHERE id = :id');
    $updatePriceDestination->bindValue(':id', $review->getId(), PDO::PARAM_INT);
    $updatePriceDestination->bindValue(':message', $message);
    
    $updatePriceDestination->execute();
  }

  /*****************************DELETE************************************************************/
  // Delete tour operator, ces destinations et ces review
  public function deleteTourOperator(TourOperator $tourOperator)
  { 
    /******Delete Destination*******/
    $deleteDestination = $this->pdo->prepare('DELETE FROM destinations WHERE id_tour_operator = :id_tour_operator');
    $deleteDestination->bindValue(':id_tour_operator', $tourOperator->getId(), PDO::PARAM_INT);
    $deleteDestination->execute();

   /******Delete Review*******/   
    $deleteReview = $this->pdo->prepare('DELETE FROM reviews WHERE id_tour_operator = :id_tour_operator');
    $deleteReview->bindValue(':id_tour_operator', $tourOperator->getId(), PDO::PARAM_INT);
    $deleteReview->execute(); 

    /******Delete Tour Operator*******/ 
    $deleteTourOperator = $this->pdo->prepare('DELETE FROM tour_operators WHERE id = :id');
    $deleteTourOperator->bindValue(':id', $tourOperator->getId(), PDO::PARAM_INT);
    $deleteTourOperator->execute();
  }

  //delete Destination
  public function deleteDestination(Destination $destination)
  {
    $deleteDestination = $this->pdo->prepare('DELETE FROM destinations WHERE id = :id');
    $deleteDestination->bindValue(':id', $destination->getId(), PDO::PARAM_INT);
    $deleteDestination->execute();
  }
  
  //delete Review
  public function deleteReview(Review $review)
  {
    $deleteReview = $this->pdo->prepare('DELETE FROM reviews WHERE id = :id');
    $deleteReview->bindValue(':id', $review->getId(), PDO::PARAM_INT);
    $deleteReview->execute();
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
   // List all Operator // 
   public function getAllOperator()
   {
     $operators = [];
     
     $allTourOperator = $this->pdo->prepare('SELECT * FROM  tour_operators');
     $allTourOperator->execute();
     
     while ($donneesTourOperator = $allTourOperator->fetch(PDO::FETCH_ASSOC))
     {
       array_push ($operators, new TourOperator ($donneesTourOperator)); 
     }
     return $operators;
   }

  // List operator by destination // 
  public function getOperatorByDestination($location)
  {
    $operatorsByDestination = [];
    
    $allOperatorByDestination = $this->pdo->prepare('SELECT tour_operators.* FROM  tour_operators 
    JOIN destinations ON tour_operators.id = destinations.id_tour_operator WHERE location = :location');
    $allOperatorByDestination->bindValue(':location', $location ,PDO::PARAM_STR);
    $allOperatorByDestination->execute();
    
    while ($donneesOperatorByDestination = $allOperatorByDestination->fetch(PDO::FETCH_ASSOC))
    {
      array_push($operatorsByDestination, new TourOperator ($donneesOperatorByDestination)); 
  
    }

    return $operatorsByDestination;
  }
  
 // List review by operator // 
 public function getReviewByOperator($idTourOperator)
 {
   $reviewByOperator = [];
   
   $allReviewByOperator = $this->pdo->prepare('SELECT * FROM  reviews 
   JOIN tour_operators ON reviews.id_tour_operator = tour_operators.id WHERE reviews.id_tour_operator= :idTourOperator');
   $allReviewByOperator->bindValue(':idTourOperator', $idTourOperator ,PDO::PARAM_INT);
   $allReviewByOperator->execute();
   
   while ($donneesReviewByOperator = $allReviewByOperator->fetch(PDO::FETCH_ASSOC))
   {
     
     array_push($reviewByOperator, new Review ($donneesReviewByOperator)); 
 
   }
   
    return $reviewByOperator;
 }
 
}