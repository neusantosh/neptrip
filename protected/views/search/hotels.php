<div class="hotel_searchresults">
	<legend>Hotel Search Results</legend>
	<?php
		if(!empty($records) && is_array($records)){
			foreach($records as $record):
				//echo '<pre>';print_r($record);exit;
	?>
			<div class="search_result">
				<div class="hotel_mainimage">
					<?php
						if($record['hotel_image']!='' && file_exists('images/hotels/'.$record['hotel_image'])){
							$image_url = Yii::app()->baseUrl.'/images/hotels/'.$record['hotel_image'];
						}else{
							$image_url = Yii::app()->baseUrl.'/images/imagenotfound.png';		
						}
					?>

					<img src="<?php echo $image_url;?>" width="250px" title="<?php echo $record['hotel_name'];?>" alt="<?php echo $record['hotel_name'];?>">

				</div>
				<div class="name">
					<strong>
						<?php echo $record['hotel_name'];?>	
					</strong>
				</div>

				<div class="address_rating">
					<?php $this->widget('bootstrap.widgets.TbMenu', array(
						    'type'=>'list',
						    'items'=>array(
						        array('label'=>$record['city_village'].', '.Districts::model()->getName($record['district']).', '.Zones::model()->getZoneName($record['zone']), 'icon'=>'map-marker'), // This is from YiiBootstrap
						    ),
					)); 
					$this->widget('ext.DzRaty.DzRaty', array(
	    						'name' => 'my_rating_field_'.$record['id'],
	    						'value' => $record['star_rating'],
	    						'options' => array(
  									  'readOnly' => TRUE,
								),
					));
					?>
				</div>

				<?php $temp = explode('?',Yii::app()->request->url);?>
				<a href="<?php echo $this->createUrl('hotels/slug/'.$record['slug']);?>" class="btn btn-primary">Details</a>

				<hr/>

			</div>
	<?php
			endforeach;
		}else{
	?>
		<p>No search results.</p>
	<?php
		}
	?>
</div>

<div class="pagination">
    <?php
    $this->widget('CLinkPager', array(
        'pages' => $pages,
        'header' => '',
        'nextPageLabel' => 'Next',
        'prevPageLabel' => 'Prev',
        'selectedPageCssClass' => 'active',
        'hiddenPageCssClass' => 'disabled',
        'htmlOptions' => array(
            'class' => '',
        )
    ))
    ?>
</div>
