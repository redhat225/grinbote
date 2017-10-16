<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Benefit'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Type Benefits'), ['controller' => 'TypeBenefits', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Type Benefit'), ['controller' => 'TypeBenefits', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Baskets'), ['controller' => 'Baskets', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Basket'), ['controller' => 'Baskets', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="benefits index large-9 medium-8 columns content">
    <h3><?= __('Benefits') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('designation') ?></th>
                <th><?= $this->Paginator->sort('type_benefit_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($benefits as $benefit): ?>
            <tr>
                <td><?= $this->Number->format($benefit->id) ?></td>
                <td><?= h($benefit->designation) ?></td>
                <td><?= $benefit->has('type_benefit') ? $this->Html->link($benefit->type_benefit->nom, ['controller' => 'TypeBenefits', 'action' => 'view', $benefit->type_benefit->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $benefit->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $benefit->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $benefit->id], ['confirm' => __('Are you sure you want to delete # {0}?', $benefit->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
