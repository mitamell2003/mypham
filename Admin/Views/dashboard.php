<section>
    <div class="container-dashboard">
        <div class="dashboard">
            <div id="container-nav-bar">
                <div id="nav-bar">
                    <div class="title">
                        <h3>Dashboard</h3>
                        <div id="hide-nav-bar">
                            <i class="fas fa-times"></i>
                        </div>
                    </div>
                    <ul>
                        <li>
                            <a href="?action=order">Đơn hàng</a>
                        </li>
                        <li>
                            <a href="?action=user">Thành viên</a>
                        </li>
                        <li>
                            <a href="?action=add">Thêm sản phẩm</a>
                        </li>
                        <li>
                            <a href="?action=update">Sửa sản phẩm</a>
                        </li>
                        <li>
                            <a href="?action=statistics">Thống kê</a>
                        </li>
                    </ul>
                </div>
                <div id="show-nav-bar">
                    <i class="fas fa-bars"></i>
                </div>
            </div>
            <div id="container-services">
                <div class="service">
                    <div class="manager">
                        <div class="user-name">
                            <h3>Họ tên: <span>Nguyễn Văn A</span></h3>
                        </div>
                        <div class="permission">
                            <h3>Chức vụ: <span>Nhân viên</span></h3>
                        </div>
                        <div class="date">
                            <h3>Ngày đăng nhập: <span>20-10-2020</span></h3>
                        </div>
                    </div>
                    <div class="container-order">
                        <div class="order">
                            <div class="title-order">
                                <h1>Quản lý đơn hàng</h1>
                            </div>
                            <div class="container-order-table">
                                <div class="order-info">
                                    <div class="item-info">
                                        <div class="inner-info">
                                            <h3>Người đặt hàng</h3>
                                        </div>
                                    </div>
                                    <div class="item-info">
                                        <div class="inner-info">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</section>
<script>
    const show = document.getElementById('show-nav-bar');
const navBar = document.getElementById('nav-bar');
const hide = document.getElementById('hide-nav-bar');
show.addEventListener('click', () => {
    navBar.style.left = "0%";
    document.getElementById('container-services').style.width = "85%";
    document.getElementById('container-nav-bar').style.width = "15%";
});
hide.addEventListener('click', () => {
  navBar.style.left = "-100%";
    document.getElementById('container-nav-bar').style.width = "7%";
  document.getElementById('container-services').style.width = "100%";
});


</script>