<?php $_pagename = 'page'; include ("header.php"); ?>

	<div class="container">
		<section class="posts hover col-xs-12 col-sm-8 col-lg-9">
			<?php while (have_posts()) : the_post(); ?>
				<article class="col-xs-12">
					<header class="posts-top row">
						<h1 class="col-xs-12 col-sm-9"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h1>
						<time class="col-xs-12 col-sm-3"><?php the_time('d.m.Y') ?></time>
					</header>
					<div class="post">
						<?php the_excerpt() ?>
					</div>
					<a href="<?php the_permalink() ?>" class="continue">Continuar lendo</a>
				</article>
			<?php endwhile; ?>
			<div class="pagenate col-xs-12">
				<?php wp_pagenavi() ?>
			</div>
		</section>
		<?php get_template_part('side', 'bar'); ?>
	</div>

<?php require "footer.php"; ?>