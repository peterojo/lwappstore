<?php
header('Content-type: text/xml');

if(!empty($reviews)){
	echo "<reviews xmlns:i=\"http://www.w3.org/2001/XMLSchema-instance\" xmlns=\"http://schemas.datacontract.org/2004/07/\">";
	foreach($reviews as $review){
		echo "<review>";
		foreach($review as $key=>$value){
			echo "<{$key}>";
			echo "<![CDATA[".$value."]]>";
			echo "</{$key}>";
		}
		echo "</review>";
	}
	echo "</reviews>";
}else{
	echo "<error>There are no reviews for this application.</error>";
}
?>