<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $typeBenefit->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $typeBenefit->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Type Benefits'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Benefits'), ['controller' => 'Benefits', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Benefit'), ['controller' => 'Benefits', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="typeBenefits form large-9 medium-8 columns content">
    <?= $this->Form->create($typeBenefit) ?>
    <fieldset>
        <legend><?= __('Edit Type Benefit') ?></legend>
        <?php
            echo $this->Form->input('nom');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
