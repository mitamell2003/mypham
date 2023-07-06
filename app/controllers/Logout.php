<?php
    class Logout {
        public function index(){
            if(isset($_SESSION['user']) && isset($_POST['logout'])){
                echo json_encode(array('status' => 'success', 'message' => 'Đăng xuất thành công'));
                session_destroy();
                ob_end_clean();
                header('location: /', true, 301);
               
            }else{
               require_once __DIR__ . '/../views/404.php';
            }
        }
    }
 ?>