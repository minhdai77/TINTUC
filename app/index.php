<?php 
session_start();
require_once "config.php";


$lang='vi'; //website đa ngôn ngữ
$url = $_SERVER['REQUEST_URI']; //Lấy nguyên cái thanh địa chỉ.
$cname =""; $action=""; $params = NULL; //Khởi tạo.
$kq = tach_url($url,$lang, $cname, $action, $params); //Xem hàm này ở dưới.

//Kiểm tra class có tồn tại hay không, tham số thứ 2 (true), giúp php biết nếu không tồn tại thì chạy hàm autoload.
if (class_exists($cname,true)==true) 
{
	$c = new $cname($action, $params, $lang);
}
else 
{
	die('Khong co controller ' . $cname);
}

require "lang_$lang.php";
ob_start(); //khởi động internal buffer
//Kiểm tra action có tồn tại hay không.
if (method_exists($c,$action)) 
{
	$c ->$action();
}
else 
{
	die('Không có action '.$action);
}
$str=ob_get_clean(); //toàn bộ dữ liệu html của cả trang web trong biến str
$str = str_replace("{SiteTitle}" , SiteTitle , $str);
$str = str_replace("{BaiXN}" , BaiXN , $str);
$str = str_replace("{DangNhap}" , DangNhap, $str);
$str = str_replace("{UserName}" , UserName, $str);
$str = str_replace("{Password}" , Password, $str);
$str = str_replace("{Remember}" , Remember, $str);
$str = str_replace("{Register}" , Register, $str);
$str = str_replace("{ForgotPassword}" , ForgotPassword, $str);
$str = str_replace("{ChangePassword}" , ChangePassword, $str);
$str = str_replace("{Logout}" , Logout, $str);
echo $str;


function __autoload($class_name) {
   $filename = "class/".$class_name . '.php';
   if (file_exists($filename)) require_once($filename); 
}//autoload

//Dấu & xem lại tham trị, tham biến.
function tach_url($url, &$lang,  &$cname, &$action, &$params){
	//Tách URL thành array, nếu URL ngắn quá không đủ tham số thì không xử lý.
	$arr = explode("/", $url); if (count($arr)<=2) return FALSE;
	
	$lang= isset($arr[2]) ? $arr[2] : 'vi';
	if (in_array(  $lang, explode(',',NGONNGU)  )==false) $lang='vi';

	
	$cname = isset($arr[3]) ? $arr[3] : 'baiviet'; //Sau khi tách thì chỉ số mảng thứ 3 là class name.					
	if ($cname=="") //Nếu không có class name thì cho nó mặc định như bên dưới. 
	{  
   		$cname=DEFAULT_CONTROLLER; 
		$action=DEFAULT_ACTION; 
		$params=NULL;
		return TRUE; //cái này để ngưng, không chạy những cái bên dưới vì đã đủ tham số.
	}	
	
	$action = isset($arr[4]) ? $arr[4] : 'index'; //Sau khi tách thì chỉ số mảng thứ 4 là action.	
	if ($action=="") //Nếu không có action thì cho nó mặc định như bên dưới.
	{ 
		$action=DEFAULT_ACTION;	
		$params=NULL; 
		return TRUE; //cái này để ngưng, không chạy những cái bên dưới vì đã đủ tham số. 
	}
	
	array_shift($arr); 
	array_shift($arr);
	array_shift($arr); 
	array_shift($arr);
	array_shift($arr);
	//Cắt hết, cuối cùng ta còn mảng chứa những tham số (vd: id bài viết, ngôn ngữ v.v...).
	$params=$arr; 
	return TRUE; //Kết thúc.
} //tach_url
