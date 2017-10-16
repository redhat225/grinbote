<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $basket->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $basket->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Baskets'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Sales'), ['controller' => 'Sales', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sale'), ['controller' => 'Sales', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Benefits'), ['controller' => 'Benefits', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Benefit'), ['controller' => 'Benefits', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="baskets form large-9 medium-8 columns content">
    <?= $this->Form->create($basket) ?>
    <fieldset>
        <legend><?= __('Edit Basket') ?></legend>
        <?php
            echo $this->Form->input('sale_id', ['options' => $sales]);
            echo $this->Form->input('benefit_id', ['options' => $benefits]);
            echo $this->Form->input('price');
            echo $this->Form->input('qte');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
