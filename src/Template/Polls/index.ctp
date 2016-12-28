<?php $this->start('navigation')?>
	<?= $this->element("menu", ["activeItem" => "Polls"]); ?>
<?php $this->end()?>

<header id="head" class="secondary"></header>
	
<!-- container -->
	<div class="container">

		<ol class="breadcrumb">
			<li><?= $this->Html->link(__('Accueil'), ['controller' => 'Home', 'action' => 'index']) ?></li>
			<li><?= $this->Html->link(__('Sondages'), ['controller' => 'Polls', 'action' => 'index']) ?></li>
			<li class="active"><?= __('Index') ?></li>
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
						                <th><?= $this->Paginator->sort('Statut') ?></th>
						                <th class="actions"><?= __('Actions') ?></th>
						            </tr>
						        </thead>
						        <tbody>
						            <?php foreach ($polls as $poll): ?>
						            <tr>
						                <td><?= $this->Number->format($poll->id) ?></td>
						                <td><?= $this->Html->link(($poll->title), ['action' => 'view', $poll->id]) ?></td>
						                <td><?= h($poll->music_genre_name) ?></td>
						                <td><?= h($poll->description) ?></td>
						                <td><?= h($poll->beginformat) ?></td>
						                <td><?= h($poll->enddate) ?></td>
						                <td><?= h($poll->status) ?></td>
						                <td class="actions">
						                    <?= $this->Html->link(__('Modifier'), ['action' => 'edit', $poll->id]) ?>
						                    <?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $poll->id], ['confirm' => __('Etes-vous sûr de vouloir supprimer le sondage # {0}?', $poll->id)]) ?>
						                    <?= $this->Html->link(__('Voter'), ['controller'=> 'Votes','action' => 'add', $poll->id]) ?>
						                </td>
						            </tr>
						            <?php endforeach; ?>
						        </tbody>
						    </table>

						</div>
					</div>
		<nav role="navigation" style="padding-bottom: 30px">
			<ul class="nav nav-pills">
				<li role="presentation"><?= $this->Html->link(__('Nouveau Sondage'), ['action' => 'add']) ?></li>
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
	        <p><?= $this->Paginator->counter() ?></p>
    	</div>
	</div>	<!-- /container -->
	