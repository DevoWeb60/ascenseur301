<!--Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php $baseURL = "http://" . $_SERVER['HTTP_HOST'] . "/projects/PHP/includes/"; ?>

<!DOCTYPE html>
<html>

<head>
    <title> <?= $title ?></title>
    <link href="<?= $baseURL ?>css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?= $baseURL ?>js/jquery-1.11.0.min.js"></script>
    <!-- Custom Theme files -->
    <link href="<?= $baseURL ?>css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" href="<?= $baseURL ?>css/flexslider.css" type="text/css" media="screen" />
    <base href="<?= $baseURL ?>" />
    <!-- Custom Theme files -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/php; charset=utf-8" />
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        } >
    </script>
    <meta name="keywords" content="Auction Responsive web template, Bootstrap Web Templates, Flat Web Templates, AndriodCompatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
    <!--Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <!-- start-smoth-scrolling -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/move-top.js"></script>
    <script type="text/javascript" src="js/easing.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event) {
                event.preventDefault();
                $('php,body').animate({
                    scrollTop: $(this.hash).offset().top
                }, 1000);
            });
        });
    </script>
</head>

<body>
    <!-- //end-smoth-scrolling -->
    <!--header start here-->
    <div class="header">
        <div class="container">
            <div class="header-main">
                <div class="logo">
                    <a href="index.php"> <img src="images/logo.png" alt="" title=""> </a>
                </div>
                <div class="head-right">
                    <div class="top-nav">
                        <span class="menu"> <img src="images/icon.png" alt="" /></span>
                        <ul class="res">
                            <?php foreach ($pages as $key => $value) :
                                if ($title === $key) {
                                    $active = 'active';
                                } else {
                                    $active = '';
                                }
                            ?>

                                <li><a href="<?= $value ?>" class="<?= $active ?>"><?= $key ?></a></li>


                            <?php endforeach; ?>
                        </ul>
                        <div class="clearfix"> </div>
                        <!-- script-for-menu -->
                        <script>
                            $("span.menu").click(function() {
                                $("ul.res").slideToggle(300, function() {
                                    // Animation complete.
                                });
                            });
                        </script>
                        <!-- /script-for-menu -->
                    </div>

                    <div class="social">
                        <ul>
                            <li><a class="fa" href="#"> </a></li>
                            <li><a class="tw" href="#"> </a></li>
                            <li><a class="p" href="#"> </a></li>
                        </ul>
                    </div>

                    <div class="search-box">
                        <div id="sb-search" class="sb-search">
                            <form>
                                <input class="sb-search-input" placeholder="Search" type="search" name="search" id="search">
                                <input class="sb-search-submit" type="submit" value="">
                                <span class="sb-icon-search"> </span>
                            </form>
                        </div>
                    </div>
                    <div class="clearfix"> </div>
                    <!-- search-scripts -->
                    <script src="js/classie.js"></script>
                    <script src="js/uisearch.js"></script>
                    <script>
                        new UISearch(document.getElementById('sb-search'));
                    </script>
                    <!-- //search-scripts -->
                </div>

                <div class="clearfix"> </div>
            </div>
        </div>
    </div>