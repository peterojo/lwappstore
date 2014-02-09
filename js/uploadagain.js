var handleScreenshotUpload = function(event){
	$('#screenshots').empty();
	event.preventDefault();
	event.stopPropagation();
	
	var fileInput = document.getElementById('shot');
	var titlebox = document.getElementById('apptitle');
	var title = titlebox.value;
	var app_id = document.getElementById('app_id').value;

	var data = new FormData();

	data.append('ajax', true);
	data.append('nushot', true);
	data.append('title', title);
	data.append('app_id', app_id);

	for (var i = 0; i < fileInput.files.length; ++i){
		data.append('shot[]', fileInput.files[i]);
	}

	var re = new XMLHttpRequest();

	re.upload.addEventListener('progress', function(e){
		if (e.lengthComputable) {
			var percent = e.loaded / e.total;
			var progress = document.getElementById('upload_progresses');

			while(progress.hasChildNodes()){
				progress.removeChild(progress.firstChild);
			}
			progress.appendChild(document.createTextNode(Math.round(percent * 100) + ' % uploaded, please wait...'));
		}
	});

	re.upload.addEventListener('load', function(e){
		document.getElementById('upload_progresses').style.display='none';
	});

	re.upload.addEventListener('error', function(e){
		alert("Upload failed!");
	});

	re.addEventListener('readystatechange', function(event){
		if(this.readyState==4){
			if(this.status==200){
				var links = document.getElementById('screenshots');
				var uploaded = eval(this.response);
				
				var div, img, p;

				for (var i = 0; i < uploaded.length; ++i){
					div = document.createElement('div');
					if(uploaded[i].substr(0, 4)=="scr_"){
						div.setAttribute('class', 'uploaded_shot');
						img	= document.createElement('img');
						img.setAttribute('src', 'screenshots/'+uploaded[i]);
						div.innerHTML = "<img src='http://videoshare.loveworldapis.com/lwappstore/screenshots/"+uploaded[i]+"' />";
						//div.appendChild(img);
					}else{
						p = document.createElement(p);
						p.setAttribute('style', 'color: #F00;');
						p.appendChild(document.createTextNode(uploaded[i]));

						div.appendChild(p);
					}
					links.appendChild(div);
				}
			}else{
				console.log('Server replied with status '+this.status);
			}
		}
	});

	re.open('POST', '../uploadScreenshots');
	re.setRequestHeader('Cache-Control', 'no-cache');

	document.getElementById('upload_progresses').style.display='block';
	
	re.send(data);
};

var handleScrUpdate = function(event){
	//alert("started");
	var idme = ($(this).attr('id'));
	//alert(idme);
	$('#screen'+idme).empty();
	event.preventDefault();
	event.stopPropagation();
	//alert(this);
	var scrInput = document.getElementById(idme);
	//alert(scrInput);
	var titlebox = document.getElementById('apptitle');
	var title = titlebox.value;
	var app_id = document.getElementById('app_id').value;
	var scr_id = $('#scr_id'+idme).val();
	var oldscr = $('#oldscr'+idme).val();

	var data = new FormData();

	data.append('ajax', true);
	data.append('title', title);
	data.append('app_id',app_id);
	data.append('scr_id', scr_id);
	data.append('oldscr', oldscr);

	for (var i = 0; i < scrInput.files.length; ++i){
		data.append('shot[]', scrInput.files[i]);
	}

	var request = new XMLHttpRequest();

	request.upload.addEventListener('progress', function(e){
		if (e.lengthComputable) {
			var percent = e.loaded / e.total;
			var progress = document.getElementById('upload_progresses');

			while(progress.hasChildNodes()){
				progress.removeChild(progress.firstChild);
			}
			progress.appendChild(document.createTextNode(Math.round(percent * 100) + ' % uploaded, please wait...'));
		}
	});

	request.upload.addEventListener('load', function(e){
		document.getElementById('upload_progresses').style.display='none';
	});

	request.upload.addEventListener('error', function(e){
		alert("Upload failed!");
	});

	request.addEventListener('readystatechange', function(event){
		if(this.readyState==4){
			if(this.status==200){
				var links = document.getElementById('screen'+idme);
				var uploaded = eval(this.response);
				
				var div, img, p;

				for (var i = 0; i < uploaded.length; ++i){
					div = document.createElement('div');
					if(uploaded[i].substr(0, 4)=="scr_"){
						div.setAttribute('class', 'scrsht');
						img	= document.createElement('img');
						img.setAttribute('src', 'screenshots/'+uploaded[i]);
						div.innerHTML = "<img src='http://videoshare.loveworldapis.com/lwappstore/screenshots/"+uploaded[i]+"' />";
						$('#more').hide();
						$('#updated'+idme).fadeIn(3000).delay(5000).fadeOut(3000);
					}else{
						p = document.createElement(p);
						p.setAttribute('style', 'color: #F00;');
						p.appendChild(document.createTextNode(uploaded[i]));

						div.appendChild(p);
					}
					links.appendChild(div);
				}
			}else{
				console.log('Server replied with status '+this.status);
			}
		}
	});

	request.open('POST', '../updateScreenshots');
	request.setRequestHeader('Cache-Control', 'no-cache');

	document.getElementById('upload_progresses').style.display='block';
	
	request.send(data);
};

var handleIconUpload = function(event){
	$('#icon_preview').empty();
	event.preventDefault();
	event.stopPropagation();
	
	var iconInput = document.getElementById('app_icon');
	var titlebox = document.getElementById('apptitle');
	var title = titlebox.value;
	var app_id = document.getElementById('app_id').value;

	var data = new FormData();

	data.append('ajax', true);
	data.append('title', title);
	data.append('app_id',app_id);

	for (var i = 0; i < iconInput.files.length; ++i){
		data.append('app_icon[]', iconInput.files[i]);
	}

	var r = new XMLHttpRequest();

	r.upload.addEventListener('progress', function(e){
		if (e.lengthComputable) {
			var percent = e.loaded / e.total;
			var progress = document.getElementById('upload_progress');

			while(progress.hasChildNodes()){
				progress.removeChild(progress.firstChild);
			}
			progress.appendChild(document.createTextNode(Math.round(percent * 100) + ' % uploaded, please wait...'));
		}
	});

	r.upload.addEventListener('load', function(e){
		document.getElementById('upload_progress').style.display='none';
	});

	r.upload.addEventListener('error', function(e){
		alert("Upload failed!");
	});

	r.addEventListener('readystatechange', function(event){
		if(this.readyState==4){
			if(this.status==200){
				var links = document.getElementById('icon_preview');
				var uploaded = eval(this.response);
				
				var div, img, p;

				for (var i = 0; i < uploaded.length; ++i){
					div = document.createElement('div');
					if(uploaded[i].substr(0, 5)=="icon_"){
						div.setAttribute('id', 'uploaded_icon');
						img	= document.createElement('img');
						img.setAttribute('src', 'icon/'+uploaded[i]);
						div.innerHTML = "<img src='http://localhost/lwappstore/icons/"+uploaded[i]+"' />";
						$('#more').hide();
						$('#updatedicon').fadeIn(3000).delay(5000).fadeOut(3000);
					}else{
						p = document.createElement(p);
						p.setAttribute('style', 'color: #F00;');
						p.appendChild(document.createTextNode(uploaded[i]));

						div.appendChild(p);
					}
					links.appendChild(div);
				}
			}else{
				console.log('Server replied with status '+this.status);
			}
		}
	});

	r.open('POST', '../uploadIcon');
	r.setRequestHeader('Cache-Control', 'no-cache');

	document.getElementById('upload_progress').style.display='block';
	
	r.send(data);
};

var handleAPKUpload = function(event){
	$('#myapk').empty();
	event.preventDefault();
	event.stopPropagation();
	
	var apkInput = document.getElementById('apk_file');
	var titlebox = document.getElementById('apptitle');
	var title = titlebox.value;
	var app_id = document.getElementById('app_id').value;
	
	var data = new FormData();

	data.append('ajax', true);
	data.append('title', title);
	data.append('app_id',app_id);
	for (var i = 0; i < apkInput.files.length; ++i){
		data.append('apk_file[]', apkInput.files[i]);
	}

	var req = new XMLHttpRequest();

	req.upload.addEventListener('progress', function(e){
		if (e.lengthComputable) {
			var percent = e.loaded / e.total;
			var progress = document.getElementById('upload_prog');

			while(progress.hasChildNodes()){
				progress.removeChild(progress.firstChild);
			}
			progress.appendChild(document.createTextNode(Math.round(percent * 100) + ' % uploaded, please wait...'));
		}
	});

	req.upload.addEventListener('load', function(e){
		document.getElementById('upload_prog').style.display='none';
	});

	req.upload.addEventListener('error', function(e){
		alert("Upload failed!");
	});

	req.addEventListener('readystatechange', function(event){
		if(this.readyState==4){
			if(this.status==200){
				var links = document.getElementById('myapk');
				var uploaded = eval(this.response);
				
				var div, img, p;

				for (var i = 0; i < uploaded.length; ++i){
					div = document.createElement('div');
					if(uploaded[i].substr(0, 4)=="apk_"){
						div.innerHTML = uploaded[i];
						$('#upload_block').hide();
					}else{
						p = document.createElement(p);
						p.setAttribute('style', 'color: #F00;');
						p.appendChild(document.createTextNode(uploaded[i]));

						div.appendChild(p);
					}
					links.appendChild(div);
				}
			}else{
				console.log('Server replied with status '+this.status);
			}
		}
	});

	req.open('POST', '../uploadApp');
	req.setRequestHeader('Cache-Control', 'no-cache');

	document.getElementById('upload_prog').style.display='block';
	
	req.send(data);
	//console.log(this.response);
};

window.addEventListener('load', function(event){
	//alert("I'm ready.");
	var scr = $('.morescr');
	$('#shot').click(function(e){
		if($('#apptitle').val()==""){
			e.preventDefault();
			alert("Kindly fill in the application title first.");
			$('#apptitle').focus();
		}
	});
	
	$('.morescr').click(function(){
		var idme = ($(this).attr('id'));
		var shot = document.getElementById(idme);
		shot.addEventListener('change', handleScrUpdate);
	});
	
	var icon = document.getElementById('app_icon');
	$('#app_icon').click(function(e){
		if($('#apptitle').val()==""){
			e.preventDefault();
			alert("Kindly fill in the application title first.");
			$('#apptitle').focus();
		}
	});
	icon.addEventListener('change', handleIconUpload);
	
	var titlebox = document.getElementById('apptitle');
	var title = titlebox.value;
	var apk = document.getElementById('apk_file');
	$('#apk_file').click(function(e){
		if($('#apptitle').val()==""){
			e.preventDefault();
			alert("Kindly fill in the application title first.");
			$('#apptitle').focus();
		}
	});
	apk.addEventListener('change', handleAPKUpload);
	
	var scr = document.getElementById('shot');
	$('#shot').click(function(e){
		if($('#apptitle').val()==""){
			e.preventDefault();
			alert("Kindly fill in the application title first.");
			$('#apptitle').focus();
		}
	});
	scr.addEventListener('change', handleScreenshotUpload);
});
	
