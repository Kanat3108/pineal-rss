<?php 
	include_once('m/rsses.php');
	$rsses = rsses_all();

?>

<div class="wrap">
	<h1 class="wp-heading-inline">RSS Sources</h1>
	<a href="<?php $_SERVER['PHP_SELF']?>?page=pineal_rsses&c=add" class="page-title-action">Add RSS</a>
	<hr class="wp-header-end">
	<table class="wp-list-table widefat fixed striped posts">
		<thead>
			<tr>
				<th scope="col" id="title" class="manage-column column-title column-primary sortable desc">
					<a><span>Name</span></a>
				</th>
				<th scope="col" id="title" class="manage-column column-title column-primary sortable desc">
					<a><span>Shortcode</span></a>
				</th>

				<th scope="col" id="title" class="manage-column column-feed-count column-primary sortable desc">
					<a><span>Count RSS</span></a>
				</th>
				<th scope="col" id="title" class="manage-column column-state column-primary sortable desc">
					<a><span>Images</span></a>
				</th>
				<th scope="col" id="title" class="manage-column column-state column-primary sortable desc">
					<a><span>Authors</span></a>
				</th>
				<th scope="col" id="title" class="manage-column column-state column-primary sortable desc">
					<a><span>Dates</span></a>
				</th>
			</tr>
		</thead>
		<tbody id="the-list">
			<?php foreach ((array) $rsses as $rs) : ?>
			<tr id="" >
				<td>
					<strong><a href="<?=$_SERVER['PHP_SELF'] ?>?page=pineal_rsses&c=edit&id=<?=$rs['id_rss'] ?>"><?=$rs['name_rss']?></a></strong>
				</td>
				<td>
					<strong><a href="<?=$_SERVER['PHP_SELF'] ?>?page=pineal_rsses&c=edit&id=<?=$rs['id_rss'] ?>">[rss feed="<?=$rs['name_rss']?>"]</a></strong>
				</td>
				<td>
					<p>
						<span><?=$rs['count_rss']?></span>
					</p>
				</td>
				<td>
					<p>
						<?php if($rs['img_rss'] == 1){
							echo '<span style="color: green; font-weight:bold">YES</span>';
						}else{
							echo '<span style="color: red; font-weight:bold">NO</span>';
						} ?>
					</p>
				</td>
				<td>
					<p>
						<?php if($rs['author_rss'] == 1){
							echo '<span style="color: green; font-weight:bold">YES</span>';
						}else{
							echo '<span style="color: red; font-weight:bold">NO</span>';
						} ?>
					</p>
				</td>
				<td>
					<p>
						<?php if($rs['date_rss'] == 1){
							echo '<span style="color: green; font-weight:bold">YES</span>';
						}else{
							echo '<span style="color: red; font-weight:bold">NO</span>';
						} ?>
					</p>
				</td>
			</tr>
			<?php endforeach;?>
		</tbody>
	</table>
</div>














