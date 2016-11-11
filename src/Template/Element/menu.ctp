<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav pull-right">
					<li class= <?= (!empty($activeItem) && ($activeItem =='Home') )?'active' :'inactive' ?>>
						<?= $this->Html->link('Accueil', ['controller' => 'Home','action' =>'index']) ?></li>
					<li class= <?= (!empty($activeItem) && ($activeItem =='About') )?'active' :'inactive' ?>>
						<?= $this->Html->link('A propos', ['controller' => 'Home','action' =>'about']) ?></li>
					<li class= <?= (!empty($activeItem) && ($activeItem =='Users') )?'active' :'inactive' ?>>
						<?= $this->Html->link('Utilisateurs', ['controller' => 'Users','action' =>'add']) ?></li>
					<li class= <?= (!empty($activeItem) && ($activeItem =='Polls') )?'active' :'inactive' ?>>
						<?= $this->Html->link('Sondages', ['controller' => 'Polls','action' =>'index']) ?></li>
					<li class= <?= (!empty($activeItem) && ($activeItem =='Contact') )?'active' :'inactive' ?>>
						<?= $this->Html->link('Contact', ['controller' => 'Home','action' =>'contact']) ?></li>
					<li class= <?= (!empty($activeItem) && ($activeItem =='CONNEXION') )?'active' :'inactive' ?>>
						<?= $this->Html->link('CONNEXION', ['controller' => 'Users','action' =>'login'], ['class' => 'btn']) ?></li>
				</ul>
			</div><!--/.nav-collapse -->