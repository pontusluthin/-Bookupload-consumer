<?php


require_once('dbconnect.php');


class upload{


        //db connection 
        public function __construct()
        {
            $db = new DBConnect();
            $this->db = $db->pdo;
        }


        //Function to upload the inserted file on uploadpage.php, the file is uploaded specific to the uploaded_files foled and has the name isbn.csv set. 
        public function uploadFileToFolder(){

            if(isset($_FILES)){
                $check = true; 

                //@ is to prevent the webpage showing an error message before the file is uploaded 
                if(@$_FILES['csv_file']['type'] !== 'text/csv'){
                        $check = false; 
                }

                if($check){
                        $path = realpath('./') . '/uploaded_files/isbn.csv';
                       
                        move_uploaded_file($_FILES['csv_file']['tmp_name'], "$path");
                      
                }
                
        }
        }

        //Function to store the file in the database 
        public function uploadFileToDatabase($csv_file) 
        {
            $statement = $this->db->prepare("INSERT INTO files(csv_file) VALUES (:csv_file)");

            $statement->bindValue(':csv_file', $csv_file);

            if ($statement->execute()) {
                echo ("File uploaded");
                header('location: checkoutpage.php');
            } else {
                echo ("Could not upload file correctly");
            }
        }



}