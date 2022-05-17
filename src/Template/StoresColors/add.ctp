<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StoresColor $storesColor
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Stores Colors'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="storesColors form large-9 medium-8 columns content">
    <?= $this->Form->create($storesColor) ?>
    <fieldset>
        <legend><?= __('Add Stores Color') ?></legend>
        <?php
            echo $this->Form->control('color');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
