<?php $this->start('navigation')?>
	<?= $this->element("menu", ["activeItem" => "Polls"]); ?>
<?php $this->end()?>

<header id="head" class="secondary"></header>
	
<!-- container -->
	<div class="container">

		<ol class="breadcrumb">
			<li><?= $this->Html->link(__('Accueil'), ['controller' => 'Home', 'action' => 'index']) ?></li>
			<li><?= $this->Html->link(__('Sondages'), ['controller' => 'Polls', 'action' => 'index']) ?></li>
			<li class="active"><?= __('Fiche détaillée') ?></li>
		</ol>
		
		<div class="row">
			
			<!-- Article main content -->
			<article class="col-xs-12 maincontent">
				<header class="page-header">
					<h1 class="page-title">Gestion des Sondages</h1>
				</header>
						       
				<div class="col-md-10 col-md-offset-1 col-sm-4 col-sm-offset-2">
					
					<div class="panel-body">
						<h3><?= __('Fiche détaillée du sondage') ?></h3>
					    <table class="table">
					        <tr>
					            <th><?= __('Identifiant') ?></th>
					            <td><?= $this->Number->format($poll->id) ?></td>
					        </tr>
					        <tr>
					            <th><?= __('Intitulé') ?></th>
					            <td><?= h($poll->title) ?></td>
					        </tr>
					        <tr>
					            <th><?= __('Catégorie') ?></th>
					            <td><?= h($poll->music_genre_name) ?></td>
					        </tr>
					        <tr>
					            <th><?= __('Description') ?></th>
					            <td><?= h($poll->description) ?></td>
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
					            <td><?= $this->Number->format($poll->sumVotes) ?></td>
					        </tr>
					        <tr>
					            <th><?= __('Status') ?></th>
					            <td><?= ($poll->status === 1)?'En cours':'Clotûré' ?></td>
					        </tr>
					    </table>
    				
    				<table class="table table-striped">
			        <thead>
			            <tr>
			            	<th><?= $this->Paginator->sort('Classement') ?></th>
			                <th><?= $this->Paginator->sort('Titre') ?></th>
			                <th><?= $this->Paginator->sort('Artiste') ?></th>
			                <th><?= $this->Paginator->sort('Points') ?></th>
			            </tr>
			        </thead>
			        <tbody>
			        	<?php $i =0; ?>
			            <?php foreach ($tracks as $track): ?>
			            <?php $i ++; ?>
			            <?php /* @var $track  App\Model\Entity\MusicTrack */  ?>
			            <tr>
			            	<td><?= $this->Number->format($i) ?></td>
			                <td><?= h($track->trackTitle) ?></td>
			                <td><?= h($track->artistName) ?></td>
			                <td><?=$this->Number->format($track->ranking)?></td>
			                
			            </tr>
			            <?php endforeach; ?>
			        </tbody>
			    </table>
			    </div>
			    
		<nav role="navigation" style="padding-bottom: 30px">
			<ul class="nav nav-pills">
				<li role="presentation"><?= $this->Html->link(__('Index des sondages'), ['action' => 'index']) ?></li>
				<li role="presentation"><?= $this->Html->link(__('Voter pour ce sondage'), ['controller'=> 'Votes','action' => 'add', $poll->id]) ?></li>
    		</ul>
		</nav>
				</div>
				
			</article>
			<!-- /Article -->

		</div>
	</div>	<!-- /container -->
