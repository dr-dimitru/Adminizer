<div id="fb-root"></div>
<script>
(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/<?= $fb_lang ?>/all.js#xfbml=1&appId=367108623351010";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
<header class="">
	<div onclick="location.href='<?= SITE_URL ?>'">
		<ul class="thumbnails">
			<li class="span8" style="margin:0px auto; float:none">
				<a href="<?= SITE_URL ?>" class="thumbnail">
					<img src="<?= SITE_URL ?>/img/logo_hi.png" alt="adminizer_logo" title="adminizer_logo" />
				</a>
		   </li>
		</ul>
	</div>
</header>

<div class="content_container">
<div class="cc_top"></div>
<div class="container" style="position:relative;">
	<div class="bs-links">
		<ul class="quick-links" style="text-transform:uppercase; font-size:12px; font-weight: bold;">
			<li>
			<?if($lang_code == 'ru'){?>
				<span class="label label-info">Русская Версия</span>
			<?}else{?>
				<a href="<?= SITE_URL ?>/?ru=1" style="position:relative; top:3px">Русская Версия</a>
			<?}?>
			</li>
			<li>
			<?if($lang_code == 'en'){?>
				<span class="label label-info">English Version</span>
			<?}else{?>
				<a href="<?= SITE_URL ?>/?en=1" style="position:relative; top:3px">English Version</a>
			<?}?>
			</li>
		</ul>
		<ul class="quick-links" onclick=" _gaq.push(['_trackEvent', 'github', 'go_to_github', 'View on GitHub']);">
		    <li>
			    <iframe class="github-btn" src="http://ghbtns.com/github-btn.html?user=dr-dimitru&repo=Adminizer&type=watch&count=true&size=large" allowtransparency="true" frameborder="0" scrolling="0" width="130px" height="30px"></iframe>
			</li>
			<li>
			    <iframe class="github-btn" src="http://ghbtns.com/github-btn.html?user=dr-dimitru&repo=Adminizer&type=fork&count=true&size=large" allowtransparency="true" frameborder="0" scrolling="0" width="120px" height="30px"></iframe>
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
			<li class="g-plusone" data-size="medium" data-href="<?= SITE_URL ?>"></li>
			<li class="tweet-btn" style="top: -3px;">
				<div class="fb-like" data-href="<?= SITE_URL ?>" data-send="false" data-layout="button_count" data-width="120" data-show-faces="false"></div>
			</li>
		</ul>
	</div>
	<div class="pull-right" id="user_login_logout">
	<h6>
	<?
		if(!$_SESSION['user'])
		{?>
			<a href="#login_form" data-toggle="modal"><?= $main_class->getContent('login_word'); ?></a> | <a href="#registration_form" data-toggle="modal"><?= $main_class->getContent('registration_word'); ?></a>
		<?}
		else
		{?>
			<?= $_SESSION['user']['name'] ?> | <a id="logout_href" href="#" onclick="shower('user_logout.php', 'logout_href', 'user_login_logout')"><?= $main_class->getContent('logout_word'); ?></a>
		<?}?>
	</h6>
	</div>
</div>