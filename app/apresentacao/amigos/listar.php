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
			<h2 class="titulo-painel">Meus Amigos</h2>
			<form class="pesquisa-painel">
				<label>
					<a href="#pesquisa-amigos" class="a-pesquisa fa fa-search"></a>
				</label>
				<input class="busca-painel" id="pesquisa-amigos" name="pesquisa-amigos" type="text">
			</form>
		</div>
		<div class="back-modal"></div>
		<div class="nova-mensagem modal">
			<a href="#" class="close fa fa-times-circle"></a>
			<div>	
				<label>Mensagem: </label>
				<textarea></textarea>
			</div>
			<div>
				<a href="mensagens.html" class="button">Enviar</a>
				<a href="mensagens.html" class="button">Cancelar</a>
			</div>		
		</div>

		<?php 
			$qtd = 0;
			foreach ($dados["amigos"] as $amigo) {
				if($qtd == 3) break;
				if($qtd < 3){
		?>

		<div class="conteudo-painel">
			<div class="img-amigo">
				<a href="index.php?c=usuario&f=perfil&amigo=<?php echo $amigo->getCodigo(); ?>">
					<img src="<?php echo IMG ?>Amigo 130x130/<?php echo $amigo->getImagens(); ?>" class="img-painel-amigos"></a>
			</div>
			<div class="nome-nick">
				<p><?php echo $amigo->getNome();?></p>	
				<p><?php echo $amigo->getNickname();?></p>				
			</div>
			<div class="opcoes-amigo">
				<a href="#" class="desafiar-amigo"><img src="<?php echo IMG ?>desafio.png" class="img-painel2"></a>
				<a href="#" class="enviar-mensagem-amigo"><img src="<?php echo IMG ?>mensagem.png" class="img-painel2"></a>
			</div>
			<div class="btn-toggle">
				<a href="#blocoamigo1" class="fa fa-chevron-circle-down"></a>
			</div>
			<div class="wrapp-opcoes-sm">
				<div id="blocoamigo1" class="opcoes-amigo op-sm">
					<a href="#" class="desafiar-amigo"><img src="<?php echo IMG ?>desafio.png" class="img-painel2"></a>
					<a href="#" class="enviar-mensagem-amigo"><img src="<?php echo IMG ?>mensagem.png" class="img-painel2"></a>
				</div>
			</div>
		</div>

		<?php
			}
		}
		?>


		<?php 
 			//var_dump($dados["sugeridos"]);
		?>


<div class="rodape-painel">
			<a href="#" class="fa fa-plus-circle"><label class="a-plus"></label></a>
		</div>		
	</section> 

	<section id="amigos" class="painel">
		<div class="topo-painel">
			<h2 class="titulo-painel">Sugeridos</h2>
			<form class="pesquisa-painel">
				<label>
					<a href="#pesquisa-amigos-sugeridos" class="a-pesquisa fa fa-search"></a>
				</label>
				<input class="busca-painel" id="pesquisa-amigos-sugeridos" name="pesquisa-amigos" type="text">
			</form>
		</div>
		


		<div class="conteudo-painel">			

			<?php 
			$qtd = 0;
			foreach ($dados["sugeridos"] as $amigo) {
				if($qtd == 3) break;
				if($qtd < 3){
		?>

		<div class="conteudo-painel">
			<div class="img-amigo">
				<a href="index.php?c=usuario&f=perfil&amigo=<?php echo $amigo->getCodigo(); ?>">
					<img src="<?php echo IMG ?>Amigo 130x130/<?php echo $amigo->getImagens(); ?>" class="img-painel-amigos"></a>
			</div>
			<div class="nome-nick">
				<p><?php echo $amigo->getNome();?></p>	
				<p><?php echo $amigo->getNickname();?></p>				
			</div>
			
			<div class="opcoes-amigo op-sugeridos">
				<a href="#"><img src="<?php echo IMG ?>adicionar.png" class="img-painel2"></a>
			</div>
			<div class="btn-toggle">
				<a href="#blocoamigo3" class="fa fa-chevron-circle-down"></a>
			</div>
			<div class="wrapp-opcoes-sm">
				<div id="blocoamigo3" class="opcoes-amigo op-sm">
					<a href="#"><img src="<?php echo IMG ?>adicionar.png" class="img-painel2"></a>
				</div>
			</div>

		</div>

		<?php
			}
		}
		?>

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