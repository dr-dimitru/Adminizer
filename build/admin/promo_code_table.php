<?
	require_once 'main_class.php';
	if(empty($promoCodes))
	{
		$promoCodes = $main_class->getPromoCodes();
	}
?>

<table class="table table-bordered table-striped">
	<thead>
		<tr>
			<th>
				<?= $main_class->getContent('promo_code_word'); ?>
			</th>
			<th>
				<?= $main_class->getContent('promo_used_word'); ?>
			</th>
			<th>
				<?= $main_class->getContent('promo_owner_word'); ?>
			</th>
		</tr>
	</thead>
	<tbody>
	<?
if($promoCodes)
{
	foreach($promoCodes as $key => $value)
	{
		if($value['used'] == 1)
		{
			$used_icon = "<i class='icon-ok'></i>";
		}
		else
		{
			$used_icon = " ";
		}
	?>
		<tr>
			<td>
				<?= $value['code'] ?>
			</td>
			<td>
				<?= $used_icon ?>
			</td>
			<td>
			<?
			if($value['owner'])
			{
				if($_SESSION["admin"] == 400)
				{
					list($email, $domen) = explode("@", $value['owner']);
					echo "******@".$domen;
				}
				else
				{
					echo $value['owner'];
				}
			}
			?>
			</td>
		</tr>
	<?
	}
}
?>
	</tbody>
</table>
