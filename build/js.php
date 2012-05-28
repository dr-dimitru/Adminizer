<? require_once 'user_class.php'; ?>
<script>
function shower(p,load_el,out_el,append){
	
	if(append)
	{
		var prev_load_el = $('#'+load_el).html();
	}
	
	$.ajax({
	  type: "GET",
	  url: p
	}).done(function( html ) {
		if(append)
		{
			$('#'+load_el).html(prev_load_el);
			$('#'+out_el).append(html);
		}
		else
		{
			$('#'+out_el).html(html);
		}
	});
	
	
	$('#'+load_el).html('<?= $main_class->getSiteSettings('default_loader'); ?>');
}

function showerp(q, p, load_el, out_el, append){
	
	q = q.replace(/\n/g, '<br>');
	
	if(append)
	{
		var prev_load_el = $('#'+load_el).html();
	}
	
	$.ajax({
	  type: "POST",
	  url: p,
	  data: 'data='+encodeURIComponent(q),
	}).done(function( html ) {
		if(append)
		{
			$('#'+load_el).html(prev_load_el);
			$('#'+out_el).append(html);
		}
		else
		{
			$('#'+out_el).html(html);
		}
	});

	$('#'+load_el).html('<?= $main_class->getSiteSettings('default_loader'); ?>');
}

function showerp_alert(q, p, load_el, out_el, message, append){
	var message = confirm(message);
	if (message==true)
	{
		q = q.replace(/\n/g, '<br>');
		
		if(append)
		{
			var prev_load_el = $('#'+load_el).html();
		}
		
		$.ajax({
		  type: "POST",
		  url: p,
		  data: 'data='+encodeURIComponent(q),
		}).done(function( html ) {
			if(append)
			{
				$('#'+load_el).html(prev_load_el);
				$('#'+out_el).append(html);
			}
			else
			{
				$('#'+out_el).html(html);
			}
		});
	
		$('#'+load_el).html('<?= $main_class->getSiteSettings('default_loader'); ?>');
	}
}
</script>