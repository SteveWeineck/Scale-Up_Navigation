<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="wp-content/themes/navigation/dist/css/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
</head>

<body>
<!--navgation-->
<div class="topBar-container">
    <div class="logo-container">
        <?php
            //get logo
            if ( function_exists( 'the_custom_logo' ) ) {
            the_custom_logo();
            }
        ?>
    </div>            
    <div class="navigation-container">
        <div class="burger-menu-trigger">
            <div class="burger-line burger-line1"></div>
            <div class="burger-line burger-line2"></div>
            <div class="burger-line burger-line3"></div>
        </div>
        <?php
        //get primary navigation
        wp_nav_menu( array(
            'theme_location' => 'primary_menu',
            'menu_id' => 'site-navigation',
            'container' => 'nav',
            'container_class' => 'nav-wrapper',
            'fallback_cb' => false
            ) ); 
        ?>
    </div>
    <!--<div class="s-nav"><a>Social</a></div>-->
</div>
<!--navgation Ende-->

<div class="they-see-scrolling-container">
    <div class="they-see-scrolling"></div>                        
</div>

<script>
    //toggleClass for topbar to change color after scrolling
    jQuery(document).ready(function($) {
        $(window).on('scroll touchmove', function () {
            $('.topBar-container').toggleClass('topBar-container-scrolling', $(document).scrollTop() > 0);
        }).scroll();  
    });

    //navigation
    $('.burger-menu-trigger').click( function(){
        $('.navigation-container').toggleClass('mobile-nav-active');
    });

    //prevent transition on window resize
    (function() { 
        const classes = document.body.classList;
        let timer = 0;
        window.addEventListener('resize', function () {
        if (timer) {
            clearTimeout(timer);
            timer = null;
        }
        else
            classes.add('stop-transitions');

        timer = setTimeout(() => {
            classes.remove('stop-transitions');
            timer = null;
        }, 100);
        });
    })();
</script>    
</body>
</html>