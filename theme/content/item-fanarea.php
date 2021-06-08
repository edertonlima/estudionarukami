<?php 
    global $category;
    //global $tag;
?>

<div class="col-6">
    <a href="javascript: openFanArea(<?php echo $post->ID; ?>)<?php //the_permalink(); ?>" title="<?php the_title(); ?>" class="serie--item item-fanarea">
        <div class="serie--capa">
            <i class="fas fa-plus"></i>
            <?php 
                $imagem_array = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '' );
                $imagem = $imagem_array[0];
            ?>

            <img src="<?php echo $imagem; ?>" alt="<?php the_title(); ?>">
        </div>
        <div class="serie--info">
            <span class="info-serie"><?php the_title(); //echo $category->name; ?></span>
            <p><?php the_field('conteudo'); ?></p>
            <button class="btn btn-inline visualizar">ver mais<i class="fas fa-chevron-right"></i></button>
        </div>
    </a>

    <div class="modal off" id="fan-area-<?php echo $post->ID; ?>">
        <div class="modal-overlay">
            <div class="content-modal">
                <div class="modal-header">
                    <span class="modal-close">
                        <i class="fas fa-times"></i>
                    </span>
                </div>
                <div class="modal-body">
                    <div class="slide">

                        <?php
                            //while ( have_posts() ) : the_post();

                                get_template_part( 'content/item-slide' );

                            //endwhile;
                            //wp_reset_query();
                        ?>
                
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>