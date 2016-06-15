$(function(){	

	var options = { 
			target:   '#output',   // target element(s) to be updated with server response 
			beforeSubmit:  beforeSubmit,  // pre-submit callback 
			uploadProgress: OnProgress,
			success:       afterSuccess,  // post-submit callback 
			resetForm: true        // reset the form after successful submit 
		}; 
		
	 $('#MyUploadForm').submit(function() { 
			$(this).ajaxSubmit(options);  			
			// return false to prevent standard browser submit and page navigation 
			return false; 
		});
});

//when upload progresses	
function OnProgress(event, position, total, percentComplete)
{
	
	//Progress bar
	$('.bar').css('width', percentComplete+'%');	
	$('#progressbar').css("width", percentComplete + '%') ;//update progressbar percent complete
	$('#statustxt').html(percentComplete + '%'); //update status text
	if(percentComplete>50)
		{
			$('#statustxt').css('color','#fff'); //change status text to white after 50%
		}
		/*var progress = setInterval(function() {
    var $bar = $('#progressbar');

    if ($bar.width()==400) 
	{
        clearInterval(progress);
        $('.progress').removeClass('active');
    } else 
	{
        $bar.width($bar.width()+40);
    }
    $bar.text($bar.width()/4 + "%");
}, 800);*/
}

//after succesful upload
function afterSuccess()
{
	$('#submit-btn').show(); //hide submit button
	$('#loading-img').hide(); //hide submit button

}

jQuery.fn.notice = function(message){
		return this.each(function(){
		var $this = $(this)
	
		$this.html("<div class='alert btn-block alert-warning'><button type='button' class='close' data-dismiss='alert'></button>"+message+"</div>")	
	})	
}

//function to check file size before uploading.
function beforeSubmit(){
	
	$('#progressbox').hide(); //hide progressbar first of all
    //check whether browser fully supports all File API
   if (window.File && window.FileReader && window.FileList && window.Blob)
	{

		if( !$('#imageInput').val()) //check empty input filed
		{
			$("#alerter").notice("Please select an image file");
			return false
		}
		
		var fsize = $('#imageInput')[0].files[0].size; //get file size
		var ftype = $('#imageInput')[0].files[0].type; // get file type
		
		
		
		//allow only valid image file types 
		switch(ftype)
        {
            case 'image/png': case 'image/gif': case 'image/jpeg': case 'image/pjpeg':
                break;
            default:
                $("#alerter").notice("<b>"+ftype+"</b> Unsupported file type!");
				return false
        }
		
		//Allowed file size is less than 1 MB (1048576)
		if(fsize>1048576) 
		{
			$("#alerter").notice("<b>"+bytesToSize(fsize) +"</b> Too big Image file! <br />Please reduce the size of your photo using an image editor.");
			return false
		}
		
		$("#alerter .alert").alert("close");
		
		var completed       = '0%';
		
		//Progress bar
		$('#progressbox').show(); //show progressbar
		$('#progressbar').width(completed); //initial value 0% of progressbar
		$('.bar').css('width', 0+'%');
		$('#statustxt').html(completed); //set status text
		$('#statustxt').css('color','#000'); //initial color of status text

				
		//$('#submit-btn').hide(); //hide submit button
		$('#loading-img').show(); //hide submit button 
	}
	else
	{
		//Output error to older unsupported browsers that doesn't support HTML5 File API
		$("#alerter").notice("Please upgrade your browser, because your current browser lacks some new features we need!");
		return false;
	}
}

//function to format bites bit.ly/19yoIPO
function bytesToSize(bytes) {
   var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
   if (bytes == 0) return '0 Bytes';
   var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
   return Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i];
}