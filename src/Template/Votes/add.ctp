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
					            <th><?= __('Status') ?></th>
					            <td><?php echo ($poll->status === 1)?'En cours':'Clotûré' ?></td>
					        </tr>
					    </table>
					    <hr>
    				</div>
		
				</div>
				
			</article>
			<!-- /Article -->

		</div>
	</div>	<!-- /container -->
