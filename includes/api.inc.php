<?php

class getAPi{

    //function to get all information from api.  
    public function getBookInfo($table_name, $table_id){     
  
        //Api url 
        $url = 'https://5ce8007d9f2c390014dba45e.mockapi.io';
        
        //Dynamic variables to read table and table id once at a time
        $table = "/" . $table_name;
        $id =  "/" . $table_id;

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_URL, $url . $table . $id);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        $data = curl_exec($ch);
        curl_close($ch);

        $obj = json_decode($data);

        $result = [];
        foreach($obj as $key => $val) {
            $result[$key] = $val;
        }
        return $result;
    }



      //function to fill new data 
    public function fill_book($data){

        $book = [];

        $book[0] = $data[0];
        $book[1] = $data[1];
        $book[2] = $data[4];
        $book[3] = $data[6];
        return $book;
        
       
    }



}