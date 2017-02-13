<?php $this->start('navigation')?>
	<?= $this->element("menu", ["activeItem" => "Contact"]); ?>
<?php $this->end()?>

<header id="head" class="secondary"></header>
	
<!-- container -->
<div class="container">

	<ol class="breadcrumb">
		<li><?= $this->Html->link(__('Accueil'), ['controller' => 'Home', 'action' => 'index']) ?></li>
		<li class="active"><?= __('Contact') ?></li>
	</ol>

	<div class="row">
		
		<!-- Article main content -->
		<article class="col-xs-12 maincontent">
		
			<header class="page-header">
				<h1 class="page-title">Formulaire de contact</h1>
			</header>
			
			<div class="col-md-10 col-md-offset-1 col-sm-4 col-sm-offset-2">
				
				<div class="panel-body">
					<?= $this->Form->create($contact) ?>
						
					<div class="top-margin">
						<?= $this->Form->input('name', ['label' => 'Votre nom *'])?>						
					</div>
					<div class="top-margin">
						<?= $this->Form->input('email', ['label' => 'Votre email *'])?>
					</div>
					<div class="top-margin">
						<?= $this->Form->label('Votre question *')?>
						<?= $this->Form->input('body', ['label' => false])?>
					</div>
					
					<hr>
					<br>

					<div class="col-lg-12 text-right">
						<?= $this->Html->link('Annuler', ['controller' => 'Home', 'action' =>'index'], ['class' => 'btn btn-action', 'style' => 'background: #888; color: white']) ?>
						<?= $this->Form->button(__('Valider'), ['class' => 'btn btn-action', 'style' => 'background: #6a6aa5; color: white'])?>
						</div>
    					<?= $this->Form->end() ?>
    					<p> *  Champs obligatoires </p>
    				</div>
    				
				</div>
				
			</article>
			<!-- /Article -->

	</div>

</div>	
<!-- /container -->
	