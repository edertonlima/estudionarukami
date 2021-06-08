
<?php get_header(); ?>

<section class="box-section box-section--slide box-section--slide-page no-padding">
    <div class="container">
        <h1><?php echo get_the_title(43); ?></h1>
    </div>

    <?php if( have_rows('slide-principal',43) ): ?>
        
        <div class="slide" id="slide">
            <?php while( have_rows('slide-principal',43) ) : the_row(); ?>
            
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
        <?php
            $args = array(
                'taxonomy'      	=> 'category',
                'parent'        	=> 0,
                'orderby'       	=> 'name',
                'order'         	=> 'ASC',
                'hide_empty'      	=> true
            );
            $categories = get_categories( $args );  

            foreach ( $categories as $category ){ ?>
                
                <h2><?php echo $category->name; ?></h2>
                <?php get_template_part( 'content/tags-category' ); ?>

            <?php }
        ?>
    </div>
</section> 

<?php get_footer(); ?>