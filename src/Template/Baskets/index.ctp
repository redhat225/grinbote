<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Basket'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sales'), ['controller' => 'Sales', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sale'), ['controller' => 'Sales', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Benefits'), ['controller' => 'Benefits', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Benefit'), ['controller' => 'Benefits', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="baskets index large-9 medium-8 columns content">
    <h3><?= __('Baskets') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('sale_id') ?></th>
                <th><?= $this->Paginator->sort('benefit_id') ?></th>
                <th><?= $this->Paginator->sort('price') ?></th>
                <th><?= $this->Paginator->sort('qte') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($baskets as $basket): ?>
            <tr>
                <td><?= $this->Number->format($basket->id) ?></td>
                <td><?= $basket->has('sale') ? $this->Html->link($basket->sale->id, ['controller' => 'Sales', 'action' => 'view', $basket->sale->id]) : '' ?></td>
                <td><?= $basket->has('benefit') ? $this->Html->link($basket->benefit->id, ['controller' => 'Benefits', 'action' => 'view', $basket->benefit->id]) : '' ?></td>
                <td><?= $this->Number->format($basket->price) ?></td>
                <td><?= $this->Number->format($basket->qte) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $basket->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $basket->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $basket->id], ['confirm' => __('Are you sure you want to delete # {0}?', $basket->id)]) ?>
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
