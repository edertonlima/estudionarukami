
<div class="col-6">
    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="serie--item">
        <div class="serie--capa">
            <i class="fas fa-plus"></i>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/c1a24c35fb33895c20f055b321ad027c.jpg" alt="">
        </div>
        <div class="serie--info">
            <span class="info-serie">Capítulo <?php the_field('capitulo'); ?></span>
            <p><?php echo get_the_excerpt(); ?></p>
            <button var-slide="#<?php echo $post->ID; ?>" class="btn btn-inline visualizar">visualizar capítulo<i class="fas fa-chevron-right"></i></button>
        </div>
    </a>

    <div class="modal off" id="<?php echo $post->ID; ?>">
        <div class="modal-overlay">
            <div class="content-modal">
                <div class="modal-header">
                    <span class="modal-close">
                        <i class="fas fa-times"></i>
                    </span>
                </div>
                <div class="modal-body">
                    <div class="slide slide-capitulos">

                        <?php if( have_rows('imagens-capitulo') ): ?>
                            <?php while( have_rows('imagens-capitulo') ) : the_row(); ?>

                                <div class="item">
                                    <div class="preview-capitulo">
                                        <div class="preview-capitulo--capa">
                                            <img src="<?php the_sub_field('imagem'); ?>">
                                        </div>
                                        <div class="preview-capitulo--info scrollbar-dynamic" id="info-<?php echo $post->ID; ?>">
                                            <?php if(get_sub_field('titulo')){ ?>
                                                <h2><?php the_sub_field('titulo'); ?></h2>
                                            <?php }
                                            if(get_sub_field('texto')){ ?>
                                                <p><?php the_sub_field('texto'); ?></p>
                                            <?php } ?> 
                                        </div>

                                        <?php if(get_sub_field('texto') || get_sub_field('titulo')){ ?>
                                            <span class="btn btn-verlegenda" var-info="#info-<?php echo $post->ID; ?>">
                                                ver legenda
                                            </span>
                                        <?php } ?>
                                    </div>
                                </div>

                            <?php endwhile; ?>
                        <?php endif; ?>

                        <?php /* 
                        <div class="item">
                            <div class="preview-capitulo">
                                <div class="preview-capitulo--capa">
                                    <img src="<?php echo $imagem; ?>" alt="<?php the_title(); ?>">
                                </div>
                                <div class="preview-capitulo--info scrollbar-dynamic" id="info-<?php echo $post->ID; ?>">
                                    <?php if(get_the_title()){ ?>
                                        <h2><?php the_title(); ?></h2>
                                    <?php }
                                    if(get_field('conteudo')){ ?>
                                        <p><?php the_field('conteudo'); ?></p>
                                    <?php } ?>
                                </div>
                                <?php if(get_field('conteudo') || get_the_title()){ ?>
                                    <span class="btn btn-verlegenda" var-info="#info-<?php echo $post->ID; ?>">
                                        ver legenda
                                    </span>
                                <?php } ?>
                            </div>
                        </div> */ ?>

                        <?php
                            /*$query = array(
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
                
                                    <?php //get_template_part( 'content/item-slide' ); ?>
                
                                <?php endwhile;
                                wp_reset_query();
                            }*/
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>