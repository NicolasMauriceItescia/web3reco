<?php
class formBuilder{

    public function __construct() {
        
    }

    public function getBooksByName(){
        //Method: GET
        //1 textfield, submit
        $output = "";
        $output .= "<form action='' method='GET'>";
        $output .= "<input type='text' id='' name='namestring'>";
        $output .=  "<button type='submit'>Valider</button>";
        $output .=  "</form>";

       return $output;
    }

    public function getBooksByCat(){
        //Method: GET
        //<select> to choose the book type, submit
        $output = "";
            $output .= "<form action='' method='GET'>";
            $output .= "<input type='text' id='' name='namestring'>";
            $output .=  "<button type='submit'>Valider</button>";
            $output .=  "</form>";
    
       return $output;
    }

    public function getBooksByDesc(){
        //Method: GET
        //1 textfield, submit
        $output = "";
            $output .= "<form action='' method='GET'>";
            $output .= "<input type='text' id='' name='namestring'>";
            $output .=  "<button type='submit'>Valider</button>";
            $output .=  "</form>";
       
    
       return $output;
    }
    
    public function addBook(){
        //Method: POST
        //5 textfields: nameProduct, description
        //1 <select> to choose between this or that book type: use getter method
        //1 checkbox for the fairtrade attribute, 1 select for the book type, submit
        $output = "";
        foreach ($form as $line) {
            $output .= "<form action='' method='POST'>";
            $output .= "<input type='' id='' name=''>";
            $output .=  "<button type='submit'>Valider</button>";
            $output .=  "</form>";
       }
    
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

    public function editBook(){
        //Method: POST
        //1 select to choose which book we will edit (displays the book name)
        //5 textfields: nameProduct, description
        //1 <select> to choose between this or that book type: use getter method
        //1 checkbox for the fairtrade attribute, 1 select for the book type, submit
        $output = "";
        foreach ($form as $line) {
            $output .= "<form action=''method='POST'>";
            $output .= "<input type='' id='' name=''>";
            $output .=  "<button type='submit'>Valider</button>";
            $output .=  "</form>";
       }
    
       return $output;
    }
}
?>