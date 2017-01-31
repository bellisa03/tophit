<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author"      content="Sergey Pozhilov (GetTemplate.com)">
	
	<title>TopH.it</title>

	<?= $this->Html->meta('cake.icon.png', '/webroot/img/music_favicon.png', ['type'=> 'icon'])?>
	
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<?= $this->Html->css('bootstrap.min.css')?>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
	
	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<?= $this->Html->script('headroom.min.js')?>
	<?= $this->Html->script('jQuery.headroom.min.js')?>
	<?= $this->Html->script('template.js')?>
	
	<?= $this->fetch('scripts')?>
	
	<!-- Custom styles for our template -->
	
	<?= $this->Html->css('bootstrap-theme.css', ['media'=>'screen'])?>
	<?= $this->Html->css('main.css')?>

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	
	<?= $this->Html->script('html5shiv.js')?>
	<?= $this->Html->script('respond.min.js')?>
	<![endif]-->
</head>

<body class="home">
	<!-- Fixed navbar -->
	<div class="navbar navbar-inverse navbar-fixed-top headroom">
		<div class="container">
			<div class="navbar-header" style="background-color: #6a6aa5">
				<!-- Button for smallest screens -->
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
				<a class="navbar-brand" href="index.html"></a>
				<?= $this->Html->image('logo_tophit.png', ['alt'=>'TOP H.it']) ?>
			</div>
			<?= $this->fetch('navigation')?>
		</div>
	</div> 
	<!-- /.navbar -->
	
	
	<?= $this->fetch('content') ?>
	<?= $this->Flash->render() ?>
	<?= $this->Flash->render('auth') ?>
	
	<footer id="footer" class="top-space">

		<div class="footer1" style="background-color: #1e1e4a">
			<div class="container">
				<div class="row">
					
					<div class="col-md-6 widget">
						<h3 class="widget-title">Contact</h3>
						<div class="widget-body">
							<p>Administrateur<br>
							+32 123 45 67 89<br>
								<a href="mailto:kinet.isa@gmail.com">kinet.isa@gmail.com</a><br>
								<br>
								Rue du Pont 53, 1000 Bruxelles
							</p>	
						</div>
					</div>

					<div class="col-md-6 widget">
						<h3 class="widget-title">Charte de l'utilisateur</h3>
						<div class="widget-body">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi, dolores, quibusdam architecto voluptatem amet fugiat nesciunt placeat provident cumque accusamus itaque voluptate modi quidem dolore optio velit hic iusto vero praesentium repellat commodi ad id expedita cupiditate repellendus possimus unde?</p>
							<p>Eius consequatur nihil quibusdam! Laborum, rerum, quis, inventore ipsa autem repellat provident assumenda labore soluta minima alias temporibus facere distinctio quas adipisci nam sunt explicabo officia tenetur at ea quos doloribus dolorum voluptate reprehenderit architecto sint libero illo et hic.</p>
						</div>
					</div>

				</div> <!-- /row of widgets -->
			</div>
		</div>

		<div class="footer2">
			<div class="container">
				<div class="row">
					<div class="col-md-6 widget">
						<div class="widget-body">
							<p class="text-right">
								Copyright &copy; 2016, Isabelle Kinet. Design: <a href="http://www.gettemplate.com" rel="designer">GetTemplate</a>
							</p>
						</div>
					</div>
				</div> <!-- /row of widgets -->
			</div>
		</div>

	</footer>	
		
	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	
</body>
</html>