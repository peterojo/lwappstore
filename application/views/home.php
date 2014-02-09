<!DOCTYPE HTML>
<html>
	<head>
	  <meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
	  <title>Home</title>
	  
	</head>		<body id="home" onload="">
		<div id="container">
			<pre>
				<?php print_r($rows); ?>
			</pre>
			<?php foreach ($rows as $row): ?>
				
				<h3><?php echo $row->title; ?></h3>
				<small>by </small><em><?php echo $row->author; ?></em>
				<p><?php echo $row->content; ?></p>
				
			<?php endforeach; ?>
		</div>
	  
	</body>
</html>