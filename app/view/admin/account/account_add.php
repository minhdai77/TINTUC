<script type="text/javascript" src="<?=BASE_DIR?>/script/ckeditor/ckeditor.js"></script>
<div class="left">
   <form action="<?=BASE_DIR?>vi/admin/account_add" method="post">
      <table width="1024px" border="0">
         <tr>
            <td height="35" colspan="3">
               <div align="center">CHỨC NĂNG THÊM TÀI KHOẢN MỚI</div>
            </td>
         </tr>
         <tr>
            <td width="90" height="31">
               <div align="left">Họ Tên</div>
            </td>
            <td colspan="2"><input type="text" name="HoTen"/></td>
         </tr>
         <tr>
            <td width="90" height="31">
               <div align="left">Tên Đăng Nhập</div>
            </td>
            <td colspan="2"><input type="text" name="Username"/></td>
         </tr>
         <tr>
            <td width="90" height="31">
               <div align="left">Mật Khẩu</div>
            </td>
            <td colspan="2"><input type="password" name="Password"/></td>
            <script>
               // Replace the <textarea id="editor1"> with a CKEditor
               // instance, using default configuration.
               CKEDITOR.replace( 'TomTat' );
            </script>
         </tr>
         <tr>
            <td width="90" height="31">
               <div align="left">Điện Thoại</div>
            </td>
            <td colspan="2"><input type="text" name="Dienthoai"/></td>
         </tr>
         <tr>
            <td width="90" height="31">
               <div align="left">Email</div>
            </td>
            <td colspan="2"><input type="text" name="Email"/></td>
         </tr>
         <tr>
            <td width="90" height="31">
               <div align="left">Mức Phân Quyền</div>
            </td>
            <td>
               <select name="idGroup">
                  <option id="1">1</option>
                  <option id="0">0</option>
               </select>
            </td>
         </tr>
         <tr>
            <td height="35">&nbsp;</td>
            <td width="73">
               <input type="hidden" name="action" value="add"/>
               <input name="btnadd" type="submit" id="btnadd" value="Thêm Tài Khoản">
            </td>
         </tr>
      </table>
   </form>
</div>