<?php 
    $imagem_array = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '' );
    $imagem = $imagem_array[0];
?>

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
</div>