<!-- _slider.php - view part for slider when it's render. -->    
<!-- for images -->
<div class="slider">
    <ul>
        <?php
            foreach($items as $item):
        ?>                    
            <li><img src="<?php echo $item[0]?>" alt="$item[1]" /></li>
        <?php endforeach;?>    
    </ul>
</div>

<!-- for previous and nexdt buttons -->
<div id="slider-nav" style="display: block;top: -190px;">
    <button data-dir="prev" style="padding: 10px 0px;">&laquo;</button>
    <button data-dir="next" style="padding: 10px 0px;">&raquo;</button>
</div>
<?php 
        if(isset($options['speed'])){?>
<script type="text/javascript">
    var container = $('div.slider').css('overflow', 'hidden').children('ul');
    var slider = new Slider(container, $('#slider-nav'));

    slider.nav.find('button').on('click', function(){
        slider.setCurrent($(this).data('dir'));
        slider.transition();
    });
    setInterval(function(){
                    slider.setCurrent('next');
                    slider.transition();
    },<?php echo $options['speed'];?>);
</script>
<?php
        }else{
?>
<script type="text/javascript">
    var container = $('div.slider').css('overflow', 'hidden').children('ul');
    var slider = new Slider(container, $('#slider-nav'));

    slider.nav.find('button').on('click', function(){
        slider.setCurrent($(this).data('dir'));
        slider.transition();
    });
    setInterval(function(){
                    slider.setCurrent('next');
                    slider.transition();
    },3000);
</script>

<?php
        }
?>
