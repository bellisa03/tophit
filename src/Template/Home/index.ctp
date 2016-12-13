<?php $this->start('navigation')?>
	<?= $this->element("menu", ["activeItem" => "Home"]); ?>
<?php $this->end()?>

	<!-- Header -->
	<header id="head">
		<div class="container">
			<div class="row">
				<h1 class="lead" style="color: #1e1e4a; text-shadow: 2px 2px 4px white; font-weight: bold;">TOP H.IT</h1>
				<p class="tagline" style="color: #1e1e4a; text-shadow: 2px 2px 4px white; font-size: 24px; font-weight: bold;">les sondages des plus grands titres musicaux</p>
				<p><?= $this->Html->link('PLUS D\'INFO', ['action' =>'about'], ['class' => 'btn btn-default btn-lg']) ?> <?= $this->Html->link('SONDAGES', ['controller' => 'Polls', 'action' =>'index'], ['class' => 'btn btn-action btn-lg', 'style' => 'background: #1e1e4a']) ?></p>
			</div>
		</div>
	</header>
	<!-- /Header -->

	<!-- Intro -->
	<div class="container text-center">
		<br> <br>
		<h2 class="thin">Consultez les sondages. Participez!</h2>
		<p class="text-muted">
			Faites entendre votre voix: N'oubliez pas de voter.<br> 
			Attention: les votes sont réservés aux membres inscrits.
		</p>
	</div>
	<!-- /Intro-->
		
	<!-- Highlights - jumbotron -->
	<div class="jumbotron top-space">
		<div class="container">
			
			<h3 class="text-center thin">Une plateforme très éclectique et fiable</h3>
			
			<div class="row">
				<div class="col-md-3 col-sm-6 highlight">
					<div class="h-caption"><h4><i class="fa fa-music fa-5"></i>Des titres inoubliables</h4></div>
					<div class="h-body text-center">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque aliquid adipisci aspernatur. Soluta quisquam dignissimos earum quasi voluptate. Amet, dignissimos, tenetur vitae dolor quam iusto assumenda hic reprehenderit?</p>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 highlight">
					<div class="h-caption"><h4><i class="fa fa-users fa-5"></i>Les membres</h4></div>
					<div class="h-body text-center">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores, commodi, sequi quis ad fugit omnis cumque a libero error nesciunt molestiae repellat quos perferendis numquam quibusdam rerum repellendus laboriosam reprehenderit! </p>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 highlight">
					<div class="h-caption"><h4><i class="fa fa-cloud-download fa-5"></i>Le webservice</h4></div>
					<div class="h-body text-center">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem, vitae, perferendis, perspiciatis nobis voluptate quod illum soluta minima ipsam ratione quia numquam eveniet eum reprehenderit dolorem dicta nesciunt corporis?</p>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 highlight">
					<div class="h-caption"><h4><i class="fa fa-cogs fa-5"></i>L'administration du site</h4></div>
					<div class="h-body text-center">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias, excepturi, maiores, dolorem quasi reprehenderit illo accusamus nulla minima repudiandae quas ducimus reiciendis odio sequi atque temporibus facere corporis eos expedita? </p>
					</div>
				</div>
			</div> <!-- /row  -->
		
		</div>
	</div>
	<!-- /Highlights -->
