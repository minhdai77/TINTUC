<script type="text/javascript" src="<?=BASE_DIR?>/script/ckeditor/ckeditor.js"></script>
<div class="left">
   <form action="<?=BASE_DIR?>vi/admin/baiviet_them" method="post">
      <table width="1024px" border="0">
         <tr>
            <td height="35" colspan="3">
               <div align="center">CHỨC NĂNG THÊM BÀI VIẾT MỚI</div>
            </td>
         </tr>
         <tr>
            <td width="90" height="31">
               <div align="left">Ngôn Ngữ</div>
            </td>
            <td>
               <select name="lang">
                  <option id="vi" value="vi">Tiếng Việt</option>
                  <option id="en" value="en">Tiếng Anh</option>
               </select>
            </td>
         </tr>
         <tr>
            <td width="90" height="31">
               <div align="left">Tiêu Đề</div>
            </td>
            <td><input type="text" name="TieuDe"/></td>
         </tr>
         <tr>
            <td width="90" height="31">
               <div align="left">Tóm Tắt</div>
            </td>
            <td><textarea name='TomTat' id='TomTat' class="TomTat"></textarea></td>
            <script>
               // Replace the <textarea id="editor1"> with a CKEditor
               // instance, using default configuration.
               CKEDITOR.replace( 'TomTat' );
            </script>
         </tr>
         <tr>
            <td width="90" height="31">
               <div align="left">Địa Chỉ Hình</div>
            </td>
            <td colspan="2"><input type="file" name="urlHinh"/></td>
         </tr>
         <tr>
            <td width="90" height="31">
               <div align="left">Content</div>
            </td>
            <td ><textarea name="Content" id="Content"></textarea></td>
            <script>
               // Replace the <textarea id="editor1"> with a CKEditor
               // instance, using default configuration.
               CKEDITOR.replace( 'Content' );
            </script>
         </tr>
         <tr>
            <td width="90" height="31">
               <div align="left">Mã Loại Tin</div>
            </td>
            <td>
               <input type="text" name="idLoai"/>
            </td>
         </tr>
         <tr>
            <td width="90" height="31">
               <div align="left">Nổi Bật</div>
            </td>
            <td><input type="text" name="NoiBat"/></td>
         </tr>
         <tr>
            <td width="90" height="31">
               <div align="left">Ẩn Hiện</div>
            </td>
            <td> 
               <input type="radio" name="AnHien" value="0">Ẩn
               <input type="radio" name="AnHien" value="1">Hiện
            </td>
         </tr>
         <tr>
            <td height="35">&nbsp;</td>
            <td width="73">
               <input type="hidden" name="action" value="add"/>
               <input name="btnadd" type="submit" id="btnadd" value="Thêm Bài Viết">
            </td>
         </tr>
      </table>
   </form>
</div>