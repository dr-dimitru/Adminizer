<body>
	<? require_once 'header.php' ?>
	
	<div id="main_container" class="container">
		<?
		if($id && $post)
		{
			require 'item_pattern.php';
		}
		else
		{
			require 'item_empty_pattern.php';
		}
		
		require_once 'posts_mozaic_static_container.php';
		?>
	</div>
	<? require_once 'footer.php'; ?>
</body>
</html>