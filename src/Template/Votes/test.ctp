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
		
		<?= $this->Form->create() ?>
						<div class="top-margin" style="font-weight: bold; color: #777;">
							
							<?= __('Titre que vous placez en 1ère position:')?>
							<?= $this->Form->select('vote_tracks.1.trackid', $tracks, ['empty' => '(choisissez)'])?>
							<?= $this->Form->input('vote_tracks.1.trackorder', ['value' => 1, 'type' => 'hidden'])?>
							<?= __('Titre que vous placez en 2ème position:')?>
							<?= $this->Form->select('vote_tracks.2.trackid', $tracks, ['empty' => '(choisissez)'])?>
							<?= $this->Form->input('vote_tracks.2.trackorder', ['value' => 2, 'type' => 'hidden'])?>
							<?= __('Titre que vous placez en 3ème position:')?>
							<?= $this->Form->select('vote_tracks.3.trackid', $tracks, ['empty' => '(choisissez)'])?>
							<?= $this->Form->input('vote_tracks.3.trackorder', ['value' => 3, 'type' => 'hidden'])?>
							<?= __('Titre que vous placez en 4ème position:')?>
							<?= $this->Form->select('vote_tracks.4.trackid', $tracks, ['empty' => '(choisissez)'])?>
							<?= $this->Form->input('vote_tracks.4.trackorder', ['value' => 4, 'type' => 'hidden'])?>
							<?= __('Titre que vous placez en 5ème position:')?>
							<?= $this->Form->select('vote_tracks.5.trackid', $tracks, ['empty' => '(choisissez)'])?>
							<?= $this->Form->input('vote_tracks.5.trackorder', ['value' => 5, 'type' => 'hidden'])?>
							
						</div>
						<?= $this->Form->end() ?>
						<br>
						<div class="col-lg-12 text-right">
							<?= $this->Form->button(__('Valider'), ['class' => 'btn btn-action', 'style' => 'background: #6a6aa5; color: white'])?>
						</div>
    					<?= $this->Form->end() ?>
	</div>	<!-- /container -->
