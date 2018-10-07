<?php
/*
 * @created : Ramkumar S  
 * @created on : September,2018 
 */
?>
<div class="brand view large-9 medium-8 columns content">
    <h3><?= h($brand->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($brand->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Image Url') ?></th>
            <td><?= h($brand->image_url) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $brand->has('user') ? $this->Html->link($brand->user->name, ['controller' => 'Users', 'action' => 'view', $brand->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Speciality') ?></th>
            <td><?= $brand->has('speciality') ? $this->Html->link($brand->speciality->name, ['controller' => 'Speciality', 'action' => 'view', $brand->speciality->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($brand->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Position') ?></th>
            <td><?= $this->Number->format($brand->position) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($brand->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Active') ?></th>
            <td><?= $brand->is_active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
