<?php $this->start('navigation')?>
	<?= $this->element("menu", ["activeItem" => "Polls"]); ?>
<?php $this->end()?>

<header id="head" class="secondary"></header>
	
<!-- container -->
	<div class="container">

		<ol class="breadcrumb">
			<li><?= $this->Html->link(__('Accueil'), ['controller' => 'Home', 'action' => 'index']) ?></li>
			<li><?= $this->Html->link(__('Sondage'), ['controller' => 'Polls', 'action' => 'index']) ?></li>
			<li class="active"><?= __('Nouveau Sondage') ?></li>
		</ol>

		<div class="row">
			
			<!-- Article main content -->
			<article class="col-xs-12 maincontent">
				<header class="page-header">
					<h1 class="page-title">Gestion des Sondages</h1>
				</header>
				
				<div class="col-md-10 col-md-offset-1 col-sm-4 col-sm-offset-2">
					
					<div class="panel-body">
						<h2 class="thin text-left">Nouveau Sondage</h2>
						<?= $this->Form->create($poll) ?>
							
						<div class="top-margin">
							<?= $this->Form->input('title', ['label' => 'Intitulé'])?>						
						</div>
						<div class="top-margin">
							<?= $this->Form->label('Catégorie')?>
							<?= $this->Form->select('musicstyleid', $genre)?>
						</div>
						<div class="top-margin">
							<?= $this->Form->input('description', ['label' => 'Description'])?>
						</div>
						<div class="top-margin">
							<?= $this->Form->input('begindate', ['label' => 'Début', 'empty' => true])?>
						</div>
						<div class="top-margin">
							<?= $this->Form->input('enddate', ['label' => 'Fin'])?>
						</div>					
						
						<div class="col-lg-12 text-right">
							<?= $this->Form->button(__('Valider'), ['class' => 'btn btn-action', 'style' => 'background: #6a6aa5; color: white'])?>
						</div>
    					<?= $this->Form->end() ?>
    				</div>
    					
				</div>
				
			</article>
			<!-- /Article -->

		</div>
	</div>	<!-- /container -->
	