<?php 
class Cart {
    protected $cartId = array();
    protected $cartShopping = array();

    //constructor
    public function __construct(){
        $this ->cartShopping = array();
        $this ->cartId = array();
    }

    // getter
    public function getCartId(){
        return $this -> cartId;
    }
    public function getCartShopping(){
        return $this -> CartShopping
    }

    //methode boolean
    public function isEmpty(){
        return (empty($this ->cartShopping));
    }

    public function displayCartShopping($cart){
        
    }

}
?>