<article id="principal">
	<div class="busca-pagina">

			<div class="grupo-pesquisa">
				<input type="text" id="input-tags" class="input-tags demo-default busca" value="">
				<label>
					<a href="#pesquisa-global" id="pesquisar" class="a-pesquisa fa fa-search"></a>
				<label>
			</div>
		</div>

	<section id="meus-grupos" class="painel">
		<div class="topo-painel">
			<h2 class="titulo-painel">Meus Grupos</h2>
			<form class="pesquisa-painel">
				<label>
					<a href="#pesquisa-mgrupos" class="a-pesquisa fa fa-search"></a>
				</label>
				<input class="busca-painel" id="pesquisa-mgrupos" name="pesquisa-mgrupos" type="text">
			</form>
		</div>

	<div class="conteudo-painel">
		
		<?php foreach ($dados["listagrupo"] as $lista) {
			$i = 0;
			$vetorgrupos = $lista;
			
		?>
			<div class="grupo">
			<a href="index.php?c=grupos&f=perfil&idgrupo=<?php echo $lista->getCodigo();?>"><img src="<?php echo IMG ?>Grupo 130x130/<?php echo $lista->getImagem(); ?>" class="img-grupo"></a>
			<p><?php echo $lista->getNome(); ?></p>
			
			<?php foreach ($dados["jogolista"] as $jogo) {
				if($lista->getCodigoJogo() == $jogo->getCodigo()){
			 ?>
				<p><?php echo $jogo->getTitulo(); ?></p>
			<?php }} ?>
			<p>Tópicos (<?php echo count($lista->getTopicos()); ?> )</p>
			</div>

		<?php  } ?>
		
	</div>

		
						
		<div class="rodape-painel">
			<a href="#" class="fa fa-plus-circle"><label class="a-plus"></label></a>
		</div>		
	</section> 

	<section id="grupos-sugeridos" class="painel">
		<div class="topo-painel">
			<h2 class="titulo-painel">Grupos Sugeridos</h2>
			<form class="pesquisa-painel">
				<label>
					<a href="#pesquisa-grupos" class="a-pesquisa fa fa-search"></a>
				</label>
				<input class="busca-painel" id="pesquisa-grupos" name="pesquisa-grupos" type="text">
			</form>
		</div>
		<div class="conteudo-painel">
		<?php foreach ($dados["grupos_sugeridos"] as $all) { ?>
			
				<div class="grupo">
				<a href="index.php?c=grupos&f=perfil&idgrupo=<?php echo $all->getCodigo();?>"><img src="<?php echo IMG ?>Grupo 130x130/<?php echo $all->getImagem();?>" class="img-grupo"></a>
				<p><?php echo $all->getNome(); ?></p>
				<?php foreach ($dados["jogolista"] as $jogo) {
				if($all->getCodigoJogo() == $jogo->getCodigo()){
			 ?>
				<p><?php echo $jogo->getTitulo(); ?></p>
			<?php }} ?>
				<p>Tópicos n</p>
				</div>

		

		 <?php } ?>

		</div>
						
		<div class="rodape-painel">
			<a href="#" class="fa fa-plus-circle"><label class="a-plus"></label></a>
		</div>		
	</section>
	
</article>
<script src="js/jquery.js"></script>
<script src="js/script.js"></script>
<script src="js/selectize.js"></script>
<script>

$(".close, .nova-mensagem a, .back-modal").click(function(){
	$(".nova-mensagem.modal, .back-modal").fadeOut();
	return false;
});


$(".enviar-mensagem-amigo").click(function(){
	$(".nova-mensagem.modal, .back-modal").fadeIn();
	return false;
});
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