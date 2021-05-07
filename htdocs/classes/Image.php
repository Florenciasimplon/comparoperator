<?php

class Image {

    private int $id; 
    private $photo_link; 
    private string $id_destination; 

    
    public function __construct(array $data)
    {
      $this->hydrate($data);
    }
   
    public function hydrate(array $data)
    {
        foreach ($data as $key => $value)
        {
          $method = 'set'.ucfirst($key);
          
          if (method_exists($this, $method))
          {
            $this->$method($value);
          }
        }
      }
     /* GET */
     public function getId(){
         return $this->id;
     }  
     public function getPhoto_Link(){
         return $this->photo_link;
     }
     public function getIdDestination(){
         return $this->id_destination;
     }
     /* SET*/
     public function setId($id){
         $this->id = $id;
     }
     public function setPhoto_link($photo_link){
         $this->photo_link = $photo_link;
     }
     public function setId_destination($id_destination){
         $this->id_destination = $id_destination;
     }
    }     