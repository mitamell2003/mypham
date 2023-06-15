<?php 
class loginModel extends connectDB{
    private $connect;
    public function __construct(){
        $this->connect = $this->connect();
    }
    public function checkAdmin($userName, $password){
        $sql = "SELECT * FROM account WHERE userName = '$userName' AND password = '$password' AND user_admin = 1";
        $result = $this->connect->query($sql);
        return $result->num_rows > 0 ? $result : false;
    }
}   
?>