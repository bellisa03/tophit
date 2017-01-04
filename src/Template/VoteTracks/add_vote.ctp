<?php $this->start('navigation')?>
	<?= $this->element("menu", ["activeItem" => "Polls"]); ?>
<?php $this->end()?>

<header id="head" class="secondary"></header>
	
<!-- container -->
	<div class="container">

		<ol class="breadcrumb">
			<li><?= $this->Html->link(__('Accueil'), ['controller' => 'Home', 'action' => 'index']) ?></li>
			<li><?= $this->Html->link(__('Sondages'), ['controller' => 'Polls', 'action' => 'index']) ?></li>
			<li class="active"><?= __('Vote') ?></li>
		</ol>
		
		<div class="row">
			
			<!-- Article main content -->
			<article class="col-xs-12 maincontent">
				
						       
				<div class="col-md-12 col-md-offset-0 col-sm-4 col-sm-offset-2">
					
					<div class="panel-body">
					
						
					    
					    <h2 class="thin text-left">Vote</h2>
					    <p>Sélectionnez les titres de votre choix par ordre de préférence dans les différents menus déroulants.</p>
					    
						<?= $this->Form->create($firstvt) ?>
						<div class="top-margin" style="font-weight: bold; color: #777;">
							
							<?= __('Titre que vous placez en 1ère position:')?>
							<?= $this->Form->select('trackid', $tracks, ['empty' => '(choisissez)'])?>
							
							
						</div>
						<?= $this->Form->end() ?>
						<br>
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
