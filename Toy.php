<?php 
class Toy extends Product {
    public $color;

	public function setColor($color) {
        $this->color = $color;
    }

    public function getColor() {
        return $this->color;
    }
}

?>