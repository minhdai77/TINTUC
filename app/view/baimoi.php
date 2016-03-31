<div id="baimoi">
  <?php foreach($this->cacloai as $lt){?>
  <div class="rows">
    <h4><a href="<?=BASE_DIR.$this->lang;?>/baiviet/cat/<?=$lt['idloai']?>">
      <?=$lt['tenloai']?>
      </a></h4>
    <?php $idloai= $lt['idloai'];
	$bm = $this->bv->baimoitrongloai($idloai,4);?>
    <?php $bai=$bm[0];?>
    <div class="tindau"> <img src="<?=BASE_DIR?>img/<?=$bai['urlhinh'];?>" align=left />
      <div class="tieude"><a href="<?=BASE_DIR.$this->lang;?>/baiviet/detail/<?=$bai['idbv'];?>">
        <?=$bai['tieude'];?>
        </a></div>
      <div class="tomtat">
        <?=$bai['tomtat'];?>
      </div>
    </div>
    <div class="tintieptheo">
      <?php for($j =1; $j<count($bm); $j++) {$bai = $bm[$j]; ?>
      <p class="tieude"> <a href="<?=BASE_DIR.$this->lang;?>/baiviet/detail/<?=$bai['idbv'];?>">
        <?=$bai['tieude']?>
        </a></p>
      <?php }	//for $j?>
    </div>
  </div>
  <?php }?>
</div>
