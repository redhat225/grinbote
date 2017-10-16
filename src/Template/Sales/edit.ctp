<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $sale->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $sale->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Sales'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Baskets'), ['controller' => 'Baskets', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Basket'), ['controller' => 'Baskets', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="sales form large-9 medium-8 columns content">
    <?= $this->Form->create($sale) ?>
    <fieldset>
        <legend><?= __('Edit Sale') ?></legend>
        <?php
            echo $this->Form->input('customer');
            echo $this->Form->input('adress');
            echo $this->Form->input('user_id', ['options' => $users]);
            echo $this->Form->input('total');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
