<?php
include_once 'layout_templates/header.php';
?>
<title><?=$title ?></title>
<style type="text/css">
	#uploaded_icon{
		width: 200px;
		margin: auto;
		padding: 20px;
		border: groove 2px #ffffff;
	}
	.uploaded_shot{
		float:left;
		width: 31%;
		padding: 20px;
		display: inline;
		border: groove 2px #ffffff;
	}
	#myapk{
		color:#006699;
		font-family: monospace;
	}
</style>
  <span>Welcome <?php echo $this_user->name; ?></span>
  <span><a href="logout" >Sign Out</a></span>
  <span><a href="#">Help</a></div>
    </div><!--! end of #header -->
    <div style="text-align: center; color: #900;">
    <?php
      	if(isset($flashmessage)){
          echo $flashmessage;
	    }
    ?>
    </div>
    <div class="row content title">
  	  <div class="six columns">
  	  	<h3><a href="#" style="float:left; padding-right:20px"></a></h3>
  	  	<h5 id="app_title_bar"><?php echo $application->app_name; ?></h5>
  	  </div>
     <?php echo form_open_multipart('console/save'); ?>
	   <div class="three columns">
	      <ul style="text-shadow:none; margin-top:20px;">
	    <li class="field right" >
	        <input type="hidden" name="app_id" id="app_id" value="<?php echo $application->id; ?>" />
	        <input type="hidden" name="dev_id" value="<?php echo $this_user->id; ?>" />
			
	      </li>
	      </ul>
	    </div>
	    
	    <div class="three columns">
		    <ul style="text-shadow:none; margin-top:20px;">
		    	<li>
		   			<div class="medium primary btn right">
		   			<input type="submit" name="submit" id="submit" value="Save" />
		   			</div>
		   		</li>
		    </ul>
	    </div>
    </div><!--! end of #title -->  
    	
    <div class="row content">
		<section class="vertical tabs">
           <ul class="tab-nav three columns" style="font-size:80%">
            <li class="active"><a href="#">Product</a></li>
            <li><a href="#">Statistics</a></li>
           </ul>
           
       	   <div class="tab-content nine columns active">
      		<h4>Upload Product</h4>
      		<p>
				<ul>
					<li class="field" style=" margin:0">
		      			<input class="text input" type="text" id="apptitle" name="apptitle" value="<?php echo $application->app_name; ?>" required />
		   			</li><br />
	    			<li>
	    				<p>Upload APK</p>
		              	<div id="myapk"></div>
		              	<div id="upload_prog"></div>
		              	<div style="padding:40px 0; text-align:center; background:#f5f5f5; border:10px solid #eee; color:#222">
		              		<input type="hidden" name="MAX_FILE_SIZE" value="25971520" />
		              		<input name="apk_file" id="apk_file" type="file" />
		              	</div>
		              </li>
		              <li>
		              	<p>Upload icon<span style=" font-size:70%; color:#F30; margin-top:-10px; position:relative;">&nbsp;&nbsp;&nbsp;&nbsp; * Kindly upload an image file not greater than 2MB</span></p>
		              	<div id="icon_preview"></div>
		              	<div id="upload_progress"></div>
		              	<div style="padding:40px 0; text-align:center; background:#f5f5f5; border:10px solid #eee; color:#222">
		              		<input type="hidden" name="MAX_FILE_SIZE" value="20971520" />
		              		<input name="app_icon" id="app_icon" type="file" size="100" />
		              	</div>
		              </li>
	          		<p>Screen Shots</p>
	          		<span style=" font-size:70%; color:#F30; margin-top:-10px; position:relative;">&nbsp;&nbsp;&nbsp;&nbsp; *Upload at least three screen shots</span><br /><br>
	        		<div id="screenshots"></div><div style="clear: both"></div>
	          		<div id="upload_progresses"></div>
					 <li>
					  <div style=" padding:40px 0; text-align:center; background:#f5f5f5; border:10px solid #eee; color:#222">
						  <input name="shot[]" id="shot" type="file" size="100" multiple />
					  </div>
					 </li>
	         	</ul>
              </p>
              </div>
              <div class="tab-content nine columns">
            	<h4> Statistics</h4>
                <div style=" padding:40px 0; text-align:center; background:#f5f5f5; border:1px solid #ccc; color:#222">
	               Statistics not available at the moment.
	               <h5>Try again later</h5>.
                </div>
              </div>
            </section>
            <script type="text/javascript" src="<?php echo base_url(); ?>js/uploademall.js"></script>
            <!--
            <script type="text/javascript" src="<?php echo base_url(); ?>js/apload.js"></script>
                        <script type="text/javascript" src="<?php echo base_url(); ?>js/icpload.js"></script>-->
            
	</div>
	<?php include_once "layout_templates/footer.php"; ?>

