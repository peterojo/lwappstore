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
</style>

     <span>Welcome <?php echo $this_user->name; ?></span>
      <span><a href="../logout" >Sign Out</a></span>
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
  	  	<h5 id="app_title_bar"><?php echo $this_app->app_name; ?></h5>
  	  </div>
      <div class="three columns">
	      <ul style="text-shadow:none; margin-top:20px;">
	    <li class="field right" >
	        <?php echo form_open_multipart('console/update'); ?>
			<div class="picker">
				<input type="hidden" name="app_id" value="<?php echo $this_app->id; ?>" />
				<input type="hidden" name="dev_id" value="<?php echo $this_user->id; ?>" />
	          <select name="status">
	            <option value="#" disabled>Select One</option>
	            <option value="unpublish" <?php echo ($this_app->status==0)?"selected":""; ?>>Unpublish</option>
	            <option value="publish" <?php echo ($this_app->status==1)?"selected":""; ?>>Publish</option>
	           
	          </select>
	        </div>
	      </li>
	      </ul>
	    </div>
	    
	    <div class="three columns">
		    <ul style="text-shadow:none; margin-top:20px;">
		    	  	 			
		   		<li><div class="medium primary btn right"><input type="submit" name="submit" id="submit" value="Save" /><!--<a href="#"><button id="save">Save</button></a>--></div></li>
		    </ul>
	    </div>
    </div><!--! end of #title -->  
    	
    <div class="row content">
		<section class="vertical tabs">
           <ul class="tab-nav three columns" style="font-size:80%">
            <li class="active"><a href="#">Details</a></li>
            <li><a href="#">Pricing</a></li>
            <li><a href="#">Uploads</a></li>
            <li><a href="#">Statistic</a></li>
           </ul>
           <div class="tab-content nine columns active">
           	<h4>Application Details</h4>
  	 		<p>
			  	 	<ul style="text-shadow:none">
				      	<li class="field" style=" margin:0">
				      		<input class="text input" type="text" id="apptitle" name="apptitle" value="<?php echo $this_app->app_name; ?>" placeholder="Application Title" />
				      	</li><br />
				        <li class="field">
				        	<div class="pcker"><p>Category: </p></div>
				        	<!--<a href="#"><div class="picker" id="change" style="width: 120px">&nbsp;&nbsp;Change</div></a>-->
				            <div class="picker" id="cat">
				              <select name="category" id="category">
				                <option value="" >Select Category</option>
				                <?php
				                	foreach($categories as $row):
				                ?>
				                <option value="<?php echo $row->id ?>" <?php echo ($row->id==$this_app->cat_id)?"selected":""; ?>><?php echo $row->cat_name; ?></option>
				                <?php
				                	endforeach;
				                ?>
				              </select>
				            </div>
			              </li>
			              <li class="field">
	             			<textarea class="input textarea" placeholder="Description" rows="3" name="description"><?php echo $this_app->description; ?></textarea>
	             		  </li>
                 		<li class="field" style=" margin:0">
                		<p>Contact</p> 
		                  <input class="text input" type="text" name="website" value="<?php echo $this_app->website; ?>" placeholder="Website" /><br><br>
		                  <!--
						  <input class="text input" type="email" name="email" value="<?php echo $this_user->email; ?>" placeholder="Email" /><br><br>
		                  <input class="text input" type="tel" name="phone" value="<?php $this_user->phone; ?>" placeholder="Phone" /><br><br>
						  -->
						</li>
			              <!--<li>
			              <div class="medium info btn icon-left icon-cancel right"><a href="#"><button>Cancel</button></a></div>
			              <div class="medium primary btn icon-left icon-up right" style="margin-right:10px;"><a href="#"><button>Upload APK</button></a></div>
			             
			              </li>-->
			      	</ul>
			    <!--</form>-->
			</p>
    	   </div>

           <div class="tab-content nine columns">
           	<h4>Set pricing</h4>
  	 		<p>
  	 			<!--<form id="pricing">-->
  	 				<ul style="text-shadow:none">
		     			<li class="field">
			                <div class="picker">
			                  <select id="pricing" name="pricing">
			                    <option value="#" disabled>Select One</option>
			                    <option <?php echo ($this_app->price==0)?"selected":""; ?>>Free</option>
			                    <option <?php echo ($this_app->price!=0)?"selected":""; ?>>Paid</option>
			                  </select>
			                </div>
		              	</li>
               
              			<li class="field" id="amount" style=" margin:0"> 
			               <div class="picker">
			               	<input class="text input" type="amount" placeholder="Amount in $ (US Dollars)" name="amount" value="<?php echo $this_app->price; ?>" size="30" />
			               </div>
			               <span style=" font-size:70%; color:#F30; margin-top:-10px; position:relative;">&nbsp;&nbsp;&nbsp;&nbsp; * set to 0 if free</span>
		               </li>
                
	              	<!-- <li><div class="medium primary btn right" style="margin-right:10px;"><a href="#"><button>Submit</button></a></div></li>-->
	              	</ul>
              	<!--</form>-->
            </p>
           </div>
           </form>
              
              
       	   <div class="tab-content nine columns">
      		<h4>Uploads</h4>
				<!--<form id="details" action="" method="post" enctype="multipart/form-data">-->
					<ul>
	        			<li class="field" style=" margin:0">
	        				<input type="hidden" name="app_id" id="app_id" value="<?php echo $this_app->id; ?>" />
	        				<input class="text input" id="prtitle" name="prtitle" type="text" value="<?php echo $this_app->app_name; ?>" placeholder="Title" />
	        			</li>
	        			<li><br />
	        				<p>APK (Installer Package)</p>
			              	<div id="myapk"><?php echo basename($this_app->apk_path); ?></div>
			              	<div id="upload_prog"></div>
			              	<div id="chupload"><input type="button" value="Upload new APK" /></div>
			              	<div id="upload_block" style="padding:40px 0; text-align:center; background:#f5f5f5; border:10px solid #eee; color:#222">
			              		<input type="hidden" name="old_apk" value="<?php echo $this_app->apk_path; ?>" />
			              		<input type="hidden" name="MAX_FILE_SIZE" value="25971520" />
			              		<input name="apk_file" id="apk_file" type="file" />
			              	</div><br />
			              </li>
			              <li>
			              	<p>Icon</p>
			              	<div id="icon_preview">
			              		<img src="<?php echo $this_app->icon_path; ?>" alt="app icon" />
			              	</div>
			              	<div id="updatedicon" style="display: none; background-color: white; width: 400px; color: blue; border: solid 2px blue; padding: 5px;">
		                 		This icon has been updated.<br />
		                 		Note: Sometimes you may still see the old image if it has the same extension as the new one. 
		                 		Don't bother. When you reload the page you will find that the new image has been saved.
		                 		
		                 	</div>
		              		<div id="upload_progress"></div><br />
		                 	<input type="button" class="showmore" value="Change" />	
			              	<div class="more" style=" padding:40px 0; text-align:center; background:#f5f5f5; border:10px solid #eee; color:#222">
		                 		<input type="hidden" name="old_icon" value="<?php echo $this_app->icon_path; ?>" />
		                 		
		                 		
		                 		<input type="hidden" name="MAX_FILE_SIZE" value="2097152" />
		                 		<input name="app_icon" id="app_icon" type="file" size="100" />
	                 		</div><br />
			              </li>
                   		
			              <li>
	                  		<p>Screen Shots</p>
	                  		<?php
		                 		$i=1;
								foreach($screenshots as $shot){
		                 	?>
		                 	<div id="screenshot_<?php echo $i; ?>">
		                 	<div class="scrsht" id="opt_<?php echo $i; ?>">
	                 		<img src="<?php echo $shot->name; ?>" alt="app screenshot" />
	                 		</div><span id="delopt_<?php echo $i; ?>" style="display: none;">Deleted</span>
		                 	</div>
		                 	<input type="hidden" name="scrshtdivid" id="scrshtdivid_<?php echo $i; ?>" value="opt_<?php echo $i; ?>" />
		                 	<div class="uploadedshot" id="updatedshot_<?php echo $i; ?>" style="display: none; float: left; min-height: 120px; width: 400px; color: blue; border: solid 2px blue; padding: 5px;">
		                 		This screenshot has been updated.<br />
		                 		Note: Sometimes you may still see the old image if it has the same extension as the new one. 
		                 		Don't bother. When you reload the page you will find that the new image has been saved.
		                 	</div>
		                 	
		                 	<div style="clear: both"></div>
		                 	<div id="upload_progresses"></div>
		                 	<input type="hidden" id="oldscrshot_<?php echo $i; ?>" name="oldscrshot_<?php echo $i; ?>" value="<?php echo $shot->name; ?>" />
	                 		<input type="hidden" id="scr_idshot_<?php echo $i; ?>" name="scr_idshot_<?php echo $i; ?>" value="<?php echo $shot->id; ?>" />
	                 		<div class="options" id="fromopt_<?php echo $i; ?>" style="display: none">
	                 		<input class="showmorescr" id="hot_<?php echo $i; $i++; ?>" type="button" value="Change" />
	                 		<input class="delscr" name="opt_<?php echo $i; ?>" id="<?php echo $shot->id; ?>" type="button" value="Delete" />
	                 		</div>
	                 		<input class="morescr" id="shot_<?php echo $i; $i++; ?>" name="shot[]" type="file" style="display: none;" size="100" /><br />
	                 		<?php } ?>
	                  		<input type="button" value="Add New Screenshots" name="addnewscr" id="addnewscr"/>
	                  		<li id="newscr" style="display: none;">
	                  			<div id="screenshots"></div><div style="clear: both"></div>
				          		<div id="upload_progresses"></div>
								<div style=" padding:40px 0; text-align:center; background:#f5f5f5; border:10px solid #eee; color:#222">
									  <input name="shot[]" id="shot" type="file" size="100" multiple />
								</div>
								 
	                  		</li>
	                 	</li>
	                 	<br>
                 <!-- <li> <div class="medium primary btn right" style="margin-right:10px;"><a href="#"><button>Submit</button></a></div></li>-->
                 	</ul>
              </div>
              <div class="tab-content nine columns">
            	<h4> Statistics</h4>
                <div style=" padding:40px 0; text-align:center; background:#f5f5f5; border:1px solid #ccc; color:#222">
	               Statistics not available at the moment.
	               <h5>Try again later</h5>.
                </div>
              </div>
            </section>
            <script type="text/javascript" src="<?php echo base_url(); ?>js/uploadagain.js"></script>
		</div>
	<?php  ?>
	<?php include_once "layout_templates/footer.php"; ?>

