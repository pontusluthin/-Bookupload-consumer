<?php

class getAPi{

    //function to get information from the specific api. 
    public function getBookInfo($table_name, $table_id){     
  
        //Api url 
        $url = 'https://5ce8007d9f2c390014dba45e.mockapi.io';
        $table = "/" . $table_name;
        $id =  "/" . $table_id;

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_URL, $url . $table . $id);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        $data = curl_exec($ch);
        curl_close($ch);

        $obj = json_decode($data);
        var_dump($obj);
        $result = [];
        foreach($obj as $key => $val) {
            $result[$key] = $val;
        }
        return $result;
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

        
       
        $book = [];
        //$book [] = ["ISBN", "Title", "Author"];
        $book[0] = $data[0];
        $book[1] = $data[1];
        $book[2] = $data[4];
        $book[3] = $data[6];
        return $book;
        
       
    }



}