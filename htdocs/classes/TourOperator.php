<?php

class TourOperator {

    private int $id; 
    private string $name; 
    private $grade; 
    private string $link;
    private bool $is_premium;
     


    
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
    public function getName(){
        return $this->Name;
    }
    public function getGrade(){
        return $this->grade;
    }
    public function getLink(){
        return $this->link;
    }
    public function getIs_premium(){
        return $this->is_premium;
    }
   
/* SET*/

    public function setId($id){
        $this->id=$id; 
    }
    public function setName($name){
        $this->name=$name; 
    }
    public function setGrade($grade){
        $this->grade=$grade; 
    }
    public function setLink($link){
        $this->link=$link; 
    }
    public function setIs_premium($is_premium){
        $this->is_premium=$is_premium; 
    }
    

/*METHODE */

}