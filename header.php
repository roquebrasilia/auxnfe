<!doctype html>
	<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="pt-BR"> <![endif]-->
	<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="pt-BR"> <![endif]-->
	<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="pt-BR"> <![endif]-->
	<!--[if gt IE 8]><!--> <html class="no-js" lang="pt-BR"> <!--<![endif]-->
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>Auxílio NF-e</title>
		<meta name="description" content="<?php bloginfo('description') ?>">
		<meta name="author" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
		<link rel="shortcut icon" type="image/x-icon" href="<?php bloginfo('template_url') ?>/favicon.ico">
		<link rel="stylesheet" href="<?php bloginfo('template_url') ?>/dist/css/mushi.min.css">
		<script type="text/javascript" src="<?php bloginfo('template_url') ?>/dist/js/mushi.min.js"></script>
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,400,300,600' rel='stylesheet' type='text/css'>
		<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>
	</head>
	<body rel="<?php echo $_pagename ?>">
		<span id="template_url" data-url="<?php bloginfo('template_url') ?>"></span>

		<?php
			$destaques = $app->destaque->find();
			$noticias = $app->post->find();
			$passos = $app->passo->find();
			$faq = $app->faq->find();

			$vantagens = $app->page->findBySlug('vantagens');
				$suporte = $app->page->findBySlug('suporte');
				$missao = $app->page->findBySlug('missao');
				$organizacao = $app->page->findBySlug('organizacao');
			$sieg = $app->page->findBySlug('sieg');
				$siegMissao = $app->page->findBySlug('sieg-missao');
				$siegVisao = $app->page->findBySlug('sieg-visao');
				$siegValores = $app->page->findBySlug('sieg-valores');
			$contato = $app->page->findBySlug('entre-em-contato');
		?>

		<header class="main top container">
			<h1 class="logo col-xs-5 col-sm-3 col-md-2 col-lg-3"><img src="<?php bloginfo('template_url') ?>/dist/img/auxilio-nf-e.png" alt="Auxílio NF-e"></h1>
			<nav class="main-menu col-xs-12 col-sm-9">
				<a href="#home" title="Home" class="item scroll">Home</a>
				<a href="#institucional" title="Institucional" class="scroll">Institucional</a>
				<a href="#funcionalidades" title="Funcionalidades" class="scroll">Funcionalidades</a>
				<a href="#download" title="Download" class="scroll">Download</a>
				<a href="#faq" title="FAQ" class="scroll">FAQ</a>
				<a href="#contato" title="Contato" class="scroll">Contato</a>
				<a href="#atendimento-online" class="chat"><span class="icon"></span>Atendimento<br /> Online</a>
			</nav>
			<a href="tel:<?=$h->option('telefone') ?>" class="phone col-xs-4 col-sm-2"><span class="small">Fone</span><?=$h->option('telefone') ?></a>
			<button class="mobile-button visible-xs visible-sm"><span class="icon"></span></button>
			<button class="mobile-close">X</button>
		</header>

		<div id="main" class="container">
