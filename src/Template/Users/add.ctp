
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Add User') ?></legend>
        <?php
            echo $this->Form->input('nom');
            echo $this->Form->error('nom','Veuillez spécifier un nom avec au moins 2 caractères');

            echo $this->Form->input('prenom');
            echo $this->Form->error('prenom','Veuillez spécifier un prénom avec au moins 2 caractères');

            $roles=['admin'=>'Administrateur','member' => 'Membre'];
            echo $this->Form->label('role','Role',['class'=>'bold']);
            echo $this->Form->select('role',$roles,['default'=>'member']);
            echo $this->Form->input('phone');
            echo $this->Form->error('phone','Veuillez spécifier un numéro de téléphone à 8 chiffres');
            echo $this->Form->input('password');
            echo $this->Form->error('password','Veuillez spécifier un mot de passe avec au moins 8 caractères');

            echo $this->Form->label('site_id','Site');
        ?>
        <select name="site_id" id="site_id">
            <?php foreach ($sites as $site) :?>
                    <option value="<?= $site->id ?>"><?= $site->nom ?></option>
             <?php endforeach;?>
        </select>


    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
