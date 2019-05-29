<?php


require_once('dbconnect.php');


class upload{

        public function __construct()
        {
            $db = new DBConnect();
            $this->db = $db->pdo;
        }


        public function uploadFileToDatabase($file_insert) 
        {
            $statement = $this->db->prepare("INSERT INTO files(csv_file) VALUES ('$csv_file')");
            if ($statement->execute()) {
                echo ("File uploaded");
                header('location: checkoutpage.php');
            } else {
                echo ("Could not upload file correctly");
            }
        }

        public function uploadFileToFolder(){

            if(isset($_FILES)){
                $check = true; 

                if(@$_FILES['csv_file']['type'] !== 'text/csv'){
                        $check = false; 
                }

                if($check){
                        $path = realpath('./') . '/uploaded_files/isbn.csv';
                       
                        move_uploaded_file($_FILES['csv_file']['tmp_name'], "$path");
                      
                }
                
        }
        }



}