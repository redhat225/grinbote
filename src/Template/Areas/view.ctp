<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Area'), ['action' => 'edit', $area->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Area'), ['action' => 'delete', $area->id], ['confirm' => __('Are you sure you want to delete # {0}?', $area->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Areas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Area'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sites'), ['controller' => 'Sites', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Site'), ['controller' => 'Sites', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="areas view large-9 medium-8 columns content">
    <h3><?= h($area->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Nom') ?></th>
            <td><?= h($area->nom) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($area->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Sites') ?></h4>
        <?php if (!empty($area->sites)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Nom') ?></th>
                <th><?= __('Cel1') ?></th>
                <th><?= __('Cel2') ?></th>
                <th><?= __('Addresse') ?></th>
                <th><?= __('Area Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($area->sites as $sites): ?>
            <tr>
                <td><?= h($sites->id) ?></td>
                <td><?= h($sites->nom) ?></td>
                <td><?= h($sites->cel1) ?></td>
                <td><?= h($sites->cel2) ?></td>
                <td><?= h($sites->addresse) ?></td>
                <td><?= h($sites->area_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Sites', 'action' => 'view', $sites->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Sites', 'action' => 'edit', $sites->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Sites', 'action' => 'delete', $sites->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sites->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
