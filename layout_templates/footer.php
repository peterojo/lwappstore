<div class="row header footer">
  	© <?php echo date("Y", time()); ?> LoveWorld App Store.  </div>
</div> <!--! end of #container -->



  <!-- JavaScript at the bottom for fast page loading -->

  <!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if offline -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="<?php echo base_url(); ?>js/libs/jquery-1.7.2.min.js"><\/script>')</script>
  
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
  <script src="<?php echo base_url(); ?>js/libs/gumby.min.js"></script>
  <script src="<?php echo base_url(); ?>js/plugins.js"></script>
  <script src="<?php echo base_url(); ?>js/main.js"></script>
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
	$('.scrsht').click(function(e){
		var myid = ($(this).attr('id'));
		$('#from'+myid).toggle();
	});
	$('.delscr').click(function(e){
		var result = confirm('Are you sure about this?');
		if(result){
			var id = ($(this).attr('id'));
			$.post('../deleteScreenshot/'+id, {'id':id}, function(data){
				var scrshtdivid = $(this).attr('name');
				$('#'+scrshtdivid).empty();
				$('#del'+scrshtdivid).fadeIn(500).delay(3000).fadeOut(500);
			});
		}
	});
	//ffor the details page
	/*
	$('#change').click(function(){
			$(this).hide();
			$('#cat').show();
		});*/
	
	$('#upload_block').hide();
	$('#chupload').click(function(){
		$('#upload_block').toggle();
	});
	$('.more').hide();
	$('.moresubmit').hide();
	$('.showmore').click(function(e){
		e.preventDefault();
		$('.more').toggle();
		/*$('#moresubmit').toggle();*/
	});
	//$('.morescr').hide();
	$('.showmorescr').click(function(e){
		e.preventDefault();
		var sid = ($(this).attr('id'));
		$('.morescr').toggle();
	});
	$('#addnewscr').click(function(){
		$('#newscr').toggle();
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
	<!-- Prompt IE 6 users to install Chrome Frame. Remove this if you want to support IE 6.
       chromium.org/developers/how-tos/chrome-frame-getting-started -->
  <!--[if lt IE 7 ]>
    <script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
    <script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
  <![endif]-->

  </body>
</html>