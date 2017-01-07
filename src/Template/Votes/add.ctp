<?php $this->start('navigation')?>
	<?= $this->element("menu", ["activeItem" => "Polls"]); ?>
<?php $this->end()?>

<header id="head" class="secondary"></header>
	
<!-- container -->
	<div class="container">

		<ol class="breadcrumb">
			<li><?= $this->Html->link(__('Accueil'), ['controller' => 'Home', 'action' => 'index']) ?></li>
			<li><?= $this->Html->link(__('Sondages'), ['controller' => 'Polls', 'action' => 'index']) ?></li>
			<li><?= $this->Html->link(__('En cours'), ['controller' => 'Polls', 'action' => 'index']) ?></li>
			<li class="active"><?= __('Vote') ?></li>
		</ol>
		
		<div class="row">
			
			<!-- Article main content -->
			<article class="col-xs-12 maincontent">
				<header class="page-header">
					<h1 class="page-title"><?= h($poll->title) ?></h1>
				</header>
						       
				<div class="col-md-12 col-md-offset-0 col-sm-4 col-sm-offset-2">
					
					<div class="panel-body">
					
						<h3><?= h($poll->description) ?></h3>
					    <table class="table">
					        <tr>
					            <th><?= __('Identifiant') ?></th>
					            <td><?= $this->Number->format($poll->id) ?></td>
					        </tr>
					        <tr>
					            <th><?= __('Catégorie') ?></th>
					            <td><?= h($poll->music_genre_name) ?></td>
					        </tr>
					        <tr>
					            <th><?= __('Début') ?></th>
					            <td><?= ($poll->begindate)? h($formattedDates[$poll->id]['begindate']): 'null' ?></td>
					        </tr>
					        <tr>
					            <th><?= __('Fin') ?></th>
					            <td><?= ($poll->enddate)? h($formattedDates[$poll->id]['enddate']): 'null' ?></td>
					        </tr>
					        <tr>
					            <th><?= __('Nombre de votes enregistrés') ?></th>
					            <td><?= $this->Number->format($poll->sumVotes) ?></td>
					        </tr>
					        <tr>
					            <th><?= __('Status') ?></th>
					            <td><?php echo ($poll->status === 1)?'En cours':'Clotûré' ?></td>
					        </tr>
					    </table>
					    <hr>
					    
					    <h2 class="thin text-left">Vote</h2>
					    <p>Sélectionnez les titres de votre choix par ordre de préférence dans les différents menus déroulants.</p>
					    
						<?= $this->Form->create($vote) ?>
						<div class="top-margin" style="font-weight: bold; color: #777;">
							<?= $this->Form->hidden('id_polls', ['value' => $poll->id])?>
							<?= $this->Form->hidden('id_users', ['value' => $connectedUser['id']])?>
							<?= __('Titre que vous placez en 1ère position:')?>
							<?= $this->Form->select('vote_tracks.0.trackid', $tracks, ['empty' => '(choisissez)'])?>
							<?= $this->Form->hidden('vote_tracks.0.trackorder', ['value' => 1])?>
							<?= __('Titre que vous placez en 2ème position:')?>
							<?= $this->Form->select('vote_tracks.1.trackid', $tracks, ['empty' => '(choisissez)'])?>
							<?= $this->Form->hidden('vote_tracks.1.trackorder', ['value' => 2])?>
							<?= __('Titre que vous placez en 3ème position:')?>
							<?= $this->Form->select('vote_tracks.2.trackid', $tracks, ['empty' => '(choisissez)'])?>
							<?= $this->Form->hidden('vote_tracks.2.trackorder', ['value' => 3])?>
							<?= __('Titre que vous placez en 4ème position:')?>
							<?= $this->Form->select('vote_tracks.3.trackid', $tracks, ['empty' => '(choisissez)'])?>
							<?= $this->Form->hidden('vote_tracks.3.trackorder', ['value' => 4])?>
							<?= __('Titre que vous placez en 5ème position:')?>
							<?= $this->Form->select('vote_tracks.4.trackid', $tracks, ['empty' => '(choisissez)'])?>
							<?= $this->Form->hidden('vote_tracks.4.trackorder', ['value' => 5])?>
						</div>
						
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
