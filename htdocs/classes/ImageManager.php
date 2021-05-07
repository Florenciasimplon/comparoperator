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
   $insertPhotoLink->bindValue(':photo_link', $image->getPhoto_Link(),PDO::PARAM_STR);
   $insertPhotoLink->bindValue(':id_destination', $image->getIdDestination(), PDO::PARAM_INT);
   $insertPhotoLink->execute();
   }
     /*****************************DELETE************************************************************/
  public function deleteImage($id)
  { 
     
    $deletePhoto = $this->pdo->prepare('DELETE FROM photos WHERE id = :id');
    $deletePhoto->bindValue(':id', $id, PDO::PARAM_INT);
    $deletePhoto->execute();


  }
     /*****************************UPDATE************************************************************/
  public function updatePhotoLink($idImage, $photo_link)
  {
    $updatePhotoLink = $this->pdo->prepare('UPDATE photos SET photo_link = :photo_link WHERE id = :id');
    $updatePhotoLink->bindValue(':id', $idImage, PDO::PARAM_INT); 
    $updatePhotoLink->bindValue(':photo_link', $photo_link, PDO::PARAM_STR);       
    $updatePhotoLink->execute();
  }


     /*************************************** GET INFORMATIONS ************************************/ 
     // List image by destination // 
  public function getImageByDestination($idDestination)
  {
    $ImageByDestination = [];
    
    $allgetImageByDestination = $this->pdo->prepare('SELECT * FROM  photos
    WHERE id_destination = :id_destination ');
    $allgetImageByDestination->bindValue(':id_destination', $idDestination ,PDO::PARAM_INT);
    $allgetImageByDestination->execute();
    
    while ($donneesImageByDestination = $allgetImageByDestination->fetch(PDO::FETCH_ASSOC))
    {
      array_push($ImageByDestination, new Image ($donneesImageByDestination)); 
  
    }

    return $ImageByDestination;
  }
}