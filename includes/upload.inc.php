<?php


require_once('dbconnect.php');


class DBinsert{

        public function __construct()
        {
            $db = new DBConnect();
            $this->db = $db->pdo;
        }


        public function uploadFile($file_insert) 
        {
            $statement = $this->db->prepare("INSERT INTO files(csv_file) VALUES ('$csv_file')");
            if ($statement->execute()) {
                echo ("File uploaded");
                header('location: checkoutpage.php');
            } else {
                echo ("Could not upload file correctly");
            }
        }

}