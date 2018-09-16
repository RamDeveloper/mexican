<?php
if(!empty($list_brands)){

function cmp($a, $b)
{
    return strcmp($a["position"], $b["position"]);
}
usort($list_brands, "cmp");//Sorting the array to display brand page
?>
<div class="slider">
	<?php foreach($list_brands as $value) { ?>
  		<div><img src="<?php echo $this->request->webroot, $value['image_url']; ?>" ></div>
  	<?php } ?>
</div>
<?php 
}else{
	echo 'Nothing found please try again later';
}
?>