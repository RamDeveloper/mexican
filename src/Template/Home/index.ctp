<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Speciality[]|\Cake\Collection\CollectionInterface $speciality
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Home') ?></li>
        <li><?= $this->Html->link(__('List Speciality'), ['controller' => 'Home', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Brand'), ['controller' => 'Brand', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="speciality index large-9 medium-8 columns content">
    <h3><?= __('Speciality') ?></h3>
    <?= $this->Form->create('Speciality', array('type' => 'file', 'id' => 'SpecialtiyForm','url' => ['action' => 'slideshow'])) ?>
    <?php
    echo $this->Form->control('Speciality.name', array(
                'options' => $speciality,
                'label' => 'Choose Speciality',
                'data-placeholder'=>'multiple',
                'class'=>'chosen-select form-control'));
    ?>
    <br>
    <h3 id="advanced_option">Advanced Option</h3>
    <div id="advanced_brand">
    <?php
    echo $this->Form->control('Brand.name', array(
                'options' => $brand,
                'label' => 'Choose Brand',
                'data-placeholder'=>'Choose Brand',
                'multiple'=>'multiple',
                'class'=>'chosen-select form-control'));
    ?>
    </div>
    <br>
    <?= $this->Form->button(__('Submit', ['class' => 'float-right btn btn-success'])) ?>
    <?= $this->Form->end() ?>
</div>
