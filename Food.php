<?php 
class Food extends Product {
    public $weight;

	public function setWeight($weight) {
        $this->weight = $weight;
    }

    // public function getWeight() {
    //     if( is_null($this->weight) || is_nan($this->weight) ) {
    //         throw new Exception("peso ha valore non numerico");
    //     }
    
    //     if($this->weight < 0) {
    //         throw new RangeException("peso negativo");
    //     } else if($this->weight==0) {
    //         throw new RangeException("peso zero");
    //     }
    //     return $this->weight;
    // }

    public function getWeight() {
            if( !$this->weight ) {
                throw new Exception("nessun peso disponibile nel database");
            } else if($this->weight>100) {
                    throw new RangeException("peso troppo alto");
            }

            return $this->weight;
        }

}

?>