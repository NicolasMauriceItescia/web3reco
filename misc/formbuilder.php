<?php
class formBuilder{

    public function __construct() {
        
    }

    //$BooksTable is a list of options with the couple Book ID and Book Name
    public function selectBook($booksTable){
        $output = "";
        $output .= "<form action='' method='GET'>";
        $output .= "<label for='books'>Product to edit</label><select name='books'>";
        $output .= "echo $booksTable";
        $output .= "</select><br>";
        $output .=  "<button type='submit'>Valider</button>";
        $output .=  "</form>";

       return $output;
    }

    public function getBooksByName($method='GET'){
        //Method: GET
        //1 textfield, submit
        $output = "";
        $output .= "<form action='' method='".$method."'>";
        $output .= "<input type='text' id='' name='namestring' required>";
        $output .=  "<button type='submit'>Valider</button>";
        $output .=  "</form>";

       return $output;
    }

    public function getBooksByCat($bookTypes){
        //Method: GET
        //<select> to choose the book type, submit
        $output = "";
            $output .= "<form action='' method='GET'>";
            $output .= "<select name= 'namestring' >";
            $output .= "echo $bookTypes; ";
            $output .= "</select>";
           // $output .= "<input type='text' id='' name='namestring'>";
            $output .=  "<button type='submit'>Valider</button>";
            $output .=  "</form>";
    
       return $output;
    }

    public function getBooksByDesc(){
        //Method: GET
        //1 textfield, submit
        $output = "";
            $output .= "<form action='' method='GET'>";
            $output .= "<input type='text' id='' name='namestring' required>";
            $output .=  "<button type='submit'>Valider</button>";
            $output .=  "</form>";
       
    
       return $output;
    }
  
    public function addBook($catList){
        //Method: POST
        //5 textfields: nameProduct, description
        //1 <select> to choose between this or that book type
        //1 checkbox for the fairtrade attribute, 1 select for the book type, submit
        $output = "";
        $output .= "<form action='' method='POST'>";
        $output .= "<label for='idProduct'>Product ID</label><input type='text' id='' name='idProduct' required><br>";
        $output .= "<label for='nameProduct'>Product name</label><input type='text' id='' name='nameProduct' required><br>";
        $output .= "<label for='description'>Description</label><input type='text' id='' name='description' required><br>";
        $output .= "<label for='fairtrade'>Fair trade</label><input type='checkbox' id='' name='fairtrade'><br>";
        $output .= "<label for='types'>Book type</label><select name='types'>";
        while ( ($entry = $catList) != FALSE) {
            $output .= '<option value="'.$entry['typeId'].'">'.$entry['name'].'</option>';
        }
        $output .= "</select><br>";
        $output .= "<label for='stock'>Price</label><input type='text' id='' name='price' required><br>";
        $output .= "<label for='stock'>Quantity</label><input type='text' id='' name='stock' required><br>";
        $output .= "<label for='discount'>Discount</label><input type='text' id='' name='discount'><br>";
        $output .=  "<button type='submit'>Valider</button>";
        $output .=  "</form>";
    
       return $output;
    }
    
    public function deleteBook(){
        //Method: POST
        //1 <select> to choose the book title we want to delete, submit
        $output = "";
        foreach ($form as $line) {
            $output .= "<form action='' method='POST'>";
            $output .= "<input type='' id='' name=''>";
            $output .=  "<button type='submit'>Valider</button>";
            $output .=  "</form>";
       }
    
       return $output;
    }

    public function editBook($idProduct,$nameProduct,$description,$fairtrade,$typeId,$typesTable){
        //Method: POST
        //1 select to choose which book we will edit (displays the book name)
        //5 textfields: nameProduct, description
        //1 <select> to choose between this or that book type
        //1 checkbox for the fairtrade attribute, 1 select for the book type, submit
        $output = "";
        $output .= "<form action='' method='POST'>";
        $output .= "<label for='idProduct'>Product ID</label><input type='text' id='' name='idProduct' value='$idProduct' required><br>";
        $output .= "<label for='nameProduct'>Product name</label><input type='text' id='' name='nameProduct' value=$ required><br>";
        $output .= "<label for='description'>Description</label><input type='text' id='' name='description' value=$ required><br>";
        $output .= "<label for='fairtrade'>Fair trade</label><input type='checkbox' id='' name='fairtrade' value=$ ><br>";
        $output .= "<label for='types'>Book type</label><select name='types'>";//Gérer la valeur dans la page insert
        $output .= "echo $typesTable";
        $output .= "</select><br>";
        $output .= "<label for='stock'>Price</label><input type='text' id='' name='price' value=$ required><br>";
        $output .= "<label for='stock'>Quantity</label><input type='text' id='' name='stock' value=$  required><br>";
        $output .= "<label for='discount'>Discount</label><input type='text' id='' name='discount' value=$ ><br>";
        $output .=  "<button type='submit'>Valider</button>";
        $output .=  "</form>";
    
       return $output;
    }
}
?>