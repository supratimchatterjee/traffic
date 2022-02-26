$('#job_filter select').on('change', function() {
	var a = $( "#werkervaring" ).val();
	var b = $( "#dienstverband" ).val();
	var c = $( "#opleidingsniveau" ).val();
	$('#spinner').show();
	$('.vacancy_holder').css('opacity', '0.6');
	$.ajax({
		url: themeFolder+"/wp-admin/admin-ajax.php",
		method: "POST",
		dataType: 'html',
		data: {
			action: 'filterjob',
			category_1: a,
			category_2: b,
			category_3: c,
		},
		success: function(data){
			$('#spinner').hide();
			$('.vacancy_holder').css('opacity', '1');
			$('#vacancy_holder').html(data);
		}
	});
	
	
});


$("#t_job_search").submit(function(){
	var jtitle = $( "#j_title" ).val();

	$('#spinner').show();
	$('.vacancy_holder').css('opacity', '0.6');
	$.ajax({
		url: themeFolder+"/wp-admin/admin-ajax.php",
		method: "POST",
		dataType: 'html',
		data: {
			action: 'filterjobtitle',
			jtitle: jtitle
		},
		success: function(data){
			$('#spinner').hide();
			$('.vacancy_holder').css('opacity', '1');
			$('#vacancy_holder').html(data);
		}
	});
	
});


