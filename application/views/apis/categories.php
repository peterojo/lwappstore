<?php
header('Content-type: text/xml');
$categories = $cats->result();
?>
<categories  xmlns:i="http://www.w3.org/2001/XMLSchema-instance" xmlns="http://schemas.datacontract.org/2004/07/">
	<?php
		foreach($categories as $category){
		echo "<category>";
			foreach($category as $key=>$value){
				echo "<{$key}>";
				echo $value;
				echo "</{$key}>";
			}
		echo "</category>";
	}
	?>
</categories>