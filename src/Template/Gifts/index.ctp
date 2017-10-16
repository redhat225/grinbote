<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Gift'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sales'), ['controller' => 'Sales', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sale'), ['controller' => 'Sales', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="gifts index large-9 medium-8 columns content">
    <h3><?= __('Gifts') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('description') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('validity') ?></th>
                <th><?= $this->Paginator->sort('ratio') ?></th>
                <th><?= $this->Paginator->sort('count') ?></th>
                <th><?= $this->Paginator->sort('won') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($gifts as $gift): ?>
            <tr>
                <td><?= $this->Number->format($gift->id) ?></td>
                <td><?= h($gift->description) ?></td>
                <td><?= h($gift->created) ?></td>
                <td><?= $this->Number->format($gift->validity) ?></td>
                <td><?= $this->Number->format($gift->ratio) ?></td>
                <td><?= $this->Number->format($gift->count) ?></td>
                <td><?= $this->Number->format($gift->won) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $gift->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $gift->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $gift->id], ['confirm' => __('Are you sure you want to delete # {0}?', $gift->id)]) ?>
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
