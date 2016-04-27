<div class="right">
<input style="background-color:#9F3" type="button" value="Thêm Loại Bài Viết" class="button" onclick="location.href='<?=BASE_DIR?>vi/admin/loaibaiviet_them'">
<table width="969" height="550" border="1">
    <tr style="background: #0FC">
    <td ><div align="center">Mã loại tin</div></td>
    <td ><div align="center">Ngôn Ngữ</div></td>
	<td ><div align="center">Tên Loại Tin</div></td>
	<td><div align="center">Thứ Tự</div></td>
	<td><div align="center">Ẩn hiện</div></td>	
	   <td><div align="center">Mã loại cha</div></td>
  <!--  <td><div align="center">Số tin trong loại</div></td> -->
	   <td colspan="2"><div align="center">Quản Lí</div>
       </td>
    </tr>
    
    <?php 
	foreach($rows as $row){
	//$row = $this->qt->baiviet_list();
	//while($row = mysql_fetch_array($dsbaiviet)){
		
	?>
  <tr>
    <td><?php echo $row['idloai'];?></td>
     <td><?php echo $row['lang'];?></td>
    <td><?php echo $row['TenLoai'];?></td>
    <td><?php echo $row['ThuTu'];?></td>
	<td><?php echo $row['AnHien'];?></td>
	<td><?php echo $row['idCha'];?></td>
	<!-- <td><?php echo $row['sobai'];?></td>  -->
    <td width="32"><div align="center"><a href="<?=BASE_DIR?>vi/admin/loaibaiviet_sua/?id=<?php echo $row['idloai']; ?>" >Sửa</div></a></td>
    <td width="32"><div align="center"><a href="<?=BASE_DIR?>vi/admin/loaibaiviet_xoa/?id=<?php echo $row['idloai']; ?>" >Xóa</div></a></td>
         
  </tr>
    <?php
	}
    ?>
</table>
    <div id="thanhphantrang">
    <?php if(($from+2) >3)
	{?>
    <a <?php if( $from == $_GET['page']) echo" style = 'background-color:red' "; ?> href="<?=BASE_DIR?>vi/admin/loaibaiviet_list/?page=1"><<
</a>
    <?php } ?>
<?php for($j=$from;$j<=$to;$j++)
{
?>
<a <?php if($j == $_GET['page']) echo" style = 'background-color:red' "; ?> href="<?=BASE_DIR?>vi/admin/loaibaiviet_list/?page=<?php echo $j?>"><?php echo $j; ?>
</a> 
<?php } ?>
<?php if($to <$totalpage)
	{?>
    <a <?php if($j == $_GET['page']) echo" style = 'background-color:red' "; ?> href="<?=BASE_DIR?>vi/admin/loaibaiviet_list/?page=<?php echo $totalpage?>">>>
</a>
    <?php } ?>
</div>
    </div>
</div>
