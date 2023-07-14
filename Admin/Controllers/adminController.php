<?php
require_once __DIR__ . "/login.php";
class adminController extends connectDB{
    public function management(){
        // check 
        $checkAdmin = new login();
        $checkAdmin->checkAdmin();
        if(isset($_SESSION['admin'])){
            if(isset($_GET['action'])){
                require_once $_GET['action'] . ".php";
                $action = new $_GET['action']();
                if(isset($_GET['ctl'])){
                    call_user_func([$action, $_GET['ctl']]);
                }else{
                    call_user_func([$action, $_GET['action']]);
                }
            }else{
                
            }
        }
    }
    public function loadModel($name)
    {
        // Kiểm tra file model có tồn tại hay không nếu có thì require vào
        if (file_exists(__DIR__ . '/../Models/' . $name . '.php')) {
            require_once __DIR__ . '/../Models/' . $name . '.php';
            $model = new $name();
            return $model;
        } 
        else {
            echo 'Model not found!';
        }
        return false;
    }
    /**
     * Hàm load view
     * @param $name tên của view cần check
     * @param array $data dữ liệu truyền vào view
     * @return mixed view nếu tồn tại, ngược lại thông báo lỗi
     */
    public function view($name, ...$data)
    {
        // Kiểm tra file view có tồn tại hay không nếu có thì require vào
        if (file_exists(__DIR__ . '/../Views/' . $name . '.php')) {
            require_once __DIR__ . '/../Views/' . $name . '.php';
        } 
        else {
            echo 'View not found!';
        }
    }
}
?>