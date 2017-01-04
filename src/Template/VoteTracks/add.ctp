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
					            <td><?= h($poll->begindate) ?></td>
					        </tr>
					        <tr>
					            <th><?= __('Fin') ?></th>
					            <td><?= h($poll->enddate) ?></td>
					        </tr>
					        <tr>
					            <th><?= __('Nombre de votes enregistrés') ?></th>
					            <td><?= $this->Number->format($poll->id) ?></td>
					        </tr>
					        <tr>
					            <th><?= __('Status') ?></th>
					            <td><?php echo ($poll->status === 1)?'En cours':'Clotûré' ?></td>
					        </tr>
					    </table>
					    <hr>
					    
					    <h2 class="thin text-left">Vote</h2>
					    <p>Sélectionnez les titres de votre choix par ordre de préférence dans les différents menus déroulants.</p>
					    
						<?= $this->Form->create() ?>
						<div class="top-margin" style="font-weight: bold; color: #777;">
							
							<?= __('Titre que vous placez en 1ère position:')?>
							
							<?= $this->Form->select('trackid', $tracks, ['empty' => '(choisissez)'])?>
							<?= $this->Form->input('trackorder', ['value' => 1, 'type' => 'hidden'])?>
							<?= $this->Form->input('vote.id_polls', ['value' => 1, 'type' => 'hidden'])?>
							<?= $this->Form->input('vote.id_users', ['value' => 7, 'type' => 'hidden'])?>
							
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
