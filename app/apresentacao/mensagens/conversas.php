<article id="principal">
	<section id="amigos" class="painel">
		<div class="topo-painel">
			<h2 class="titulo-painel">Conversas</h2>
			<a href="" class="button btn-nova-mensagem"> Nova mensagem <label class="fa fa-envelope"></label></a>
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
		<div class="conteudo-painel border-painel">
			<div class="painel-mensagens">
				<div class="mensagens msg-enviada">
					<div class="bloco-foto"><img src="img/Amigo 130x130/avatar.png"></div>
					<div class="bloco-msg"><p>Fala feio, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniamut labore et dolore magna aliqua. Ut enim ad minim veniam
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniamut labore et dolore magna aliqua. Ut enim ad minim veniam,</p></div>
				</div>

				<div class="mensagens msg-recebida">
					<div class="bloco-foto"><img src="img/Amigo 130x130/sokka.png"></div>
					<div class="bloco-msg"><p>Eai tio?</p></div>
				</div>

				<div class="mensagens msg-enviada">
					<div class="bloco-foto"><img src="img/Amigo 130x130/avatar.png"></div>
					<div class="bloco-msg">
						<p>cillum dolore eu fugiat nulla pariatur. Excepteur la fourse as </p></div>
				</div>

				<div class="mensagens msg-recebida">
					<div class="bloco-foto"><img src="img/Amigo 130x130/sokka.png"></div>
					<div class="bloco-msg"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. 
					</p></div>
				</div>
				<div class="mensagens msg-enviada msg-enviada-padrao">
					<div class="bloco-foto"><img src="img/Amigo 130x130/avatar.png"></div>
					<div class="bloco-msg">
						<p></p></div>
				</div>
			</div>
			<div class="enviar-mensagem">
				<textarea></textarea>
				<a href="" class="button"> Enviar <label class="fa fa-send"></label></a>
			</div>
		</div>
		<div class="rodape-painel">
			<br>
		</div>		
	</section> 
</article>	
<script src="js/jquery.js"></script>
		<script src="js/selectize.js"></script>
		<script src="js/script.js"></script>
		<script src="js/input-complete.js"></script>
		<script type="text/javascript">
			$(".close, .nova-mensagem a, .back-modal").click(function(){
				$(".nova-mensagem.modal, .back-modal").fadeOut();
				return false;
			});
			$(".btn-nova-mensagem").click(function(){
				$(".nova-mensagem.modal, .back-modal").fadeIn();
				return false;
			});
			var i =0;
			$(".enviar-mensagem a").click(function(){
				
				if($(".enviar-mensagem textarea").val().length > 0){
					$(".msg-enviada-padrao p").html($(".enviar-mensagem textarea").val());
					var msg = $(".msg-enviada-padrao").clone().appendTo(".painel-mensagens").fadeIn();
				
					msg.attr("id", "msg"+i); 
					msg.removeClass("msg-enviada-padrao"); 
					
					i++;
				}
				$(".enviar-mensagem textarea").val("");
				return false;
			});
		</script>