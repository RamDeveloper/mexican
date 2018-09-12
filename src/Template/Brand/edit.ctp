<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Brand $brand
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $brand->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $brand->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Brand'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Speciality'), ['controller' => 'Speciality', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Speciality'), ['controller' => 'Speciality', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="brand form large-9 medium-8 columns content">
    <?= $this->Form->create($brand) ?>
    <fieldset>
        <legend><?= __('Edit Brand') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('position');
            echo $this->Form->control('image_url');
            echo $this->Form->control('users_id', ['options' => $users, 'empty' => true]);
            echo $this->Form->control('speciality_id', ['options' => $speciality, 'empty' => true]);
            echo $this->Form->control('is_active');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
