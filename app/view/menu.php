<div id="menu">
  <ul class="menu">
  	<li>
  <a href="#" class="parent"><span>Tin Tức</span></a>
  <div>
  <ul>
   <?php  foreach( $this->cacloai as $loai) { ?>
  <li>
  <a href="" class="parent"><span><?=$loai['tenloai'];?></span></a>
  <div>
        <ul>
		<?php
        $cacloaicon=$this->bv->cacloaicon($loai["idloai"]);
		foreach($cacloaicon as $lc){ ?>
          <li> <a href="<?=BASE_DIR.$this->lang?>/baiviet/cat/<?=$lc["idloai"]; ?>" class="parent"><span><?=$lc["tenloai"]; ?></span></a></li>
		<?php } ?>
        </ul>
      </div>
  </li>
  <?php } ?>
  </ul>
  </div>
  </li>
  <li><a href="#" class="grand"><span>Sản Phẩm</span></a></li>
 <li><a href="#" class="grand"><span>Giới Thiệu</span></a></li>
 <li><a href="#" class="grand"><span>Địa Chỉ</span></a></li>
 <li><a href="#" class="grand"><span>Dịch Vụ</span></a></li>
 <li><a href="#" class="grand"><span>Liên Hệ</span></a></li>
  
  
  </ul>
</div>