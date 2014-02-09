<?php

header('Content-type: text/xml');

if(!empty($applications)){
	echo "<applications xmlns:i=\"http://www.w3.org/2001/XMLSchema-instance\" xmlns=\"http://schemas.datacontract.org/2004/07/\">";
	foreach($applications as $app){
		echo "<application>";
		foreach($app as $key=>$value){
			echo "<{$key}>";
			echo "<![CDATA[".$value."]]>";
			echo "</{$key}>";
		}
		echo "</application>";
	}
	echo "</applications>";
}else{
	echo "<error>";
	echo "There are no applications in our records from a developer with that ID";
	echo "</error>";
}
