<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Site'), ['action' => 'edit', $site->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Site'), ['action' => 'delete', $site->id], ['confirm' => __('Are you sure you want to delete # {0}?', $site->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Sites'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Site'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Areas'), ['controller' => 'Areas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Area'), ['controller' => 'Areas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="sites view large-9 medium-8 columns content">
    <h3><?= h($site->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Nom') ?></th>
            <td><?= h($site->nom) ?></td>
        </tr>
        <tr>
            <th><?= __('Cel1') ?></th>
            <td><?= h($site->cel1) ?></td>
        </tr>
        <tr>
            <th><?= __('Cel2') ?></th>
            <td><?= h($site->cel2) ?></td>
        </tr>
        <tr>
            <th><?= __('Addresse') ?></th>
            <td><?= h($site->addresse) ?></td>
        </tr>
        <tr>
            <th><?= __('Area') ?></th>
            <td><?= $site->has('area') ? $this->Html->link($site->area->id, ['controller' => 'Areas', 'action' => 'view', $site->area->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($site->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Users') ?></h4>
        <?php if (!empty($site->users)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Nom') ?></th>
                <th><?= __('Prenom') ?></th>
                <th><?= __('Role') ?></th>
                <th><?= __('Phone') ?></th>
                <th><?= __('Password') ?></th>
                <th><?= __('Site Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($site->users as $users): ?>
            <tr>
                <td><?= h($users->id) ?></td>
                <td><?= h($users->nom) ?></td>
                <td><?= h($users->prenom) ?></td>
                <td><?= h($users->role) ?></td>
                <td><?= h($users->phone) ?></td>
                <td><?= h($users->password) ?></td>
                <td><?= h($users->site_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $users->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $users->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Users', 'action' => 'delete', $users->id], ['confirm' => __('Are you sure you want to delete # {0}?', $users->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
