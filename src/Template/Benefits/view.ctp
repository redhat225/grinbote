<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Benefit'), ['action' => 'edit', $benefit->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Benefit'), ['action' => 'delete', $benefit->id], ['confirm' => __('Are you sure you want to delete # {0}?', $benefit->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Benefits'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Benefit'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Type Benefits'), ['controller' => 'TypeBenefits', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Type Benefit'), ['controller' => 'TypeBenefits', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Baskets'), ['controller' => 'Baskets', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Basket'), ['controller' => 'Baskets', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="benefits view large-9 medium-8 columns content">
    <h3><?= h($benefit->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Identifiant') ?></th>
            <td><?= $this->Number->format($benefit->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Designation') ?></th>
            <td><?= h($benefit->designation) ?></td>
        </tr>
        <tr>
            <th><?= __('Type Benefit') ?></th>
            <td><?= $benefit->has('type_benefit') ? $this->Html->link($benefit->type_benefit->nom, ['controller' => 'TypeBenefits', 'action' => 'view', $benefit->type_benefit->id]) : '' ?></td>
        </tr>

    </table>
    <div class="related">
        <h4><?= __('Related Baskets') ?></h4>
        <?php if (!empty($benefit->baskets)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Sale Id') ?></th>
                <th><?= __('Benefit Id') ?></th>
                <th><?= __('Price') ?></th>
                <th><?= __('Qte') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($benefit->baskets as $baskets): ?>
            <tr>
                <td><?= h($baskets->sale_id) ?></td>
                <td><?= h($baskets->benefit_id) ?></td>
                <td><?= h($baskets->price) ?></td>
                <td><?= h($baskets->qte) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Baskets', 'action' => 'view']) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Baskets', 'action' => 'edit']) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Baskets', 'action' => 'delete'], ['confirm' => __('Are you sure you want to delete # {0}?')]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
