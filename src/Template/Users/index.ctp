<?php $this->start('navigation')?>
	<?= $this->element("menu", ["activeItem" => "Users"]); ?>
<?php $this->end()?>

<header id="head" class="secondary"></header>
	
<!-- container -->
	<div class="container">

		<ol class="breadcrumb">
			<li><?= $this->Html->link(__('Accueil'), ['controller' => 'Home', 'action' => 'index']) ?></li>
			<li><?= $this->Html->link(__('Utilisateurs'), ['controller' => 'Users', 'action' => 'index']) ?></li>
			<li class="active"><?= __('Index') ?></li>
		</ol>
		
		<div class="row">
			
			<!-- Article main content -->
			<article class="col-xs-12 maincontent">
				<header class="page-header">
					<h1 class="page-title">Utilisateurs</h1>
				</header>
				
				<div class="col-md-12 col-md-offset-0 col-sm-2 col-sm-offset-4">
					<div class="panel panel-default">
						<div class="panel-body">
							<table class="table table-striped">
						        <thead>
						            <tr>
						                <th><?= $this->Paginator->sort('id') ?></th>
						                <th><?= $this->Paginator->sort('login') ?></th>
						                <th><?= $this->Paginator->sort('prénom') ?></th>
						                <th><?= $this->Paginator->sort('nom') ?></th>						                
						                <th><?= $this->Paginator->sort('email') ?></th>
						                <th><?= $this->Paginator->sort('role') ?></th>
						                <th><?= $this->Paginator->sort('création') ?></th>
						                <th><?= $this->Paginator->sort('modification') ?></th>
						                <th class="actions"><?= __('Actions') ?></th>
						            </tr>
						        </thead>
						        <tbody>
						            <?php foreach ($users as $user): ?>
						            <tr>
						                <td><?= $this->Number->format($user->id) ?></td>
						                <td><?= h($user->login) ?></td>						                
						                <td><?= h($user->firstname) ?></td>
						                <td><?= h($user->lastname) ?></td>
						                <td><?= h($user->email) ?></td>
						                <td><?= h($user->role_name) ?></td>
						                <td><?= ($user->created)? h($formattedDates[$user->id]['created']): 'null' ?></td>
						                <td><?= ($user->modified)? h($formattedDates[$user->id]['modified']): 'null' ?></td>
						                <td class="actions">
						                    <?= $this->Html->link(__('Modifier'), ['action' => 'edit', $user->id], 
						                    		['confirm' => __('Modifier un profil utilisateur entraîne une réinitialisation du mot de passe. Etes-vous sûr de vouloir modifier l\'utilisateur # {0}?', $user->id)]) ?>
						                    <?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $user->id], ['confirm' => __('Etes-vous sûr de vouloir supprimer l\'utilisateur # {0}?', $user->id)]) ?>
						                </td>
						            </tr>
						            <?php endforeach; ?>
						        </tbody>
						    </table>

						</div>
					</div>
		<nav role="navigation" style="padding-bottom: 30px">
			<ul class="nav nav-pills">
				<li role="presentation"><?= $this->Html->link(__('Nouvel Utilisateur'), ['action' => 'add']) ?></li>
    		</ul>
		</nav>
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
	