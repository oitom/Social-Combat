<article id="principal">
	<section id="titulos" class="painel">
		<div class="topo-painel">
			<h2 class="titulo-painel">Títulos</h2>
			<form class="pesquisa-painel">
				<label>
					<a href="#pesquisa-titulo" class="a-pesquisa fa fa-search"></a>
				</label>
				<input class="busca-painel" id="pesquisa-titulo" name="pesquisa-titulo" type="text">
			</form>
		</div>

		<div class="conteudo-painel">
			<?php foreach ($dados["minhas_conquistas"] as $conquista) { ?>
			<?php if($conquista->getTipo() == 1){ ?>
			<div class="img-conquistas"> 
				<img src="<?php echo IMG ?>Conquistas 130x160/<?php echo $conquista->getImagem(); ?>">
				<p><?php echo $conquista->getTitulo(); ?></p>
			</div>
			<?php } }?>

			<?php foreach ($dados["conquistas"] as $conquista) { ?>
			<?php if($conquista->getTipo() == 1){ ?>
			<div class="img-conquistas"> 
				<img src="<?php echo IMG ?>Conquistas 130x160/<?php echo $conquista->getImagem(); ?>" class="gray">
				<p><?php echo $conquista->getTitulo(); ?></p>
			</div>
			<?php } } ?>

		</div>
		
		<div class="rodape-painel">
			<a href="#" class="fa fa-plus-circle"><label class="a-plus"></label></a>
		</div>		
	</section> 

	<section id="titulos" class="painel">
		<div class="topo-painel">
			<h2 class="titulo-painel">Troféu</h2>
			<form class="pesquisa-painel">
				<label>
					<a href="#pesquisa-trofeu" class="a-pesquisa fa fa-search"></a>
				</label>
				<input class="busca-painel" id="pesquisa-trofeu" name="pesquisa-trofeu" type="text">
			</form>
		</div>

		<div class="conteudo-painel">
			<?php foreach ($dados["minhas_conquistas"] as $conquista) { ?>
			<?php if($conquista->getTipo() == 2){ ?>
			<div class="img-conquistas"> 
				<img src="<?php echo IMG ?>Conquistas 130x160/<?php echo $conquista->getImagem(); ?>">
				<p><?php echo $conquista->getTitulo(); ?></p>
			</div>
			<?php } }?>

			<?php foreach ($dados["conquistas"] as $conquista) { ?>
			<?php if($conquista->getTipo() == 2){ ?>
			<div class="img-conquistas"> 
				<img src="<?php echo IMG ?>Conquistas 130x160/<?php echo $conquista->getImagem(); ?>" class="gray">
				<p><?php echo $conquista->getTitulo(); ?></p>
			</div>
			<?php } } ?>
		</div>
		
		<div class="rodape-painel">
			<a href="#" class="fa fa-plus-circle"><label class="a-plus"></label></a>
		</div>		
	</section> 

	<section id="titulos" class="painel">
		<div class="topo-painel">
			<h2 class="titulo-painel">Bordas</h2>
			<form class="pesquisa-painel">
				<label>
					<a href="#pesquisa-borda" class="a-pesquisa fa fa-search"></a>
				</label>
				<input class="busca-painel" id="pesquisa-borda" name="pesquisa-borda" type="text">
			</form>
		</div>

		<div class="conteudo-painel">
			<?php foreach ($dados["minhas_conquistas"] as $conquista) { ?>
			<?php if($conquista->getTipo() == 3){ ?>
			<div class="img-conquistas"> 
				<img src="<?php echo IMG ?>Conquistas 130x160/<?php echo $conquista->getImagem(); ?>">
				<p><?php echo $conquista->getTitulo(); ?></p>
			</div>
			<?php } }?>

			<?php foreach ($dados["conquistas"] as $conquista) { ?>
			<?php if($conquista->getTipo() == 3){ ?>
			<div class="img-conquistas"> 
				<img src="<?php echo IMG ?>Conquistas 130x160/<?php echo $conquista->getImagem(); ?>" class="gray">
				<p><?php echo $conquista->getTitulo(); ?></p>
			</div>
			<?php } } ?>
		</div>
		
		<div class="rodape-painel">
			<a href="#" class="fa fa-plus-circle"><label class="a-plus"></label></a>
		</div>		
	</section> 
</article>