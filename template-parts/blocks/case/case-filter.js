$('#case-filter select').on('change', function() {
	var a = $( "#case_branches" ).val();
	var b = $( "#case_cat" ).val();
	$('#spinner').show();
	$('#caseres').css('opacity', '0.6');
	$.ajax({
		url: themeFolder+"/wp-admin/admin-ajax.php",
		method: "POST",
		dataType: 'html',
		data: {
			action: 'casefilter',
			category_1: a,
			category_2: b,
		},
		success: function(data){
			$('#spinner').hide();
			$('#caseres').css('opacity', '1');
			$('#caseres').html(data);
			//$( "#pagination" ).load( $("#pagination a").attr('href') + " #pagination" );
		}
	});
	
	
});


$("#case_t_search").submit(function(){
	var ctitle = $( "#case_t_val" ).val();
	
	$('#spinner').show();
	$('#caseres').css('opacity', '0.6');
	$.ajax({
		url: themeFolder+"/wp-admin/admin-ajax.php",
		method: "POST",
		dataType: 'html',
		data: {
			action: 'filtercasetitle',
			ctitle: ctitle
		},
		success: function(data){
			$('#spinner').hide();
			$('#caseres').css('opacity', '1');
			$('#caseres').html(data);
		}
	});
	
});



