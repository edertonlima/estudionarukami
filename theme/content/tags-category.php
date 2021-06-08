<?php
    global $category;
    //global $slide_capitulos;
    $tags = get_terms( array(
        'taxonomy' => 'post_tag',
        'hide_empty' => true,
    ) );

    if($tags){
        foreach ($tags as $key => $tag) { ?>

            <div class="serie serie--list">
                <div class="serie--capa">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/c1a24c35fb33895c20f055b321ad027c.jpg" alt="">
                </div>
                <div class="serie--info">
                    <span class="info-serie"><?php echo $tag->name; ?></span>
                    <p><?php echo $tag->description; ?></p>
                    <a href="<?php echo get_term_link( $category->term_id); ?>" class="visualizar">visualizar série<i class="fas fa-chevron-right"></i></a>

                    <div class="serie--capitulos">
                        <div class="row">
                            <?php
                                $query = array(
                                    'posts_per_page' => 999,
                                    'post_type' => 'post',
                                    'tag' => $tag->slug,
                                    'cat' => $category->term_id
                                );
                                query_posts( $query );        
                                if( have_posts() ){
                                    while ( have_posts() ) : the_post(); ?>
                    
                                        <?php get_template_part( 'content/item-serie' ); ?>
                    
                                    <?php endwhile;
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>

        <?php } 
    }
?>