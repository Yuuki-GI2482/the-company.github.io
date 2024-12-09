<?php

class Book{
  #inside class
  # properties
  private $title;
  private $author;
  private $content;
  private $year_published;
  private $page;
  private $price;

  #public/var property
  public $isbn;
  var    $glossary;

  #constructor
  public function __construct($new_title, $new_price)
  {
     $this->title = $new_title;
     $this->price = $new_price;
  }

  #method
  public function showTitle()
  {
     echo "Title: " . $this->title . "<br>";
     $this->totalPAge();
  }
  
   private function totalPage() //public by default
  {
    $x = 15;
    
    if($this->page < 5 || $this->page >1 ){

      $total_page = $x * $this->page;
    }
    
    while(3>1){
      echo "Display";
    }
    
    return $total_page;

  }
   #setter-set the value of a property
   public function setTitle($title)
   {
     $this->title = $title;
   }

   public function setPrice($price)
   {
    $this->price = $price;
   }

    #getter- retrieve the value of the property
    public function getTitle()
    {
     return $this->title;
    }
 
    public function getPrice()
    {
      return $this->price;
    }

}
# outside class

# create an objects
// $math = new Book;
// $physics = new Book;

// # use setter
// $math->setTitle("Geometry");
// $physics->setTitle("Momentum");

// #use getter
// echo "Math Title: " . $math->getTitle() . "<br>";
// echo "Physics Title: " . $physics->getTitle() . "<br>";
// echo "<hr>";

// echo $math->isbn = "P348SDP";   //public property can access it 
// echo $math->author = "Albert"; //private property can't access it

?>

