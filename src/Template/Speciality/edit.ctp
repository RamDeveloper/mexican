<?php
/*
 * @created : Ramkumar S  
 * @created on : September,2018 
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $speciality->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $speciality->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Speciality'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Brand'), ['controller' => 'Brand', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Brand'), ['controller' => 'Brand', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="speciality form large-9 medium-8 columns content">
    <?= $this->Form->create($speciality) ?>
    <fieldset>
        <legend><?= __('Edit Speciality') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('is_active');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
