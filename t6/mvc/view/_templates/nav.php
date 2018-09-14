<nav>
	<ul id="navigation">
		<?php foreach ($d['nav'] as $menu0) : ?>
		<li><a href="<?= UriParser::getBaseUri() ?><?= $menu0[1] ?>"><?= $menu0[0] ?> </a>
			<?php if (isset($menu0[2])): ?>
			<ul>
			<?php foreach ($menu0[2] as $menu1) : ?>
				<li><a href="<?= UriParser::getBaseUri() ?><?= $menu1[1] ?>"><?= $menu1[0] ?> </a>
				<?php if (isset($menu1[2])): ?>
				<ul>
					<?php foreach ($menu1[2] as $menu2) : ?>
					<li>
						<a href="<?= UriParser::getBaseUri() ?><?= $menu2[1] ?>"><?= $menu2[0] ?> </a>			
					</li>
					<?php endforeach;?>
				</ul>	
				<?php endif;?>				
			</li>
			<?php endforeach;?>
			</ul>	
			<?php endif;?>
		</li>
		<?php endforeach;?>
	</ul>

</nav>
