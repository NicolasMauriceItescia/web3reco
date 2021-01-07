<?php 
class Cart {
    protected $cartShopping = array(); // CartShopping

    //constructor
    public function __construct(){
        $this ->cartShopping = array();
    }

    // getter
    public function getCartShopping(){
        return $this -> CartShopping;
    }

    //methode boolean
    public function isEmpty(){
        return (empty($this ->cartShopping));
    }

    public function displayCartShopping($cart){
        //foreach($this->cartShopping as ...)
    }

    public function totalAmount(){

    }

}
?>