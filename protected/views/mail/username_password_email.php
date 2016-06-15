<p>Hi there,</p>
<p>You username and password has been created for Neptrip account.Please find the details the below:</p>
<p>Username: <?php echo $myMail['username']?$myMail['username']:'N/A';?>  </p>
<p>Password: <?php echo $myMail['orginal_password']?$myMail['orginal_password']:'N/A';?></p>

<p>Please click the following link to login.</p>
<p>
	Login:<a href="<?php echo Yii::app()->baseUrl;?>/login">Login</a>
</p>


<p>To create the username and password, approve or reject the user,please login to the admin.</p>
<p>Note: This is just an auto generated email from Neptrip.com. Please don't reply this email.<p>
