<body>
	<? require_once 'header.php'; ?>
	
	<div id="main_container" class="container">
		<?
	if($value['post_access'] <= $user_access_level)
	{
		if($id && $post)
		{
			require 'item_pattern.php';
		}
		else
		{
			require 'item_empty_pattern.php';
		}
		
		require_once 'posts_mozaic_static_container.php';
	
	}
	else
	{
		require 'item_no_access_pattern.php';
	}
		?>
	</div>
	<? require_once 'footer.php'; ?>
</body>
</html>