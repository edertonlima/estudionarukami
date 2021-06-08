<?php
    global $category;
?>

<h2><?php echo $category->name; ?></h2>

<div class="row">
    <?php
        $query = array(
            'posts_per_page'    => -1,
			'post_type'         => 'fan-area',
            'orderby'           => 'name',
            'order'         	=> 'ASC',
            'tax_query'         => array(
                array(
                    'taxonomy' => 'categoria_fan_area',
                    'field' => 'term_id',
                    'terms' => $category->term_id,
                )
            )
        );
        query_posts( $query );        
        if( have_posts() ){
            while ( have_posts() ) : the_post();

                get_template_part( 'content/item-fanarea' );

            endwhile;
            wp_reset_query();
        }
    ?>
</div>

<?php /* if( have_posts() ){  ?>
<div class="modal off" id="<?php echo $category->term_id; ?>">
    <div class="modal-overlay">
        <div class="content-modal">
            <div class="modal-header">
                <span class="modal-close"></span>
            </div>
            <div class="modal-body">
                <?php /* <div class="slide" id="slide-capitulos"> * ?>
                <div class="slide   " id="slide-fanarea-<?php echo $category->term_id; ?>">

                    <?php
                        while ( have_posts() ) : the_post();

                            get_template_part( 'content/item-slide' );

                        endwhile;
                        wp_reset_query();
                    ?>
            
                </div>
            </div>
        </div>
    </div>
</div>
<?php } */ ?>