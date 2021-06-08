<?php get_header(); ?>

<?php if( have_posts() ){
    while ( have_posts() ) : the_post(); ?>

        <?php
            //$imagem_array = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '' );
            //$imagem = $imagem_array[0];

            $category = wp_get_post_terms( $post->ID, 'category' )[0];

            $tag = get_the_tags()[0]; //var_dump($tag);
        ?>

        <section class="box-section box-section--slide box-section--slide-page no-padding">
            <div class="container">
                <h1><?php the_title(); ?></h1>
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

        <div id="position-slide"></div>

        <section class="box-section">
            <div class="container">
                <?php get_template_part( 'content/tags-single' ); ?>
            </div>
        </section>

    <?php endwhile;
} ?>

<?php get_footer(); ?>

<script type="text/javascript">
    $(document).ready(function(){
        $('html, body').animate({
            scrollTop: parseInt($("#position-slide").offset().top)
        }, 500);
        setTimeout(function(){
            $('#<?php echo $post->ID; ?>').removeClass('off');        
            $('.slide-capitulos').slick('refresh');
        }, 1000);
        $('body').addClass('modal');
    });

    $('.slide-capitulos').slick({
        dots: false,
        arrows: true,
        infinite: false,
        speed: 300,
        slidesToShow: 1,
        slidesToScroll: 1,
        prevArrow: '<span class="nav-slide nav-slide--prev"><i class="fas fa-chevron-left"></i></span>',
        nextArrow: '<span class="nav-slide nav-slide--next"><i class="fas fa-chevron-right"></i></span>',
        fade: true,
        cssEase: 'linear'
    });

    //$('#slide-capitulos').slick('slickGoTo', <?php echo (get_field('capitulo')-1); ?>);

    /*$('.open-modal').click(function(){
        $($(this).attr('var-modal')).removeClass('off');
        $('body').addClass('modal');
    });*/

    $('.modal-close').click(function(){
        $('body').removeClass('modal');

        $('html, body').animate({
            scrollTop: parseInt($("#position-slide").offset().top)
        }, 100);

        $('.modal').addClass('off');
    });

    $('.btn-verlegenda').click(function(){
        btn = $(this);
        item = $(this).attr('var-info');
        $(item).toggleClass('active');
        if($(btn).hasClass('active')){
            $(btn).html('fechar');
        }else{
            $(btn).html('ver legenda');
        }
    });
</script>