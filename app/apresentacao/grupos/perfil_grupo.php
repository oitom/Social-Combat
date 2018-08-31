<meta charset="ISO-8859-1">

<style type="text/css">

			.conteudo-painel{
				clear:both;
				display:inline;
			}
			.conteudo-painel-topico {
				float:right;
				clear:both;
				width: 97%
			}
			.mensagem-line{
				width:97%;
				display:block;
				border-bottom:1px solid #a24b25;
				padding:11px 12px;
				float: left;
				color:#000
				}

</style>
<article id="principal">
	<section id="info-grupo" class="painel">
		<div class="topo-painel">
			<!--<h2 class="titulo-painel">Configurações</h2>-->
		</div>
		<div class="conteudo-painel">
		<?php
				//var_dump($dados["grupo"]);
				foreach ($dados["grupo"] as $grupo ) {

				?>
		<div class="logo-perfil">						
			<img src="<?php echo IMG ?>Grupo 130x130/<?php echo $grupo->getImagem(); ?>" class="img-perfil2">			
		</div>
		
		<div class="dados-empresa">
			

			<p><?php echo $grupo->getNome(); ?></p>
			<p><?php echo $dados["jogo"]->getTitulo(); ?></p>
			<p><?php echo $dados["usuarioadm"]->getNickname(); ?></p>
			<p><?php echo $grupo->getDescricao(); ?></p>

		</div>
			<?php } ?>
		<div class="rodape-painel"></div>		
	</section> 
	<section id="amigos" class="painel">
			<div class="topo-painel">
				<h2 class="titulo-painel">Participantes</h2>
				<form class="pesquisa-painel">
					<label>
						<a href="#pesquisa-amigos" class="a-pesquisa fa fa-search"></a>
					</label>
						<input type="text" id="input-tags" class="input-tags demo-default busca" value="">
				</form>
			</div>

			<div class="conteudo-painel">

			<?php 
				foreach ($dados["participantes"] as $p) { ?>
				<div class="conteudo-painel">
				<a href="#"><img src="<?php echo IMG ?>Perfil/<?php echo $p->getImagens(); ?>" class="img-painel"></a>
			</div>
			<?php } ?>

			<div class="rodape-painel">
				<a href="#" class="fa fa-plus-circle"><label class="a-plus"></label></a>
			</div>		
	</section> 

	<section id="topicos-grupo" class="painel">
		<div class="topo-painel">
			<h2 class="titulo-painel">Tópicos</h2>
		</div>

		<div class="conteudo-painel-topico border-painel">
			<label>Mensagens</label>
			<div class="line"></div>
			<?php		
					if(isset($dados["topico"])){

						foreach ($dados["topico"] as $topico){
						?>
						<div style="">
						<a href="#" class="mensagem-line">
							<p class="topico-descricao"><?php echo $topico->getTitulo();?></p>
							<p class="topico-hora"><?php echo $topico->getDataHoraUltimoComentario();?></p>
							<p class="topico-msg"><?php echo $topico->getNumeroComentarios();?></p>
						</a>
						</div>

				<?php } } ?>
			

		</div>
		<div class="rodape-painel"><a href="denunciar">Denúnciar</a></div>		
	</section> 

</article>