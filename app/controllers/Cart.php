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
        $this->view('Cart/Cart', $this->loadModel("modelBranch")->get());
        $this->order();
    }
    // hàm xoá sản phẩm trong giỏ hàng
    public function delete()
    {
        if (isset($_POST["id"])) {
            $id = htmlspecialchars($_POST["id"]);
            unset($_SESSION["cart"][$id]);
        }
        ob_clean();
        echo $_POST["id"];
    }
    // hàm đặt đơn hàng
    private function order()
    {
        if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $timeCreate = date("Y-m-d H:i:s");
            $userId = (int) $_SESSION["user"]["id"];
            $totalPrice = $_SESSION['totalPrice'];
            $status = "pending";
            $address = htmlspecialchars($_POST["address"]);
            $idOrder = $this->model->post("order", $userId, $status, $timeCreate, $totalPrice, 30, $address);
            // thêm vào bảng detail_order
            foreach ($_SESSION["cart"] as $key => $value) {
                $this->model->post("detailOrder", $idOrder, $key, (int) $value["quantity"]);
            }
            $_SESSION["cart"] = [];
            unset($_SESSION["totalPrice"]);
            echo '<script>location.href="/";</script>';

        }
    }
    
}
