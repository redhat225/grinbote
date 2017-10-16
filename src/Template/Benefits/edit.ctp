<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $benefit->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $benefit->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Benefits'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Type Benefits'), ['controller' => 'TypeBenefits', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Type Benefit'), ['controller' => 'TypeBenefits', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Baskets'), ['controller' => 'Baskets', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Basket'), ['controller' => 'Baskets', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="benefits form large-9 medium-8 columns content">
    <?= $this->Form->create($benefit) ?>
    <fieldset>
        <legend><?= __('Edit Benefit') ?></legend>
        <?= $this->Form->input('designation');?>
        <select name="type_benefit_id" id="type_benefit_id">
            <?php foreach ($typeBenefits as $typeBenefit) :?>
                        <?php   if($benefit->type_benefit->nom==$typeBenefit->nom): ?>
                    <option value="<?php echo $typeBenefit->id; ?>" selected><?php echo $typeBenefit->nom ?></option>
                        <?php   else: ?>
                            <option value="<?php echo $typeBenefit->id; ?>"><?php echo $typeBenefit->nom ?></option>
                        <?php   endif; ?>
            <?php endforeach; ?>
        </select>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
<pre>
  
</pre>