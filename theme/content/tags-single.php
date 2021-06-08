<?php
    global $category;
    global $tag;
?>

<div class="serie serie--list">
    <div class="serie--capa">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/c1a24c35fb33895c20f055b321ad027c.jpg" alt="">
    </div>
    <div class="serie--info">
        <span class="info-serie"><?php echo $tag->name; ?></span>
        <p><?php echo $tag->description; ?></p>
        <?php /* <a href="<?php echo get_term_link( $category->term_id); ?>" class="visualizar">visualizar série<i class="fas fa-chevron-right"></i></a> */ ?>

        <div class="serie--capitulos">
            <div class="row">
                <?php
                    $query = array(
                        'posts_per_page' => 999,
                        'post_type' => 'post',
                        'tag' => $tag->slug,
                        'cat' => $category->term_id,
                        'meta_key'			=> 'capitulo',
                        'orderby'			=> 'meta_value',
                        'order'				=> 'ASC'
                    );
                    query_posts( $query );        
                    if( have_posts() ){
                        while ( have_posts() ) : the_post(); ?>
        
                            <?php get_template_part( 'content/item-serie' ); ?>
        
                        <?php endwhile;
                        wp_reset_query();
                    }
                ?>
            </div>
        </div>
    </div>
</div>