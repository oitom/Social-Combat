<article id="principal">
	<?php foreach ($dados["desafios"] as $desafio) { ?>
	
	<section class="painel">
		<div class="topo-painel"></div>
		<div class="conteudo-painel">
			<div class="desafio-jogador j1"> 
				<a href="index.php?c=usuario&f=perfil&amigo=<?php echo $desafio->getDesafiante()->getCodigo(); ?>">
					<img class="img-desafios" src="<?php echo IMG ?>Amigo 130x130/<?php echo $desafio->getDesafiante()->getImagens(); ?>">
				</a>
				<a href="#" class="button btn-nova-mensagem-modal">
				<?php echo $desafio->getVitoria()? "Vencedor" : "Derrotado";  ?>
				</a>
			</div>

			<div class="desafio-dados" id="j1"> 
				<p><strong><?php echo $desafio->getDesafiante()->getNome(); ?></strong></p>
				<p><span><?php echo $desafio->getDesafiante()->getNickName(); ?></span></p></br>
				<p class="exp"><?php echo $desafio->getVitoria()? "EXP +100" : "EXP +20"; ?></p>
			</div>

			<div class="img-conquistas"> 
				<img src="<?php echo IMG ?>Icons 76x76/espadas-cruzadas_91-7930.png" ></a>
				
				</br></br>
				<p class="jogo-desafio"><?php echo  $desafio->getJogo()->getTitulo(); ?></p>
				<br><br>
				<ul class="icons-social-jogo">
					<li><a href=""> <span class="fa fa-facebook-square"></span></a></li>
					<li><a href=""> <span class="fa fa-twitter-square"></span></a></li>
					<li><a href=""> <span class="fa fa-google-plus-square"></span></a></li>
					<li><a href=""> <span class="fa fa-globe"></span></a></li>
				</ul>
			</div>

			<div class="desafio-dados" id="j2"> 
				<p><strong><?php echo $desafio->getDesafiado()->getNome(); ?></strong></p>
				<p><span><?php echo $desafio->getDesafiado()->getNickName(); ?></span></p></br>
				<p class="exp"><?php echo $desafio->getVitoria()? "EXP +20" : "EXP +100"; ?></p>
			</div>
			<div class="desafio-jogador j2"> 
				<a href="index.php?c=usuario&f=perfil&amigo=<?php echo $desafio->getDesafiado()->getCodigo(); ?>">
					<img class="img-desafios" src="<?php echo IMG ?>Amigo 130x130/<?php echo $desafio->getDesafiado()->getImagens();  ?>">
				</a>
				<a href="#" class="button btn-nova-mensagem-modal">
				<?php echo $desafio->getVitoria()? "Derrotado" : "Vencedor";  ?>
				</a>
			</div>
		</div>
		
		<div class="rodape-painel"></div>		
	</section> 
	<?php } ?>
</article>
<script>
	$('.j1 > .button, .j2 > .button').each(function(){ 
		if($(this).html().trim() == "Vencedor")
			$(this).addClass("vencedor");
		else
			$(this).addClass("derrotado");
	});
</script>