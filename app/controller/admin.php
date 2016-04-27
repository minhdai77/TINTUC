<?php
include("model/model_admin.php");
class admin
{
    public $qt;
    public $params;
    public $cname = "admin";
    public $current_action;
    public $lang;
    
    public function __construct($action, $params)
    {
        $this->qt = new model_admin();
        if ($action == "") {
            $action = "index";
        }
        $this->current_action = $action;
        $this->params         = $params;
        //$this->lang = $lang;
        if ($action != "login" && $action != "logout") {
            $this->qt->checklogin();
        }
        $this->$action();
        //var_dump($this->$action());
        //die;
    }
    function index()
    {
        //$bvl = $this->qt->baiviet_list();
        require_once("view/admin/home_admin.php");
    }
    
    function baiviet_them()
    {
        if (isset($_POST['btnadd']) == false) {
            require_once "view/admin/home_admin.php";
        } else {
            $kq = $this->qt->baiviet_them($_POST); //var_dump($kq);die;
            header('location:' . BASE_DIR . 'vi/admin/baiviet_list');
        }
    }
    
    function baiviet_sua()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            settype($id, "int");
        } else {
            $id = 0;
        }
        if (isset($_POST['btnsua']) == true) {
            $kq  = $this->qt->baiviet_sua($id); //var_dump($kq);die;
            $id  = $_POST['id'];
            $sql = "UPDATE baiviet SET lang='" . $_POST['lang'] . "',TieuDe= N'" . $_POST['TieuDe'] . "' , TomTat='" . $_POST['TomTat'] . "',urlHinh='" . $_POST['urlHinh'] . "',Content='" . $_POST['Content'] . "',idLoai='" . $_POST['idLoai'] . "', NoiBat='" . $_POST['NoiBat'] . "', AnHien='" . $_POST['AnHien'] . "'  WHERE idbv =" . $id;
            //var_dump($sql);die;
            $a   = $this->qt->update($sql); //var_dump($a);die;
            if (strlen($_SESSION['back']) > 0) {
                $b = $_SESSION['back'];
                unset($_SESSION['back']);
                header('location:' . $b);
            } else
                header('location:' . BASE_DIR . 'vi/admin/baiviet_list');
            exit();
        } else {
            $row = $this->qt->chitietbaiviet($id); //var_dump($row);die;        
            //$_SESSION['back']= $_SERVER['HTTP_REFERER']; 
            require_once("view/admin/home_admin.php");
        }
    }
    
    
    function baiviet_list()
    {
        if (!isset($_GET['page'])) {
            $_GET['page'] = 1;
        }
        
        $rows      = $this->qt->baiviet_list($_GET['page']);
        //var_dump($row);die;
        $totalpage = $this->qt->pagination_article();
        $from      = 1;
        $to        = $totalpage;
        if ($_GET['page'] > 3) {
            $from = $_GET['page'] - 2;
            
        }
        if ($totalpage > ($_GET['page'] + 2)) {
            $to = $_GET['page'] + 2;
        }
        require_once "view/admin/home_admin.php";
    }
    
    //phan trang quan tri bai viet
    function page()
    {
        if (isset($_GET['page']))
            require_once "v5r43iew/admin/home_admin.php";
    }
    function baiviet_xoa()
    {
        //$id=$this->params[0];
        $id = $_GET['id'];
        settype($id, "int");
        $this->qt->baiviet_xoa($id);
        $note = "<h3 align=center>Đã xóa bài viết</h3>";
        $note .= "<a href=" . $_SERVER['HTTP_REFERER'] . ">Về trang trước</a>";
        //var_dump($_SESSION['thongbao']);die;
        require_once("view/admin/home_admin.php");
    }
    
    
    
    //loai bai viet
    
    function loaibaiviet_list()
    {
        if (!isset($_GET['page'])) {
            $_GET['page'] = 1;
        }
        
        $rows      = $this->qt->loaibaiviet_list($_GET['page']);
        //var_dump($row);die;
        $totalpage = $this->qt->pagination_catagory();
        $from      = 1;
        $to        = $totalpage;
        if ($_GET['page'] > 3) {
            $from = $_GET['page'] - 2;
            
        }
        if ($totalpage > ($_GET['page'] + 2)) {
            $to = $_GET['page'] + 2;
        }
        require_once "view/admin/home_admin.php";
    }
    
    function loaibaiviet_them()
    {
        if (isset($_POST['btnthem']) == false) {
            require_once "view/admin/home_admin.php";
        } else {
            $kq = $this->qt->loaibaiviet_them($_POST); //var_dump($kq);die;
            header('location:' . BASE_DIR . 'vi/admin/loaibaiviet_list');
        }
    }
    
    function loaibaiviet_sua()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            settype($id, "int");
        } else {
            $id = 0;
        } //var_dump($id);die;
        //var_dump($id);die;
        if (isset($_POST['btnedit']) == true) {
            $kq  = $this->qt->loaibaiviet_sua($id); // var_dump($kq);die;
            $id  = $_POST['id']; // var_dump($id);die;
            $sql = "UPDATE phanloaibai SET lang='" . $_POST['lang'] . "',TenLoai= N'" . $_POST['TenLoai'] . "' ,ThuTu='" . $_POST['ThuTu'] . "', AnHien='" . $_POST['AnHien'] . "',idCha='" . $_POST['idCha'] . "'  WHERE idloai =" . $id;
            //var_dump($sql);die;
            $a   = $this->qt->update($sql); //var_dump($a);die;
            if (strlen($_SESSION['back']) > 0) {
                $b = $_SESSION['back'];
                unset($_SESSION['back']);
                header('location:' . $b);
            } else
                header('location:' . BASE_DIR . 'vi/admin/loaibaiviet_list');
            exit();
        } else {
            $row = $this->qt->chitietloaibaiviet($id); //var_dump($row);die;        
            //$_SESSION['back']= $_SERVER['HTTP_REFERER']; 
            require_once("view/admin/home_admin.php");
        }
    }
    
    
    function loaibaiviet_xoa()
    {
        $id = $_GET['id'];
        settype($id, "int");
        $ten        = $this->qt->laytenloaibaiviet($id);
        $demloaicon = $this->qt->demloaicon($id);
        $dembaiviet = $this->qt->demsobaiviettrongloai($id);
        if ($demloaicon > 0) {
            $note = "Loại $ten có $demloaicon loại con nên bạn không xóa được";
            $note .= "<p><a href=" . $_SERVER['HTTP_REFERER'] . ">Trang trước</a>";
        } else if ($dembaiviet > 0) {
            $ten  = $this->qt->laytenloaibaiviet($id);
            $note = "<h3>Loại $ten có $dembaiviet bài viết nên không xóa được</h3>";
            $note .= "<p><a href=" . $_SERVER['HTTP_REFERER'] . ">Trang trước</a>";
        } else {
            $this->qt->loaibaiviet_xoa($id);
            $note = "<h3 align=center>Đã xóa loai bài viết $ten </h3>";
            $note .= "<a href=" . $_SERVER['HTTP_REFERER'] . ">Về trang trước</a>";
        }
        require_once "view/admin/home_admin.php";
    }
    
    function account_list()
    {
        if (!isset($_GET['page'])) {
            $_GET['page'] = 1;
        }
        
        $rows      = $this->qt->account_list($_GET['page']);
        //var_dump($row);die;
        $totalpage = $this->qt->pagination_account();
        $from      = 1;
        $to        = $totalpage;
        if ($_GET['page'] > 3) {
            $from = $_GET['page'] - 2;
            
        }
        if ($totalpage > ($_GET['page'] + 2)) {
            $to = $_GET['page'] + 2;
        }
        require_once "view/admin/home_admin.php";
    }
    function account_add()
    {
        if (isset($_POST['btnadd']) == false) {
            require_once "view/admin/home_admin.php";
        } else {
            $kq = $this->qt->account_add($_POST);
            header('location:' . BASE_DIR . 'vi/admin/account_list');
        }
    }
    function account_edit()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            settype($id, "int");
        } else {
            die('ban da nhap sai cu phap !');
        }
        
        //$id= settype($_GET['id'],"int");
        
        if (isset($_POST['btnedit']) == true) {
            $kq  = $this->qt->account_edit($id);
            $id  = $_POST['id'];
            $sql = "UPDATE users SET HoTen=N'" . $_POST['HoTen'] . "',Username= N'" . $_POST['Username'] . "' , Password='" . $_POST['Password'] . "',Dienthoai='" . $_POST['Dienthoai'] . "',Email='" . $_POST['Email'] . "',idGroup='" . $_POST['idGroup'] . "'  WHERE idUser =" . $id;
            //var_dump($sql);die;
            $a   = $this->qt->update($sql); //var_dump($a);die;
            if (strlen($_SESSION['back']) > 0) {
                $b = $_SESSION['back'];
                unset($_SESSION['back']);
                header('location:' . $b);
            } else
                header('location:' . BASE_DIR . 'vi/admin/account_list');
            exit();
        } else {
            $row = $this->qt->chitiettaikhoan($id); //var_dump($row);die;        
            //$_SESSION['back']= $_SERVER['HTTP_REFERER']; 
            require_once("view/admin/home_admin.php");
        }
    }
    
    function account_delete()
    {
        $id = $_GET['id'];
        settype($id, "int");
        $name          = $this->qt->laytentaikhoan($id); //var_dump($ten);die;
        $authorization = $this->qt->phanquyen($id); //var_dump($demloaicon);die;
        //$phanquyen = 
        if ($authorization == 1) {
            $note = "<h3>Tài Khoản $name là tài khoản admin nên bạn không xóa được </h3>";
            $note .= "<p><a href=" . $_SERVER['HTTP_REFERER'] . ">Trang trước</a>";
        } else {
            $this->qt->account_delete($id);
            $note = "<h3 align=center >Đã xóa tài khoản $name </h3>";
            $note .= "<a href=" . $_SERVER['HTTP_REFERER'] . ">Về trang trước</a>";
        }
        require_once "view/admin/home_admin.php";
    }
    
    
    function dangnhap()
    {
        if ($_POST == NULL) {
            require_once "app/view/admin/dangnhap.php";
        } else {
            $u  = strip_tags($_POST['u']);
            $p  = strip_tags($_POST['p']);
            $kq = $this->qt->login($u, $p);
            if ($kq == false)
                header('location:' . BASE_DIR . 'admin/dangnhap');
            else {
                if (isset($_SESSION['back'])) {
                    $b = $_SESSION['back'];
                    unset($_SESSION['back']);
                    header("location:$b");
                } else
                    header('location:' . BASE_DIR . 'admin');
            }
        }
    }
    function thoat()
    {
        session_destroy();
        header('location:' . BASE_DIR . 'admin/dangnhap');
    }
    
    
    
    
}
?>