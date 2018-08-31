<article id="principal">
<section id="amigos" class="painel">	
	<?php 
		if(!isset($dados["galerias"])){
			echo "<h2>Sem galeria de fotos. Aguarde a versão 0.2...</h2>";
		}else{
		foreach ($dados["galerias"] as $galeria){ ?>
	<div class="conteudo-painel">
		<div class="topo-painel">
			<h2 class="titulo-painel"><?php echo $galeria["titulo"];?></h2><br>
		</div>
			<?php foreach ($galeria["foto"] as $fotos)  { ?>				
				<?php echo html_img("Galeria/".$fotos->getImagem(), $fotos->getLegenda(), "col-glr")?>	
			<?php }
			} 		
		}?> 
	</div>
	<div class="rodape-painel"> <a href="" class="fa fa-plus-circle btn-novo-galeria-modal"><label class="a-plus"></label></a></div>		
</section> 
</article>

