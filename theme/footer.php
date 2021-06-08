    <?php get_template_part( 'anuncio/footer' ); ?>
    
    <footer class="footer">
        <div class="container">

            <div class="row">
                <div class="col-3">
                    <a href="#" class="logo-footer">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-estudio-narukami.png" alt="">
                    </a>
                    <p>O mangá ou manga, é a palavra usada para designar história em quadrinhos ou banda desenhada feita no estilo japonês. No Japão, o termo designa quaisquer histórias em quadrinhos.</p>
                </div>
                <div class="col-1"></div>
                <div class="col-5">
                    <h3>Contato</h3>
                    <a href="mailto:<?php the_field('email','option'); ?>" title="<?php the_field('email','option'); ?>" class="email">
                        <i class="fas fa-envelope"></i> <?php the_field('email','option'); ?>
                    </a>
                </div>
                <div class="col-3">
                    <div class="redes-sociais">
                        <h3>Redes Sociais</h3>
                        <?php if(get_field('facebook-imagem','option')){ ?>
                            <a href="<?php the_field('facebook','option') ?>" title="facebook">
                                <?php if(get_field('facebook-imagem','option')){ ?>
                                    <img src="<?php the_field('facebook-imagem','option') ?>" alt="facebook">
                                <?php } ?>
                            </a>
                        <?php } ?>

                        <?php if(get_field('instragam-imagem','option')){ ?>
                            <a href="<?php the_field('instragam','option') ?>" title="instragam">
                                <?php if(get_field('instragam-imagem','option')){ ?>
                                    <img src="<?php the_field('instragam-imagem','option') ?>" alt="instragam">
                                <?php } ?>
                            </a>
                        <?php } ?>

                        <?php if(get_field('twitter-imagem','option')){ ?>
                            <a href="<?php the_field('twitter','option') ?>" title="twitter">
                                <?php if(get_field('twitter-imagem','option')){ ?>
                                    <img src="<?php the_field('twitter-imagem','option') ?>" alt="twitter">
                                <?php } ?>
                            </a>
                        <?php } ?>                   
                    </div>
                </div>
            </div>
            <div class="row copyright">
                <div class="col-12">
                    <p>Copyright © 2021 - Estúdio Narukami. Todos os direitos reservados.</p>
                </div>
                <?php /*
                <div class="col-6">
                    <ul class="redes-sociais">
                        <?php if(get_field('facebook','option')){ ?>
                            <li>
                                <a href="<?php the_field('facebook','option') ?>"><i class="fab fa-facebook-f"></i></a>
                            </li>
                        <?php } ?>  
                            
                        <?php if(get_field('instagram','option')){ ?>
                            <li>
                                <a href="<?php the_field('instagram','option') ?>"><i class="fab fa-instagram"></i></a>
                            </li>
                        <?php } ?>

                        <?php if(get_field('twitter','option')){ ?>
                            <li>
                                <a href="<?php the_field('twitter','option') ?>"><i class="fab fa-twitter"></i></a>
                            </li>
                        <?php } ?>  
                    </ul>
                </div>
                */ ?>
            </div>

        </div>
    </footer>

    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery/jquery-3.3.1.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/plugins/slick/slick.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/plugins/scrollbar/scrollbar.js"></script>
    
    <script type="text/javascript">
        $(document).ready(function(){
            $('#slide').slick({
                dots: false,
                arrows: true,
                infinite: false,
                speed: 300,
                slidesToShow: 1,
                slidesToScroll: 1,
                prevArrow: '<span class="nav-slide nav-slide--prev"><i class="fas fa-chevron-left"></i></span>',
                nextArrow: '<span class="nav-slide nav-slide--next"><i class="fas fa-chevron-right"></i></span>'
            });
        });

        function scroll(){
            scroll_body = $(window).scrollTop();
            if(scroll_body > 100){
                $('body').addClass('scroll');
            }else{
                $('body').removeClass('scroll');
            }
        }

        scroll();

        $(window).scroll(function(){
            scroll();
        });

        $('.nav-mobile').click(function(){
            $('.nav-principal').toggleClass('mobile');
        });

        $('.close-nav-mobile').click(function(){
            $('.nav-principal').toggleClass('mobile');
        });

        function reset_scrollbar(value){
            if(value >= 700){
                $('.scrollbar-dynamic').scrollbar();
            }else{
                $('.scrollbar-dynamic').scrollbar('onDestroy');
            }
        }
        width_window = $(window).width();
        //reset_scrollbar(width_window);
        $(window).resize(function() {
            width_window = $(window).width();
            //reset_scrollbar(width_window);
        });

        $('.btn-verlegenda').click(function(){
            alert();
        });

        $(document).on('click', '.btn-verlegenda', function() { 
            legenda = $(this).attr('var-info');
            $(legenda).toggleClass('active');
        });
    </script>    

</body>
</html>

<?php wp_footer(); ?>