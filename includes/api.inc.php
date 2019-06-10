<?php

class getAPi{

    //function to get information from the specific api. 
    public function getBookInfo(){

       
  
        //Api url 
        $url = 'https://5ce8007d9f2c390014dba45e.mockapi.io/books/';

       
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_URL, $url.$id = "9789178034482");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        $data = curl_exec($ch);
        curl_close($ch);
        
        return $data;

    }


    public function getApiAuthors(){ //$author_id
        $url = 'https://5ce8007d9f2c390014dba45e.mockapi.io/authors/' . $authorId; //. $author_id;

       
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        $data = curl_exec($ch);
        curl_close($ch);
        
        return $data;

    }

    public function getApiPublisher($publisherId){ //$author_id
        $url = 'https://5ce8007d9f2c390014dba45e.mockapi.io/publishers/' . $publisherId; //. $author_id;

       
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        $data = curl_exec($ch);
        curl_close($ch);
        
        return $data;

    }



      //function to add new hard coded test values to new_books.csv
    public function fill_book($data){


       foreach($data as $test){
        $book = [];
        //$book [] = ["ISBN", "Title", "Author"];
        $book[0] = $data[1];
        $book[1] = $data[2];
        $book[2] = $data[3];
        $book[3] = $data[4];
        return $book;
        }
       
    }



}