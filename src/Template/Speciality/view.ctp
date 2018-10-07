<?php
/*
 * @created : Ramkumar S  
 * @created on : September,2018 
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <h5><?= __('List of Speciality') ?></h5>
    <ul class="side-nav">
        <?php foreach ($listspeciality as $special): 
        ?>
        <li><span></span><?= $this->Html->link(__($special->name), ['action' => 'view', $special->id]) ?></li>
        <?php endforeach; ?>
    </ul>
</nav>
<div class="speciality view large-9 medium-8 columns content">
    <h3><?= h($speciality->name).' :: Related Brands' ?></h3>
    <div class="related">
        <?php if (!empty($speciality->brand)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('S.No') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Position') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php 
            $count = 1;
            foreach ($speciality->brand as $brand): ?>
            <tr>
                <td><?= h($count) ?></td>
                <td><?= h($brand->name) ?></td>
                <td><?= h($brand->position) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Brand', 'action' => 'edit', $brand->id]) ?>  | 
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Brand', 'action' => 'delete', $brand->id], ['confirm' => __('Are you sure you want to delete # {0}?', $brand->id)]) ?>
                </td>
            </tr>
            <?php 
            $count++;
            endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
