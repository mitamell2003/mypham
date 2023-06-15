<?php 
class addModel extends connectDB{
    private $connect;
    public function __construct(){
        $this->connect = $this->connect();
    }
    public function add($name, $description, $price, $category_id, $branch_id, $image, $expried, $discount){
        $sql = "INSERT INTO `product`(`id`, `name`, `description`, `price`, `category_id`, `branch_id`, `image`, `expried`, `discount`) VALUES (null,'$name','$description','$price','$category_id','$branch_id','$image','$expried','$discount')";
        $this->connect->query($sql);
    }
    
}
?>