<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Type Benefit'), ['action' => 'edit', $typeBenefit->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Type Benefit'), ['action' => 'delete', $typeBenefit->id], ['confirm' => __('Are you sure you want to delete # {0}?', $typeBenefit->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Type Benefits'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Type Benefit'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Benefits'), ['controller' => 'Benefits', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Benefit'), ['controller' => 'Benefits', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="typeBenefits view large-9 medium-8 columns content">
    <h3><?= h($typeBenefit->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Nom') ?></th>
            <td><?= h($typeBenefit->nom) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($typeBenefit->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Benefits') ?></h4>
        <?php if (!empty($typeBenefit->benefits)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Designation') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($typeBenefit->benefits as $benefits): ?>
            <tr>
                <td><?= h($benefits->id) ?></td>
                <td><?= h($benefits->designation) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Benefits', 'action' => 'view', $benefits->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Benefits', 'action' => 'edit', $benefits->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Benefits', 'action' => 'delete', $benefits->id], ['confirm' => __('Are you sure you want to delete # {0}?', $benefits->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
