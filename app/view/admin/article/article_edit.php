
<script type="text/javascript" src="<?=BASE_DIR?>/script/ckeditor/ckeditor.js"></script>
<div class="left">
    <form action="<?=BASE_DIR?>vi/admin/baiviet_sua" method="post">
        <table width="1024px" border="0">
          <tr>
            <td height="35" colspan="3"><div align="center">CHỨC NĂNG SỬA BÀI VIẾT</div></td>
          </tr>
		  <tr>
            <td width="90" height="31"><div align="left">Ngôn Ngữ</div></td>
             <td> <select name="lang">
       <option id="vi" value="vi">Tiếng Việt</option>
       <option id="en" value="en" <?php if($row['lang']=='en'){ ?>
		   selected
		  <?php } ?> >Tiếng Anh</option>
       </select></td>
          </tr>
		  <tr>
            <td width="90" height="31"><div align="left">Tiêu Đề</div></td>
            <td colspan="2"><input type="text" name="TieuDe" value="<?php echo $row['TieuDe']; ?>" /></td>
          </tr>
		   <tr>
            <td width="90" height="31"><div align="left">Tóm Tắt</div></td>
            <td colspan="20"><textarea name='TomTat' id='TomTat' class="TomTat"><?php echo $row['TomTat']; ?></textarea></td>
          	  <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'TomTat' );
            </script>
          </tr>
		  <tr>
            <td width="90" height="31"><div align="left">Địa Chỉ Hình</div></td>
            <td colspan="2"><input type="text" name="urlHinh" value="<?php echo $row['urlHinh']; ?>" /></td>
          </tr>
		  <tr>
            <td width="90" height="31"><div align="left">Content</div></td>
            <td colspan="2"><textarea name="Content" id="Content"> <?php echo $row['Content']; ?></textarea></td>
             <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'Content' );
            </script>
          </tr>
            <tr>
            <td width="90" height="31"><div align="left">Mã Loại Tin</div></td>
            <td colspan="2"><input type="text" name="idLoai" value="<?php echo $row['idLoai']; ?>"/></td>
          </tr>
		  <tr>
            <td width="90" height="31"><div align="left">Nổi Bật</div></td>
            <td colspan="2"><input type="text" name="NoiBat" value="<?php echo $row['NoiBat']; ?>"/></td>
          </tr>
		  <tr>
            <td width="90" height="31"><div align="left">Ẩn Hiện</div></td>
           <td > 
           	<input type="radio" name="AnHien" value="0" />Ẩn
            <input type="radio" name="AnHien" value="1" <?php if($row['AnHien']==0){ ?>
		   
		  <?php } ?> />Hiện
            <input type="text" name="id" value="<?php echo $id ?>" hidden="true"/>
           </td>
           
          </tr>
          <tr>
            <td width="90" height="31"><div align="left">Thêm Ý Kiến</div></td>
            <td colspan="2"><input type="text" name="ThemYKien" value="<?php echo $row['ThemYKien']; ?>"/></td>
          </tr>
          <tr>
            <td height="35">&nbsp;</td>
            <td width="73">
            <input type="hidden" name="action" value="update"/>
            <input name="btnsua" type="submit" id="btnsua" value="Cập Nhật Bài Viết"/>
            </td>
          
          </tr>
        </table>

    </form>
</div>
