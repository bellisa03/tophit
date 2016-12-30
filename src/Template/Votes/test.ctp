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
			
			<table class="table table-striped">
						        <thead>
						            <tr>
						                <th><?= $this->Paginator->sort('Id') ?></th>
						                <th><?= $this->Paginator->sort('idpolls') ?></th>
						                <th><?= $this->Paginator->sort('trackorder') ?></th>
						                <th><?= $this->Paginator->sort('trackid') ?></th>
						                
						            </tr>
						        </thead>
						        <tbody>
			<?php foreach ($votetracks as $votetrack): ?>
						            <tr>
						                <td><?= $this->Number->format($votetrack->vote->id) ?></td>
										<td><?= $this->Number->format($votetrack->vote->id_polls) ?></td>
						                <td><?= $this->Number->format($votetrack->trackorder) ?></td>
						                
						                <td><?= $this->Number->format($votetrack->trackid) ?></td>
						                
						                
						            </tr>
						            <?php endforeach; ?>

		</div>
	</div>	<!-- /container -->
