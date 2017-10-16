<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Sale'), ['action' => 'edit', $sale->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Sale'), ['action' => 'delete', $sale->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sale->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Sales'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sale'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Baskets'), ['controller' => 'Baskets', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Basket'), ['controller' => 'Baskets', 'action' => 'add']) ?> </li>
        <?php if($sale->printed==0) :?>
           <li id="add-new-item"><?= $this->Html->link('Ajouter une prestation',['controller'=>'Baskets','action'=>'add']) ?> </li>
        <?php endif; ?>
    </ul>
</nav>
<div class="sales view large-9 medium-8 columns content">
    <h3><?= h('Facture numéro '.$sale->id) ?></h3>
    <table cellpadding="0" cellspacing="0">
            <thead>
                 <th><?= __('Client') ?></th>
                <th><?= __('Addresse') ?></th>
                <th><?= __('Caissier') ?></th>
                <th><?= __('Total') ?></th>
                 <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
            </thead>
            <tbody>
                            <td><?= h($sale->customer) ?></td>
            <td><?= h($sale->adress) ?></td>
            <td><?= $sale->has('user') ? $this->Html->link($sale->user->nom." ".$sale->user->prenom, ['controller' => 'Users', 'action' => 'view', $sale->user->id]) : '' ?></td>
            <td><?= h($sale->total) ?></td>
            <td><?= h($sale->created) ?></td>
            <td><?= h($sale->modified) ?></td>
            </tbody>

        </tr>
    </table>
    <div class="related">
        <h4><?= __('Contenu de la facture') ?></h4>
        <?php if (!empty($sale->baskets)): ?>
        <table cellpadding="0" cellspacing="0">
            <thead>
                <th><?=$this->Paginator->sort('designation','Désignation')?></th>
                <th><?=$this->Paginator->sort('prix','Prix Unitaire')?></th>
                <th><?=$this->Paginator->sort('qte','Qte')?></th>
                <th><?=$this->Paginator->sort('Total','Total')?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </thead>
            <tbody> 
            <?php foreach ($relatedbaskets as $relatedbasket): ?>
            <tr>
                <td> <?= h($relatedbasket->benefits['designation'])?></td>
                <td> <?= h($relatedbasket->baskets['price']) ?>   </td>
                <td><?= h($relatedbasket->baskets['qte']) ?></td>
                <td><?= h($relatedbasket->baskets['qte']*$relatedbasket->baskets['price']) ?></td>
                <?php if($sale->printed==0) :?>
                    <td class="actions">
                        <?= $this->Form->postLink(__('Delete'), ['controller' => 'Baskets', 'action' => 'delete', $relatedbasket->baskets['id'],$sale->id], ['confirm' => __('Are you sure you want to delete # {0}?',$relatedbasket->baskets['id']) ]) ?>
                    </td>
               <?php endif;?>
            </tr>
            <?php endforeach; ?>
            </tbody>
            <tfoot> 
                    <tr>
                        <th align="left" colspan="3">Total</th> 
                        <th><?= $sale->total ?></th> 
                        <th>    
                                <?= $this->Form->button($sale->printed==0?'Imprimer Facture':'Réimprimer Facture',['type'=>'button','id'=>'confirmPrinted','class'=>$sale->id,'printed'=>$sale->printed]) ?>
                        </th>
                    </tr>
            </tfoot>
        </table>
        <?php endif; ?>

    </div>
        <!-- Container for adding things in the bucket -->
    <div class="related-adding-basket">
            <div class="related-adding-basket-content hidden"> 
                        <h4> Ajouter un article</h4>
                         <?= $this->Form->create(null,['id'=>'form-cart-prestation']) ?>
                                <table>
                                        <thead>
                                            <th>Prestation</th>
                                            <th>Prix Unitaire</th>
                                            <th>Quantitée</th>
                                            <th>Total</th>
                                            <th>Retirer</th>
                                        </thead>
                                        <tbody id="related-adding-basket-cart">

                                        </tbody>

                                        <tfoot> 
                                                <tr>
                                                    <th><?= $this->Form->button('Annuler',['id'=>'reset-add-new-basket-trigger','type'=>'reset']) ?></th>
                                                    <th> <?= $this->Form->button('Valider',['id'=>'add-new-basket-trigger','type'=>'submit']) ?></th>    
            
                                                    <th>
                                                    <?= $this->Form->label('tfacture','Total Facture') ?>
                                                    <?= $this->Form->input('tfacture',['type'=>'number','label'=>false,'disabled']) ?>
                                                    </th>
<!--                                                     <th>
                                                    <?= $this->Form->label('fullremise','remise sur la facture (%)') ?>
                                                    <?= $this->Form->input('fullremise',['type'=>'number','label'=>false,'value'=>0,'placeholder'=>0,'id'=>'tremise']) ?>
                                                    </th> -->

                                                </tr>
                                        </tfoot>
                                </table>
                     <?= $this->Form->hidden('sale_id',['value'=> $sale->id])  ?>
                    
                     <?= $this->Form->end() ?>
            </div>
            <div class="ajaxLoader hidden" align="center">
                   <?= $this->Html->image('/AjaxLoader/rolling.gif') ?> 
                    <h5>Enregistrement du panier en cours veuillez patienter ...</h5>
            </div>  
    </div>
</div>

<!--Sales Modal Box Structure -->
<!--   <div id="mainModal-suiviAdmin" class="modal white center-align">
        <div class="modal-content">
                <p class="logo-wrapper-circle left-img-center">
                    <?= $this->Html->image('grindbote.png'); ?> 
                </p>
            <h6 class="pink-text modal-text bold acc-small-top-margin"></h6>
        </div>
        <div class="modal-footer pink">
            <a href="#!" class="modal-action white-text modal-close waves-effect waves-green bold">OK</a>
        </div>
  </div> -->
<?php $this->Html->script('manageBasket',['block'=>true])?>
