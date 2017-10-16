<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Reservation'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Benefits'), ['controller' => 'Benefits', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Benefit'), ['controller' => 'Benefits', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sites'), ['controller' => 'Sites', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Site'), ['controller' => 'Sites', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="reservations index large-9 medium-8 columns content">
    <h3><?= __('Reservations') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('client') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('datewanted') ?></th>
                <th><?= $this->Paginator->sort('benefit_id') ?></th>
                <th><?= $this->Paginator->sort('site_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($reservations as $reservation): ?>
            <tr>
                <td><?= $this->Number->format($reservation->id) ?></td>
                <td><?= h($reservation->client) ?></td>
                <td><?= h($reservation->created) ?></td>
                <td><?= h($reservation->datewanted) ?></td>
                <td><?= $reservation->has('benefit') ? $this->Html->link($reservation->benefit->id, ['controller' => 'Benefits', 'action' => 'view', $reservation->benefit->id]) : '' ?></td>
                <td><?= $reservation->has('site') ? $this->Html->link($reservation->site->id, ['controller' => 'Sites', 'action' => 'view', $reservation->site->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $reservation->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $reservation->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $reservation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reservation->id)]) ?>
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
