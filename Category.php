<?php 
class Category {
    public $name;
    public $icon;

    public function __construct($name, $icon) {
        $this->name = $name;
        $this->icon = $icon;
    }

    // public function setPrice($price){
    //     $this->price = $price;
    // }

    // public function getPrice(){
    //     return $this->price;
    // }

    // public function setStars($stars){
    //     $this->price = $stars;
    // }

    // public function getStars(){
    //     return $this->stars;
    // }

}

?>