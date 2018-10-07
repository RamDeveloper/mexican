<?php
/*
 * @created : Ramkumar S  
 * @created on : September,2018 
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Speciality'), ['action' => 'edit', $speciality->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Speciality'), ['action' => 'delete', $speciality->id], ['confirm' => __('Are you sure you want to delete # {0}?', $speciality->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Speciality'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Speciality'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Brand'), ['controller' => 'Brand', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Brand'), ['controller' => 'Brand', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="speciality view large-9 medium-8 columns content">
    <h3><?= h($speciality->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($speciality->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($speciality->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Active') ?></th>
            <td><?= $this->Number->format($speciality->is_active) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Brand') ?></h4>
        <?php if (!empty($speciality->brand)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Position') ?></th>
                <th scope="col"><?= __('Image Url') ?></th>
                <th scope="col"><?= __('Users Id') ?></th>
                <th scope="col"><?= __('Speciality Id') ?></th>
                <th scope="col"><?= __('Is Active') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($speciality->brand as $brand): ?>
            <tr>
                <td><?= h($brand->id) ?></td>
                <td><?= h($brand->name) ?></td>
                <td><?= h($brand->position) ?></td>
                <td><?= h($brand->image_url) ?></td>
                <td><?= h($brand->users_id) ?></td>
                <td><?= h($brand->speciality_id) ?></td>
                <td><?= h($brand->is_active) ?></td>
                <td><?= h($brand->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Brand', 'action' => 'view', $brand->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Brand', 'action' => 'edit', $brand->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Brand', 'action' => 'delete', $brand->id], ['confirm' => __('Are you sure you want to delete # {0}?', $brand->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
