<div class="row center">
        <i class="accc-huge-icon pink-text ion-ios-flower"></i>   
        <h4 class="zero-margin">Récapitulatif des ventes</h4>
</div>  
<div class="row" id="gamer-info-table">
    <table class="MyTable striped bordered bold centered" cellpadding="0" cellspacing="0">
        <thead class="pink white-text">
            <tr>
                <th><?= $this->Paginator->sort('id','Id') ?></th>
                <th><?= $this->Paginator->sort('created','Enregistrement') ?></th>
                <th><?= $this->Paginator->sort('users.nom','Responsable') ?></th>
                <th><?= $this->Paginator->sort('total','Total') ?></th>
                <th><?= $this->Paginator->sort('reward','Remise') ?></th>
                <th><?= $this->Paginator->sort('Net Payé','Net Payé') ?></th>
                <th><?= $this->Paginator->sort('sites.nom','Site') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sales as $sale): ?>
            <tr class="black-text">
                <td><?= $this->Number->format($sale->id) ?></td>
                <td><?= h($sale->created) ?></td>
                <td><?= $sale->has('users') ? $this->Html->link($sale->users['nom']." ".$sale->users['prenom'], ['controller' => 'Users', 'action' => 'view', $sale->users['id']]) : '' ?></td>
                <td><?= $this->Number->format($sale->total) ?></td>
                <td><?= $this->Number->format($sale->reward)."%" ?>(<?= $this->Number->format(($sale->reward/100)*($sale->total)) ?>)</td>
                <td><?= $this->Number->format($sale->total-($sale->reward/100)*($sale->total)) ?></td>
                <td><?= $sale->sites['nom'] ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $sale->id]) ?>
                    <?php if( (($sale->printed==0) && ($user=="member"))|| (($sale->printed==0) && ($user=="admin"))) :?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $sale->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $sale->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sale->id)]) ?>
                    <?php endif; ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
