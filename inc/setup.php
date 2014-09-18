<?php

// Thumbnails
set_post_thumbnail_size( 150, 150, true );

// Pages
$app->defaultPage('Vantagens', 'vantagens');
	$app->defaultPage('Suporte', 'suporte', 'vantagens');
	$app->defaultPage('Missão', 'missao', 'vantagens');
	$app->defaultPage('Organização', 'organizacao', 'vantagens');
$app->defaultPage('Sieg Soluções Inteligente', 'sieg');
	$app->defaultPage('Missão', 'sieg-missao', 'sieg');
	$app->defaultPage('Visão', 'sieg-visao', 'sieg');
	$app->defaultPage('Valores', 'sieg-valores', 'sieg');
$app->defaultPage('Passo a passo', 'passo-a-passo');
$app->defaultPage('Perguntas Frequentes', 'faq');
$app->defaultPage('Entre em contato', 'entre-em-contato');
