<?php
// use app/model/model_baiviet;
 include("model/model_article.php");
class article {
	public $bv; //Biến này để tương tác với model.
	public $params; //Biến tham số.
	public $current_action;
	public $cname = "article";
	public $lang;
	public $cacloai;
	
	function __construct($action,$params, $lang){
		//Gọi Model.
		//$this->bv = new model;
		$this->bv = new model_article ; 
		
		//$this->current_action là cái biến ta đã khởi tạo $current_action.
		//Ta truyền cho nó cái $action bên index truyền qua.
		$this->current_action=$action; 
		
		//Tương tự như trên, nhưng là tham số.
		$this->params = $params;
		
		//Ngôn ngữ mặc định.
		$this->lang = $lang;
		
		//cacloai trong menu
		$this->cacloai = $this->bv->cacloai($this->lang);
		
	}//construct
	
	function index(){
		//$cacloai = $this->bv->cacloai($this->lang);
		$bainb = $this->bv->bainoibat($this->lang,4);
		$baixn = $this->bv->baixemnhieu($this->lang,10);
		require_once "view/home.php"; //nạp layout
	}//index
	
	function detail(){
		//Lấy tham số truyền đến từ index.		
		$id= $this->params[0];
		 
		//Ép kiểu/
		settype($id,"int"); 
		
		//Kiểm tra.
		if ($id<=0) return;
		
		//Gọi hàm bên Model.
		$bai = $this->bv->detail($id);
		require_once "view/home.php";
	}//detail
	
	function cat(){		
	  $idloai = $this->params[0]; //index for more infomation
	  $currentpage= $this->params[1]; 
	  settype($idloai,"int"); 
	  settype($currentpage,"int"); 
	  if ($idloai<=0) return; 
	  if ($currentpage<=0) 
	  $currentpage=1;	
	  $per_page=5; // so tin mot trang  
	  $totalrows=0; //tong so tin trong loai  
	  $start = ($currentpage-1) * $per_page; //mốc bắt đầu của LIMIT trong SELECT FROM Where
	  $listbai = $this->bv->baitrongloai($idloai,$per_page, $start,$totalrows);
	  require_once "view/home.php";
	}//cat
	
		 
	
 	function login(){
		if($_POST==NULL)
		header('location:'.BASE_URL);
	//	$kq = this->bv->xulydangnhap($_POST['email'], $_POST['password']);
		if($kq){
			$back=$_SESSION['back'];
			if($back="") header('location:'.BASE_URL);
			else{
		//		unset($_SESSION['back']) header('location:'.$back); 
				}
			}
			else{
				$_SESSION['login_error']="dang nhap khong thanh cong";
				header('location:'.BASE_URL. "article/login");
				}
		}


}//class
