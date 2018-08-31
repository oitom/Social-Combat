<article id="principal"> 
	<section id="amigos" class="painel">
		<div class="topo-painel">
			<h2 class="titulo-painel">Amigos</h2>
			<form class="pesquisa-painel">
				<label>
					<a href="#pesquisa-amigos" class="a-pesquisa fa fa-search"></a>
				</label>
					<input class="busca-painel" id="pesquisa-amigos" name="pesquisa-jogos" type="text">
			</form>
		</div>
		<div class="conteudo-painel">
			<?php 
				$qtd = 0;
				foreach ($dados["amigos"] as $amigo) {
					if($qtd == 7) break;
					if($qtd < 7){
			?>	
			<a href="index.php?c=usuario&f=perfil&amigo=<?php echo $amigo->getCodigo(); ?>">
				<img src="<?php echo IMG ?>Amigo 130x130/<?php echo $amigo->getImagens(); ?>" class="img-painel">
			</a>	
			<?php 
					}
					else{
			?>
			<a href="index.php?c=usuario&f=perfil&amigo="<?php echo $amigo->getCodigo(); ?> class="invisivel">
				<img src="<?php echo IMG ?>Amigo 130x130/<?php echo $amigo->getImagens(); ?>" class="img-painel">
			</a>

			<?php			
					}
					$qtd++;
				}
			?>

		</div>
		<div class="rodape-painel">
			<a href="#" class="fa fa-plus-circle"><label class="a-plus"></label></a>
		</div>		
	</section> 

	<section id="jogos" class="painel">
		<div class="topo-painel">
			<h2 class="titulo-painel">Jogos</h2>
			<form class="pesquisa-painel">
				<label>
					<a href="#pesquisa-jogos" class="a-pesquisa fa fa-search"></a>
				</label>
				<input class="busca-painel" id="pesquisa-jogos" name="pesquisa-jogos" type="text">
			</form>
		</div>
		<div class="conteudo-painel">
			<?php 
				$qtd = 0;
				foreach ($dados["jogos"] as $jogo) {
					if($qtd == 7) break;
					if($qtd < 7){
			?>	
			<a href="index.php?c=jogos&f=perfil&codigo_jogo=<?php echo $jogo->getCodigo(); ?>">
				<img src="<?php echo IMG ?>Empresa Jogo 130x130/<?php echo $jogo->getImagem(); ?>" class="img-painel">
			</a>	
			<?php 
					}
					else{
			?>
			<a href="index.php?c=jogos&f=perfil&codigo_jogo=<?php echo $jogo->getCodigo(); ?>" class="invisivel">
				<img src="<?php echo IMG ?>Empresa Jogo 130x130/<?php echo $jogo->getImagem(); ?>" class="img-painel">
			</a>

			<?php			
					}
					$qtd++;
				}
			?>
			
		</div>
		<div class="rodape-painel">
			<a href="#" class="fa fa-plus-circle"><label class="a-plus"></label></a>
		</div>		
	</section>
	<?php if(isset($dados["amigo"])){ ?>	
		<section id="vida-social">
			<?php $reputacao = $dados["amigo"]->getReputacao() * 10; ?>
			<div class="progress-bar col2">
				<h4>Confiabilidade - <?php echo $reputacao?>%</h4>
				<div class="progress-bar-bg">
					<div class="progress" style="width: <?php echo $reputacao; ?>%"></div>
				</div>
			</div>
			<div class="social col2">
				<ul class="icons-social">
					<li><a href=""> <span class="fa fa-facebook-square"></span></a></li>
					<li><a href=""> <span class="fa fa-twitter-square"></span></a></li>
					<li><a href=""> <span class="fa fa-google-plus-square"></span></a></li>
					<li><a href=""> <span class="fa fa-globe"></span></a></li>
				</ul>
			</div>
		</section>
		<?php if(isset($dados["galerias"])){ ?>
		<section id="jogos" class="painel">
			<div class="topo-painel">
				<h2 class="titulo-painel">Galeria</h2>
				<form class="pesquisa-painel">
					<label>
						<a href="#pesquisa-jogos" class="a-pesquisa fa fa-search"></a>
					</label>
					<input class="busca-painel" id="pesquisa-jogos" name="pesquisa-jogos" type="text">
				</form>
			</div>
			<div class="conteudo-painel">
				<?php  foreach ($dados["galerias"] as $galeria){ ?>
				<?php foreach ($galeria["foto"] as $fotos)  { ?>
				<a href=""><img src="<?php echo IMG ?>/album/<?php echo $fotos->getImagem(); ?>" class="img-painel"></a>
				<?php } } ?>
			</div>
			<div class="rodape-painel">
				<a href="#" class="fa fa-plus-circle"><label class="a-plus"></label></a>
			</div>		
		</section>
		<?php } ?>
	<?php } ?>

	<section id="feed" class="painel">
		<div class="topo-painel">
			<h2 class="titulo-painel">Feeds</h2>
		</div>
		<div id="feed-painel" class="conteudo-painel">
			<div id="load" style="display: none;">
            	<center>
            	    <img src="<?php echo IMG ?>load-img.gif">
            	</center>
        	</div>
		</div>				
		<div class="rodape-painel">
		</div>		
	</section>
</article>
<script src="<?php echo JS ?>script.js"></script>
<script type="text/javascript">
  /* $(window).scroll(function(){
        if($(window).scrollTop() == $(document).height() - $(window).height()){
            $('div#load').show();
            $.ajax({
                url: "index.php?c=usuario&f=feed",
                success: function(html){
                    if(html){
                        $("#feed-painel").append(html);
                        $('div#load').hide();
                    }else{
                        $('div#load').html('<center>Não há mais feeds para mostrar</center>');
                    }
                    $(".feed").fadeIn();
                }
            });

        }
    });*/
	
	$(document).ready(function()
	{
		var $_GET = {};
		document.location.search.replace(/\??(?:([^=]+)=([^&]*)&?)/g, function () {
			function decode(s) {
				return decodeURIComponent(s.split("+").join(" "));
			}
			$_GET[decode(arguments[1])] = decode(arguments[2]);
		});

		$(".add-amigo").click(function(){

			var codigo_amigo = $_GET["amigo"];
			
			$.ajax({
	            url: "index.php?c=usuario&f=adicionarAmigo&amigo="+codigo_amigo,
	            success: function(html){
	            }
       		 });
			$(".add-amigo").fadeOut();
			return false;
		});


		var feed = "index.php?c=usuario&f=feed";

		if($_GET["amigo"])
			feed = "index.php?c=usuario&f=feed&amigo="+$_GET["amigo"];
		
		$.ajax({
            url: feed,
            success: function(html){
                if(html){
                    $("#feed-painel").append(html);
                    $('div#load').hide();
                }else{
                    $('div#load').html('<center>Não há mais feeds para mostrar</center>');
                }
                $(".feed").fadeIn();
            }
        });
	});
</script>
