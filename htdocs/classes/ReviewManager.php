<?php


class ReviewManager
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
//creation review 

public function createReview(Review $review)
{ 
  $insertReview = $this->pdo->prepare('INSERT INTO reviews(message, author, id_tour_operator, grade_review) 
 VALUES(:message, :author, :id_tour_operator, :grade_review)');
  $insertReview->bindValue(':message', $review->getMessage(), PDO::PARAM_STR);
  $insertReview->bindValue(':author', $review->getAuthor(), PDO::PARAM_STR);
  $insertReview->bindValue(':id_tour_operator', $review->getId_tour_operator(), PDO::PARAM_INT);
  $insertReview->bindValue(':grade_review', $review->getGrade_review(), PDO::PARAM_INT);
  $insertReview->execute();
  
}

/*****************************UPDATE************************************************************/

  //modifier review message
  public function updateReviewMessage(Review $review, $message)
  {
    $updatePriceDestination = $this->pdo->prepare('UPDATE reviews SET  message = :message WHERE id = :id');
    $updatePriceDestination->bindValue(':id', $review->getId(), PDO::PARAM_INT);
    $updatePriceDestination->bindValue(':message', $message);
    
    $updatePriceDestination->execute();
  }
  public function updateReviewGrade(Review $review, $grade)
  {
    $updatePriceDestination = $this->pdo->prepare('UPDATE reviews SET  grade_review = :grade_review WHERE id = :id');
    $updatePriceDestination->bindValue(':id', $review->getId(), PDO::PARAM_INT);
    $updatePriceDestination->bindValue(':grade_review', $grade);
    
    $updatePriceDestination->execute();
  }

  /*****************************DELETE************************************************************/  
  //delete Review
  public function deleteReview(Review $review)
  {
    $deleteReview = $this->pdo->prepare('DELETE FROM reviews WHERE id = :id');
    $deleteReview->bindValue(':id', $review->getId(), PDO::PARAM_INT);
    $deleteReview->execute();
  }
  
  /*************************************** GET INFORMATIONS ************************************/ 
  
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
 public function getGradeByOperator($idTourOperator)
 {
   $gradeByOperator = [];
   
   $allGradeByOperator = $this->pdo->prepare('SELECT grade_review FROM  reviews WHERE reviews.id_tour_operator= :idTourOperator');
   $allGradeByOperator->bindValue(':idTourOperator', $idTourOperator ,PDO::PARAM_INT);
   $allGradeByOperator->execute();
   
   while ($donneesReviewByOperator = $allGradeByOperator->fetch(PDO::FETCH_ASSOC))
   {
     
     array_push($gradeByOperator, new Review ($donneesReviewByOperator)); 
 
   }
    
    $moyenGrade= $this->getMoyenGrade($idTourOperator);
    
    return $moyenGrade;
 }

 public function getCountGrade($allGradeByOperator)
 {
   $countGrade = count($allGradeByOperator);  
    return $countGrade;
 }

 public function getMoyenGrade($idTourOperator)
 {

    $MoyenneGradeStatement = $this->pdo->prepare('SELECT AVG(grade_review) AS grade_moyenne FROM reviews WHERE id_tour_operator = :idTourOperator');
    $MoyenneGradeStatement->bindValue(':idTourOperator', $idTourOperator ,PDO::PARAM_INT);
    $MoyenneGradeStatement->execute();

    $moyenne = $MoyenneGradeStatement->fetch(PDO::FETCH_ASSOC);
  
    return $moyenne;
 }

 
}