<?php

	function rsses_all(){
		global $wpdb;
		$table = $wpdb->prefix . 'pineal_rss';
		$query = "SELECT * FROM $table ORDER BY id_rss DESC";
		return $wpdb->get_results($query, ARRAY_A);
	}

	function rsses_current($name_rss){
		global $wpdb;
		$table = $wpdb->prefix . 'pineal_rss';
		$t = "SELECT * FROM $table WHERE name_rss='%s'";
		$query = $wpdb->prepare($t, $name_rss);
		return $wpdb->get_row($query, ARRAY_A);
	}

	
	function rsses_get($id_rss){
		global $wpdb;
		$table = $wpdb->prefix . 'pineal_rss';
		$t = "SELECT name_rss, url_rss FROM $table WHERE id_rss='%d'";
		$query = $wpdb->prepare($t, $id_rss);
		return $wpdb->get_row($query, ARRAY_A);
	}

	function rsses_add($title, $content, $count, $color, $img, $author, $date){
		global $wpdb;
		$title = trim($title);
		$content = trim($content);
		$count = trim($count);
		if($count == 0){
			$count = 20;
		}
		$color = trim($color);
		$img = trim($img);
		$author = trim($author);
		$date = trim($date);

		if ($title == '' || $content == '') {
			return false;
		}

		$table = $wpdb->prefix . 'pineal_rss';
		$t = "INSERT INTO $table (name_rss, url_rss, count_rss, color_rss, img_rss, author_rss, date_rss) VALUES('%s','%s','%d', '%s', '%d', '%d', '%d')";
		$query = $wpdb->prepare($t, $title, $content, $count, $color, $img, $author, $date);
		$result = $wpdb->query($query);

		if ($result === false ) {
			die('Error Database');
			return true;
		}
	}

	function rsses_edit($id_rss, $title, $content, $count, $img, $author, $date){
		global $wpdb;
		$title = trim($title);
		$content = trim($content);
		$count = trim($count);
		$color = trim($color);
		$img = trim($img);
		$author = trim($author);
		$date = trim($date);

		if ($title == '' || $content == '' ) {
			return false;
		}

		$table = $wpdb->prefix . 'pineal_rss';
		$t = "UPDATE $table SET name_rss='%s', url_rss='%s', count_rss='%d', color_rss='%s', img_rss='%d',  author_rss='%d', date_rss='%d' WHERE id_rss='%d'";
		$query = $wpdb->prepare($t, $title, $content, $count, $color, $img, $author, $date, $id_rss);
		$result = $wpdb->query($query);

		if ($result === false ) {
			die('Error Database');
			return true;
		}
	}

	function rsses_delete($id_rss){
		global $wpdb;
		$table = $wpdb->prefix . 'pineal_rss';
		$t = "DELETE FROM $table WHERE id_rss='%d'";
		$query = $wpdb->prepare($t, $id_rss);
		return $wpdb->query($query);
	}

