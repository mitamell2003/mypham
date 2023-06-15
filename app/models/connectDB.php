<?php
class connectDB
{
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbname = DB_NAME;
    public function connect()
    {
        $connect = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
        if($connect->connect_error){
            die("Connection failed: " . $connect->connect_error);
        }
        return $connect;
    }
}

?>