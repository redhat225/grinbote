<div class="row center">
    <h4 class="bold pink-text"><?= h('Facture N° '.$sale->id) ?></h4>
</div>
<div class="row" id="">
    <table class="MyTable striped bordered bold centered" cellpadding="0" cellspacing="0">
            <thead class="pink white-text">
            <?php if($sale->printed==0) :?>
                 <th><?= __('Ajouter presation') ?></th>
            <?php   endif; ?>
                 <th><?= __('Client') ?></th>
                <th><?= __('Addresse') ?></th>
                <th><?= __('Caissier') ?></th>
                <th><?= __('Total') ?></th>
                <th><?= __('Remise') ?></th>
                <th><?= __('Net à payer') ?></th>
                 <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
            </thead>
            <tbody>
                <tr class="white"> 
                <?php if($sale->printed==0) :?>
                <td class="pointer"> <i class="ion-plus-circled small pink-text" id="add-new-item"></i>
                 </td>
                 <?php   endif; ?>  

                 <td><?= h($sale->customer) ?></td>
                 <td><?= h($sale->adress) ?></td>
                    <td><?= $sale->has('user') ? $this->Html->link($sale->user->nom." ".$sale->user->prenom, ['controller' => 'Users', 'action' => 'view', $sale->user->id]) : '' ?></td>
                 <td><?= h($sale->total) ?></td>
                 <td><strong>(<?= h($this->Number->format($sale->reward))."%" ?>)</strong><?=h($this->Number->format(($sale->reward/100)*($sale->total))) ?></td>
                 <td><strong><?= h($this->Number->format($sale->total-($sale->reward/100)*($sale->total))) ?></strong></td>
                    <td><?= h($sale->created) ?></td>
                 <td><?= h($sale->modified) ?></td>
                </tr>
            </tbody>

        </tr>
    </table>
    <div class="row center">
        <h4 class="pink-text"><?= __('Contenu de la facture') ?></h4>
        <?php if (!empty($sale->baskets)): ?>
         <table class="MyTable striped bordered bold centered" cellpadding="0" cellspacing="0">
            <thead class="pink white-text">
                <th><?=$this->Paginator->sort('designation','Désignation')?></th>
                <th><?=$this->Paginator->sort('prix','Prix Unitaire')?></th>
                <th><?=$this->Paginator->sort('qte','Qte')?></th>
                <th><?=$this->Paginator->sort('Total','Total')?></th>
                <?php if($sale->printed==0) :?>
                    <th class="actions"><?= __('Actions') ?></th>
                <?php endif;?>
                
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
            <tfoot class="black"> 
                    <tr>
                        <th align="left" colspan="3">Total</th> 
                        <th id="totalprinted"><?= $sale->total ?></th>
                            <th>
                                <?php if($sale->printed==0): ?>
                                    <?= $this->Form->label('fullremise','remise sur la facture (%)') ?>
                                    <?= $this->Form->input('fullremise',['type'=>'number','label'=>false,'value'=>0,'placeholder'=>0,'id'=>'tremise','class'=>'pink-text bold']) ?>
                                <?php else :?>
                                     <?= $this->Form->input('remise',['type'=>'number','value'=>$sale->reward,'disabled','class'=>'pink-text bold']) ?>
                                <?php endif; ?>
                            </th> 
                        <th>    
                                <?= $this->Form->button($sale->printed==0?'Imprimer Facture':'Réimprimer Facture',['type'=>'button','id'=>'confirmPrinted','bills'=>$sale->id,'printed'=>$sale->printed,'class'=>'btn waves-effect pink white-text']) ?>
                        </th>
                    </tr>
            </tfoot>
        </table>
        <?php endif; ?>

    </div>
        <!-- Container for adding things in the bucket -->
    <div class="row related-adding-basket" id="gamer-info-table">
            <div class="row related-adding-basket-content hidden"> 
                        <h4 class="pink-text">Panier</h4>
                         <?= $this->Form->create(null,['id'=>'form-cart-prestation','class'=>'admin-form dash-form']) ?>
                                <table class="MyTable striped bordered bold centered" cellpadding="0" cellspacing="0">
                                        <thead class="pink white-text">
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
                                                    <th><?= $this->Form->button('Annuler',['id'=>'reset-add-new-basket-trigger','type'=>'reset','class'=>'btn grey white-text']) ?></th>
                                                    <th> <?= $this->Form->button('Valider',['id'=>'add-new-basket-trigger','type'=>'submit','class'=>'btn white-text pink']) ?></th>    
                                                    <th>
                                                        <i class="ion-plus-circled medium pink-text" id="add-cart-bills"></i>
                                                    </th>
                                                    <th>
                                                    <?= $this->Form->label('tfacture','Total Facture',['class'=>'bold']) ?>
                                                    <?= $this->Form->input('tfacture',['type'=>'number','label'=>false,'disabled','class'=>'bold pink-text']) ?>
                                                    </th>
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
  <div id="mainModal-suiviAdmin" class="modal white center-align">
        <div class="modal-content">
                <p class="logo-wrapper-circle left-img-center">
                    <?= $this->Html->image('grindbote.png'); ?> 
                </p>
            <h6 class="pink-text modal-text bold acc-small-top-margin"></h6>
        </div>
        <div class="modal-footer pink">
            <a href="#!" class="modal-action white-text modal-close waves-effect waves-green bold">OK</a>
        </div>
  </div>
<?php $this->Html->script('manageBasket',['block'=>true])?>
