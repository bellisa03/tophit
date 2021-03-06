<?php
use PhpParser\Node\Stmt\If_;
?>
<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav pull-right">
					<li class= <?= (!empty($activeItem) && ($activeItem =='Home') )?'active' :'inactive' ?>>
						<?= $this->Html->link('Accueil', ['controller' => 'Home','action' =>'index']) ?></li>
					<li class= <?= (!empty($activeItem) && ($activeItem =='About') )?'active' :'inactive' ?>>
						<?= $this->Html->link('A propos', ['controller' => 'Home','action' =>'about']) ?></li>
						<?php if(isset($connectedUser) && $connectedUser['role'] == 1) {?>
					<li class="dropdown, <?= (!empty($activeItem) && ($activeItem =='Users') )?'active' :'inactive' ?>">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Utilisateurs <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><?= $this->Html->link('Index', ['controller' => 'Users','action' =>'index']) ?></li>
							<li><?= $this->Html->link('Nouveau Profil', ['controller' => 'Users','action' =>'add']) ?></li>
						</ul>
					</li>
						<?php }?>
					<li class= <?= (!empty($activeItem) && ($activeItem =='Polls') )?'active' :'inactive' ?>>
						<?= $this->Html->link('Sondages', ['controller' => 'Polls','action' =>'index']) ?></li>
					<li class= <?= (!empty($activeItem) && ($activeItem =='Contact') )?'active' :'inactive' ?>>
						<?= $this->Html->link('Contact', ['controller' => 'Home','action' =>'contact']) ?></li>
					<li class= <?= (!empty($activeItem) && ($activeItem =='CONNEXION') )?'active' :'inactive' ?>>
						<?php if (isset($connectedUser) && $connectedUser != null) {?>
							<?= $this->Html->link('Bonjour ' . $connectedUser['login']. ' - DECONNEXION', ['controller' => 'Users','action' =>'logout'], ['class' => 'btn']) ?>
						<?php } else {?>
							<?= $this->Html->link('CONNEXION', ['controller' => 'Users','action' =>'login'], ['class' => 'btn']) ?>
						<?php }?>
						</li>
				</ul>
			</div><!--/.nav-collapse -->