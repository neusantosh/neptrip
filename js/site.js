$(document).ready(function(){
	$('#select_all').click(function(){
		$(".facility").prop('checked', $(this).prop("checked"));
	});

	$('.remove_roomimage').click(function(){
		var imageid = $(this).attr('data-id');
		var imagedelurl = $(this).attr('data-url');
		$(this).closest('.room_image').remove();
		$.ajax({
			type:"post",
			data:"image_id="+imageid,
			url:imagedelurl,
			success:function(msg){
				console.log(msg);
			}
		});
	});

	$('.removelogo').click(function(){
		var hid = $(this).attr('id');
		var logodelurl = $(this).attr('data-url');
		var logoimage = $(this).attr('data-imagename');
		$(this).closest('.logoImageHolder').remove();
		$.ajax({
			type:"post",
			data:"id="+hid+"&imagename="+logoimage,
			url:logodelurl,
			success:function(msg){
				$('input[name="old_image"]').val('');
				console.log(msg);
			}
		});
	});

	$('.remove_hotelimage').click(function(){
		var imageid = $(this).attr('id');
		var delurl = $(this).attr('data-url');
		$(this).closest('.hotelimage_wrapper').remove();
		$.ajax({
			type:"post",
			data:"id="+imageid,
			url:delurl,
			success:function(msg){
				console.log(msg);
			}

		});
	});

	$('.removevenueimage').click(function(){
		var imageid  = $(this).attr('data-id');
		var delurl 	 = $(this).attr('data-url');
		var imagename = $(this).attr('data-image');
		$(this).closest('.galleryimage').remove();

		$.ajax({
			type:"post",
			data:"id="+imageid+"&imagename="+imagename,
			url:delurl,
			success:function(msg){
				console.log(msg);
			}

		});
	});

	$('.removevenuelogo').click(function(){
		var imageid  = $(this).attr('data-id');
		var delurl 	 = $(this).attr('data-url');
		var imagename = $(this).attr('data-image');
		$(this).closest('.venuelogo').remove();
		$.ajax({
			type:"post",
			data:"id="+imageid+"&imagename="+imagename,
			url:delurl,
			success:function(msg){
				$('input[name="old_image"]').val('');
				console.log(msg);
			}

		});
	});

	//$('#Resturants_opening_hour,#Resturants_closing_hour').timepicker();

	$('.removeresturantlogo').click(function(){	
		
		var imageid 	= $(this).attr('data-id');
		var delurl 		= $(this).attr('data-url');
		var imagename 	= $(this).attr('data-imagename');
		$(this).closest('.resturant-logo').remove();
		$.ajax({
			type:"post",
			data:"id="+imageid+"&imagename="+imagename,
			url:delurl,
			success:function(msg){
				$('input[name="old_image"]').val('');
				console.log(msg);
			}
		});
	});

	$('.removeresturantimage').click(function(){	
		var imageid 	= $(this).attr('data-id');
		var delurl 		= $(this).attr('data-url');
		var imagename 	= $(this).attr('data-imagename');
		$(this).closest('.resturant-imagegallery').remove();
		$.ajax({
			type:"post",
			data:"id="+imageid+"&imagename="+imagename,
			url:delurl,
			success:function(msg){
				console.log(msg);
			}
		});
	});

	$('.remove_tourlogo').click(function(){
		var imageid 	= $(this).attr('data-id');
		var delurl 		= $(this).attr('data-url');
		var imagename 	= $(this).attr('data-imagename');
		$(this).closest('.tourlogo').remove();
		$.ajax({
			type:"post",
			data:"id="+imageid+"&imagename="+imagename,
			url:delurl,
			success:function(msg){
				$('input[name="old_image"]').val('');
				console.log(msg);
			}
		});
	});


	$('.remove_tourgallery').click(function(){
		var imageid 	= $(this).attr('data-id');
		var delurl 		= $(this).attr('data-url');
		var imagename 	= $(this).attr('data-imagename');
		$(this).closest('.galleryimage').remove();
		$.ajax({
			type:"post",
			data:"id="+imageid+"&imagename="+imagename,
			url:delurl,
			success:function(msg){
				console.log(msg);
			}
		});
	});

	$('.remove_vehicleimage').click(function(){
		var imageid 	= $(this).attr('data-id');
		var delurl 		= $(this).attr('data-url');
		var imagename 	= $(this).attr('data-image');
		$(this).closest('.vehicle_image').remove();
		$.ajax({
			type:"post",
			data:"id="+imageid+"&imagename="+imagename,
			url:delurl,
			success:function(msg){
				$('input[name="old_image"]').val('');
				console.log(msg);
			}
		});
	});

});