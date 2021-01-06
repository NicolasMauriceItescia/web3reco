<?php 
class Item{
    $idProduct;
    $nameProduct;
    $description;
    $fairtrade;
    $typeId;
    $price;
    $stock;
    $discount;

    //constructor
    public function __construct($id,$name,$descript,$fairtrade,$typeId,$price,$stock,$discount){
        $this->idProduct = $id;
        $this->nameProduct = $name;
        $this->description = $descript;
        $this->fairtrade = $fairtrade;
        $this->typeId = $typeId;
        $this->price = $price;
        $this->stock = $stock;
        $this->discount = $discount;
    }

}
?>