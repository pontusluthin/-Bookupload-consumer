<?php

class getAPi{

    //function to get information from the specific api. 
    public function getApi(){
  
        //Api url 
        $url = 'https://5ce8007d9f2c390014dba45e.mockapi.io/books/';

              
        // Create a curl instance.
        $ch = curl_init($url);
        // Setup curl options
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // Perform the request and get the response.
        $response = curl_exec($ch);
        curl_close($ch);

        return $response;

    }


}