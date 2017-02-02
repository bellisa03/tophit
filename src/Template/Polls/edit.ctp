<?php $this->start('navigation')?>
	<?= $this->element("menu", ["activeItem" => "Polls"]); ?>
<?php $this->end()?>

<?= $this->start('styles') ?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
<?= $this->end() ?>

<?= $this->start('scripts') ?>
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
    <script src="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js"></script>
    <script type="text/javascript">
      $(document).ready(function () {
          $('#datetimepicker1').datetimepicker({
              format: 'DD-MM-YYYY',
              locale: 'fr',
              minDate: moment('2016-09-01'),
              ignoreReadonly: true
          });
          $('#datetimepicker2').datetimepicker({
              format: 'DD-MM-YYYY',
              locale: 'fr',
              ignoreReadonly: true
          });
      });
    </script>
<?= $this->end() ?>
<header id="head" class="secondary"></header>
	
<!-- container -->
	<div class="container">

		<ol class="breadcrumb">
			<li><?= $this->Html->link(__('Accueil'), ['controller' => 'Home', 'action' => 'index']) ?></li>
			<li><?= $this->Html->link(__('Sondages'), ['controller' => 'Polls', 'action' => 'index']) ?></li>
			<li class="active"><?= __('Modifier Profil') ?></li>
		</ol>

		<div class="row">
			
			<!-- Article main content -->
			<article class="col-xs-12 maincontent">
				<header class="page-header">
					<h1 class="page-title">Gestion des Sondages</h1>
				</header>
				
				<div class="col-md-10 col-md-offset-1 col-sm-4 col-sm-offset-2">
					
					<div class="panel-body">
						<h2 class="thin text-left">Modifier un sondage</h2>
						<?= $this->Form->create($poll) ?>
							
						<div class="top-margin">
							<?= $this->Form->input('title', ['label' => 'Intitulé'])?>						
						</div>
						<div class="top-margin">
							<?= $this->Form->label('Catégorie')?>
							<?= $this->Form->select('musicstyleid', $genres, ['empty' => '(choisissez)'])?>
						</div>
						<div class="top-margin">
							<?= $this->Form->input('description', ['label' => 'Description'])?>
						</div>
    
			            <div class="form-group" style="width: 30%">
			            	<?= $this->Form->label('begindate', 'Début')?>
			                <div class='input-group date' id='datetimepicker1'>
			                    <?= $this->Form->input('begindate', ['type' => 'text', 'label' => false, 'readonly'])?>
			                    <span class="input-group-addon">
			                        <span class="fa fa-calendar"></span>
			                    </span>
			                </div>       
			            </div>
			            <div class="form-group" style="width: 30%">
			            	<?= $this->Form->label('enddate', 'Fin')?>
			                <div class='input-group date' id='datetimepicker2'>
			                    <?= $this->Form->input('enddate', ['type' => 'text', 'label' => false, 'readonly'])?>
			                    <span class="input-group-addon">
			                        <span class="fa fa-calendar"></span>
			                    </span>
			                </div>       
			            </div>
			            		
						<div class="top-margin">
							<?= $this->Form->label('Actif')?>
							<?= $this->Form->checkbox('status', ['value' => 1, 'hiddenField' => 2])?>
						</div>	
							
						<div class="col-lg-12 text-right">
							<?= $this->Html->link('Annuler', ['action' =>'index'], ['class' => 'btn btn-action', 'style' => 'background: #888; color: white']) ?>
							<?= $this->Form->button(__('Valider'), ['class' => 'btn btn-action', 'style' => 'background: #6a6aa5; color: white'])?>
						</div>
    					<?= $this->Form->end() ?>
    				</div>
    					
				</div>
				
			</article>
			<!-- /Article -->

		</div>
	</div>	<!-- /container -->