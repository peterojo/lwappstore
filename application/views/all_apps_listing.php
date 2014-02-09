<?php
include_once 'layout_templates/header.php';
?>
<title><?=$title ?></title>
     <!---   --><span>Welcome <?php echo $this_user->name; ?></span>
      <span><a href="logout">Sign Out</a></span>
      <span><a href="#">Help</a></div>
     
      <?php
      	if(isset($flashmessage)){
           print_r($flashmessage);
	    }
      ?>
  	
    </div><!--! end of #header-->
    <div class="row content title">
  	  <div class="three columns"> <h5><strong>YOUR APPLICATIONS</strong></h5></div>
       <div class="six columns">
       	
       <ul>
      <li class="field" style=" margin:0">
      	<form action="" method="get">
      		<input class="search input" type="search" name="search" value="<?php echo (isset($_GET['search']))?$_GET['search']:""; ?>" placeholder="Search..." />
      	</form>
      	
      </li>
      </ul>
       </div>
    <div class="three columns">
      <div class="medium primary btn icon-left icon-plus right">
<a href="<?php echo base_url(); ?>console/add" style=" text-shadow:none; text-decoration:none">ADD A NEW APPLICATION</a></div>
    </div>
    
    </div><!--! end of #title -->  
    	
    <div class="row content">
  	 <table width="100%" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td><strong>APP NAME</strong></td>
    <td><strong>PRICE</strong></td>
    <td><strong>AVG. RATING / TOTAL</strong></td>
    <td><strong>CRASHES &amp; ANRS</strong></td>
    <td><strong>LAST UPDATE</strong></td>
    <td><strong>CURRENT / TOTAL INSTALLS</strong></td>
    <td><strong>STATUS</strong></td>
  </tr>
  <?php
  if(count($apps)==0){
			echo "<tr><td colspan=\"7\" align=\"center\"><p>No apps found.</p></td></tr>";
	}else{
  	foreach ($apps as $app) {
  		/*
		  $icon = basename($app->icon_path);
			if(file_exists('thumbnails/thm_'.$icon)){
			  $appicon = 'thumbnails/thm_'.$icon;
		  }else{
			  $resizeObject = new Resize($app->icon_path);
			  $resizeObject->resizeImage(27, 27, 'crop');
			  $resizeObject->saveImage('thumbnails/thm_'.$icon, 100);
			  $appicon = 'thumbnails/thm_'.$icon;
		  }*/
		  
  ?>
  <tr>
    <td><a href="edit/<?php echo $app->id; ?>">
    <span style="float:left; margin:0; padding-right:20px"><img src="<?php echo $app->icon_path; ?>" alt="logo" width="26" height="26"></span><?php echo $app->app_name; ?></a></td>
    <td><?php echo ($app->price==0)?"Free":$app->price; ?></td>
    <td><?php echo $app->ave_rating; ?></td>
    <td><?php echo $app->crashes; ?></td>
    <td><?php echo date("M j, Y", $app->upd_time); ?></td>
    <td><?php echo $app->installs; ?></td>
    <td><?php echo ($app->status==1)?"Published":"Unpublished"; ?></td>
  </tr>
  <?php }} ?>
</table>
    
    </div><!--! end of #content--> 
  <?php include_once "layout_templates/footer.php"; ?>  
