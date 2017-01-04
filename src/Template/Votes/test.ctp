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
		
		<?= $this->Form->create($vote) ?>
						<div class="top-margin" style="font-weight: bold; color: #777;">
							
							<?= __('Titre que vous placez en 1ère position:')?>
							<?= $this->Form->select('voteTracks.0.trackid', $tracks, ['empty' => '(choisissez)'])?>
							
							
							
						</div>
						<?= $this->Form->end() ?>
						<br>
						<div class="col-lg-12 text-right">
							<?= $this->Form->submit(__('Valider'), ['class' => 'btn btn-action', 'style' => 'background: #6a6aa5; color: white'])?>
						</div>
    					<?= $this->Form->end() ?>
	</div>	<!-- /container -->
