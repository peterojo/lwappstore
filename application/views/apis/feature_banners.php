<?php

header('Content-type: text/xml');
$banners = $banners->result();
echo "<banners>";
foreach ($banners as $banner) {
	echo "<banner>";
	echo "<id>{$banner->id}</id>";
	echo "<app_id>{$banner->app_id}</app_id>";
	echo "<banner_url>{$banner->banner_url}</banner_url>";
	echo "<link>{$banner->link}</link>";
	echo "<enabled>{$banner->enabled}</enabled>";
	echo "</banner>";
}
echo "</banners>";