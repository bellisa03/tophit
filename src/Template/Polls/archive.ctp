<?php $this->start('navigation')?>
	<?= $this->element("menu", ["activeItem" => "Polls"]); ?>
<?php $this->end()?>

<header id="head" class="secondary"></header>
	
<!-- container -->
	<div class="container">

		<ol class="breadcrumb">
			<li><?= $this->Html->link(__('Accueil'), ['controller' => 'Home', 'action' => 'index']) ?></li>
			<li><?= $this->Html->link(__('Sondages'), ['controller' => 'Polls', 'action' => 'index']) ?></li>
			<li class="active"><?= __('Clôturés') ?></li>
		</ol>
		
		<div class="row">
			
			<!-- Article main content -->
			<article class="col-xs-12 maincontent">
				<header class="page-header">
					<h1 class="page-title">Sondages inactifs ou clôturés</h1>
				</header>
				
				<div class="col-md-12 col-md-offset-0 col-sm-2 col-sm-offset-4">
					<div class="panel panel-default">
						<div class="panel-body">
							<table class="table table-striped">
						        <thead>
						            <tr>
						                <th><?= __('Id') ?></th>
						                <th><?= __('Intitulé') ?></th>
						                <th><?= __('Catégorie') ?></th>
						                <th><?= __('Description') ?></th>
						                <th><?= __('Début') ?></th>
						                <th><?= __('Fin') ?></th>
						                <th><?= __('Votes') ?></th>
						                <?php if (isset($connectedUser) && $connectedUser['role'] == 1) {?>
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
						                <td style="text-align:center"><?= $this->Number->format($poll->sumVotes) ?></td>
						                <?php if (isset($connectedUser) && $connectedUser['role'] == 1) {?>
						                <td class="actions">
						                    <?= $this->Html->link('<i class="fa fa-pencil-square-o" style="font-size: 20px" aria-hidden="true"> </i>', ['action' => 'edit', $poll->id], ['escape' => false]) ?>
						                    <span style="margin-left: 6px"></span>
						                    <?= $this->Form->postLink('<i class="fa fa-trash" style="font-size: 20px" aria-hidden="true"> </i>', ['action' => 'delete', $poll->id], 
						                    		['escape' => false, 'confirm' => __('Etes-vous sûr de vouloir supprimer le sondage # {0}?', $poll->id)]) ?>
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
				<li role="presentation"><?= $this->Html->link(__('Liste des sondages en cours'), ['action' => 'index']) ?></li>
    		</ul>
		</nav>
		 
		<p><?= __('Cliquez sur l\'intitulé du sondage pour consulter le détail de celui-ci') ?></p>
				</div>
				
			</article>
			<!-- /Article -->

		</div>
		
	</div>	<!-- /container -->
	