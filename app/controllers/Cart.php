<?php
class Cart extends baseController
{
    private $model;
    public function __construct()
    {
        $this->model = $this->loadModel('cartModel');
    }
    public function index()
    {
        if (!isset($_SESSION["user"])) {
            echo '<script>location.href="/";</script>';
        }
        // $data = [];
        // $data[0] = $this->loadModel("modelBranch")->get();
        // require_once __DIR__ . "/../views/Cart.php";
        $this->view('Cart/Cart', $this->loadModel("modelBranch")->get());
        $this->order();
    }
    public function delete()
    {
        if (isset ($_POST["id"])) {
            $id = htmlspecialchars($_POST["id"]);
            unset($_SESSION["cart"][$id]);
        }
        ob_clean();
        echo $_POST["id"];
    }
    private function order(){
        if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST' ){
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            if($_POST["month"] < date("m") || ($_POST["month"] == date("m") && $_POST["day"] < date("d")) ||($_POST["hours"] < date("H") && $_POST["day"] == date("d") && $_POST["month"] == date("m"))){
                echo '<script>alert("Thời gian giao hàng không hợp lệ");</script>';
                echo '<script>location.href="/Cart";</script>';
            }else{
                $timeCreate = date("Y-m-d H:i:s");
                $userId = (int)$_SESSION["user"]["id"];
                $totalPrice = $_SESSION['totalPrice'];
                $status = "pending";
                $branchId = htmlspecialchars($_POST['branch']);
                $address = $_POST['diaChiNhanHang'];
                $idOrder = $this->model->post("order", $userId, $status, $timeCreate, $totalPrice, $branchId, $address, "$_POST[year]-$_POST[month]-$_POST[day] $_POST[hours]:00:00");
                // thêm vào bảng detail_order
                foreach($_SESSION["cart"] as $key => $value){
                    $this->model->post("detailOrder", $idOrder, $key, (int)$value["quantity"]);
                }
                $_SESSION["cart"] = [];
                unset($_SESSION["totalPrice"]); 
                echo '<script>location.href="/";</script>';
            }
           
        }
    }
    public function details(){
        
    }
}
