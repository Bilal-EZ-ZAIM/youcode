<?php

trait Model
{
    use Database ;
    // protected $table = 'utilisateurs';
    protected $limit = 5;
    protected $offset = 0;
    protected $order_type = "desc";
    protected $order_column = "id";

    public function findAll()
    {
        $query = "SELECT * FROM $this->table ";
        return $this->query($query);
    }

    public function where($data)
    {
        $query = "SELECT * FROM $this->table WHERE ";

        // Assuming $data is an associative array with column names as keys and values as values
        foreach ($data as $key => $value) {
            $query .= "$key = :$key AND ";
        }

        $query = rtrim($query, " AND ");
        

        return $this->query($query, $data);
    }

    public function login($data)
    {
        $query = "SELECT * FROM $this->table WHERE email = :email ";

        return $this->query($query, $data);
    }


    // public function where($data, $data_not = [])
    // {

    //     $query = "SELECT * FROM $this->table WHERE ";
    //     $conditions = [];

    //     foreach ($data as $key => $value) {
    //         $conditions[] = "$key = :$key";
    //     }

    //     foreach ($data_not as $key => $value) {
    //         $conditions[] = "$key != :$key";
    //     }

    //     $query .= implode(" AND ", $conditions);
    //     $query .= "ORDER BY $this->order_column  LIMIT $this->limit OFFSET $this->offset ";

    //     $mergedData = array_merge($data, $data_not);

    //     return $this->query($query, $mergedData);
    // }

    // Implement other CRUD methods (insert, update, delete, first) as needed
    public function first($data, $data_not = [])
    {
        $query = "SELECT * FROM $this->table WHERE ";
        $conditions = [];

        foreach ($data as $key => $value) {
            $conditions[] = "$key = :$key";
        }

        foreach ($data_not as $key => $value) {
            $conditions[] = "$key != :$key";
        }

        $query .= implode(" AND ", $conditions);
        $query .= " LIMIT $this->limit OFFSET $this->offset ";

        $mergedData = array_merge($data, $data_not);

        $result = $this->query($query, $mergedData);
        if ($result) {
            return $result[0];
        } else {
            return false;
        }
    }

    public function insert($data)
    {
        $keys = array_keys($data);
        $query = "INSERT INTO $this->table (" . implode(", ", $keys) . ") VALUES (:" . implode(", :", $keys) . ") ";

        try {
            $this->query($query, $data);
            return true; 
        } catch (PDOException $e) {
            die("Insert failed: " . $e->getMessage());
        }
    }

    // public function insert($data)
    // {
    //     $keys = array_keys($data);
    //     $query = "INSERT INTO $this->table (" . implode(" , ", $keys) . ") VALUES(:" . implode(" , :", $keys) . ") ";
    //     echo $query;
    //     $this->query($query, $data);
    //     return false;
    // }

    public function update($id, $data, $id_column = 'id')
    {
        $keys = array_keys($data);
        $query = "UPDATE $this->table SET ";

        foreach ($keys as $key) {
            $query .= "$key = :$key, ";
        }

        $query = rtrim($query, ', ');  // Remove trailing comma

        $query .= " WHERE $id = :$id_column ";

        $data[$id_column] = $id;

        echo $query;  // For testing purposes, remove in production
        $this->query($query, $data);
        return false;  // Adjust the return value based on your needs
    }
    public function delete($id_column, $id = 'id')
    {
        $data[$id] = $id_column;
        $query = "DELETE FROM $this->table WHERE $id = :$id ";


        $this->query($query, $data);
        return false;

    }


}

?>





<?php

// class Model extends  Database{
//     protected $table = 'utilisateurs';
//     protected $limit = 5;
//     protected $offset = 0;
//     // function test(){
//     //     $query = "SELECT * FROM `utilisateurs`";
//     //     $result = $this->query($query);
//     //     show($result);
//     // }

//     public function where($data , $data_not = []){
//         $query = "";
//         $query = "SELECT * FROM $this->table WHERE ";
//         $keys = array_keys($data);
//         $keys_not = array_keys($data_not);

//         foreach($keys as $key){
//             $query .= $key . " = : " .$key . " && ";
//         }
//         foreach($keys_not as $key){
//             $query .= $key . " != : " .$key . " && ";
//         }
//         $query = trim($query , " && ");
//         $query .= " limit $this->limit offset $this->offset ";
//         $data = array_merge($data , $data_not);
//         return $this->query($query , $data);

//     }

//     public function first($data , $data_not = []){

//     }
//     public function insert($data){

//     }

//     public function update($id , $data){

//     }

//     public function delete($id){

//     }
// }

?>