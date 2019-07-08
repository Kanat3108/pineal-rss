<?php 
	include_once('m/rsses.php');
?>

<?php
	
	$id= (int)$_GET['id'];

	if($id == 0)
		die('Error, ID of RSS is incorrect');

	if(!empty($_POST)){
		if (isset($_POST['save'])) {
			if(rsses_edit($id, $_POST['title'], $_POST['content'], $_POST['count'], $_POST['color'], $_POST['img'], $_POST['author'], $_POST['date'])){
				die ('<div class="wrap">RSS saved successfully. Shortcode [rss feed="'. $_POST['title'] .'"]</div>');
			}else{
				die ('<div class="wrap">RSS saved successfully. Shortcode [rss feed="'. $_POST['title'] .'"]</div>');
			}
		}elseif (isset($_POST['delete'])) {
			if(rsses_delete($id)){
				die ('RSS deleted successfully');
			}
		}
			$title = $_POST['title'];
			$content = $_POST['content'];
			$count = $_POST['count'];
			$color = $_POST['color'];
			$img = $_POST['img'];
			$author = $_POST['author'];
			$date = $_POST['date'];
			$error = true;
	}else{
		$rss = rsses_get($id);
		$title = $rss['name_rss'];
		$content = $rss['url_rss'];
		$count = $rss['count_rss'];
		$color = $rss['color_rss'];
		$img = $rss['img_rss'];
		$author = $rss['author_rss'];
		$date = $rss['date_rss'];
		$error = false;
	}
?>

<div class="wrap">
	<h1 class="wp-heading-inline">Edit RSS Source</h1>
	<a class="page-title-action" href="<?php $_SERVER['PHP_SELF']?>?page=pineal_rsses&c=all">All RSS feeds</a>
	
	<form method="post">
		<div id="poststuff">
			<div id="post-body" class="metabox-holder columns-2">
				<div id="postbox-container-1" class="postbox-container">
					<div id="side-sortables" class="meta-box-sortables ui-sortable">
						<div id="submitdiv" class="postbox ">
							<button type="button" class="handlediv" aria-expanded="true">
								<span class="screen-reader-text">Toggle panel: Save Feed Source</span>
								<span class="toggle-indicator" aria-hidden="true"></span>
							</button>
							<h2 class="hndle ui-sortable-handle"><span>Save RSS Source</span></h2>
							<div class="inside">
								<div class="submitbox" id="submitpost">
									<div id="major-publishing-actions">
										<div id="publishing-action">
											<span class="spinner"></span>
											<input type="submit" name="save" value="Save" class="button button-primary button-large">
											<input type="submit" name="delete" value="Delete" class="button button-primary button-large">
										</div>
										<div class="clear"></div>
									</div>
								</div>

							</div>
						</div>
					</div>
				</div>
				<div id="postbox-container-2" class="postbox-container">
					<div id="normal-sortables" class="meta-box-sortables ui-sortable">
						<div id="custom_meta_box" class="postbox">
							<button type="button" class="handlediv" aria-expanded="true"><span class="screen-reader-text">Toggle panel: Feed Source Details</span><span class="toggle-indicator" aria-hidden="true"></span></button>
							<h2 class="hndle ui-sortable-handle"><span>RSS Source Details</span></h2>
							<div class="inside">
								<table class="form-table wprss-form-table">
									<tbody>
										<tr>
											<th>
												<label for="title">Name</label>
											</th>
											<td>
												<input type="text" name="title" id="wprss_url" value="<?= $title ?>" placeholder="e.g. rss-en" class="wprss-text-input">
											</td>
										</tr>
										<tr>
											<th>
												<label for="content">URL</label>
											</th>
											<td>
												<input type="url" name="content" id="wprss_url" style="width:420px;" value="<?= $content ?>" placeholder="https://" class="wprss-text-input">
											</td>
										</tr>
										<tr>
											<th>
												<label for="count">Limit</label>
											</th>
											<td>
												<input type="number" min="1" max="20" name="count" id="wprss_url"  value="<?= $count ?>"  class="wprss-text-input">
											</td>
										</tr>
										<tr>
											<th>
												<label for="count">Color of text</label>
											</th>
											<td>
												<input type="text" name="color" id="wprss_url"  value="<?= $color ?>"  class="wprss-text-input">
											</td>
										</tr>
										<tr>
											<th>
												<label for="img">Show Image</label>
											</th>
											<td>
												<input type="checkbox" name="img" value="<?= $img ?>" checked>
											</td>
										</tr>
										<tr>
											<th>
												<label for="author">Show Author</label>
											</th>
											<td>
												<input type="checkbox" name="author" value="<?= $author ?>" checked>
											</td>
										</tr>
										<tr>
											<th>
												<label for="date">Show Date</label>
											</th>
											<td>
												<input type="checkbox" name="date" value="<?= $date ?>" checked>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>








