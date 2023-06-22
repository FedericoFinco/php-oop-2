<?php 
class Product {
    public $name;
    protected $price;
    protected $stars;
    public $starsArray = [];
    public $reviews;
    public $deliveryType;
    public $categories;
    public $img = "https://media.istockphoto.com/id/1147544807/vector/thumbnail-image-vector-graphic.jpg?s=612x612&w=0&k=20&c=rnCKVbdxqkjlcs3xH87-9gocETqpspHFXu5dIGB4wuM=";

    public function __construct(array $categories, $name, $price, $stars = 0, $reviews = 0, $deliveryType = "standard") {
        $this->categories = $categories;
        $this->name = $name;
        $this->price = $price;
        $this->stars = $stars;
        $this->reviews = $reviews;
        $this->deliveryType = $deliveryType;
    }

    public function setPrice($price){
        $this->price = $price;
    }

    public function getPrice(){
        return $this->price;
    }

    public function setStars($stars){
        // $stars = $_GET["stars"];
        array_push($this->starsArray, $stars);
        $this->stars =intval( array_sum($this->starsArray) / count($this->starsArray));
    }

    public function getStars(){
        return $this->stars;
    }


    public function setImg($img) {
        $this->img = $img;
    }

    public function getCathegoryAsString() {

		$categoriesArray = [];

		foreach($this->categories as $category) {
			array_push($categoriesArray, $category->name);
		}

		return implode(", ", $categoriesArray);

	}

    public function getCathegoryIconAsString() {

		$categoriesIconArray = [];

		foreach($this->categories as $category) {
			array_push($categoriesIconArray, $category->icon);
		}

		return implode(" ", $categoriesIconArray);

	}
}

?>