<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Speciality[]|\Cake\Collection\CollectionInterface $speciality
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Speciality'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Brand'), ['controller' => 'Brand', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Brand'), ['controller' => 'Brand', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="speciality index large-9 medium-8 columns content">
    <h3><?= __('Speciality') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($speciality as $speciality): ?>
            <tr>
                <td><?= $this->Number->format($speciality->id) ?></td>
                <td><?= h($speciality->name) ?></td>
                <td><?= $this->Number->format($speciality->is_active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $speciality->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $speciality->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $speciality->id], ['confirm' => __('Are you sure you want to delete # {0}?', $speciality->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
