<?php $_pagename = "home"; require "header.php"; ?>

	<section id="home" class="highlight">
		<section class="featured row cycle-slideshow" data-cycle-slides="> article">
			<?php foreach($destaques as $destaque): ?>
				<article>
					<hgroup class="col-xs-12 col-sm-6">
						<h1><a href="<?=$destaque->link?>" title="<?=$destaque->title?>" target="_blank">Rápido, simples e descomplicado, um CRM como você nunca viu.</a></h1>
						<a href="<?=$destaque->link?>" title="<?=$destaque->subtitulo?>" target="_blank"><?=$destaque->subtitulo?></a>
					</hgroup>
					<iframe src="//www.youtube.com/embed/<?=get_youtube_by_url($destaque->video)?>" class="col-xs-12 col-sm-6" frameborder="0" allowfullscreen></iframe>
				</article>
			<?php endforeach; ?>
		</section>

		<section class="benefits row">
			<h1 class="title"><?=$vantagens->title?></h1>
			<article class="suporte col-xs-12 col-sm-4">
				<header>
					<span class="icon"></span>
					<h2>Suporte</h2>
				</header>
				<?=$suporte->content?>
			</article>
			<article class="missao col-xs-12 col-sm-4">
				<header>
					<span class="icon"></span>
					<h2><?=$missao->title?></h2>
				</header>
				<?=$missao->content?>
			</article>
			<article class="organizacao col-xs-12 col-sm-4">
				<header>
					<span class="icon"></span>
					<h2><?=$organizacao->title?></h2>
				</header>
				<?=$organizacao->content?>
			</article>
		</section>
	</section>

	<section id="institucional" class="row">
		<header class="left-side col-xs-12 col-sm-4">
			<h1><span>Sieg</span> Soluções Inteligentes</h1>
			<img src="<?=$sieg->thumbnail->full?>" alt="Cofre">
		</header>
		<article class="right-side col-xs-12 col-sm-8">
			<header class="top">
				<?=$sieg->content?>
			</header>
			<footer class="row">
				<article class="missao col-xs-12 col-md-6">
					<h2><?=$siegMissao->title?></h2>
					<?=$siegMissao->content?>
				</article>
				<article class="visao col-xs-12 col-md-6">
					<h2><?=$siegVisao->title?></h2>
					<?=$siegVisao->content?>
				</article>
				<article class="valores col-xs-12 col-md-6">
					<h2><?=$siegValores->title?></h2>
					<?=$siegValores->content?>
				</article>
			</footer>
		</article>
	</section>

	<section id="funcionalidades" class="row">
		<div class="steps">
			<div class="cycle-slideshow row" data-cycle-slides="> article" data-cycle-timeout="0" data-cycle-next="#funcionalidades button.next" data-cycle-prev="#funcionalidades button.prev">
				<?php foreach($passos as $passo): ?>
					<article>
						<aside class="col-xs-12 col-sm-12 col-md-4">
							<h1><?=$passo->title?></h1>
							<?=$passo->content?>
						</aside>
						<img src="<?=$passo->thumbnail->full?>" class="col-xs-12 col-md-8" alt="Ilustração - <?=$passo->title?>">
					</article>
				<?php endforeach; ?>
			</div>
			<nav>
				<button class="prev">Anterior</button>
				<button class="next">Próximo</button>
			</nav>
		</div>
	</section>

	<section id="faq" class="row">
		<nav class="col-xs-12 col-sm-4">
			<div class="row">
				<header class="col-xs-12">
					<h1>Perguntas mais frequentes</h1>
				</header>
				<div class="bar">
					<p class="col-xs-12">Confira mais perguntas</p>
					<nav>
						<button class="prev">Anteriores</button>
						<button class="next">Próximas</button>
					</nav>
				</div>
				<div class="cycle-slideshow" data-cycle-slides="> ul" data-cycle-timeout="0" data-cycle-fx="scrollHorz" data-cycle-next="#faq button.next" data-cycle-prev="#faq button.prev">
						<?php $i = 0; ?>
						<?php $k = 0; ?>
						<?php foreach($faq as $pergunta): ?>
							<?php if($i == 0): ?>
								<ul class="questions">
							<?php endif; ?>
							<li>
								<a href="<?=$pergunta->name?>" class="<?=($i == 0) ? 'selected' : ''?> col-xs-12" data-question-num="<?=$k?>"><?=$k + 1?> - <?=$pergunta->title?></a>
							</li>
							<?php $i++; $k++; ?>
							<?php if($i == 6): ?>
								</ul>
								<?php $i = 0; ?>
							<?php endif; ?>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>
		</nav>
		<ul class="answers col-xs-12 col-sm-8">
			<?php $j = 0; ?>
			<?php foreach($faq as $pergunta): ?>
				<li id="<?=$pergunta->name?>" class="<?=($j != 0) ? 'hidden' : ''?>">
					<header>
						<hgroup class="row">
							<h1 class="col-xs-12 col-sm-6"><span>Resposta</span> pergunta <?=$j + 1?></h1>
							<h2 class="col-xs-12 col-sm-6"><?=$pergunta->title?></h2>
						</hgroup>
					</header>
					<?=$pergunta->content?>
				</li>
				<?php $j++; ?>
			<?php endforeach; ?>
		</ul>
	</section>

	<section id="contato" class="row">
		<header class="col-xs-12 col-sm-4">
			<h1><?=$contato->title?></h1>
			<?=$contato->content?>
			<nav>
				<a href="#atendimento-online" class="chat col-xs-12 col-lg-6"><span class="icon"></span>Atendimento Online</a>
				<a href="tel:<?=$h->option('telefone') ?>" class="call col-xs-12 col-lg-6"><span class="small">Fone</span><?=$h->option('telefone') ?></a>
			</nav>
		</header>
		<form action="<?php bloginfo('url') ?>/wp-admin/admin-ajax.php" class="col-xs-12 col-sm-8">
			<div id="loading-contato" class="loading"></div>
			<ul class="col-xs-12 col-md-6">
				<li>
					<label for="nome">Nome:</label>
					<input type="text" name="nome" id="nome">
				</li>
				<li>
					<label for="fixo">Fone fixo:</label>
					<input type="tel" name="fixo" id="fixo">
				</li>
				<li>
					<label for="email">E-mail:</label>
					<input type="email" name="email" id="email">
				</li>
			</ul>
			<ul class="col-xs-12 col-md-6">
				<li>
					<label for="empresa">Empresa:</label>
					<input type="text" name="empresa" id="empresa">
				</li>
				<li>
					<label for="celular">Celular:</label>
					<input type="tel" name="celular" id="celular" placeholder="opcional">
				</li>
				<li>
					<label for="email">Assunto:</label>
					<input type="text" name="assunto" id="assunto">
				</li>
			</ul>
			<div class="col-xs-12 message">
				<label for="mensagem">Mensagem:</label>
				<textarea name="mensagem" id="mensagem"></textarea>
			</div>
			<footer class="col-xs-12">
				<input type="hidden" name="action" value="contato">
				<input type="submit" class="enviar" name="enviar" value="Enviar">
			</footer>
		</form>
	</section>

<?php require "footer.php"; ?>