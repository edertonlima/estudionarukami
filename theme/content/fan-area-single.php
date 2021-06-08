<?php 
    global $category;

    $imagem_array = wp_get_attachment_image_src( get_post_thumbnail_id($posts->ID), '' );
    $imagem = $imagem_array[0];
?>

<div class="serie serie--list">
    <div class="serie--capa">
        <img src="<?php echo $imagem; ?>" alt="<?php the_title(); ?>">
    </div>
    <div class="serie--info">
        <span class="info-serie"><?php echo $category->name; ?></span>
        <p><?php the_field('conteudo'); ?></p>
    </div>
</div>