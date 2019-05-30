<?php

class getAPi{

    public function getApi(){

        //array_shift($uploadCSV);

       
        
        $url = 'https://5ce8007d9f2c390014dba45e.mockapi.io/books/';

                // Create a curl instance.
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