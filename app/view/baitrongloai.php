<div id="baitrongloai">
<?php foreach($listbai as $row ){ ?>
<div class="motbai">
<img src="<?=BASE_DIR?>img/<?=$row['urlhinh']?>" align="left">
<h4><a href="<?=BASE_DIR.$this->lang;?>/article/detail/<?=$row['idbv'];?>"><?=$row['tieude'];?></a></h4>
<div class="xem">
  Ngày đăng: <?=date('d/m/Y',strtotime($row['Ngay']));?>
</div>
<p class="tomtat"><?=$row['tomtat'];?></p>
</div>
<?php } ?>
<div id="thanhphantrang">
<?=$this->bv->pageslist(BASE_DIR."vi/article/cat/$idloai", $totalrows, 3,5, $currentpage);?>
</div>

</div>