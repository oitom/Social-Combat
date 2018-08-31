<article id="principal">
	<section id="amigos" class="painel">
		<div class="topo-painel">
			<h2 class="titulo-painel">Mensagens</h2>
			<a href="mensagens.html" class="button btn-nova-mensagem-modal"> Nova mensagem <label class="fa fa-envelope"></label></a>
			
			<a href="mensagens.html" class="button btn-nova-mensagem"> Nova mensagem <label class="fa fa-envelope"></label></a>
			

			<div class="back-modal"></div>
			<div class="nova-mensagem modal">
				<a href="#" class="close fa fa-times-circle"></a>
				<div>
					<label>Amigo: </label>
					<input type="text" id="input-tags" class="input-tags demo-default busca" value="">
				</div>
				<div>	
					<label>Mensagem: </label>
					<textarea></textarea>
				</div>
				<div>
					<a href="mensagens.html" class="button">Enviar</a>
					<a href="mensagens.html" class="button">Cancelar</a>
				</div>		
			</div>
		</div>
		<div id="bloco-nova-mensagem" class="nova-mensagem">
			<label>Amigo: </label>
			<input type="text" id="input-tags" class="input-tags demo-default busca" value="">	
			<label>Mensagem: </label>
			<textarea></textarea>
			<a href="mensagens.html" class="button can">Enviar</a>
			<a href="mensagens.html" class="button">Cancelar</a>
			
		</div>

		<div class="conteudo-painel border-painel">
				<label>Ultimas mensagens</label>
				<div class="line"></div>

				<a href="index.php?c=mensagens&f=conversas&codConversa=1" class="mensagem-line">
					<p class="msg-amigo">Amigo 1</p>
					<p class="msg-hora">Hoje à(s) 10:22 am</p>
				</a>
				<a href="index.php?c=mensagens&f=conversas&codConversa=1" class="mensagem-line">
					<p class="msg-amigo">Amigo 2</p>
					<p class="msg-hora">Ontem à(s) 11:58 am</p>
				</a>
				<a href="index.php?c=mensagens&f=conversas&codConversa=1"class="mensagem-line">
					<p class="msg-amigo">Amigo 3</p>
					<p class="msg-hora">Qua Out 22, 2014 10:22 am</p>
				</a>
				<a href="index.php?c=mensagens&f=conversas&codConversa=1"class="mensagem-line">
					<p class="msg-amigo">Amigo 4</p>
					<p class="msg-hora">Sab Out 14, 2014 07:32 am</p>
				</a>
				<a href="index.php?c=mensagens&f=conversas&codConversa=1"class="mensagem-line">
					<p class="msg-amigo">Amigo 5</p>
					<p class="msg-hora">Sex Out 13, 2014 12:02 am</p>
				</a>
				<a href="index.php?c=mensagens&f=conversas&codConversa=1"class="mensagem-line">
					<p class="msg-amigo">Amigo 6</p>
					<p class="msg-hora">Qui Out 12, 2014 10:22 am</p>
				</a>
		</div>
		<div class="rodape-painel">
			<br>
		</div>		
	</section> 
</article>