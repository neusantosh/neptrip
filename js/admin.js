var site_url = $('#site_url').attr('data-url');
$(document).ready(function(){
	$('.createpassword').click(function(e){
		e.preventDefault();
		$.ajax({
			type:"get",
			url:site_url+"/admin/users/createpassword",
			success:function(msg){
				$('#Business_password').val(msg);
			}
		});
	});
});