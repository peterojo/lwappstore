   <style type="text/css">
		#signup label.error {
			margin-left: 10px;
			width: auto;
			color: red;
			font-size: 12px;
			display: inline;
		}
	</style>
    <div class="row content">
    	<?php
      	if(isset($flashmessage)){
          echo $flashmessage;
	    }
      ?>
   <h4 class="lead">CREATE ACCOUNT</h4>
          <form action="" id="signup" method="post">
            <ul>
              	<li class="field"><input class="text input" type="text" id="name" name="name" placeholder="Name" /></li>
              	<li class="field"><input class="email input" type="email" id="email" name="email" placeholder="Email" /></li>
              
				<li class="field"><input class="phone input" type="tel" id="phone" name="phone" placeholder="Phone" required/></li>
				<li class="field"><input class="text input" type="text" id="address" name="address" placeholder="Address" required></li>
				
				<li class="field">
	               
	           		<div class="picker" style=" width:100%">
	           			<select id="country" name="country">
		                    <option value="">Select Country</option>
		                   <?php
								foreach($country_list as $country){
									echo "<option>{$country}</option>";
								}
								
							?>
	                    </select>
	       			</div>        
	 			</li>
              
  				<li class="field"><input class="text input" type="text" id="state" name="state" placeholder="State" required/></li>   
   				<li class="field"><input class="text input" type="text" id="city" name="city" placeholder="City" required/></li>
   
              	<li class="field"><input class="password input" type="password" id="password" name="password" placeholder="Password" required/></li>
               	<li class="field"><input class="password input" type="password" id="password_again" name="password_again" placeholder="Retype Password" required/></li>
           		<li class="check"><input type="checkbox" class="checkbox" id="agree" name="agree" /><br />
           			<span style="color: black; font-size: 14px;">I agree to the <a href="#">Terms &amp; Conditions</a></span>
           		</li>
         
   				<li><div class="medium primary btn "><input class="text input" type="submit" id="submit" name="submit" value="SIGNUP" /></div></li>            
            </ul>
          </form>
    </div>
    
<script src="<?php echo base_url(); ?>/jquery-validation/lib/jquery-1.9.0.js"></script>
<script src="<?php echo base_url(); ?>/jquery-validation/jquery.validate.min.js"></script>
	
    <script type="text/javascript" src="<?php echo base_url(); ?>/js/validate.js"></script>
