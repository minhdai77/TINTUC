<?php

class model_admin
{
    public $db;
    public function __construct()
    {
        $this->db = new mysqli(HOST, USER_DB, PASS_DB, DB_NAME);
        $this->db->set_charset('utf8');
    }
    
    public function checklogin()
    {
        if ($_SESSION['authed_user'] == false) {
            $_SESSION['error'] = "ban chua dang nhap";
            $_SESSION['back']  = $_SERVER['REQUEST_URI'];
            header('location:' . BASE_URL . 'admin/dangnhap.php');
            exit();
        } elseif ($_SESSION['authed_user']['login_level'] == 1) {
            $_SESSION['error'] = "ban khong co quyen truy cap";
            $_SESSION['back']  = $_SERVER['REQUEST_URI'];
            header('location:' . BASE_URL . 'admin/dangnhap.php');
            exit();
        }
    }
    public function login($u, $p)
    {
        $sql = sprintf("SELECT idUser, Username, Password, HoTen, idGroup FROM users 
      WHERE Username='minhdai' AND Password=md5(concat('minhdai', 123))", $u, $p);
        if (!$kq = $this->db->query($sql))
            die($this->db->error);
        if ($kq->num_rows == 0)
            return false;
        $row                     = $kq->fetch_assoc();
        $_SESSION['login_id']    = $row['idUser'];
        $_SESSION['login_user']  = $row['Username'];
        $_SESSION['login_hoten'] = $row['HoTen'];
        $_SESSION['login_level'] = $row['idGroup'];
        return true;
    }
    
    
    //quanli bai viet
    /*function baivietlist(){
    $sql = "SELECT * FROM baiviet 
    ORDER BY idbv DESC";
    return mysql_query($sql);
    }
    */
    function pagination($sql)
    {
        $kq        = $this->db->query($sql); //var_dump($kq);die;
        $totalrow  = $kq->num_rows;
        $totalpage = ceil($totalrow / 5);
        //settype($totalpage,"int");
        return $totalpage;
    }
    function pagination_article()
    {
        $sql = "select * from baiviet ";
        return model_admin::pagination($sql);
    }
    
    function pagination_catagory()
    {
        $sql = "select * from phanloaibai";
        return model_admin::pagination($sql);
        //settype($totalpage,"int");
    }
    function pagination_account()
    {
        $sql = "select * from users ";
        return model_admin::pagination($sql);
    }
    
    
    function baiviet_list($per_page = 1)
    {
        $per_page = $per_page - 1;
        $LIMIT    = $per_page * 5;
        $offset   = 5;
        $orderby  = "ngay DESC, idbv DESC";
        $sql      = "select * from baiviet 
        ORDER BY $orderby LIMIT $LIMIT,$offset";
        if (!$kq = $this->db->query($sql))
            die($this->db->error);
        $data = array();
        while ($row = $kq->fetch_assoc())
            $data[] = $row;
        
        $sql = "SELECT count(*) from baiviet";
        if (!$rs = $this->db->query($sql))
            die($this->db->error);
        $row = $rs->fetch_row();
        //$totalrows=$row[0];        
        return $data;
    }
    function pageslistbv($baseurl, $totalrows, $offset, $per_page, $currentpage) //offset: số bài trước và sau
    {
        $totalpages = ceil($totalrows / $per_page);
        $from       = $currentpage - $offset;
        $to         = $currentpage + $offset;
        if ($from <= 0)
            $from = 1;
        if ($to > $totalpages)
            $to = $totalpages;
        $links = "";
        // $idbv = $this->params[0];
        for ($j = $from; $j <= $to; $j++) {
            if ($j == $currentpage) {
                $links = $links . "<span>$j</span>";
            } //trường hợp page hiện tại ko click đc
            else {
                $links = $links . "<a href='$baseurl/$j'>$j</a>";
            } //link page trc và sau bấm đc
        }
        return $links;
    } //function
    // ham chuyen ve ki tu khong dau
    function stripUnicode($str)
    {
        if (!$str)
            return false;
        $unicode = array(
            'a' => 'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ|́á|á|ạ|á|à|ạ',

            'A' => 'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
            'd' => 'đ',
            'D' => 'Đ',
            'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
            'E' => 'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
            'i' => 'í|ì|ỉ|ĩ|ị|í',
            'I' => 'Í|Ì|Ỉ|Ĩ|Ị',
            'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|ò',
            'O' => 'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
            'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|ụ',
            'U' => 'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
            'y' => 'ý|ỳ|ỷ|ỹ|ỵ',
            'Y' => 'Ý|Ỳ|Ỷ|Ỹ|Ỵ'
        );
        foreach ($unicode as $khongdau => $codau) {
            $arr = explode("|", $codau);
            $str = str_replace($arr, $khongdau, $str);
        }
        return $str;
    }
    
    
    
    function changeTitle($str)
    {
        $str = $this->stripUnicode($str);
        $str = str_replace(array(
            "'",
            '"',
            "&",
            "?",
            "+",
            "%",
            "#",
            "“",
            "”",
            "(",
            ")",
            "–",
            "“",
            "”",
            "…",
            ","
        ), "", $str);
        $str = str_replace(array(
            "ā",
            "ī",
            "ṭ",
            "ṇ",
            "ḍ",
            "ð",
            "Ð",
            "ō"
        ), array(
            "a",
            "i",
            "t",
            "n",
            "d",
            "d",
            "d",
            "o"
        ), $str);
        $str = str_replace("-", " ", $str);
        $str = trim($str);
        while (strpos($str, '  ') > 0)
            $str = str_replace("  ", " ", $str);
        $str = mb_convert_case($str, MB_CASE_LOWER, 'utf-8');
        $str = str_replace(" ", "-", $str);
        
        return $str;
    }
    
    
    function baiviet_them($array = array())
    {
        $iduser  = 21;//$_SESSION['login_id'];
        //$ngonngu = $array['lang'];
        $tieude  = trim(strip_tags($array['TieuDe']));
        $tomtat  = trim(strip_tags($array['TomTat']));
        $urlhinh = trim(strip_tags($array['urlHinh']));
        $nd     = $array['Content'];
        $anhien = $array['AnHien'];
        settype($anhien, "int");
        $noibat = $array['NoiBat'];
        settype($noibat, "int");
        $cha = $array['idLoai'];
        settype($cha, "int");
        $alias = $this->changeTitle($tieude);
        $sql   = "INSERT INTO baiviet SET idUser= ?,TieuDe=?,TomTat=?,urlHinh=?,Content=? , AnHien=?,NoiBat=?,idLoai=?,Alias=?,Ngay=now()";
        $st    = $this->db->prepare($sql);
        $st->bind_param('issssiiis', $iduser,$tieude,$tomtat,$urlhinh,$nd,$anhien,$noibat,$cha,$alias);
        $st->execute();
        $idbv = $st->insert_id;
        return $idbv;
    }
	
    function baiviet_sua($id)
    {
        $iduser  = $_POST['idUser']; //$_SESSION['login_id'];
        $tieude  = trim(strip_tags($_POST['TieuDe']));
        $tomtat  = trim(strip_tags($_POST['TomTat']));
        $urlhinh = trim(strip_tags($_POST['urlHinh']));
        $nd      = $_POST['Content'];
        $anhien  = $_POST['AnHien'];
        settype($anhien, "int");
        $noibat = $_POST['NoiBat'];
        settype($noibat, "int");
        $cha = $_POST['idLoai'];
        settype($cha, "int");
        $alias = $this->changeTitle($tieude);
        $sql   = "UPDATE baiviet SET TieuDe=?, Alias=?,TomTat=?, urlHinh=?, Content=?, AnHien=?, NoiBat=?,                                 idLoai=?, idUser= ?, Ngay=now() where idbv=?";
        $st    = $this->db->prepare($sql);
        $st->bind_param('sssssiiii', $tieude, $alias, $tomtat, $urlhinh, $nd, $anhien, $noibat, $cha, $iduser, $id);
        $st->execute();
        //$idbv = $st->insert_id;
        //return $idbv;
        
    }
    function update($sql)
    {
        return $this->db->query($sql);
    }
    
    public function chitietbaiviet($id)
    {
        settype($id, "int");
        $sql = "SELECT * FROM baiviet WHERE idbv=$id"; //var_dump($sql);die;
        if (!$kq = $this->db->query($sql))
            die($this->db->error);
        if (!$kq)
            return FALSE;
        $data = $kq->fetch_assoc();
        //var_dump($data);die;
        return $data;
    }
    public function chitiettaikhoan($id)
    {
        settype($id, "int");
        $sql = "SELECT * FROM users WHERE idUser=$id"; //var_dump($sql);die;
        if (!$kq = $this->db->query($sql))
            die($this->db->error);
        if (!$kq)
            return FALSE;
        $data = $kq->fetch_assoc();
        //var_dump($data);die;
        return $data;
    }
    
    function baiviet_xoa($id)
    {
        settype($id, "int");
        $sql = "DELETE FROM baiviet WHERE idbv=" . $id;
        if (!$kq = $this->db->query($sql))
            die($this->db->error);
    }
    
    
    function loaibaiviet_list($per_page = 1)
    {
        $per_page = $per_page - 1;
        $LIMIT    = $per_page * 5;
        $offset   = 5;
        settype($orderby, "int");
        $orderby_str = "idcha ASC, idloai DESC";
        $sql         = "select * from phanloaibai ORDER BY $orderby_str LIMIT $LIMIT, $offset";
        if (!$kq = $this->db->query($sql))
            die($this->db->error);
        $data = array();
        while ($row = $kq->fetch_assoc())
            $data[] = $row;
        
        $sql = "SELECT count(*) from phanloaibai";
        if (!$rs = $this->db->query($sql))
            die($this->db->error);
        $row       = $rs->fetch_row();
        $totalrows = $row[0];
        return $data;
    }
    
    function laytenloaibaiviet($id)
    {
        settype($id, "int");
        $sql = "SELECT TenLoai FROM phanloaibai WHERE idloai=" . $id;
        if (!$kq = $this->db->query($sql))
            die($this->db->error);
        if ($kq->num_rows > 0) {
            $row = $kq->fetch_row();
            return $row[0];
        } else
            return "Không có";
    }
    function laytentaikhoan($id)
    {
        settype($id, "int");
        $sql = "SELECT Username FROM users WHERE idUser=" . $id;
        if (!$kq = $this->db->query($sql))
            die($this->db->error);
        if ($kq->num_rows > 0) {
            $row = $kq->fetch_row();
            return $row[0];
        } else
            return "khong co";
    }
    function phanquyen($id)
    {
        settype($id, "int");
        $sql = "SELECT idGroup FROM users WHERE idGroup = 1 AND idUser=" . $id; //var_dump($sql);die;
        if (!$kq = $this->db->query($sql))
            die($this->db->error);
        if ($kq->num_rows > 0) {
            $row = $kq->fetch_row();
            return $row[0];
        } else
            return "0";
    }
    
    function demsobaiviettrongloai($id)
    {
        settype($id, "int");
        $sql = "SELECT count(*) FROM baiviet WHERE idloai=" . $id;
        if (!$kq = $this->db->query($sql))
            die($this->db->error);
        if (isset($kq) && $kq->num_rows > 0) {
            $row = $kq->fetch_row();
            return $row[0];
        } else
            return 0;
    }
    
    function demloaicon($id)
    {
        settype($id, "int");
        $sql = "SELECT count(*) FROM phanloaibai WHERE idCha=" . $id;
        if (!$kq = $this->db->query($sql))
            die($this->db->error);
        if (isset($kq) && $kq->num_rows > 0) {
            $row = $kq->fetch_row();
            return $row[0];
        } else
            return 0;
    }
    
    
    function demtongsobaiviet()
    {
        $sql = "SELECT count(*) FROM baiviet";
        if (!$kq = $this->db->query($sql))
            die($this->db->error);
        if (isset($kq) && $kq->num_rows > 0) {
            $row = $kq->fetch_row();
            return $row[0];
        } else
            return 0;
    }
    function demtongsoloaibaiviet()
    {
        $sql = "SELECT count(*) FROM phanloaibai";
        if (!$kq = $this->db->query($sql))
            die($this->db->error);
        if (isset($kq) && $kq->num_rows > 0) {
            $row = $kq->fetch_row();
            return $row[0];
        } else
            return 0;
    }
    
    
    function loaibaiviet_them($array = array())
    {
        $tenloai = $array['TenLoai'];
        $anhien  = $array['AnHien'];
        settype($anhien, "int");
        $thutu = $array['ThuTu'];
        settype($thutu, "int");
        $cha = $array['idCha'];
        settype($cha, "int");
        //$mota= strip_tags($array['mota']);        
        $alias = $this->changetitle($tenloai);
        $sql   = "INSERT INTO phanloaibai SET TenLoai=?, Alias=? ,AnHien=?, ThuTu=?, idCha=? ";
        $st    = $this->db->prepare($sql);
        $st->bind_param('ssiii', $tenloai, $alias, $anhien, $thutu, $cha);
        $st->execute();
        $idloai = $st->insert_id;
        return $idloai;
    }
    
    
    
    
    function loaibaiviet_sua($id)
    {
        $tenloai = $_POST['TenLoai'];
        $anhien  = $_POST['AnHien'];
        settype($anhien, "int");
        $thutu = $_POST['ThuTu'];
        settype($thutu, "int");
        $cha = $_POST['idCha'];
        settype($cha, "int");
        $alias = $this->changeTitle($tenloai);
        $sql   = "UPDATE phanloaibai SET TenLoai=?, Alias=?, AnHien=?, ThuTu=?, idCha=? WHERE idloai=? ";
        $st    = $this->db->prepare($sql);
        $st->bind_param('ssiiii', $tenloai, $alias, $anhien, $thutu, $cha, $id);
        $st->execute();
        //$idbv = $st->insert_id;
        //return $idbv;
    }
    
    
    
    public function chitietloaibaiviet($id)
    {
        settype($id, "int");
        $sql = "SELECT * FROM phanloaibai WHERE idloai=$id";
        if (!$kq = $this->db->query($sql))
            die($this->db->error);
        if (!$kq)
            return FALSE;
        $data = $kq->fetch_assoc();
        return $data;
    }
    function loaibaiviet_xoa($id)
    {
        settype($id, "int");
        $sql = "DELETE FROM phanloaibai WHERE idloai=" . $id;
        if (!$kq = $this->db->query($sql))
            die($this->db->error);
    }
    
    
    function account_list($per_page = 1)
    {
        $per_page = $per_page - 1;
        $LIMIT    = $per_page * 5;
        $offset   = 5;
        settype($orderby, "int");
        $orderby_str = "NgayDangKy DESC, idUser DESC";
        $sql         = "select * from users ORDER BY $orderby_str LIMIT $LIMIT, $offset";
        if (!$kq = $this->db->query($sql))
            die($this->db->error);
        $data = array();
        while ($row = $kq->fetch_assoc())
            $data[] = $row;
        $sql = "SELECT count(*) from users";
        if (!$rs = $this->db->query($sql))
            die($this->db->error);
        $row       = $rs->fetch_row();
        $totalrows = $row[0];
        return $data;
    }
    function account_add($array = array())
    {
        $hoten    = $array['HoTen'];
        $username = $array['Username'];
        $password = $array['Password'];
        
        $dienthoai = $array['Dienthoai'];
        $email     = $array['Email'];
        $idGroup   = $array['idGroup'];
        settype($idGroup, "int");
        $sql = "INSERT INTO users SET HoTen=?, Username=?,Password=?, Dienthoai=?, Email=?, idGroup=?, NgayDangKy=now()";
        $st  = $this->db->prepare($sql);
        $st->bind_param('sssisi', $hoten, $username, $password, $dienthoai, $email, $idGroup);
        $st->execute();
        $idUser = $st->insert_id;
        return $idUser;
    }
    function account_edit($id)
    {
        $hoten     = trim(strip_tags($_POST['HoTen']));
        $username  = trim(strip_tags($_POST['Username']));
        $password  = trim(strip_tags($_POST['Password']));
        $dienthoai = $_POST['Dienthoai'];
        $email     = $_POST['Email'];
        $idGroup   = $_POST['idGroup'];
        settype($idGroup, "int");
       // $sql= "UPDATE users SET  HoTen=?, Username=?,Password=?, Dienthoai=?, Email=?, idGroup=?, NgayDangKy=now() where idUser=? ";//var_dump($sql);die;
        $sql = "UPDATE users SET  HoTen='$hoten', Username='$username',Password='$password', Dienthoai=$dienthoai, Email='$email ', idGroup=$idGroup , NgayDangKy=now() where idUser=$id "; //var_dump($sql);die;
        $st  = $this->db->prepare($sql);
        $st->bind_param('sssisii', $hoten, $username, $password, $dienthoai, $email, $idGroup, $id);
        $st->execute();
        //$idbv = $st->insert_id;
        //return $idbv;   
    }
	
    
    
    function account_delete($id)
    {
        settype($id, "int");
        $sql = "DELETE FROM users WHERE idUser=" . $id;
        if (!$kq = $this->db->query($sql))
            die($this->db->error);
    }
	function lay_idloai(){
		$sql = "select idLoai from baiviet";
		if (!$kq = $this->db->query($sql))
            die($this->db->error);
			 if (!$kq)
            return FALSE;
        $data = $kq->fetch_assoc();
        return $data;
		}
}

?>