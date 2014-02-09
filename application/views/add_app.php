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
  	  	<h5 id="app_title_bar"></h5>
  	  </div>
     
	   <div class="three columns">
	      <ul style="text-shadow:none; margin-top:20px;">
	    <li class="field right" >
	        <?php echo form_open('console/new_app'); ?>
	        <input type="hidden" name="dev_id" value="<?php echo $this_user->id; ?>" />
			<div class="picker">
	          <select name="status">
	            <option value="#" disabled>Select One</option>
	            <option value="unpublish">Unpublish</option>
	            <option value="publish">Publish</option>
	          </select>
	        </div>
	      </li>
	      </ul>
	    </div>
	    
	    <div class="three columns">
		    <ul style="text-shadow:none; margin-top:20px;">
		    	<li>
		   			<div class="medium primary btn right">
		   			<input type="submit" name="submit" id="submit" value="Continue" />
		   			</div>
		   		</li>
		    </ul>
	    </div>
    </div><!--! end of #title -->  
    	
    <div class="row content">
		<section class="vertical tabs">
           <ul class="tab-nav three columns" style="font-size:80%">
            <li class="active"><a href="#">Details</a></li>
            <li><a href="#">Pricing</a></li>
            <li><a href="#">Contact</a></li>
            <!--<li><a href="#">Statistics</a></li>-->
           </ul>
           <div class="tab-content nine columns active">
           	<h4>Application Details</h4>
  	 		<p>
	  	 	  <ul style="text-shadow:none">
		      	<li class="field" style=" margin:0">
		      		<input class="text input" type="text" id="apptitle" name="apptitle" placeholder="Application Title" required />
		      	</li>
		        <li class="field"><br />
		            <div class="picker">
		              <select name="category" id="category">
		                <option value="" >Select Category</option>
		                <?php
		                	foreach($categories as $row):
		                		
		                ?>
		                <option value="<?php echo $row->id ?>"><?php echo $row->cat_name; ?></option>
		                <?php
		                	endforeach;
		                ?>
		              </select>
		            </div>
	              </li>
	              <!--<span style=" font-size:70%; color:#F30; margin-top:-10px; position:relative;">&nbsp;&nbsp;&nbsp;&nbsp; * 7 of 30 characters</span>-->
         		<li class="field">
         			<textarea class="input textarea" placeholder="Description" rows="3" name="description"></textarea>
         		</li>
	              
	          </ul>
			    
			</p>
    	   </div>
			
           <div class="tab-content nine columns">
           	<h4>Set pricing</h4>
  	 		<p>
				<ul style="text-shadow:none">
	     			<li class="field">
		                <div class="picker">
		                  <select id="pricing" name="pricing">
		                    <option value="#" disabled>Select One</option>
		                    <option>Free</option>
		                    <option>Paid</option>
		                  </select>
		                </div>
	              	</li>
	       
	      			<li class="field" id="amount" style=" margin:0"> 
		               <div class="picker">
		               	<input class="text input" name="amount" placeholder="Amount in $ (US Dollars)" name="amount" size="30" />
		               </div>
		               <span style=" font-size:70%; color:#F30; margin-top:-10px; position:relative;">&nbsp;&nbsp;&nbsp;&nbsp; * set to 0 if free</span>
	               </li>
	        
         		 
	          	</ul>
            </p>
           </div>   
              
       	   
			<div class="tab-content nine columns">
			<h4>Contact Info</h4>
			<p>
			  <ul>
         		<li class="field" style=" margin:0"> 
                  <input class="text input" type="text" name="website" placeholder="Website" /><br><br>
                  <input class="text input" type="email" name="email" placeholder="Email" /><br><br>
                  <input class="text input" type="tel" name="phone" placeholder="Phone" /><br><br>
                </li>
				</ul>
			</div>
           </form>
			  
        </section>
     </div>
<?php include_once "layout_templates/footer.php"; ?>

