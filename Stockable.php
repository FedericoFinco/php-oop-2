<?php 

trait Stockable {
	private $stock;

	public function getStock() {
		return $this->stock;
	}

	public function setStock($stock, $time = "week") {
		$this->stock = "$stock" . " this " . "$time";
	}
}

?>