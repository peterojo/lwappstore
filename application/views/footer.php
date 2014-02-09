<div class="row header footer">
  	© <?php echo date("Y", time()); ?> LoveWorld App Store.  <a href="#">Terms of Service</a> - <a href="#">Privacy Policy </a></div>
</div> <!--! end of #container -->



  <!-- JavaScript at the bottom for fast page loading -->

  <!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if offline -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.2.min.js"><\/script>')</script>
  
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
  <script src="js/libs/gumby.min.js"></script>
  <script src="js/plugins.js"></script>
  <script src="js/main.js"></script>
<!--OVERLAY-->
<script>
$(function() {
	$('#apptitle').change(function(){
		var titleContent = $('#apptitle').val();
		$('#app_title_bar').html(titleContent);
	});
	$('#amount').hide();
	$('#pricing').change(function(){
		var pricing = $('#pricing').find(':selected').text();
		if(pricing=="Free"){
			$('#amount').hide();
		}else{
			$('#amount').show();
		}
	});
	
	//ffor the details page
	$('#change').click(function(){
		$(this).hide();
		$('#cat').show();
	});
	$('#upload_block').hide();
	$('#chupload').click(function(){
		$('#upload_block').show();
	});
	$('.more').hide();
	$('.moresubmit').hide();
	$('.showmore').click(function(e){
		e.preventDefault();
		$('.more').show();
		$('#moresubmit').show();
	});
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
	<script src="js/libs/jquery-1.7.2.min.js"></script>
	<script src="js/process.js"></script>
	
  <!-- Prompt IE 6 users to install Chrome Frame. Remove this if you want to support IE 6.
       chromium.org/developers/how-tos/chrome-frame-getting-started -->
  <!--[if lt IE 7 ]>
    <script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
    <script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
  <![endif]-->

  </body>
</html>