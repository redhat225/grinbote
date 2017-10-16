<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Edit User') ?></legend>
        <?php
            echo $this->Form->input('nom');
            echo $this->Form->input('prenom');
            $roles=['admin'=>'Administrateur','member'=>'Membre'];
            echo $this->Form->select('role',$roles,['default'=>$user->role]);
            echo $this->Form->input('phone');
            echo $this->Form->input('password',['value'=>'']);
            echo $this->Form->label('site_id','Site');
        ?>
            <select name="site_id" id="site_id">
                <?php foreach ($sites as $site):?>
                    <?php if($user->site->id==$site->id) :?>
                        <option value="<?= $site->id ?>" selected><?= $site->nom ?></option>
                    <?php else: ?>
                        <option value="<?= $site->id ?>"><?= $site->nom ?></option>
                    <?php endif; ?>
                <?php endforeach; ?>
            </select>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
