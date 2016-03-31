<div id="baixemnhieu">
<h4>{BaiXN}</h4>
<?php foreach ($baixn as $row) {?>
<p> <a href="<?=BASE_DIR.$this->lang;?>/baiviet/detail/<?=$row['idbv'];?>"> <?=$row['tieude'];?> </a> </p>
<?php } ?>
</div>
