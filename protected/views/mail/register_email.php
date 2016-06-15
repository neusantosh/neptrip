<p>Hi there,</p>
<p>A new user has been registered in the Neptrip.com. Please find the details the below:</p>
<p>Business Name: <?php echo $myMail['business_name']?$myMail['business_name']:'N/A';?></p>
<p>Business Type: <?php echo $myMail['business_type']?$myMail['business_type']:'N/A';?></p>
<p>Address: <?php echo $myMail['address']?$myMail['address']:'N/A';?></p>
<p>Street Address: <?php echo $myMail['street_address']?$myMail['street_address']:'N/A';?></p>
<p>Postal Code: <?php echo $myMail['postal_address']?$myMail['postal_address']:'N/A';?></p>
<p>City: <?php echo $myMail['city']?$myMail['city']:'N/A';?></p>
<p>Ward No.: <?php echo $myMail['ward_number']?$myMail['ward_number']:'N/A';?></p>
<p>Block No.: <?php echo $myMail['property_block_no']?$myMail['property_block_no']:'N/A';?></p>
<p>Zone: <?php echo $myMail['zone']?$myMail['zone']:'N/A';?></p>
<p>District: <?php echo $myMail['district']?$myMail['district']:'N/A';?></p>
<p>Phone1: <?php echo $myMail['phone1']?$myMail['phone1']:'N/A';?></p>
<p>Phone2: <?php echo $myMail['phone2']?$myMail['phone2']:'N/A';?></p>
<p>Fax: <?php echo $myMail['fax']?$myMail['fax']:'N/A';?></p>
<p>Email: <?php echo $myMail['email']?$myMail['email']:'N/A';?></p>
<p>Web: <?php echo $myMail['web']?$myMail['web']:'N/A';?></p>
<p>Facebook Link: <?php echo $myMail['web']?$myMail['web']:'N/A';?></p>
<p>Contact Person : <?php echo $myMail['contact_person']?$myMail['contact_person']:'N/A';?></p>
<p>Contact Person Role: <?php echo $myMail['contact_person_role']?$myMail['contact_person_role']:'N/A';?></p>
<p>Mobile Number: <?php echo $myMail['contact_person_role']?$myMail['contact_person_role']:'N/A';?></p>

<?php /*<p>Please click the following link to approve and reject the user</p>
<p>Approve : <a href="<?php echo $this->createUrl('register/approveuser/'.md5($myMail['id']));?>">Approve</a></p>
<p>Reject : <a href="<?php echo $this->createUrl('register/rejectuser/'.md5($myMail['id']));?>">Reject</a></p> */?>

<p>To create the username and password, approve or reject the user,please login to the admin.</p>
<p>Note: This is just an auto generated email from Neptrip.com. Please don't reply this email.<p>
