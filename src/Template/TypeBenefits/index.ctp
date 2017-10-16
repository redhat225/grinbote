<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Type Benefit'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Benefits'), ['controller' => 'Benefits', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Benefit'), ['controller' => 'Benefits', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="typeBenefits index large-9 medium-8 columns content">
    <h3><?= __('Type Benefits') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('nom') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($typeBenefits as $typeBenefit): ?>
            <tr>
                <td><?= $this->Number->format($typeBenefit->id) ?></td>
                <td><?= h($typeBenefit->nom) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $typeBenefit->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $typeBenefit->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $typeBenefit->id], ['confirm' => __('Are you sure you want to delete # {0}?', $typeBenefit->id)]) ?>
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
