<div class="row center">
<i class="ion-plus-circled pink-text medium"></i>
    <i class="ion-ios-flower pink-text accc-huge-icon"></i>
    <h4 class="zero-margin">Ajouter une vente</h4>
    <h6 class="pink-text bold">Veuillez renseigner les informations d'enregistrement dans le formulaire ci dessous :</h6>
</div>
<div class="row center">
    <div class="container">
    <div class="container">
                <?= $this->Form->create($sale,['class'=>'admin-form dash-form']) ?>
                          <div class="col s12 input-field">
                                 <i class="ion-chatbox-working small prefix game-main-color"></i>
                                  <input type="text" name="customer" class="required" required="required" maxlength="255" id="customer">
                                <label class="" for="customer">Client</label>
                        </div>
                        <div class="col s12 input-field">
                               <i class="ion-code-working small prefix game-main-color"></i>
                                <input type="text" name="adress" class="required" required="required" maxlength="255" id="adress">
                               <label class="" for="adress">Adresse</label>
                          </div>
          <?= $this->Form->button(__('Créer'),['class'=>'btn pink white-text','type'=>'submit']) ?>
    <?= $this->Form->end() ?>
    </div>

    </div>
</div>


 <!-- echo $this->Form->input('user_id', ['options' => $users]); -->