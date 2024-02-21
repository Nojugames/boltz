<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>"/>
    <meta name="viewport" content="width=device-width"/>
    <!--<script src="https://kit.fontawesome.com/c5ba4af5bc.js" crossorigin="anonymous"></script>-->
	<?php wp_head(); ?>
    <script>
        var prevScrollpos = window.pageYOffset;
        window.onscroll = function() {
            var currentScrollPos = window.pageYOffset;
            if (prevScrollpos > currentScrollPos || currentScrollPos <= 100) {
                document.getElementById("header").style.top = "0";
            } else {
                document.getElementById("header").style.top = "-80px";
            }
            prevScrollpos = currentScrollPos;
        }
    </script>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="wrapper" class="hfeed">
    <header id="header" role="banner">

        <?php // require_once('elements/top-navbar.php'); ?>
        <?php require_once('elements/noju-navbar.php'); ?>
    </header>
    <div id="container">