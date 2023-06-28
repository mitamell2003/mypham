<?php

class cartModel extends connectDB{
    private $connect;
    public function __construct(){
        $this->connect = $this->connect();
    }
    public function post($type,...$arg){
        switch($type){
            case "order":
                $sql = "INSERT INTO oder(id, user_id, status, create_order, order_completion, price_total, id_branch, delivery_address, delivery_time) VALUES 
                        (NULL, '$arg[0]', '$arg[1]', '$arg[2]', NULL ,$arg[3], $arg[4], '$arg[5]', '$arg[6]')";
                $this->connect->query($sql);
                return $this->connect->insert_id;  

            case "detailOrder":
                $sql = "INSERT INTO `oder_item`(`id`, `oder_id`, `product_id`, `quantity`) VALUES (NULL, $arg[0], $arg[1], $arg[2])";

                return $this->connect->query($sql);
                
        }   
        
    }
}

 ?>