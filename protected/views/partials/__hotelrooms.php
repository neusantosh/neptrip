<?php 
	if(isset($rooms) && is_array($rooms)){
		foreach($rooms as $room):
?>
	<div class="hotel_room">
		<hr/>
		<p>
			<strong>
				<?php echo ucfirst($room['name']);?>
			</strong>
		</p>
		<p>
			<a href="<?php echo $this->createUrl('hotels/viewroom/id/'.$room['id']);?>" class="btn btn-success">View Room Details</a>		
		</p>
		<hr/>
	</div>
<?php
		endforeach;
	}else{
?>
<div class="hotel_room">
		<hr/>
			<p>No results found.</p>
		<hr/>
	</div>
<?php
	}
?>