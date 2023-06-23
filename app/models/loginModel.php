<?php
class loginModel extends connectDB{
    private $connect;
    public function __construct(){
        $this->connect = $this->connect();
    }
    public function post($userName, $password){
        $sql = "SELECT * FROM account WHERE userName = '$userName' AND password = '$password'";
        $result = $this->connect->query($sql);
        return $result->num_rows === 1 ? $result : false;
    }
}
 ?>