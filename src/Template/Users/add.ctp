<?php $this->start('navigation')?>
	<?= $this->element("menu", ["activeItem" => "Users"]); ?>
<?php $this->end()?>

<header id="head" class="secondary"></header>
	
<!-- container -->
	<div class="container">

		<ol class="breadcrumb">
			<li><?= $this->Html->link(__('Accueil'), ['controller' => 'Home', 'action' => 'index']) ?></li>
			<li><?= $this->Html->link(__('Utilisateurs'), ['controller' => 'Users', 'action' => 'index']) ?></li>
			<li class="active"><?= __('Nouveau Profil') ?></li>
		</ol>

		<div class="row">
			
			<!-- Article main content -->
			<article class="col-xs-12 maincontent">
				<header class="page-header">
					<h1 class="page-title">Gestion des Profils Utilisateurs</h1>
				</header>
				
				<div class="col-md-10 col-md-offset-1 col-sm-4 col-sm-offset-2">
					
					<div class="panel-body">
						<h2 class="thin text-left">Nouveau Profil</h2>
						<?= $this->Form->create() ?>
							
						<div class="top-margin">
							<?= $this->Form->input('username', ['label' => 'Nom d\'utilisateur', 'class' => 'form-control'])?>						
						</div>
						<div class="top-margin">
							<?= $this->Form->input('email', ['label' => 'Email', 'class' => 'form-control'])?>
						</div>
						<div class="top-margin">
							<?= $this->Form->label('Rôle')?>
							<?= $this->Form->select('role', ['class' => 'form-control'])?>
						</div>
						<div class="top-margin">
							<?= $this->Form->input('password', ['label' => 'Mot de passe', 'class' => 'form-control'])?>
							<br>
							<?= $this->Form->button(__('Générer'), ['class' => 'btn btn-default'])?>
						</div>
						<hr>
						<br>
						<div class="top-margin">
							<?= __('Connexion via Facebook*')?>
							<?= $this->Form->button(__('Obtenir un jeton'), ['class' => 'btn btn-default'])?>
							
						</div>
						
						<div class="col-lg-12 text-right">
							<?= $this->Form->button(__('Valider'), ['class' => 'btn btn-action', 'style' => 'background: #6a6aa5; color: white'])?>
						</div>
    					<?= $this->Form->end() ?>
    					
    					<br>
    					<br>
    					
    					<div class="thin text-center">
							<p>*si l'utilisateur souhaite se connecter grâce à son compte Facebook, son nom d'utilisateur devra correspondre à son identifiant Facebook</p>
						</div>

					</div>
					

				</div>
				
			</article>
			<!-- /Article -->

		</div>
	</div>	<!-- /container -->
	

