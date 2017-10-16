<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Gifts'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Sales'), ['controller' => 'Sales', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sale'), ['controller' => 'Sales', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="gifts form large-9 medium-8 columns content">
    <?= $this->Form->create($gift) ?>
    <fieldset>
        <legend><?= __('Add Gift') ?></legend>
        <?php
            echo $this->Form->input('description');
            echo $this->Form->input('validity');
            echo $this->Form->input('ratio');
            echo $this->Form->input('count');
            echo $this->Form->input('won');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
