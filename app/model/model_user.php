<?php
class model_user{
public $db;
public function __construct(){
	$this->db= new mysqli(HOST, USER_DB, PASS_DB, DB_NAME);	
	$this->db->set_charset("utf8");		
}//construct	

public function login($u, $p){
	$sql=sprintf("SELECT iduser, username, password,hoten FROM users 
	  WHERE username='%s' AND password='%s'",$u,md5($p));
	if(!$kq = $this->db->query($sql))
	 die( $this->db->error);
	if ($kq->num_rows==0)
	return false;
	$row = $kq->fetch_assoc();
	echo $login = array(
		'login_id'=>$row['iduser'],
		'login_user'=>$row['username'],
		'login_hoten'=>$row['hoten'],
		'login_level'=>$row['idgroup']
	);
	$_SESSION['authed_user'] = $login;
	//$_SESSION['login_id']=$row['iduser'];
	//$_SESSION['login_user']=$row['username'];
	//$_SESSION['login_hoten']=$row['hoten'];
	return true;

}//login

	


}//class
