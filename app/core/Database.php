<?php

trait Database {
    private function connect(){
        try {
            $string = "mysql:host=".DBHOST.";dbname=".DBNAME;
            $con = new PDO($string, DBUSER, DBPASS);
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $con;
        } catch (PDOException $e) {
            // Handle connection error
            die("Connection failed: " . $e->getMessage());
        }
    }

    public function query($query, $data = []){
        try {
            $con = $this->connect();
            $stm = $con->prepare($query);
            $stm->execute($data);

            $result = $stm->fetchAll(PDO::FETCH_ASSOC);
            if(is_array($result) && count($result) > 0){
                return $result;
            } else {
                return [];
            }
        } catch (PDOException $e) {
            // Handle query error
            die("Query failed: " . $e->getMessage());
        }
    }

    public function get_row($query, $data = []){
        try {
            $con = $this->connect();
            $stm = $con->prepare($query);
            $stm->execute($data);

            $result = $stm->fetchAll(PDO::FETCH_ASSOC);
            if(is_array($result) && count($result) > 0){
                return $result[0];
            } else {
                return [];
            }
        } catch (PDOException $e) {
            // Handle query error
            die("Query failed: " . $e->getMessage());
        }
    }
}

?>



<?php
// class Database { 
//     private function connect(){
//         $string = "mysql:hostname=".DBHOST.";dbname=".DBNAME;
//         $con = new PDO($string,DBUSER,DBPASS);
//         return $con;
//     }

//     public function query($query,$data = []){
//         $con = $this->connect();
//         $stm = $con->prepare($query);
//         $check =  $stm->execute($data);
//         if($check){
//             $result = $stm->fetchAll(PDO::FETCH_OBJ);
//             if(is_array(($result)) && count($result)){
//                 return $result;
//             }
//         }
//         return false;
//     }

//     //get one line
//     public function get_row($query,$data = []){
//         $con = $this->connect();
//         $stm = $con->prepare($query);
//         $check =  $stm->execute($data);
//         echo $check;
//         if($check){
//             $result = $stm->fetchAll(PDO::FETCH_ASSOC);
//             if(is_array(($result)) && count($result)){
//                 return $result[0];
//             }else{
//                 return false;
//             }
//         }
//     }





// }

?>