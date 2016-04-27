<div id="menu">
  <ul class="menu">
  	<?php  foreach( $this->cacloai as $loai) { ?>
    <li><a href="#" class="parent"><span><?=$loai["tenloai"]; ?></span></a>
      <div>
        <ul>
		<?php
        $cacloaicon=$this->bv->cacloaicon($loai["idloai"]);
		foreach($cacloaicon as $lc){ ?>
          <li> <a href="<?=BASE_DIR.$this->lang?>/article/cat/<?=$lc["idloai"]; ?>" class="parent"><span><?=$lc["tenloai"]; ?></span></a></li>
		<?php } ?>
        </ul>
      </div>
    </li>
    <?php } ?>
  </ul>
</div>