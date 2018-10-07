<?php
/*
 * @created : Ramkumar S  
 * @created on : September,2018 
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Speciality') ?></li>
        <?php foreach ($speciality as $speciality): ?>
        <li><span></span><?= $this->Html->link(__($speciality->name), ['action' => 'view', $speciality->id]) ?></li>
        <?php endforeach; ?>
    </ul>
</nav>
<div class="speciality index large-9 medium-8 columns content">
    <h3><?= __('List of Brands') ?></h3>
    
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
