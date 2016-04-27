
<script type="text/javascript" src="<?=BASE_DIR?>/script/ckeditor/ckeditor.js"></script>
<div class="left">
    <form action="<?=BASE_DIR?>vi/admin/loaibaiviet_them" method="post">
        <table width="1024px" border="0">
          <tr>
            <td height="35" colspan="3"><div align="center">CHỨC NĂNG THÊM LOẠI TIN MỚI</div></td>
          </tr>
          <tr>
            <td width="90" height="31"><div align="left">Ngôn Ngữ</div></td>
             <td> <select name="lang">
       <option id="vi" value="vi">Tiếng Việt</option>
       <option id="en" value="en">Tiếng Anh</option>
       </select></td>
          </tr>
		  <tr>
            <td width="90" height="31"><div align="left">Tên Loại Tin</div></td>
            <td colspan="2"><textarea name='TenLoai' id='TenLoai' class="TenLoai"></textarea></td>
          </tr>
		   <tr>
            <td width="90" height="31"><div align="left">Thứ Tự</div></td>
            <td colspan="20"><input type="text" name="ThuTu"/></td>
          	  <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace('TomTat');
            </script>
          </tr>
          <tr>
            <td width="90" height="31"><div align="left">Ẩn Hiện</div></td>
           <td > 
           	<input type="radio" name="AnHien" value="0">Ẩn
            <input type="radio" checked="checked" name="AnHien" value="1">Hiện
           </td>
           
          </tr>
		  <tr>
            <td width="90" height="31"><div align="left">Mã Loại Cha</div></td>
            <td colspan="2"><input type="text" name="idCha"/></td>
             <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'Content' );
            </script>
          </tr>
          <tr>
            <td height="35">&nbsp;</td>
            <td width="73">
            <input type="hidden" name="action" value="add"/>
            <input name="btnthem" type="submit" id="btnthem" value="Thêm Loại Bài Viết">
            </td>
          
          </tr>
        </table>

    </form>
</div>
