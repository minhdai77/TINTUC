<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.5&appId=642160452601096";
  fjs.parentNode.insertBefore(js, fjs);
}
(document, 'script', 'facebook-jssdk'));
</script>

<div id="baiviet_ct">
  <h4  class="tieude"><a href="#">
    <?=$bai['tieude']?>
    </a></h4>
  <img src="<?=BASE_DIR?>img/<?=$bai['urlhinh'];?>" align=left width=140 height=100>
  <div class="xem"> Số lần xem:
    <?=$bai['solanxem']?>
    . 
    Ngày đăng:
    <?=date('d/m/Y',strtotime($bai['ngay']))?>
  </div>
  <div class="tomtat">
    <?=$bai['tomtat']?>
  </div>
  <hr>
  <div id="content">
    <?=$bai['content']?>
  </div>
  <div class="fb-comments" data-href="http://localhost:81/tintuc/vi/baiviet/detail" data-width="100%" data-numposts="5">
  </div>
  
  
  
</div>
