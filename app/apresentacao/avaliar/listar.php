
<article id="principal">
		

		<?php 
			if(!$dados["avaliar"]){
				echo "<h2>Sem desafios? Desafie um de seus amigos já!</h2>";
			}else{
			foreach ($dados["avaliar"] as $desafio) {?>
		<section class="painel">
			<div class="topo-painel">Qual o resultado do desafio? 
				<label for="Perdeu<?php echo $desafio["codigo"];?>">
					<input type="radio" name="privacidade<?php echo $desafio["codigo"];?>" id="Perdeu<?php echo $desafio["codigo"];?>" value="Perdeu1" > Perdeu
				</label>
	
				<label for="ganhou<?php echo $desafio["codigo"];?>">
					<input type="radio" name="privacidade<?php echo $desafio["codigo"];?>" id="ganhou<?php echo $desafio["codigo"];?>" value="ganhou1"> ganhou
				</label>
	
				<a href="#" class="button btn-nova-mensagem-modal">Salvar</label></a>
				<a href="#" class="button btn-nova-mensagem">Salvar</label></a>
			</div>

			<div class="conteudo-painel">
				<div class="desafio-jogador"> 
				<a href='index.php?c=usuario&f=perfil&amigo=<?php echo $desafio["codigo_desafiante"]; ?>'><img src="<?php echo IMG ?>Amigo 130x130/<?php echo $desafio["imagem"];?>"></a>
				</br></br></br>				
			</div>

			<div class="desafio-dados" id="j1"> 
				<p><?php echo $desafio["datahora"]?></p></br>
			</div>

			<div class="img-conquistas"> 
				<a href="perfil_amigo.html"><img src="<?php echo IMG ?>Icons 76x76/espadas-cruzadas_91-7930.png" ></a>
			</div>

			<div class="desafio-dados" id="j2"> 
				<a href="#"><?php echo $desafio["jogo"];?></a>
				<p>modo JxJ</p></br>
			</div>

			<div class="desafio-jogador"> 
				<a href='index.php?c=usuario&f=perfil&amigo=<?php echo $desafio["codigo_desafiado"]; ?>'><img src="<?php echo IMG ?>Amigo 130x130/<?php echo $desafio["imagem_desafiado"];?>"></a>
			</div>
		</div>
		
		<div class="rodape-painel"></div>	

		</section>
	<?php
		}
	 }?>

</div>

		<div class="rodape-painel"></div>		
	</section> 
</article>