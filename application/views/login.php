<?php
include_once 'layout_templates/header.php';
?>
<title><?=$title ?></title>
        <span class="medium info btn icon-left icon-plus right" style=" margin-top:20px">
<a href="signup" rel="#overlay" style="text-decoration:none; text-shadow:none; text-decoration:none;  font-size:80%">CREATE ACCOUNT</a></span>
      </div>
      <?php
      	if(isset($flashmessage)){
          echo $flashmessage;
	    }
      ?>
     </div><!--! end of #header -->
    	
    <div class="row content" style=" background:#fff url(<?php echo base_url(); ?>img/fade1.png) bottom left no-repeat">
   
     <div class="one columns"></div>
      <div class="five columns" style=" font-size:80%">
  
          
<h3 style=" font-family:Georgia, 'Times New Roman', Times, serif">LoveWorld App Store Console</h3><br>
<h1 style="line-height:40px;">One-Stop-Shop</h1>
<h3> for all LoveWorld Android  apps.</h3>

<p>
LoveWorld App Store Console enables developers to easily publish and distribute their applications directly to users of Android-compatible phones.
      </p> 

  </div>
          <div class="one columns"></div>
          <div class="four columns">
          <div style=" padding:20px; margin:20px 0 60px 0 ;text-align:center; background:#f5f5f5; border:0px solid #eee; color:#222; font-family:Georgia, 'Times New Roman', Times, serif; text-align:left;">
      <h3 style=" font-family:Georgia, 'Times New Roman', Times, serif;"> Login</h3>
       <form action="login" method="post">
       	<div id="errmsg"><?php if(isset($errmsg)) echo $errmsg; ?></div>
         <ul style="text-shadow:none; font-size:80%">
        
           <li class="field">
           <label>ID/Email</label>
           <input class="text input" type="text" name="email" required="required" /></li>
               <li class="field">
           <label>Password</label>
           <input class="text input" type="password" name="password" required="required" /></li>
           <li class="field">
                <!--
                <label class="checkbox" for="checkbox1">
                                  <input name="checkbox1" type="checkbox" id="checkbox1">
                                  <span></span>Remember
                                </label>-->
                
            </li>
            <li><div class="medium primary btn "><input class="text input" type="submit" name="login" value="Log in"/></div></li>
            
                 </li>

      </ul>
      </form> 
    <!--<a href="#">Can't access your account?</a>-->
                
                </div> 
</div>
     <div class="one columns"></div>
   

</div><!--! end of #content -->

<div class="row header footer">
  	© 2013 LoveWorld App Store.</div>


 <!-- overlayed element -->
<div class="apple_overlay" id="overlay">
  <!-- the external content is loaded inside this tag -->
  <div class="contentWrap"></div>
</div>
 
 
</div> <!--! end of #container -->


  <!-- JavaScript at the bottom for fast page loading -->

  <!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if offline -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="<?php echo base_url(); ?>/js/libs/jquery-1.7.2.min.js"><\/script>')</script>
  
<script src="http://cdn.jquerytools.org/1.2.7/full/jquery.tools.min.js"></script>
  <!--
  Include gumby.js followed by UI modules.
  Or concatenate and minify into a single file
  <script src="js/libs/gumby.js"></script>
  <script src="js/libs/ui/gumby.retina.js"></script>
  <script src="js/libs/ui/gumby.fixed.js"></script>
  <script src="js/libs/ui/gumby.skiplink.js"></script>
  <script src="js/libs/ui/gumby.toggleswitch.js"></script>
  <script src="js/libs/ui/gumby.checkbox.js"></script>
  <script src="js/libs/ui/gumby.radiobtn.js"></script>
  <script src="js/libs/ui/gumby.tabs.js"></script>
  <script src="js/libs/ui/jquery.validation.js"></script>
  -->
  <script src="<?php echo base_url(); ?>/js/libs/gumby.min.js"></script>
  <script src="<?php echo base_url(); ?>/js/plugins.js"></script>
  <script src="<?php echo base_url(); ?>/js/main.js"></script>
<!--OVERLAY-->
<script>
$(function() {

    // if the function argument is given to overlay,
    // it is assumed to be the onBeforeLoad event listener
    $("a[rel]").overlay({

        mask: '#fff',
        effect: 'apple',

        onBeforeLoad: function() {

            // grab wrapper element inside content
            var wrap = this.getOverlay().find(".contentWrap");

            // load the page specified in the trigger
            wrap.load(this.getTrigger().attr("href"));
        }

    });
});
</script>
  <!-- Change UA-XXXXX-X to be your site's ID -->
  <script>
    window._gaq = [['_setAccount','UAXXXXXXXX1'],['_trackPageview'],['_trackPageLoadTime']];
    Modernizr.load({
      load: ('https:' == location.protocol ? '//ssl' : '//www') + '.google-analytics.com/ga.js'
    });
  </script>

  <!-- Prompt IE 6 users to install Chrome Frame. Remove this if you want to support IE 6.
       chromium.org/developers/how-tos/chrome-frame-getting-started -->
  <!--[if lt IE 7 ]>
    <script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
    <script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
  <![endif]-->

  </body>
</html>
