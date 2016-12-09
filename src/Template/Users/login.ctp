<?php $this->start('navigation')?>
	<?= $this->element("menu", ["activeItem" => "CONNEXION"]); ?>
<?php $this->end()?>

<header id="head" class="secondary"></header>
	
<!-- container -->
	<div class="container">

		<ol class="breadcrumb">
			<li><?= $this->Html->link(__('Accueil'), ['controller' => 'Home', 'action' => 'index']) ?></li>
			<li class="active"><?= __('Authentification') ?></li>
		</ol>

		<div class="row">
			
			<!-- Article main content -->
			<article class="col-xs-12 maincontent">
				<header class="page-header">
					<h1 class="page-title">Connexion</h1>
				</header>
				
				<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
					<div class="panel panel-default">
						<div class="panel-body">
							<h3 class="thin text-center">Connexion à votre compte Top-H.it</h3>
							<p class="text-center text-muted">(se connecter grâce à votre compte <?= $this->Html->link(__('Facebook'), ['controller' => 'Home', 'action' => 'index']) ?>) </p>
							<hr>
							<?= $this->Form->create()?>
						
								<div class="top-margin">
								<?php 
									echo $this->Form->input('username', ['label' => 'Nom d\'utilisateur/Email*'])
								?>						
								</div>
								<div class="top-margin">
								<?php 
									echo $this->Form->input('password', ['label' => 'Mot de passe*'])?>
								</div>
								<hr>
						
								<div class="row">
									<div class="col-lg-8">
										<b><a href="">Problème de connexion</a></b>
									</div>
									<div class="col-lg-4 text-right">
										<?= $this->Form->button(__('Connexion'), ['class' => 'btn btn-action', 'style' => 'background: #1e1e4a;'])?>
									</div>
								</div>
							
							<?= $this->Form->end() ?>
						</div>
					</div>

				</div>
				
			</article>
			<!-- /Article -->

		</div>
	</div>	<!-- /container -->
	

