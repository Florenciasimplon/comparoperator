<?php
class ImageManager
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

  public function createPhotoLink(Image $image)
 { 
   $insertPhotoLink = $this->pdo->prepare('INSERT INTO photos(photo_link,id_destination) 
  VALUES(:photo_link, :id_destination)');
   $insertPhotoLink->bindValue(':photo_link', $image->getPhotoLink(),PDO::PARAM_STR);
   $insertPhotoLink->bindValue(':id_destination', $image->getIdDestination(), PDO::PARAM_INT);
   $insertPhotoLink->execute();
   }
     /*****************************DELETE************************************************************/
  public function deleteImage(Image $photo_link)
  { 
     /******Delete Destination*******/
       $deletePhotoLInk = $this->pdo->prepare('DELETE FROM photos WHERE id_destination = :id_destination');
       $deletePhotoLInk->bindValue(':id_destination', $photo_link->getId(), PDO::PARAM_INT);
       $deletePhotoLInk->execute();


  }
     /*****************************UPDATE************************************************************/
     public function updatePhotoLink(Image $photo_link)
     {
       $updatePhotoLink = $this->pdo->prepare('UPDATE photos SET photo_link WHERE id = :id');
       $updatePhotoLink->bindValue(':id', $photo_link->getId(), PDO::PARAM_INT);       
       $updatePhotoLink->execute();
     }


     /*************************************** GET INFORMATIONS ************************************/ 
     // List image by destination // 
  public function getImageByDestination($idDestination)
  {
    $ImageByDestination = [];
    
    $allgetImageByDestination = $this->pdo->prepare('SELECT photos* FROM  photos
    JOIN destinations ON photos.id_destination = destinations.id WHERE id = :id');
    $allgetImageByDestination->bindValue(':id', $idDestination ,PDO::PARAM_INT);
    $allgetImageByDestination->execute();
    
    while ($donneesImageByDestination = $allgetImageByDestination->fetch(PDO::FETCH_ASSOC))
    {
      array_push($ImageByDestination, new Image ($donneesImageByDestination)); 
  
    }

    return $ImageByDestination;
  }
}