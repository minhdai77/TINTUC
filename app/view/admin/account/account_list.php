<div class="right">
   <input style="background-color:#9F3" type="button" value="Thêm Tài Khoản" class="button" onclick="location.href='<?=BASE_DIR?>vi/admin/account_add'">
   <table width="969" height="550" border="1">
      <tr style="background: #0FC">
         <td width="100">
            <div align="center">Mã Tài Khoản</div>
         </td>
         <td width="150">
            <div align="center">Họ Tên</div>
         </td>
         <td width="110">
            <div align="center">Username</div>
         </td>
         <td width="110">
            <div align="center">Password</div>
         </td>
         <td width="110">
            <div align="center">Điện Thoại</div>
         </td>
         <td width="110">
            <div align="center">Email</div>
         </td>
         <td width="110">
            <div align="center">Ngày Đăng Ký</div>
         </td>
         <td width="110">
            <div align="center">Phân Quyền</div>
         </td>
         <td colspan="2">
            <div align="center">Quản Lý</div>
         </td>
      </tr>
      <?php 
         foreach($rows as $row){
         //$row = $this->qt->baiviet_list();
         //while($row = mysql_fetch_array($dsbaiviet)){
         	
         ?>
      <tr>
         <td><?php echo $row['idUser'];?></td>
         <td><?php echo $row['HoTen'];?></td>
         <td><?php echo $row['Username'];?></td>
         <td><?php echo $row['Password'];?></td>
         <td><?php echo $row['Dienthoai'];?></td>
         <td><?php echo $row['Email'];?></td>
         <td><?php echo $row['NgayDangKy'];?></td>
         <td><?php echo $row['idGroup'];?></td>
         <td width="32">
            <div align="center"><a href="<?=BASE_DIR?>vi/admin/account_edit/?id=<?php echo $row['idUser']; ?>" >Sửa</div>
            </a>
         </td>
         <td width="32">
            <div align="center"><a href="<?=BASE_DIR?>vi/admin/account_delete/?id=<?php echo $row['idUser']; ?>" >Xóa</div>
            </a>
         </td>
      </tr>
      <?php
         }
            ?>
   </table>
   <div id="thanhphantrang">
      <?php if(($from+2) >3)
         {?>
      <a <?php if( $from == $_GET['page']) echo" style = 'background-color:red' "; ?> href="<?=BASE_DIR?>vi/admin/account_list/?page=1"><<
      </a>
      <?php } ?>
      <?php for($j=$from;$j<=$to;$j++)
         {
         ?>
      <a <?php if($j == $_GET['page']) echo" style = 'background-color:red' "; ?> href="<?=BASE_DIR?>vi/admin/account_list/?page=<?php echo $j?>"><?php echo $j; ?>
      </a> 
      <?php } ?>
      <?php if($to <$totalpage)
         {?>
      <a <?php if($j == $_GET['page']) echo" style = 'background-color:red' "; ?> href="<?=BASE_DIR?>vi/admin/account_list/?page=<?php echo $totalpage?>">>>
      </a>
      <?php } ?>
   </div>
</div>
</div>