<?php

class Destination {

    private int $id; 
    private string $location; 
    private int $price;
    private $id_tour_operator;
     


    
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
    public function getLocation(){
        return $this->location;
    }
    public function getPrice(){
        return $this->price;
    }
    public function getId_tour_operator(){
        return $this->id_tour_operator;
    }
   
/* SET*/

    public function setId($id){
        $this->id=$id; 
    }
    public function setLocation($location){
        $this->location=$location; 
    }
    public function setPrice($price){
        $this->price=$price; 
    }
    public function setId_tour_operator($id_tour_operator){
        $this->id_tour_operator=$id_tour_operator; 
    }
    

/*METHODE */

}