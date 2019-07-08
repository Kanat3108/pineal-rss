<?php 
	include_once('m/rsses.php');

	if(!empty($_POST)){
		

		if(rsses_add($_POST['title'], $_POST['content'], $_POST['count'], $_POST['color'], $_POST['img'], $_POST['author'], $_POST['date'])){

			die ('<div class="wrap">RSS saved successfully. Shortcode [rss feed="'. $_POST['title'] .'"]</div>');
			}else{
				die ('<div class="wrap">RSS saved successfully. Shortcode [rss feed="'. $_POST['title'] .'"]</div>');
		};
		$title = $_POST['title'];
		$content = $_POST['content'];
		$count = $_POST['count'];
		$color = $_POST['color'];
		$img = $_POST['img'];
		$author = $_POST['author'];
		$date = $_POST['date'];
		$error = true;
	}else{
		$title = '';
		$content = '';
		$count = '';
		$color = '';
		$img = '';
		$author = '';
		$date = '';
		$error = false;
	}
?>
<div class="wrap">
	<h1 class="wp-heading-inline">New RSS</h1>
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
											<input name="original_publish" type="hidden" id="original_publish" value="Publish Feed">
											<input type="submit" name="publish" id="publish" class="button button-primary button-large" value="Publish RSS">
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
												<input type="text" name="title" id="wprss_url" value="<?= $title ?>" placeholder="e.g. rss-en" class="wprss-text-input" required>
											</td>
										</tr>
										<tr>
											<th>
												<label for="content">URL</label>
											</th>
											<td>
												<input type="url" name="content" id="wprss_url" style="width:420px;" value="<?= $content ?>" placeholder="https://" class="wprss-text-input" required>
											</td>
										</tr>
										<tr>
											<th>
												<label for="count">Limit</label>
											</th>
											<td>
												<input type="number" min="1" max="20" name="count" id="wprss_url"  value="<?= $count ?>" placeholder="20" class="wprss-text-input">
											</td>
										</tr>
										<tr>
											<th>
												<label for="count">Color of text</label>
											</th>
											<td>
												<input type="text"  name="color" id="wprss_url"  value="<?= $color ?>"  class="wprss-text-input">
											</td>
										</tr>
										<tr>
											<th>
												<label for="img">Show Image</label>
											</th>
											<td>
												<input type="checkbox" name="img" value="1" checked>
											</td>
										</tr>
										<tr>
											<th>
												<label for="author">Show Author</label>
											</th>
											<td>
												<input type="checkbox" name="author" value="1" checked>
											</td>
										</tr>
										<tr>
											<th>
												<label for="date">Show Date</label>
											</th>
											<td>
												<input type="checkbox" name="date" value="1" checked>
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