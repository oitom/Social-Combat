
<article id="principal">
	<div class="busca-pagina">

			<div class="grupo-pesquisa">
				<input type="text" id="input-tags" class="input-tags demo-default busca" value="">
				<label>
					<a href="#pesquisa-global" id="pesquisar" class="a-pesquisa fa fa-search"></a>
				<label>
			</div>
		</div>

	<section id="amigos" class="painel">
		<div class="topo-painel">
			<h2 class="titulo-painel">Meus Jogos</h2>
			<form class="pesquisa-painel">
				<label>
					<a href="#pesquisa-meus-jogos" class="a-pesquisa fa fa-search"></a>
				</label>
				<input class="busca-painel" id="pesquisa-meus-jogos" name="pesquisa-meus-jogos" type="text">
			</form>
		</div>
		<div class="conteudo-painel">	
				<?php $swt = 0;foreach ($dados["jogos"] as $jogo) {?>
					<?php if($swt == 0){?>					
					<div class="grupo meus-jogos">
							<a href="index.php?c=jogos&f=perfil&codigo_jogo=<?php echo$jogo->getCodigo()?>">
								<img src="<?php echo IMG;?>/Empresa Jogo 130x130/<?php echo $jogo->getImagem();?>" class="img-grupo">
							</a>
							<p><?php echo $jogo->getTitulo();?></p>
							<p>Plataforma</p>
							<?php $swt=1;?>
					</div>

				<?php }elseif($swt == 1){?>					
					<div class="grupo meus-jogos">
							<a href="index.php?c=jogos&f=perfil&codigo_jogo=<?php echo$jogo->getCodigo()?>">
								<img src="<?php echo IMG;?>/Empresa Jogo 130x130/<?php echo $jogo->getImagem();?>" class="img-grupo">
							</a>
							<p><?php echo $jogo->getTitulo();?></p>
							<p>Plataforma</p>
							<?php $swt=0;?>
							</div>
					<?php }?><!--if-->
				<?php }?><!--foreach-->


					

				</div>			

		
		<div class="rodape-painel">
			<a href="#" class="fa fa-plus-circle"><label class="a-plus"></label></a>
		</div>		
	</section> 

	<section id="amigos" class="painel">
		<div class="topo-painel">
			<h2 class="titulo-painel">Jogos Sugeridos</h2>
			<form class="pesquisa-painel">
				<label>
					<a href="#pesquisa-meus-jogos" class="a-pesquisa fa fa-search"></a>
				</label>
				<input class="busca-painel" id="pesquisa-meus-jogos" name="pesquisa-meus-jogos" type="text">
			</form>
		</div>
		<div class="conteudo-painel">
			<?php $swt = 0;
				foreach ($dados["sugestao_jogos"] as $jogo) {?>
					<?php if($swt == 0){?>					
					<div class="grupo meus-jogos">
						<a href="index.php?c=jogos&f=perfil&codigo_jogo=<?php echo $jogo->getCodigo();?>"><img src="<?php echo IMG ?>Empresa Jogo 130x130/<?php echo $jogo->getImagem(); ?>" class="img-grupo">
						<p><?php echo $jogo->getTitulo(); ?></p>
						<p>PC </p>
						<p><a href="index.php?c=jogos&f=perfil" class="button">Adicionar <label class="fa fa-plus"></label></a></p>
				</div>

				<?php }elseif($swt == 1){?>					
					<div class="grupo meus-jogos">
						<a href="index.php?c=jogos&f=perfil&codigo_jogo=<?php echo $jogo->getCodigo();?>"><img src="<?php echo IMG ?>Empresa Jogo 130x130/<?php echo $jogo->getImagem(); ?>" class="img-grupo">
						<p><?php echo $jogo->getTitulo(); ?></p>
						<p>PC</p>
						<p><a href="#" class="button">Adicionar <label class="fa fa-plus"></label></a></p>
					</div>	
					<?php }?><!--if-->
				<?php }?><!--foreach-->

			
		
		<div class="rodape-painel">
			<a href="#" class="fa fa-plus-circle"><label class="a-plus"></label></a>
		</div>		
	</section>
		 
</article>

<script src="../recursos/js/jquery.js"></script>
<script src="../recursos/js/script.js"></script>
<script src="../recursos/js/selectize.js"></script>
<script>
$('.input-tags').selectize({
plugins: ['remove_button'],
persist: false,
create: true,
render: {
	item: function(data, escape) {
		return '<div>' + escape(data.text) + '</div>';
	}
},
onDelete: function(values) {

	//return confirm(values.length > 1 ? 'Are you sure you want to remove these ' + values.length + ' items?' : 'Are you sure you want to remove "' + values[0] + '"?');
}
});

</script>
