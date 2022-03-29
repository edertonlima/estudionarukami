<!DOCTYPE html>
<html lang="pt-br">
<head>

	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon.ico" type="image/x-icon">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="content-language" content="pt" />
	<meta name="rating" content="General" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="robots" content="index,follow" />
	<meta name="author" content="" />
	<meta name="language" content="pt-br" />
	<meta name="title" content="Estúdio Narukami" />

	<title>Estúdio Narukami</title>

	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/style.css" media="screen" />

    <?php wp_head(); ?>

    <script data-ad-client="ca-pub-3379636610329961" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

</head>
<body <?php body_class(); ?>>

    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

	<header class="header">
        <div class="header-top">
            <div class="container">
                <nav class="nav nav-top">
                    <ul>
                        <li>
                            <a href="mailto:<?php the_field('email','option'); ?>" title="<?php the_field('email','option'); ?>">
                                <?php the_field('email','option'); ?>
                            </a>
                        </li>                    
                    </ul>

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
                </nav>
            </div>
        </div>

        <div class="header-nav">
            <div class="container">
                <div class="row">
                    <div class="col-12 content-nav">
                        <div class="logo">
                            <a href="<?php echo get_home_url(); ?>">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-estudio-narukami-negativo.png" alt="">
                            </a>
                        </div>
                        <nav class="nav nav-principal">
                            <button class="close-nav-mobile">
                                <i class="fas fa-times"></i>
                            </button>
                            <ul>

                                <?php
                                    $array_menu = wp_get_nav_menu_items('header');

                                    foreach ($array_menu as $item) { ?>

                                        <?php if($item->menu_item_parent): 
                                            if(!$submenu):
                                                $submenu = true;
                                                echo '<ul>';
                                            endif;
                                        elseif ($submenu):
                                            $submenu = false;
                                            echo '</li></ul>';

                                            else:
                                                echo '</li>';
                                        endif; ?>

                                            <li>
                                                <a <?php if($item->title != "Extras"){ echo 'href="' . $item->url . '"'; } ?> title="<?php echo $item->title; ?>"> 
                                                    <?php echo $item->title; /*
                                                        if($item->menu_item_parent):
                                                            echo $item->title;
                                                        else:
                                                            
                                                            $a_nav = explode(' ', $item->title);
                                                            $a_count = count($a_nav)-1;
                                                            if(count($a_nav) > 1){
                                                                echo '<span>';
                                                                    for($i=0; $i < $a_count; $i++){
                                                                        echo $a_nav[$i] . ' ';
                                                                    }
                                                                echo '</span>';
                                                                echo $a_nav[$a_count];
                                                            }else{
                                                                echo $item->title;
                                                            }

                                                        endif;
                                                   */ ?>
                                                </a>
                                            
                                            <?php if($submenu):
                                                echo '</li>';
                                            endif; ?>

                                        <?php
                                    }
                                    
                                    /*foreach ($array_menu as $item) {
                                        if (empty($m->menu_item_parent)) { ?>

                                            <li>
                                                <a href="<?php echo $item->url; ?>" title="<?php echo $item->title; ?>" data-text="<?php $item->title; ?>"> 
                                                    <?php echo $item->title; ?>
                                                </a>
                                            </li>

                                        <?php }
                                    }*/
                                ?>

                            </ul>
                        </nav>

                        <button class="nav-mobile">
                            <i class="fas fa-bars"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
	</header>