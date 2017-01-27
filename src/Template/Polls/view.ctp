<?php $this->start('navigation')?>
	<?= $this->element("menu", ["activeItem" => "Polls"]); ?>
<?php $this->end()?>

<header id="head" class="secondary"></header>
	
<!-- container -->
	<div class="container">

		<ol class="breadcrumb">
			<li><?= $this->Html->link(__('Accueil'), ['controller' => 'Home', 'action' => 'index']) ?></li>
			<li><?= $this->Html->link(__('Sondages'), ['controller' => 'Polls', 'action' => 'index']) ?></li>
				<?php if ($poll->status === 1) {?>
			<li><?= $this->Html->link(__('En cours'), ['controller' => 'Polls', 'action' => 'index']) ?></li>
				<?php } else {?>
			<li><?= $this->Html->link(__('Clôturés'), ['controller' => 'Polls', 'action' => 'archive']) ?></li>	
				<?php }?>
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
					            <td><?= ($poll->status === 1)?__('En cours'):__('Clôturé') ?></td>
					        </tr>
					    </table>
    				
    				<table class="table table-striped">
			        <thead>
			            <tr>
			            <?php if($poll->sumVotes > 0){?>
			            	<th><?= $this->Paginator->sort('Classement') ?></th>
			            <?php }?>
			                <th><?= $this->Paginator->sort('Titre') ?></th>
			                <th><?= $this->Paginator->sort('Artiste') ?></th>
			                <th><?= $this->Paginator->sort('Points') ?></th>
			            </tr>
			        </thead>
			        <tbody>
			        <!-- $i = compteur de la colonne classement. $temp permet de comparer les écarts de points entre les titres.
			        le $i n'augmente que s'il y a un écart -->
			        <?php $i =1; ?>
			        <?php $temp = null; ?>
			        <?php foreach ($tracks as $track): ?>
			        	<!-- "if" déterminant si il faut ou non afficher le classement. La colonne classement ne s'affichera que si des votes sont déjà comptabilisés. -->
			            <?php if($poll->sumVotes > 0):?>
			            	<?php /* @var $track  App\Model\Entity\MusicTrack */  ?>
			            	<?php if($temp != null && $temp > $track->ranking)$i ++;?>
			            	<?php $temp = $track->ranking;?>
			            <tr>
			            	<td><?= $this->Number->format($i) ?></td>
			           <?php endif;?>
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
					<?php if ($poll->status === 1) {?>
				<li role="presentation"><?= $this->Html->link(__('Index des sondages en cours'), ['action' => 'index']) ?></li>
					<?php } else {?>
				<li role="presentation"><?= $this->Html->link(__('Index des sondages clôturés'), ['action' => 'archive']) ?></li>
					<?php }?>
					<?php if (isset($connectedUser) && $connectedUser['role'] == 1) {?>
                <li role="presentation"><?= $this->Html->link(__('Modifier'), ['action' => 'edit', $poll->id]) ?></li>
                <li role="presentation"><?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $poll->id], ['confirm' => __('Etes-vous sûr de vouloir supprimer le sondage # {0}?', $poll->id)]) ?></li>
                	<?php }?>
					<?php if (isset($connectedUser) && $connectedUser['role'] == 2 && $okToVote) {?>
                <li role="presentation"><?= $this->Html->link(__('Voter pour ce sondage'), ['controller'=> 'Votes','action' => 'add', $poll->id]) ?></li>
                	<?php }?>
				
    		</ul>
		</nav>
				</div>
				
			</article>
			<!-- /Article -->

		</div>
	</div>	<!-- /container -->
