<?php


class TourOperatorManager
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


/*****************************UPDATE************************************************************/
//modifier les tourOperatorPremium 
  public function updateOperatorToPremium($idTourOperator, $is_premium)
  {
    $updateOperatorToPremium = $this->pdo->prepare('UPDATE tour_operators SET  is_premium = :is_premium WHERE id = :id');
    $updateOperatorToPremium->bindValue(':id', $idTourOperator, PDO::PARAM_INT);
    $updateOperatorToPremium->bindValue(':is_premium', $is_premium);
    
    $updateOperatorToPremium->execute();
  }


  public function updateOperatorGrade(TourOperator $operator, $grade)
  {
    $updateOperatorGrade = $this->pdo->prepare('UPDATE  tour_operators SET  grade = :grade WHERE id = :id');
    $updateOperatorGrade->bindValue(':id', $operator->getId(), PDO::PARAM_INT);
    $updateOperatorGrade->bindValue(':grade', $grade);
    
    $updateOperatorGrade->execute();
  }
  public function updateOperatorLink($id, $link)
  {

    $updateOperatorLink = $this->pdo->prepare('UPDATE  tour_operators SET  link = :link WHERE id = :id');
    $updateOperatorLink->bindValue(':id', $id, PDO::PARAM_INT);
    $updateOperatorLink->bindValue(':link', $link);
    
    $updateOperatorLink->execute();
  }
  /*****************************DELETE************************************************************/
  // Delete tour operator, ces destinations et ces review
  public function deleteTourOperator($tourOperator)
  { 
    /******Delete Destination*******/
    $deleteDestination = $this->pdo->prepare('DELETE FROM destinations WHERE id_tour_operator = :id_tour_operator');
    $deleteDestination->bindValue(':id_tour_operator', $tourOperator, PDO::PARAM_INT);
    $deleteDestination->execute();

   /******Delete Review*******/   
    $deleteReview = $this->pdo->prepare('DELETE FROM reviews WHERE id_tour_operator = :id_tour_operator');
    $deleteReview->bindValue(':id_tour_operator', $tourOperator, PDO::PARAM_INT);
    $deleteReview->execute(); 

    /******Delete Tour Operator*******/ 
    $deleteTourOperator = $this->pdo->prepare('DELETE FROM tour_operators WHERE id = :id');
    $deleteTourOperator->bindValue(':id', $tourOperator, PDO::PARAM_INT);
    $deleteTourOperator->execute();
  }

  
  
  /*************************************** GET INFORMATIONS ************************************/ 
  
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
   // select Operator BD
   public function getOneOperator($idOperator)
   {
     
     
     $oneTourOperator = $this->pdo->prepare('SELECT * FROM  tour_operators WHERE id = :id');
     $oneTourOperator->bindValue(':id', $idOperator ,PDO::PARAM_INT);
     $oneTourOperator->execute();
     $donneesTourOperator = $oneTourOperator->fetch(PDO::FETCH_ASSOC);
     return new TourOperator ($donneesTourOperator); 
     
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
  public function getOperatorById($id)
  {
    
    $allOperatorById = $this->pdo->prepare('SELECT * FROM  tour_operators 
    WHERE id = :id');
    $allOperatorById->bindValue(':id', $id ,PDO::PARAM_INT);
    $allOperatorById->execute();
    
    return  $allOperatorById->fetch(PDO::FETCH_ASSOC); 

  }

  public function getListOperatorById($id)
  {
    
    $allOperatorById = $this->pdo->prepare('SELECT * FROM  tour_operators 
    WHERE id = :id');
    $allOperatorById->bindValue(':id', $id ,PDO::PARAM_INT);
    $allOperatorById->execute();
    
    return  $allOperatorById->fetch(PDO::FETCH_ASSOC); 

  }
  public function getListOperatorSearch($search)
  {
    $operatorsBySearch = [];
    $allOperatorSearch = $this->pdo->prepare('SELECT * FROM  tour_operators 
    WHERE name LIKE :search');
    $search="%".$search."%";
    $allOperatorSearch->bindValue(':search', $search ,PDO::PARAM_STR);
    $allOperatorSearch->execute();

    while ($donneesOperatorSearch = $allOperatorSearch->fetch(PDO::FETCH_ASSOC))
    {
      array_push($operatorsBySearch, new TourOperator ($donneesOperatorSearch)); 
  
    }

    return $operatorsBySearch;
    

  }
  
 
}