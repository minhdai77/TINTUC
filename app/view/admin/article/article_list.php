<div class="right">
<a href="<?=BASE_DIR?>vi/admin/baiviet_them" target="_blank"><input style="background-color:#9F3" type="button" value="Thêm Bài Viết" class="button"></a>
<table width="969" height="550" border="1">
    <tr style="background: #0FC">
    <td ><div align="center">Mã bài viết</div></td>
	<td ><div align="center">Ngôn Ngữ</div></td>
	<td><div align="center">Tiêu đề</div></td>
	<td><div align="center">Tóm Tắt</div></td>	
	<td>Thời gian</div></td>
	   <td><div align="center">Người đăng</div></td>
    <td><div align="center">Mã loại tin</div></td>
    <td><div align="center">Nổi Bật</div></td>
    <td><div align="center">Ẩn Hiện</div></td>
	   <td colspan="2"><div align="center">Quản Lí</div>
       </td>
    </tr>
    
    <?php 
	foreach($rows as $row){
	//$row = $this->qt->baiviet_list();
	//while($row = mysql_fetch_array($dsbaiviet)){
		
	?>
  <tr>
    <td><?php echo $row['idbv'];?></td>
    <td><?php echo $row['lang'];?></td>
    <td><?php echo $row['TieuDe'];?></td>
	<td><?php echo $row['TomTat'];?></td>
	<td><?php echo $row['Ngay'];?></td>
	<td><?php echo $row['idUser'];?></td>
	<td><?php echo $row['idLoai'];?></td>
	<td><?php echo $row['NoiBat'];?></td>
	<td><?php echo $row['AnHien'];?></td>
    <td width="32"><div align="center"><a href="<?=BASE_DIR?>vi/admin/baiviet_sua/?id=<?php echo $row['idbv']; ?>" >Sửa</div></a></td>
    <td width="32"><div align="center"><a href="<?=BASE_DIR?>vi/admin/baiviet_xoa/?id=<?php echo $row['idbv']; ?>" >Xóa</div></a></td>
         
  </tr>
    <?php
	}
    ?>
</table>
    <div id="thanhphantrang">
    <?php if(($from+2) >3)
	{?>
    <a <?php if( $from == $_GET['page']) echo" style = 'background-color:red' "; ?> href="/tintuc/vi/admin/baiviet_list/?page=1"><<
</a>
    <?php } ?>
<?php for($j=$from;$j<=$to;$j++)
{
?>
<a <?php if($j == $_GET['page']) echo" style = 'background-color:red' "; ?> href="/tintuc/vi/admin/baiviet_list/?page=<?php echo $j?>"><?php echo $j; ?>
</a> 
<?php } ?>
<?php if($to <$totalpage)
	{?>
    <a <?php if($j == $_GET['page']) echo" style = 'background-color:red' "; ?> href="/tintuc/vi/admin/baiviet_list/?page=<?php echo $totalpage?>">>>
</a>
    <?php } ?>
</div>
    </div>
</div>
