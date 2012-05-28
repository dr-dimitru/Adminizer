<header class="row wellPic">
	<div onclick="location.href='<?= SITE_URL ?>'">
		<ul class="thumbnails">
			<li class="span8" style="margin:0px auto; float:none">
				<a href="<?= SITE_URL ?>" class="thumbnail">
					<img src="img/logo_hi.png" />
				</a>
		   </li>
		</ul>
	</div>
</header>
<div class="container" style="position:relative;">
	<div class="bs-links">
		<ul class="quick-links">
			<li>
				<a href="./?ru=1">Русская Версия</a>
			</li> |
			<li>
				<a href="./?en=1">English Version</a>
			</li>
		</ul>
		<ul class="quick-links">
			<li class="follow-btn">
				<a href="https://twitter.com/VeliovGroup" class="twitter-follow-button" data-link-color="#0069D6" data-show-count="true">Follow @VeliovGroup</a>
			</li>
			<li class="follow-btn">
				<a href="https://twitter.com/smart_egg" class="twitter-follow-button" data-link-color="#0069D6" data-show-count="true">Follow @smart_egg</a>
			</li>
			<li class="tweet-btn">
				<a href="https://twitter.com/share" class="twitter-share-button" data-url="<?= SITE_URL ?>" data-count="horizontal" data-via="VeliovGroup" data-related="<?= $value['post_title']; ?>">Tweet</a>
			</li>
			<li class="g-plusone" data-size="medium"></li>
			<li class="tweet-btn" style="top: -3px;">
				<div class="fb-like" data-href="<?= SITE_URL ?>" data-send="false" data-layout="button_count" data-width="120" data-show-faces="false"></div>
			</li>
		</ul>
	</div>
</div>
<div id="fb-root"></div>
<script>
(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/<?= $fb_lang ?>/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
<script type="text/javascript">
	window.___gcfg = {
	  lang: '<?= $googl_lang ?>',
	  parsetags: 'onload'
	};
	
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>