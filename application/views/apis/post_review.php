<?php
require_once '../core/init.php';

if(isset($_POST['comment'])){
	$app_id = (int)$database->escape_value(htmlentities(trim($_POST['app_id'])));
	$name = $database->escape_value(htmlentities(trim($_POST['name'])));
	$rating = (int)$database->escape_value(htmlentities(trim($_POST['rating'])));
	$summary = $database->escape_value(htmlentities(trim($_POST['summary'])));
	$comment = $database->escape_value(htmlentities(trim($_POST['comment'])));
	$time_posted = time();
	
	$review = new Review();
	$review->app_id = $app_id;
	$review->user = $name;
	$review->summary = $summary;
	$review->message = $comment;
	$review->time_posted = $time_posted;
	
	if($review->create()){
		echo "success";
	}else{
		echo "failed";
	}
}else{
	echo "no request";
}
?>