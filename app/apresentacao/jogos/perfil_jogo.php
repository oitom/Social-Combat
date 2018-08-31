<meta charset="iso-8859-1">
<article id="principal">
	<section id="perfil-empresa" class="painel">

		<div class="topo-painel">
			<h2 class="titulo-painel">Perfil Jogo</h2>
			<form class="pesquisa-painel">
				<label>
					<a href="#pesquisa-amigos" class="a-pesquisa fa fa-search"></a>
				</label>
				<input class="busca-painel" id="pesquisa-amigos" name="pesquisa-amigos" type="text">
			</form>
		</div>

		<div class="conteudo-painel">
			<div class="logo-perfil">	
				<?php //echo "<pre>"; print_r($dados['jogo']); ?>
				<?php for ($i=0; $i < count($dados["foto"]); $i++) { ?> <!-- verifica a imagem setada como capa para carregar a capa -->
					<?php if ($dados['foto'][$i][1]) { ?>
						<img src="<?php echo IMG ?>Empresa Jogo 130x130/<?php echo $dados['foto'][$i][0] ?>" class="img-perfil2">
					<?php } ?>
				<?php } ?>					
			</div>
			
			<div class="dados-empresa">
			
				<p><?php echo $dados["jogo"]->getTitulo(); ?></p> <!-- carrega o titulo do jogo -->
				<!-- <p>EA | Electronic Arts Inc</p> -->
				<p>Lançamento: <?php echo $dados["jogo"]->getDataLancamento(); ?></p> <!-- carrega a data que o jogo foi lançado -->
				<!-- <p>Plataformas: PC, PS4, XBOX</p> -->
				<p class="site-pc"><?php echo $dados["jogo"]->getPaginaOficial(); ?></p> <!-- carrega a pagina oficial -->

			</div>

			<div class="menu-sociais">

				<p class="site-tablet"><?php echo $dados["jogo"]->getPaginaOficial(); ?></p>

				<ul class="icons-social-jogo">
					<li><a href=""> <span class="fa fa-facebook-square"></span></a></li>
					<li><a href=""> <span class="fa fa-twitter-square"></span></a></li>
					<li><a href=""> <span class="fa fa-google-plus-square"></span></a></li>
					<li><a href=""> <span class="fa fa-globe"></span></a></li>
				</ul>

			</div>

			<div class="descricao">
			
				<p><?php echo $dados["jogo"]->getDescricao(); ?></p> <!-- carrega a descrição do jogo -->

			</div>

		</div>

		<div class="rodape-painel">
			<a href="#" class="fa fa-plus-circle"><label class="a-plus"></label></a>
		</div>	

	</section> 

	<section id="jogos" class="painel">
		<div class="topo-painel">
			<h2 class="titulo-painel">Galeria</h2>
			<form class="pesquisa-painel">
				<label>
					<a href="#pesquisa-jogos" class="a-pesquisa fa fa-search"></a>
				</label>
				<input class="busca-painel" id="pesquisa-jogos" name="pesquisa-jogos" type="text">
			</form>
		</div>

		<div class="conteudo-painel">
		<?php //echo "<pre>"; print_r($dados["foto"]); //echo count($dados["foto"]); ?> <!-- Carrega a galeria do jogo -->
		<?php for ($i=0; $i < count($dados["foto"]); $i++) { ?>
			<a href="#"><img src="<?php echo IMG ?>Empresa Jogo 130x130/<?php echo $dados['foto'][$i][0]; ?>" class="img-perfil2">
		<?php } ?>
			
		</div>

		<div class="rodape-painel">
			<a href="#" class="fa fa-plus-circle"><label class="a-plus"></label></a>
		</div>	
			
	</section>

	<section id="feed" class="painel">
		<div class="topo-painel">
			<h2 class="titulo-painel">Últimas Notícias</h2>
		</div>
		<div class="rodape-painel">
			<div class="feed">
				<div class="perfil-jogo">
					<?php //echo "<pre>"; var_dump($dados["feed"]); ?>
					<?php echo $dados['feed']->getFeed(); ?>
				</div>
			</div>	
		</div>	
	</section>
</article>