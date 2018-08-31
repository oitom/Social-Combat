<section id="perfil">
	<a href="index.php?c=usuario&f=perfil&id=<?php echo isset($dados["amigo"])? $dados["amigo"]->getCodigo(): $dados["usuario"]->getCodigo(); ?>">
		<img src="<?php echo IMG ?>/Perfil/<?php echo isset($dados["amigo"])? $dados["amigo"]->getImagens(): $dados["usuario"]->getImagens(); ?>" id="avatar-perfil">
	</a>
	<p id="nome-perfil"> <?php echo isset($dados["amigo"])? $dados["amigo"]->getNome(): $dados["usuario"]->getNome(); ?> </p>
	<p id="nick-perfil"> 
		<?php echo isset($dados["amigo"])? $dados["amigo"]->getNickName(): $dados["usuario"]->getNickName(); ?>  | 
		<span class="fa fa-signal"></span>
	 	<?php echo isset($dados["amigo"])? $dados["amigo"]->getLevel(): $dados["usuario"]->getLevel(); ?> 
	 </p>
	<?php if(isset($dados["nao_amigo"])){ ?>
	<a href="" class="button add-amigo">Adicionar</a>
	<?php } ?>
	<?php 

	if(!isset($dados["amigo"])){ 
		$reputacao = $dados["usuario"]->getReputacao() * 10; ?>
		<div class="progress-bar usuario-reputacao">
			<div class="progress-bar-bg">
				<div class="progress" style="width: <?php echo $reputacao; ?>%"></div>
			</div>
			<h4><?php echo $reputacao?>%</h4>
		</div>
	<?php } ?>

	<nav>
		<ul id="menu-perfil" style="display: <?php echo isset($_GET["amigo"])? 'none' : 'block'; ?>">
			<li> <a href="index.php?c=usuario&f=configuracoes"><span class="fa fa-gears"></span> Configurações</a> </li>
			<li> <a href="index.php?c=mensagens&f=listar"><span class="fa fa-envelope"></span> Mensagens</a> </li>
			<li> <a href="index.php?c=amigos&f=listar"><span class="fa fa-user"></span> Amigos</a> </li>
			<li> <a href="index.php?c=jogos&f=listar"><span class="fa fa-gamepad"></span> Jogos</a> </li>
			<li> <a href="index.php?c=usuario&f=galeria"><span class="fa fa-picture-o"></span> Galeria</a> </li>
			<li> <a href="index.php?c=usuario&f=sair"><span class="fa fa-sign-out"></span> Sair</a> </li>
		</ul>

		<ul id="menu-desafio" style="display: <?php echo isset($_GET["amigo"])? 'none' : 'block'; ?>">
			<li> <a href="index.php?c=desafios&f=listar"><span class="fa fa-shield"></span> Desafios</a> </li>
			<li> <a href="index.php?c=conquistas&f=listar"><span class="fa fa-trophy"></span> Conquistas</a> </li>
			<li> <a href="index.php?c=avaliar&f=listar"><span class="fa fa-frown-o"></span> Avaliar</a> </li>
		</ul>

		<ul id="menu-grupo">
			<li> <a href="index.php?c=grupos&f=listar"><span class="fa fa-group"></span> Grupos</a> </li>
			<?php foreach ($dados["grupos"] as $grupo) { ?>
				
			<li> <a href="index.php?c=grupos&f=perfil&idgrupo=<?php echo $grupo->getCodigo(); ?>"><span class="fa fa-asterisk"></span><?php echo $grupo->getNome(); ?>(<?php echo count($grupo->getTopicos()); ?>)</a> </li>
			<?php } ?>
			<li style="display: <?php echo isset($_GET["amigo"])? 'none' : 'block'; ?>"> <a href="index.php?c=grupos&f=criar" class="btn-novo-grupo-modal"><span class="fa fa-plus"></span> Criar grupo</a> </li>
		</ul>
	</nav>
</section>
<div class="back-modal"></div>
<div class="novo-grupo modal">
	<a href="#" class="close fa fa-times-circle"></a>
	
	<form action="pagina.algo" method="GET">
		<label for="nome">Nome</label>
		<input type="text" name="nome" id="nome">

		<label for="jogo">Jogo</label>
		<select name="jogo" id="jogo">
			<option value="1">Battlefield</option>
			<option value="2">Call of Duty</option>
			<option value="3">World of Warcraft</option>
			<option value="4">The Sims</option>
			<option value="5">Need for Speed</option>
			<option value="6">Guitar Hero</option>
			<option value="7">Star Wars: The Old Republic</option>
			<option value="8">FIFA</option>
			<option value="9">League of Legends</option>
			<option value="10">Counter-Strike</option>
			<option value="11">FIFA-Street</option>
			<option value="12">Outros</option>
		</select>

		<label for="administradores">Adicionar Administradores</label>
		<input type="text" name="administradores" id="administradores">

		<label for="descricao">Descrição</label>
		<textarea name="descricao" id="descricao" placeholder="Descrição do Grupo"></textarea>

		<label for="publico">
			<input type="radio" name="privacidade" id="publico" value="publico" checked> Público
		</label>

		<label for="Privado">
			<input type="radio" name="privacidade" id="privado" value="privado"> Privado
		</label>

		<label for="Secreto">
			<input type="radio" name="privacidade" id="secreto" value="secreto"> Secreto
		</label>
		<div>
			<a href="mensagens.html" class="button">Enviar</a>
			<a href="mensagens.html" class="button">Cancelar</a>
		</div>		
	</form>
</div>
