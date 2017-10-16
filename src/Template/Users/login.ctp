<?php $this->layout="default" ?>
<div class="container">
		<div class="container">
			<h4 class="white-text accc-row-padding">Institut Grin d'Boté Prestige</h5>
			<div class="col s4 accc-right-barrow">
				<p class="logo-wrapper-circle">
					<?= $this->Html->image('grindbote.png'); ?> 
				</p>
			</div>
			<div class="col s1">
				
			</div>
			<div class="col s7">
				<h5 class="bold white-text zero-margin">Système de Gestion des prestations</h5>
				 <?= $this->Form->create(null,['id'=>'authentification-form']) ?>

					<div class="input-field col s12">
						 <i class="prefix small ion-ios-person"></i>
					     <input id="phone" name="phone" type="tel" class="required">
					     <label for="phone">Login</label>
				    </div>
				    <div class="input-field col s12">
						 <i class="prefix small ion-android-lock"></i>
					     <input id="password" name="password" type="password" class="required">
					     <label for="password">Mot de Passe</label>
				    </div>
				    <button type="submit" id="submit-login-admin" class="btn submit-button bold">Connexion</button>
					<div class="loaderAjax">
				    	<img src="/grinBote/webroot/AjaxLoader/loading.gif"/>
				    </div>
				<?= $this->Form->end() ?>
				 <p>
				 	<?= $this->Html->link('Mot de passe oublié',['action' => 'forgotten'],['class'=>'accc-row-padding white-text']) ?>
				 </p>			 
				<p>
				<?= $this->Html->link('SignIn', ['action'=>'add'],['class'=>'white-text']) ?>
				</p>
			</div>
			
		</div>
	</div>
</div>

<!-- Modal BoX Structure -->
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

<?php $this->Html->script('authentification',['block' => true]); ?>