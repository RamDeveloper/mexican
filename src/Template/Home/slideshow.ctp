<?php
/*
 * @created : Ramkumar S  
 * @created on : September,2018 
 */
?>
<div class="full_container"> 
<?= $this->Form->create('Speciality', array('type' => 'file', 'id' => 'SpecialtiyForm','url' => ['action' => 'slideshow'])) ?>
<section>
    <div class="white-box mt-30 slide_div">
        <div class="steps-section">
        	<?php
				if(count((array)$list_brands) >= 1){
				function cmp($a, $b)
				{
				    return strnatcasecmp($a["position"], $b["position"]);
				}
				usort($list_brands, "cmp");//Sorting the array to display brand page
				?>
				<div class="slider">
					<?php 
					foreach($list_brands as $value) { ?>
				  		<div><img src="<?php echo ($this->request->webroot) . $value['image_url']; ?>" ></div>
				  	<?php } ?>
				</div>
				<?php 
				}else{
					echo '<div class="title-blk"><h5>Nothing found please try again !</h5></div>';
				}
			?>
        </div>
    </div>
</section>
</div>
<!-- footer section starts here -->
<footer>
	<div class="text-left">
      <?php echo $this->Html->image('back.png', ['alt' => 'Back','widht'=>50,'height'=>50,'url' => ['controller' => 'Home', 'action' => 'index']]); ?>   Back
    </div>
</footer>