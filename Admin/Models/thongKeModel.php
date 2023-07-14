<?php
class thongKeModel extends connectDB{
    private $connect;
    public function __construct(){
        $this->connect = $this->connect();
    }
    public function getRevenue(){
        $sql = "SELECT SUM(price_total) FROM oder WHERE status = 'success'";
        $result = $this->connect->query($sql);
        return $result->fetch_assoc()["SUM(price_total)"];
    }
    public function getHotBranch(){
        $sql = "SELECT * FROM branch JOIN (SELECT SUM(oder.price_total) AS `count`, id_branch, status FROM `oder` WHERE oder.status = 'success' GROUP BY id_branch ORDER BY `count` DESC LIMIT 1) o ON  branch.id = o.id_branch";
        $result = $this->connect->query($sql);
        $result = $result->fetch_assoc();
        $sql2 = "SELECT SUM(quantity) AS `soluong` FROM oder JOIN oder_item ON oder.id = oder_item.oder_id WHERE oder.id_branch = $result[id]";
        $result2 = $this->connect->query($sql2);
        $arr = array(
            "name" => $result["name"],
            "address" => $result["address"],
            "count" => $result["count"],
            "soluong" => $result2->fetch_assoc()["soluong"]
        );
        return $arr;
    }
    public function getHotProduct(){
        $sql = "SELECT * FROM product JOIN (SELECT SUM(oder_item.quantity) AS quantity, product_id FROM oder_item GROUP BY (oder_item.product_id) ORDER BY quantity DESC LIMIT 1) o ON product.id = o.product_id; ";
        $result = $this->connect->query($sql);
        return $result->fetch_assoc();
    }
    public function boomAccount(){
        $sql = "SELECT * FROM account JOIN (SELECT COUNT(oder.user_id) AS `count`, oder.user_id FROM oder WHERE oder.status = 'cancel' GROUP BY oder.user_id ORDER BY `count` DESC LIMIT 1) o ON account.id = o.user_id;";
        $result = $this->connect->query($sql);
        return $result->fetch_assoc();        
    }
    public function quaHan(){
        $sql = "SELECT COUNT(*) as `count` FROM `oder` WHERE oder.delivery_time < oder.order_completion AND oder.status = 'success'";
        $result = $this->connect->query($sql);
        return $result->fetch_assoc();
    }
    public function boomBranch(){
        $sql = "SELECT * FROM branch JOIN (SELECT COUNT(oder.id_branch) AS `count`, oder.id_branch FROM oder WHERE oder.status = 'cancel' GROUP BY oder.id_branch ORDER BY `count` DESC LIMIT 1) o ON branch.id = o.id_branch;";
        $result = $this->connect->query($sql);
        return $result->fetch_assoc();
    }
}
 ?>