<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Gift'), ['action' => 'edit', $gift->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Gift'), ['action' => 'delete', $gift->id], ['confirm' => __('Are you sure you want to delete # {0}?', $gift->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Gifts'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Gift'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sales'), ['controller' => 'Sales', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sale'), ['controller' => 'Sales', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="gifts view large-9 medium-8 columns content">
    <h3><?= h($gift->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Description') ?></th>
            <td><?= h($gift->description) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($gift->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Validity') ?></th>
            <td><?= $this->Number->format($gift->validity) ?></td>
        </tr>
        <tr>
            <th><?= __('Ratio') ?></th>
            <td><?= $this->Number->format($gift->ratio) ?></td>
        </tr>
        <tr>
            <th><?= __('Count') ?></th>
            <td><?= $this->Number->format($gift->count) ?></td>
        </tr>
        <tr>
            <th><?= __('Won') ?></th>
            <td><?= $this->Number->format($gift->won) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($gift->created) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Sales') ?></h4>
        <?php if (!empty($gift->sales)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Customer') ?></th>
                <th><?= __('Adress') ?></th>
                <th><?= __('Modified') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Total') ?></th>
                <th><?= __('Printed') ?></th>
                <th><?= __('Impressed') ?></th>
                <th><?= __('Reward') ?></th>
                <th><?= __('Gift Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($gift->sales as $sales): ?>
            <tr>
                <td><?= h($sales->id) ?></td>
                <td><?= h($sales->created) ?></td>
                <td><?= h($sales->customer) ?></td>
                <td><?= h($sales->adress) ?></td>
                <td><?= h($sales->modified) ?></td>
                <td><?= h($sales->user_id) ?></td>
                <td><?= h($sales->total) ?></td>
                <td><?= h($sales->printed) ?></td>
                <td><?= h($sales->impressed) ?></td>
                <td><?= h($sales->reward) ?></td>
                <td><?= h($sales->gift_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Sales', 'action' => 'view', $sales->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Sales', 'action' => 'edit', $sales->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Sales', 'action' => 'delete', $sales->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sales->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
