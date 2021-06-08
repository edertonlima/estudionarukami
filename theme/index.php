
<?php get_header(); ?>

	<div id="" class="">
		<main id="" class="" role="main">

		<?php if ( have_posts() ) : ?>

			<?php if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1><?php single_post_title(); ?></h1>
				</header>
			<?php endif; ?>

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'content', get_post_format() );

			endwhile;

		else :
			get_template_part( 'content', 'none' );

		endif;
		?>

		</main>
	</div>

<?php get_footer(); ?>