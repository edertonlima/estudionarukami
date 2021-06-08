
<?php get_header(); ?>

<?php if( have_posts() ){
    while ( have_posts() ) : the_post(); ?>

        <section class="box-section box-section--slide box-section--slide-page no-padding">
            <div class="container">
                <h1><?php the_title(); ?></h1>
            </div>

            <?php if( have_rows('slide-principal') ): ?>
                
                <div class="slide" id="slide">
                    <?php while( have_rows('slide-principal') ) : the_row(); ?>
                    
                        <div class="item">
                            <picture>
                                <source media="(max-width:580px)" srcset="<?php the_sub_field('imagem-mobile-slide-principal'); ?>">
                                <img src="<?php the_sub_field('imagem-desk-slide-principal'); ?>" alt="">
                            </picture>
                        </div>

                    <?php endwhile; ?>
                </div>

            <?php endif; ?>
        </section>

        <?php get_template_part( 'anuncio/header' ); ?>

        <section class="box-section">
            <div class="container">
                <?php get_template_part( 'content/sobre-page' ); ?>
            </div>
        </section>

    <?php endwhile;
} ?>

<?php get_footer(); ?>