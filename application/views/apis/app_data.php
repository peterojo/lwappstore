<?php
header('Content-type: text/xml');

	if(!empty($application)){
		echo "<application xmlns:i=\"http://www.w3.org/2001/XMLSchema-instance\" xmlns=\"http://schemas.datacontract.org/2004/07/\">";
		$application = get_object_vars($application);
		array_pop($application);
		foreach($application as $key => $value){
			echo "<{$key}>";
			echo "<![CDATA[".$value."]]>";
			echo "</{$key}>";
		}
			echo "<screenshots>";
				echo "<shot>";
				foreach($screenshots as $shot){
					$shot_assoc = get_object_vars($shot);
					foreach($shot_assoc as $key=> $value){
						echo "<{$key}>";
						echo "<![CDATA[".$value."]]>";
						echo "</{$key}>";
					}
				}
				echo "</shot>";
		
			echo "</screenshots>";
		echo "</application>";
	}else{
		echo "<error>there is no app in our records with that id</error>";
	}
