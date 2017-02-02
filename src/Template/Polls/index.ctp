<?php $this->start('navigation')?>
	<?= $this->element("menu", ["activeItem" => "Polls"]); ?>
<?php $this->end()?>

<header id="head" class="secondary"></header>
	
<!-- container -->
	<div class="container">

		<ol class="breadcrumb">
			<li><?= $this->Html->link(__('Accueil'), ['controller' => 'Home', 'action' => 'index']) ?></li>
			<li><?= $this->Html->link(__('Sondages'), ['controller' => 'Polls', 'action' => 'index']) ?></li>
			<li class="active"><?= __('En cours') ?></li>
		</ol>
		
		<div class="row">
			
			<!-- Article main content -->
			<article class="col-xs-12 maincontent">
				<header class="page-header">
					<h1 class="page-title">Sondages</h1>
				</header>
				
				<div class="col-md-12 col-md-offset-0 col-sm-2 col-sm-offset-4">
					<div class="panel panel-default">
						<div class="panel-body">
							<table class="table table-striped">
						        <thead>
						            <tr>
						                <th><?= $this->Paginator->sort('Id') ?></th>
						                <th><?= $this->Paginator->sort('Intitulé') ?></th>
						                <th><?= $this->Paginator->sort('Catégorie') ?></th>
						                <th><?= $this->Paginator->sort('Description') ?></th>
						                <th><?= $this->Paginator->sort('Début') ?></th>
						                <th><?= $this->Paginator->sort('Fin') ?></th>
						                <th><?= $this->Paginator->sort('Votes') ?></th>
						                <?php if (isset($connectedUser)) {?>
						                <th class="actions"></th>
						                <?php }?>
						            </tr>
						        </thead>
						        <tbody>
						            <?php foreach ($polls as $poll): ?>
						            <tr>
						                <td><?= $this->Number->format($poll->id) ?></td>
						                <td><?= $this->Html->link(($poll->title), ['action' => 'view', $poll->id]) ?></td>
						                <td><?= h($poll->music_genre_name) ?></td>
						                <td><?= h($poll->description) ?></td>
						                <td><?= h($poll->begindate) ?></td>
						                <td><?= h($poll->enddate) ?></td>
						                <td><?= $this->Number->format($poll->sumVotes) ?></td>
						                <?php if (isset($connectedUser)) {?>
						                <td class="actions">
						                <?php if ($connectedUser['role'] == 1) {?>
						                    <?= $this->Html->link('<i class="fa fa-pencil-square-o" style="font-size: 20px" aria-hidden="true"> </i>', ['action' => 'edit', $poll->id], ['escape' => false]) ?>
						                    <span style="margin-left: 6px"></span>
						                    <?= $this->Form->postLink('<i class="fa fa-trash" style="font-size: 20px" aria-hidden="true"> </i>', ['action' => 'delete', $poll->id], ['escape' => false, 'confirm' => __('Etes-vous sûr de vouloir supprimer le sondage # {0}?', $poll->id)]) ?>
						                <?php }?>
						                <?php if ($connectedUser['role'] == 2 && $okToVote[$poll->id] == true) {?>
						                    <?= $this->Html->link(__('Voter'), ['controller'=> 'Votes','action' => 'add', $poll->id], ['class' => 'btn btn-action', 'style' => 'background: #dff0d8; color: #6d986d; padding: 5px 15px 5px 15px;']) ?>
						                <?php }?>
						                <?php if ($connectedUser['role'] == 2 && $okToVote[$poll->id] == false) {?>
 											<?= $this->Html->link(__('Voter'), ['controller' => 'Votes','action' => 'add', $poll->id],['class' => 'btn btn-action', 'target'=>'_blank', 'style' => 'background: #e3dfdf;  padding: 5px 15px 5px 15px; color: #fff; pointer-events : none; cursor : default;']) ?>
 										<?php }?>
						                </td>
						                <?php }?>
						            </tr>
						            <?php endforeach; ?>
						        </tbody>
						    </table>

						</div>
					</div>
		<nav role="navigation" style="padding-bottom: 30px">
			<ul class="nav nav-pills">
			<?php if (isset($connectedUser) && $connectedUser['role'] == 1) {?>
				<li role="presentation"><?= $this->Html->link(__('Nouveau Sondage'), ['action' => 'add']) ?></li>
			<?php }?>
				<li role="presentation"><?= $this->Html->link(__('Liste des sondages clôturés'), ['action' => 'archive']) ?></li>
    		</ul>
		</nav>
		<p><?= __('Cliquez sur l\'intitulé du sondage pour consulter le détail de celui-ci') ?></p>
				</div>
				
			</article>
			<!-- /Article -->

		</div>
		
		<div class="paginator">
	        <ul class="pagination">
	            <?= $this->Paginator->prev('< ' . __('précédent')) ?>
	            <?= $this->Paginator->numbers() ?>
	            <?= $this->Paginator->next(__('suivant') . ' >') ?>
	        </ul>
	        <p><?= $this->Paginator->counter('Page {{page}} de {{pages}}') ?></p>
    	</div>
	</div>	<!-- /container -->
	