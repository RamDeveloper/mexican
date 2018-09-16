<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Brand $brand
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Speciality'), ['controller' => 'Speciality', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Brand'), ['controller' => 'Brand', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="brand form large-9 medium-8 columns content">
    <?= $this->Form->create($brand,array('type' => 'file','id'=>'addbrandForm')) ?>
    <fieldset>
        <legend><?= __('Add Brand') ?></legend>
        <?php
            echo $this->Form->control('name',['label'=>'Brand Name']);
            echo $this->Form->control('position');
            echo $this->Form->control('image', ['type' => 'file', 'label' => ['text' => 'Upload Brand Image <i class="text-muted">(The image must be JPG or PNG file, less then 2MB in size and dimensions should be 750px x 360px)</i>', 'escape'=>false]]);
            echo $this->Form->control('speciality_id', ['options' => $speciality, 'empty' => true]);
            echo $this->Form->control('is_active',['type'=>'hidden','value'=>1]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
