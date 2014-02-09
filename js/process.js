$('#new_app').submit(function(e) {
	//e.preventDefault();
	//alert("hello");
	$.ajax({
		url: 'core/process_new_app.php',
		type: 'post',
		data: $(form).serialize(),
		success: function(data) {
			if(data==="success"){
				alert(data);
				var bool = true;
			}else{
				alert(data);
				var bool = false;
			}
		}
	});
});
