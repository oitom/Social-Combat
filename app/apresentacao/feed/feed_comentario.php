<meta charset="iso-8859-1">
<div class="feed" style="display: none">
	<div class="fedd-conteudo">
		<div class="img-usuario-feed">
			<a href="index.php?c=usuario&f=perfil&amigo=<?php echo $dados["feed"]->getUsuario()->getCodigo(); ?>"> <img src="<?php echo IMG ?>Amigo 130x130/<?php echo $dados["feed"]->getUsuario()->getImagens(); ?>" class="img-painel"></a>
			<a href="index.php?c=usuario&f=perfil&amigo=<?php echo $dados["feed"]->getUsuario()->getCodigo(); ?>"> <label class='usuario-comentario'><?php echo $dados["feed"]->getUsuario()->getNome(); ?></label> </a>
			<span class="data-comentario">
				<?php 
					$data = $dados["feed"]->getDataHora();

					echo  date("d/m/Y", strtotime($data)). " as ". date("H:i", strtotime($data));  
				?>
			</label>
		</div>
		<div class="feed-comentario">
			<p>
				<?php echo $dados["feed"]->getCoteudo(); ?>
			</p>
		</div>
	</div>
</div>