<?php
/*
 * @created : Ramkumar S  
 * @created on : September,2018 
 */
?>
<header>
    <div class="logo text-center pt-30 pb-30">
      <?php echo $this->Html->image('logo.png', ['alt' => 'Logo', 'url' => ['controller' => 'Home', 'action' => 'index']]); ?>
    </div>
</header>
<div class="container"> 
<?= $this->Form->create('Speciality', array('type' => 'file', 'id' => 'SpecialtiyForm','url' => ['action' => 'slideshow'])) ?>
<section>
    <div class="white-box mt-30">
        <div class="steps-section">
            <div class="title-blk">
                <h5>SELECT SPECIALITY</h5>
            </div>
            <?php
            echo $this->Form->control('Speciality.name', array(
                        'options' => $speciality,
                        'empty'=>false,
                        'label' => false,
                        'data-placeholder'=>'multiple',
                        'class'=>'chosen-select form-control'));
            ?>
            <div class="recommened-btn-container text-center mt-40">
                <input type="Submit" value="Submit" class="green-btn rec-nxt-btn" />\
            </div>
        </div>
    </div>
</section>

<section>
    <div class="white-box mt-30 mb-50 form-quote-container clearfix">
        <div class="title-blk">
            <h5>Advanced Option</h5>
        </div>
        <div id="preloader" class="hidden text-center mt-30">
                <?php echo $this->Html->image('bx_loader.gif', ['alt' => 'Logo', 'url' => ['controller' => 'Home', 'action' => 'index']]); ?>
        </div> 
        <div class="form-group brand_group">  
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
        </div>  
        <div class="clearfix"></div>
        <div class="recommened-btn-container text-center mt-40">
            <input type="Submit" value="Submit" class="green-btn rec-nxt-btn" />\
        </div>
    </div>
</section>
<?= $this->Form->end() ?>
</div>
<!-- footer section starts here -->
<footer>
    <div class="footer">
        <div class="container">
            <div class="footer-bottom">
                <div class="copy-rights">
                    <p>Copyright © Mexican Wave Pharma. All Rights Reserved</p>
                </div>
            </div>
        </div>
    </div>
</footer>