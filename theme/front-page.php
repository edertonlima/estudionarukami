
<?php get_header(); ?>

    <section class="box-section box-section--slide no-padding">
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
            <div class="row">
                <div class="col-12">

                    <?php
                        $query = array(
                            'posts_per_page' => 1,
                            'post_type' => 'post',
                            'order'    => 'DESC'
                        );
                        query_posts( $query );        
                        if( have_posts() ){ ?>

                            <?php 
                                while ( have_posts() ) : the_post(); 

                                    $ultimos_posts[] = $post;
                                    $tag = get_the_tags()[0];
                                    $category = get_the_category()[0]; ?>

                                    <h2><?php echo $category->name; ?></h2>
                                    <div class="serie">
                                        <div class="serie--capa">
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/c1a24c35fb33895c20f055b321ad027c.jpg" alt="">
                                        </div>
                                        <div class="serie--info">
                                            <span class="info-serie titulo"><?php echo $tag->name; ?></span>
                                            <p><?php echo $tag->description; ?></p>
                                            <a href="<?php echo get_term_link( $category->term_id); ?>" class="visualizar">visualizar série<i class="fas fa-chevron-right"></i></a>

                                            <div class="serie--capitulos">
                                                <div class="row">
                                                    <?php get_template_part( 'content/item-serie' ); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                <?php endwhile;
                                wp_reset_query();
                            ?>

                        <?php }
                    ?>
                    
                </div>
            </div>
        </div>
    </section>

    <?php if( have_rows('destaque') ): ?>
        <section class="box-section">
            <div class="container">
                <h2>Destaques</h2>
                                    
                <div class="serie">
                    
                        <div class="row">
                            <?php while( have_rows('destaque') ) : the_row(); ?>
                                <div class="col-6">                            
                                    <a href="<?php the_sub_field('link'); ?>" class="serie--item" title="<?php the_sub_field('titulo'); ?>">
                                        <div class="serie--capa">
                                            <i class="fas fa-plus"></i>
                                            <img src="<?php the_sub_field('imagem'); ?>" alt="<?php the_sub_field('titulo'); ?>">
                                        </div>
                                        <div class="serie--info">
                                            <span class="info-serie"><?php the_sub_field('titulo'); ?></span>
                                            <p><?php the_sub_field('descricao'); ?></p>
                                            <span class="visualizar">veja agora<i class="fas fa-chevron-right"></i></span>
                                        </div>
                                    </a>
                                </div>
                            <?php endwhile; ?>
                        </div>
                                        
                </div>

            </div>
        </section>
    <?php endif; ?>

<?php get_footer(); ?>