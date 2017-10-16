
<div class="row center">
<div class="container">
    <div class="container">
      
    <?= $this->Form->create($benefit,['class'=>'admin-form dash-form']) ?>
        <label for="designation" class="">Designation</label>
        <input type="text" name="designation" required="required" class="required" maxlength="255" id="designation">
        <select name="type_benefit_id" class="browser-default">
        <?php foreach ($typeBenefits as $typeBenefit) : ?>
                <option value="<?php echo $typeBenefit->id; ?>"><?php echo $typeBenefit->nom; ?></option>
        <?php endforeach; ?>
        </select>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>  
    </div>
</div>
</div>