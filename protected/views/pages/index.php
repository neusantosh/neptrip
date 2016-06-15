<?php if(!empty($record)){ 
	$this->pageTitle = $record['page_title'];
?>

	<h1><?php echo $record['page_title'];?></h1>
	<p>
		<?php echo $record['page_description'];?>
	</p>
<?php }else{ ?>
	<p>No results found</p>
<?php } ?>