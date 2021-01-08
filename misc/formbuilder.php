<?php
class formBuilder{

    // Constructor forms
    public function __construct() {
        
    }

    //---------------------------METHODES---------------------------//

    // serach a book by his name //
    public function getBooksByName(){
        //Method: GET
        //1 textfield, submit
        $output = "";
        $output .= "<form action='' method='GET'>";
        $output .= "<input type='text' id='' name='namestring' required>";
        $output .=  "<button type='submit'>Validate</button>";
        $output .=  "</form>";

       return $output;
    }

     // scrolling bar with choice //
    public function getSelect($list){
        //Method: GET
        //<select> to choose the book type, submit
        $output = "";
            $output .= "<form action='' method='GET'>";
            $output .= "<select name= 'list' >";
            $output .= "<option value='none' selected disabled hidden>Select an Option</option>";
            $output .= "echo $list;";
            $output .= "</select>";
           // $output .= "<input type='text' id='' name='namestring'>";
            $output .=  "<button type='submit'>Validate</button>";
            $output .=  "</form>";
    
       return $output;
    }

    // search a book by his description //
    public function getBooksByDesc(){
        //Method: GET
        //1 textfield, submit
        $output = "";
            $output .= "<form action='' method='GET'>";
            $output .= "<input type='text' id='' name='namestring' required>";
            $output .=  "<button type='submit'>Validate</button>";
            $output .=  "</form>";
       
    
       return $output;
    }
    
    //form with labels for attributes to insert new books //
    public function addBook($typesTable){
        //Method: POST
        //5 textfields: nameProduct, description
        //1 <select> to choose between this or that book type: use getter method
        //1 checkbox for the fairtrade attribute, 1 select for the book type, submit
        $output = "";
        $output .= "<form action='' method='POST'>";
        $output .= "<label for='idProduct'>Product ID</label><input type='text' id='' name='idProduct' required><br>";
        $output .= "<label for='nameProduct'>Product name</label><input type='text' id='' name='nameProduct' required><br>";
        $output .= "<label for='description'>Description</label><input type='text' id='' name='description' required><br>";
        $output .= "<label for='fairtrade'>Fair trade</label><input type='checkbox' id='' name='fairtrade'><br>";
        $output .= "<label for='types'>Book type</label><select name='types'>";
        $output .= "echo $typesTable";
        $output .= "</select><br>";
        $output .= "<label for='stock'>Price</label><input type='text' id='' name='price' required><br>";
        $output .= "<label for='stock'>Quantity</label><input type='text' id='' name='stock' required><br>";
        $output .= "<label for='discount'>Discount</label><input type='text' id='' name='discount'><br>";
        $output .=  "<button type='submit'>Validate</button>";
        $output .=  "</form>";
    
       return $output;
    }
    
    //Non-functionnal method, error returned: Fatal error: Allowed memory size of 134217728 bytes exhausted (tried to allocate 132120600 bytes) in /Applications/MAMP/htdocs/web3reco/misc/formbuilder.php on line 74
    /* public function addBook2($catList){
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
    } */
    
    //scrolling bar with book name to delete selected //
    public function deleteBook($bookListSuppr){
        //Method: POST
        //1 <select> to choose the book title we want to delete, submit
        $output = "";
        $output .= "<form action='' method='POST'>";
        $output .= "<select name= 'bookToDelete' >";
        $output .= "echo $bookListSuppr";
        $output .= "</select>";
        $output .=  "<button type='submit'>Validate</button>";
        $output .=  "</form>";
       
    
       return $output;
    }

    // form with labels for attributes to modify book parameters //
    public function editBook($typesTable, $idProduct,$nameProduct,$description,$fairtrade,$typeId,$price,$stock,$discount){
        $output = "";
        $output .= "<form action='' method='POST'>";
        $output .= "<label for='idProduct'>Product ID</label><input type='text' id='' name='idProduct' value='$idProduct' required><br>";
        $output .= "<label for='nameProduct'>Product name</label><input type='text' id='' name='nameProduct' value='$nameProduct' required><br>";
        $output .= "<label for='description'>Description</label><input type='text' id='' name='description' value='$description' required><br>";
        if($fairtrade!=0){
            $output .= "<label for='fairtrade'>Fair trade</label><input type='checkbox' id='' name='fairtrade' value='yes'><br>";
        }else{
            $output .= "<label for='fairtrade'>Fair trade</label><input type='checkbox' id='' name='fairtrade' value=''><br>";
        }
        $output .= "<label for='types'>Book type</label><select name='types' value='$typeId' required>";//Gérer la valeur dans la page insert
        $output .= "<option value='none' selected disabled hidden>Select an Option</option>";
        $output .= "echo $typesTable";
        $output .= "</select><br>";
        $output .= "<label for='stock'>Price</label><input type='text' id='' name='price' value='$price' required><br>";
        $output .= "<label for='stock'>Quantity</label><input type='text' id='' name='stock' value='$stock'  required><br>";
        $output .= "<label for='discount'>Discount</label><input type='text' id='' name='discount' value='$discount' ><br>";
        $output .=  "<button type='submit'>Validate</button>";
        $output .=  "</form>";
       return $output;
    }
}
?>