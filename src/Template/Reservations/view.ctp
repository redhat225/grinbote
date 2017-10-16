<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Reservation'), ['action' => 'edit', $reservation->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Reservation'), ['action' => 'delete', $reservation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reservation->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Reservations'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Reservation'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Benefits'), ['controller' => 'Benefits', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Benefit'), ['controller' => 'Benefits', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sites'), ['controller' => 'Sites', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Site'), ['controller' => 'Sites', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="reservations view large-9 medium-8 columns content">
    <h3><?= h($reservation->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Client') ?></th>
            <td><?= h($reservation->client) ?></td>
        </tr>
        <tr>
            <th><?= __('Benefit') ?></th>
            <td><?= $reservation->has('benefit') ? $this->Html->link($reservation->benefit->id, ['controller' => 'Benefits', 'action' => 'view', $reservation->benefit->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Site') ?></th>
            <td><?= $reservation->has('site') ? $this->Html->link($reservation->site->id, ['controller' => 'Sites', 'action' => 'view', $reservation->site->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($reservation->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($reservation->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Datewanted') ?></th>
            <td><?= h($reservation->datewanted) ?></td>
        </tr>
    </table>
</div>
