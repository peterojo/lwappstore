<?php
if(!isset($no_cat)){
	header('Content-type: text/xml');
	if(!empty($applications)){
		echo "<applications xmlns:i=\"http://www.w3.org/2001/XMLSchema-instance\" xmlns=\"http://schemas.datacontract.org/2004/07/\">";
		foreach($applications as $app){
			echo "<application>";
			$app_assoc = get_object_vars($app);
			array_pop($app_assoc);
			foreach($app_assoc as $key=>$value){
				echo "<{$key}>";
				echo "<![CDATA[".$value."]]>";
				echo "</{$key}>";
			}
			echo "</application>";
		}
		echo "</applications>";
	}else{
		echo "<error>";
		echo "There are no applications in this category.";
		echo "</error>";
	}
}else{
	echo "You need to pass in the category ID as a parameter.<br />";
	echo "like so: <strong>cat_apps/1</strong><br />";
	echo "Here's a list of the catogories and their ID's";
	echo "<pre>";
	print_r($cats->result());
	echo "</pre>";
}
?>