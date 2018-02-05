<?php 
$meta = $this->menu_m->select_meta()->row();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="keywords" content="<?=$meta->meta_keyword;?>" />
    <meta name="description" content="<?=$meta->meta_desc;?>" />
    <meta name="Distribution" content="Global">
    <meta name="Author" content="<?=$meta->meta_author;?>">
    <meta name="Developer" content="<?=$meta->meta_developer;?>">
    <meta name="robots" content="<?=$meta->meta_robots;?>" />
    <meta name="Googlebot" content="<?=$meta->meta_googlebots;?>" />

    <title><?=$meta->meta_name;?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="shortcut icon" href="<?=base_url('img/logo-icon.png');?>">
    <link href='http://fonts.googleapis.com/css?family=Hind:400,300,500,600%7cMontserrat:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>front/css/lib/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>front/css/lib/font-lotusicon.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>front/css/lib/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>front/css/lib/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>front/css/lib/jquery-ui.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>front/css/lib/magnific-popup.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>front/css/lib/settings.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>front/css/lib/bootstrap-select.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>front/css/style2.css">
    <script type="text/javascript" src="<?=base_url();?>front/js/lib/jquery-1.11.0.min.js"></script>
</head>
<body>
    <!-- <div id="preloader">
        <span class="preloader-dot"></span>
    </div> -->
    <div id="page-wrap">
        <?=$_header;?>
        <?=$content;?>
        <?=$_footer;?>
    </div>
    <script type="text/javascript" src="<?=base_url();?>front/js/lib/jquery-ui.min.js"></script>
    <script type="text/javascript" src="<?=base_url();?>front/js/lib/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?=base_url();?>front/js/lib/bootstrap-select.js"></script>
    <script type="text/javascript" src="<?=base_url();?>front/js/lib/isotope.pkgd.min.js"></script>
    <script type="text/javascript" src="<?=base_url();?>front/js/lib/jquery.themepunch.revolution.min.js"></script>
    <script type="text/javascript" src="<?=base_url();?>front/js/lib/jquery.themepunch.tools.min.js"></script>
    <script type="text/javascript" src="<?=base_url();?>front/js/lib/owl.carousel.js"></script>
    <script type="text/javascript" src="<?=base_url();?>front/js/lib/jquery.appear.min.js"></script>
    <script type="text/javascript" src="<?=base_url();?>front/js/lib/jquery.countTo.js"></script>
    <script type="text/javascript" src="<?=base_url();?>front/js/lib/jquery.countdown.min.js"></script>
    <script type="text/javascript" src="<?=base_url();?>front/js/lib/jquery.parallax-1.1.3.js"></script>
    <script type="text/javascript" src="<?=base_url();?>front/js/lib/jquery.magnific-popup.min.js"></script>
    <script type="text/javascript" src="<?=base_url();?>front/js/lib/SmoothScroll.js"></script>
    <script type="text/javascript" src="<?=base_url();?>front/js/scripts.js"></script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-59838993-11"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'UA-59838993-11');
    </script>
</body>
</html>