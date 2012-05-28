<?php 
require_once 'main_class.php';
$main_class->logout();
?>
<h2><?= $main_class->getContent('success_logout'); ?></h2>
<script type="text/javascript">
	location.replace("<?= SITE_URL ?>/admin");
</script>