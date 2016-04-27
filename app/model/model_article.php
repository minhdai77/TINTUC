<?php
class model_article{
	public $db;
	public function __construct(){
		//Các tham số này ta đã định nghĩa ở file config.php.
		$this->db= new mysqli(HOST, USER_DB, PASS_DB, DB_NAME);	
		$this->db->set_charset("utf8");
	} //construct
	public function checkkq($sql){
		if(!$kq = $this->db->query($sql))
		die( $this->db->error);
		foreach ($kq as $row) $data[] = $row;
		return $data;
		}
	public function bainoibat($lang='vi',$sobai=5){
		$sql="SELECT idbv, tieude, urlhinh, tomtat FROM baiviet 
			WHERE lang='$lang' AND noibat=1 ORDER BY idbv DESC LIMIT 0, $sobai";
			return model_article::checkkq($sql);
		//if(!$kq = $this->db->query($sql))
		//die( $this->db->error);
		//foreach ($kq as $row) $data[] = $row;
		//return $data;
	}//bainoibat
	public function baixemnhieu($lang='vi',$sobai=5){
		$sql="SELECT idbv, tieude, urlhinh, tomtat FROM baiviet 
			WHERE lang='$lang' AND noibat=1 ORDER BY solanxem DESC LIMIT 0, $sobai";
			return model_article::checkkq($sql);
		//if(!$kq = $this->db->query($sql)) die( $this->db->error);
		//foreach ($kq as $row)
		//$data[] = $row;
		//return $data;
	}//baixemnhieu
	public function cacloai($lang='vi'){
		$sql="SELECT idloai, tenloai FROM phanloaibai WHERE lang='$lang' AND  anhien=1
			AND lang='$lang' AND idcha=0 ORDER BY thutu";
			return model_article::checkkq($sql);
	//	if(!$kq = $this->db->query($sql)) die( $this->db->error);
		//foreach ($kq as $row) $data[] = $row;
	//	return $data;
	}//cacloai
	public function cacloaicon($idcha){
		$sql="SELECT idloai, tenloai FROM phanloaibai WHERE idcha='$idcha' AND anhien=1 ORDER BY thutu";
		return model_article::checkkq($sql);
		//if(!$kq = $this->db->query($sql)) die( $this->db->error);
	//	foreach ($kq as $row) $data[] = $row;
	//	return $data;
	}//cacloaicon
	
	public function baimoitrongloai($id,$sobai=5){
		$sql="SELECT idbv, tieude, tomtat, urlhinh, ngay, solanxem FROM baiviet 
		  WHERE idloai IN(SELECT idloai FROM phanloaibai WHERE idloai=$id OR idcha=$id)
		  ORDER BY idbv DESC LIMIT 0,$sobai";
		  return model_article::checkkq($sql);
	//	if(!$kq = $this->db->query($sql)) die( $this->db->error);
	//	foreach ($kq as $row) $data[] = $row;
	//	return $data;
	}//baimoitrongloai

	public function detail($id){
		settype($id,"int");
		$sql="SELECT idbv, tieude, tomtat, urlhinh, ngay, solanxem, content 
			FROM baiviet WHERE idbv=$id";
		if (!$kq= $this->db->query($sql)) die($this->db->error);
		if (!$kq) return FALSE;
		return $kq->fetch_assoc();		
	}//detail

	public function baitrongloai($idLoai,$per_page=5, $startrow=0, &$totalrows){	
		$sql="SELECT idbv, tieude, urlhinh,SoLanXem, Ngay, tomtat FROM baiviet WHERE idloai=$idLoai
		AND anhien=1 ORDER BY idbv DESC LIMIT $startrow, $per_page";
		if(!$kq = $this->db->query($sql)) die( $this->db->error);
		foreach ($kq as $row) 
		$data[] = $row;
		
		$sql="SELECT count(*) FROM baiviet WHERE idloai=$idLoai AND anhien=1";
		if(!$rs = $this->db->query($sql)) die( $this->db->error);		
		$row = $rs->fetch_row();
		$totalrows=$row[0];		
		return $data;
	} //baitrongloai

		function pageslist($baseurl, $totalrows, $offset,$per_page, $currentpage){//offset: số bài trước và sau
		   $totalpages = ceil($totalrows/$per_page);
		   $from = $currentpage-$offset;
		   $to = $currentpage+$offset; 
		   if ($from<=0)
		    $from=1;
		   if ($to>$totalpages)
		    $to=$totalpages;
		   $links="";
		//   $idloai = $this->params[0];
		   for ($j=$from;$j<=$to;$j++) {
			if ($j==$currentpage)
			{
			 $links = $links . "<span>$j</span>"; 
			}//trường hợp page hiện tại ko click đc
			else
			{
			 $links = $links."<a href='$baseurl/$j'>$j</a>"; 
			}//link page trc và sau bấm đc
		   }
		   return $links;
	}//function
	
	



}//class
