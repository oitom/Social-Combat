<section id="painel-login">
	<article>
		<div class="bloco-login">
			<h2>Cadastro</h2>
			<form action="index.php?c=Index&f=login" method="post">
				<label>E-mail</label>
				<input name="campo-email" id="campo-email" type="text">

				<label>Senha</label>
				<input name="campo-senha" id="campo-senha" type="password">

				<label>Confirmar senha</label>
				<input name="campo-confirmar-senha" id="campo-confirmar-senha" type="password">

				<input type="submit" class="button" name="btn-cadastrar" value="Cadastrar">
			</form>
		</div>
		<div class="divider">
		</div>
		<div class="bloco-login">
			<h2>Acesse com suas redes sociais.<br> É mais simples, rápido e seguro.</h2>
			<form action="index.php?c=Index&f=login" method="post">
				<label>E-mail</label>
				<input name="email" id="campo-email" type="text">

				<label>Senha</label>
				<input name="senha" id="campo-senha" type="password">

				<a href="#">Esquici minha senha</a>
				<input type="submit" class="button" name="btn-cadastrar" value="Login">
			</form>
			<div class="login-social">
				<span class="fa fa-facebook-square"></span>
				<a class="button btn-facebook">Logar com Facebook</a>
			</div>
			<div class="login-social">
				<span class="fa fa-twitter-square"></span>
				<a class="button btn-twitter">Logar com Twitter</a>
			</div>
			<div class="login-social">
				<span class="fa fa-google-plus-square"></span>
				<a class="button btn-google-plus">Logar com Google+</a>
			</div>

		</div>
	</article>
</section>