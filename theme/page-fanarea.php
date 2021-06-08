
<?php get_header(); ?>

<?php
    //$category = get_queried_object();
?>

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

        <?php if(get_field('conteudo')){ ?>
            <section class="box-section">
                <div class="container">
                    <p><?php the_field('conteudo'); ?></p>
                </div>
            </section>
        <?php } ?>

        <section class="box-section box-section--fan-area no-padding-top">
            <div class="container">
                <?php
                    $args = array(
                        'taxonomy'      	=> 'categoria_fan_area',
                        'parent'        	=> 0,
                        'orderby'       	=> 'name',
                        'order'         	=> 'ASC',
                        'hide_empty'      	=> true
                    );
                    $categories = get_categories( $args );  

                    foreach ( $categories as $category ){
                        
                        get_template_part( 'content/fanarea-category' );

                    }
                ?>
            </div>
        </section>

    <?php endwhile;
} ?>

<?php get_footer(); ?>

<script>
    function openFanArea(id){
        $('.modal').addClass('off');
        $('body').addClass('modal');
        $('#fan-area-' + id).removeClass('off');
    };

    $('.modal-close').click(function(){
        $('body').removeClass('modal');
        $('.modal').addClass('off');
    });
</script>