<?php

include '../DB/dbconnect.php';


class DBinsert{

        public function __construct()
        {
            $db = new DBConnect();
            $this->db = $db->pdo;
        }


        public function uploadFile($file_insert) 
        {
            $statement = $this->db->prepare("INSERT INTO files(csv_file) VALUES (:csv_file)");
            foreach ($file_insert as $key => $value) {
                    $statement->bindValue(':csv_file'.$key,$value);
            }
            if ($stmt->execute()) {
                echo ("Registered");
                header('location: index.php');
            } else {
                echo ("Something went wrong");
            }
        }

}