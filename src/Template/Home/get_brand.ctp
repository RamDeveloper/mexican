<?php
/*
 * @created : Ramkumar S  
 * @created on : September,2018 
 */
?>
<div class="">      
    <?php 
    if(!empty($brand)){
        $count = 1;
        foreach($brand as $item=>$value){
    ?>

    <div class="checkbox">
        <?php  echo $this->Form->checkbox('Brand.name[]', ['value' => $value['id'],'id'=>$count,'hiddenField' => false]); ?>
        <label for="<?php echo $count;?>">
            <span></span>
            <small><?php echo $value['value'];?></small>
        </label>
    </div>
    <?php 
        $count ++;
        }
    }
    ?>
</div>