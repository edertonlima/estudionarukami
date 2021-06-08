<?php get_header(); ?>

<?php if( have_posts() ){
    while ( have_posts() ) : the_post(); ?>

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
        
        <?php if(get_field('conteudo')){ ?>
            <section class="box-section">
                <div class="container">
                    <p><?php the_field('conteudo'); ?></p>
                </div>
            </section>
        <?php } ?>
        
        <?php if( have_rows('slide-img-legenda') ): 
            $num_slide = 1; ?>
            <section class="box-section slide-img no-padding-top">
                <div class="container">
                    
                    <?php while( have_rows('slide-img-legenda') ) : the_row(); ?>
                        <div id="position-slide-<?php echo $num_slide ?>"></div>
                        <?php if(get_sub_field('titulo')){ ?>
                            <h2><?php the_sub_field('titulo'); ?></h2>
                        <?php } ?>

                        <?php if( have_rows('imagens') ):
                            $index_slide = 0; ?>
                            <ul>
                                <?php while( have_rows('imagens') ) : the_row(); ?>
                                    <li>
                                        <div class="slide-img--imagem" var-index="<?php echo $index_slide; ?>" var-slide="<?php echo $num_slide; ?>">
                                            <img src="<?php the_sub_field('item-imagem'); ?>">
                                            <i class="fas fa-plus"></i>
                                        </div>
                                    </li>
                                    <?php $index_slide++; 
                                endwhile; ?>
                            </ul>
                        <?php endif; ?>
                        
                    <?php $num_slide++; endwhile; ?>

                </div>
            </section>
        <?php endif; ?>

        <?php if( have_rows('slide-img-legenda') ): 
            $num_slide = 1; ?>
            <?php while( have_rows('slide-img-legenda') ) : the_row(); 
                $titulo = get_sub_field('titulo'); ?>

                <div class="modal off" id="slide--<?php echo $num_slide; ?>">
                    <div class="modal-overlay">
                        <div class="content-modal">
                            <div class="modal-header">
                                <span class="modal-close">
                                    <i class="fas fa-times"></i>
                                </span>
                            </div>
                            <div class="modal-body">
                                <div class="slide slide-capitulos">
                                    
                                    <?php if( have_rows('imagens') ): ?>
                                        <?php while( have_rows('imagens') ) : the_row(); ?>

                                            <div class="item">
                                                <div class="preview-capitulo">
                                                    <div class="preview-capitulo--capa">
                                                        <img src="<?php the_sub_field('item-imagem'); ?>">
                                                    </div>
                                                    <div class="preview-capitulo--info scrollbar-dynamic" id="info-<?php echo $post->ID; ?>">
                                                        <?php if($titulo){ ?>
                                                            <h2><?php echo $titulo; ?></h2>
                                                        <?php }
                                                        if(get_sub_field('item-legenda')){ ?>
                                                            <p><?php the_sub_field('item-legenda'); ?></p>
                                                        <?php }
                                                        if(is_page('86')){ ?>
                                                            <a href="<?php the_sub_field('item-imagem'); ?>" class="btn btn-download" download>Fazer download</a>
                                                        <?php } ?> 
                                                    </div>

                                                    <?php if(get_field('conteudo') || get_the_title()){ ?>
                                                        <span class="btn btn-verlegenda" var-info="#info-<?php echo $post->ID; ?>">
                                                            ver legenda
                                                        </span>
                                                    <?php } ?>
                                                </div>
                                            </div>

                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <?php $num_slide++; endwhile; ?>
        <?php endif; ?>

    <?php endwhile;
} ?>

<?php get_footer(); ?>

<script type="text/javascript">
    $(document).ready(function(){

        /*
        $('html, body').animate({
            scrollTop: parseInt($("#position-slide").offset().top)
        }, 500);
        setTimeout(function(){
            $('.modal').removeClass('off');        
            $('#slide-capitulos').slick('refresh');
        }, 1000);
        $('body').addClass('modal');
        */
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

    $('.slide-img--imagem').click(function(){
        index_slide = $(this).attr('var-index');
        num_slide = $(this).attr('var-slide');

        //modal = $('#slide--' + num_slide);
        modal = '#slide--' + num_slide;
        console.log(modal);

        //$('#slide--'+num_slide).removeClass('off');
        //$('body').addClass('modal');

        setTimeout(function(){     
            $(modal + ' .slide-capitulos').slick('refresh');
            $(modal).removeClass('off');
            $('body').addClass('modal');
        }, 500);
    });

    //$('.slide-capitulos').slick('slickGoTo', <?php echo (get_field('capitulo')-1); ?>);

    /*$('.open-modal').click(function(){
        $($(this).attr('var-modal')).removeClass('off');
        $('body').addClass('modal');
    });*/

    $('.modal-close').click(function(){
        $('body').removeClass('modal');

        $('html, body').animate({
            scrollTop: parseInt($("#position-slide-" + num_slide).offset().top)
        }, 100);

        $('.modal').addClass('off');
    });
</script>