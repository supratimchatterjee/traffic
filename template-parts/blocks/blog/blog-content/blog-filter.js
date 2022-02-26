$('#categoryfilter').on('change', function() {
	var a = $( "#categoryfilter" ).val();
	$('#spinner').show();
	$('#blog_res_area').css('opacity', '0.6');
	$.ajax({
		url: themeFolder+"/wp-admin/admin-ajax.php",
		method: "POST",
		dataType: 'html',
		data: {
			action: 'blogfilter',
			category_1: a,
		},
		success: function(data){
			$('#spinner').hide();
			$('#blog_res_area').css('opacity', '1');
			$('#blog_res_area').html(data);
			//$( "#pagination" ).load( $("#pagination a").attr('href') + " #pagination" );
		}
	});
	
	
});


$("#t_blog_search").submit(function(){
	var btitle = $( "#btitle" ).val();

	$('#spinner').show();
	$('#blog_res_area').css('opacity', '0.6');
	$.ajax({
		url: themeFolder+"/wp-admin/admin-ajax.php",
		method: "POST",
		dataType: 'html',
		data: {
			action: 'filterblogtitle',
			btitle: btitle
		},
		success: function(data){
			$('#spinner').hide();
			$('#blog_res_area').css('opacity', '1');
			$('#blog_res_area').html(data);
		}
	});
	
});