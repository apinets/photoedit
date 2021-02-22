<?php
session_start();
include('inc/config.php');
include('inc/config-index.php');
?><!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="<?php echo $lang["langattribute"]; ?>"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="<?php echo $lang["langattribute"]; ?>"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="<?php echo $lang["langattribute"]; ?>"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="<?php echo $lang["langattribute"]; ?>"> <!--<![endif]-->
<head>
<title><?php echo $lang["headerone"]; ?> | <?php echo $websitetitle; ?></title>
<!--
/*use this if you have multiple websites using a different language such as en.yourwebsite, es.yourwebsite, ja.yourwebsite etc.*/
<link rel="alternate" href="" hreflang="" />
-->
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $lang["charset"]; ?>" />
<meta http-equiv="Content-Language" content="<?php echo $lang["langcontent"]; ?>">
<meta name="keywords" content="<?php echo $displayname; ?>, <?php echo $lang["indexkeywords"]; ?>">
<meta name="description" content="<?php echo $lang["metaindex"]; ?>">
<link rel="canonical" href="/">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="<?php echo $websitetitle; ?>">
<meta name="twitter:site" content="@<?php echo $websitetitle; ?>">
<meta name="twitter:description" content="<?php echo $lang["metaindex"]; ?>">
<meta name="twitter:creator" content="@<?php echo $websitetitle; ?>">
<meta name="twitter:image" content="http://<?php echo $_SERVER["SERVER_NAME"]; ?>/fotoedita.jpg">
<meta name="twitter:url" content="/">
<meta property='og:locale' content="<?php echo $lang["langcontent"]; ?>"/>
<meta property="og:title" content="<?php echo $websitetitle; ?>" />
<meta property="og:type" content="website" />
<meta property="og:url" content="/" />
<meta property="og:image" content="http://<?php echo $_SERVER["SERVER_NAME"]; ?>/fotoedita.jpg" />
<meta property="og:description" content="<?php echo $lang["metaindex"]; ?>" />
<meta property="og:site_name" content="<?php echo $websitetitle; ?>" />
<meta name="application-name" content="<?php echo $websitetitle; ?>">
<meta name="msapplication-starturl" content="http://<?php echo $_SERVER["SERVER_NAME"]; ?>/">
<meta name="msapplication-navbutton-color" content="#FFFFFF">
<meta name="msapplication-window" content="width=1024;height=768">
<link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon" />	
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="stylesheet" type="text/css" href="/css/skeleton.css" />
<link rel="stylesheet" type="text/css" href="/css/style.css" />
<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<link rel="shortcut icon" href="/images/favicon.ico">
<link rel="apple-touch-icon" href="/images/apple-touch-icon.png">
<link rel="apple-touch-icon" sizes="72x72" href="/images/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="114x114" href="/images/apple-touch-icon-114x114.png">
</head>
<body>
<div>
<div class="container">
<div class="four columns">
<div id="logo">
<h1>
<a href="/">
<img src="/images/logo.png" alt="<?php echo $websitetitle.' '.$lang["headerone"]; ?>" />
</a>
</h1>
</div>
</div>
<div class="twelve columns navigation">
<div class="ad">
<?php echo $adcode; ?>
</div>
</div>
</div>
</div>
<div id="breadcrumbs" style="display:<?php echo $breadcrumbindex; ?>">	
<div class="container">
<div class="sixteen columns">
<ul class="secondary-menu">
<li itemtype="http://data-vocabulary.org/Breadcrumb" itemscope=""> 
<span itemprop="title"><?php echo $websitetitle; ?></span>
</li>
</ul>
</div>
</div>
</div>
<div class="container main-wrapper">
<div id="main-content" class="twelve columns clearfix">
<?php 
if($showintro==1) {
echo $lang["introtext"];
}
echo $indexcontent;
?>
</div>
<div id="sidebar" class="four columns">
<div class="widget">
<?php
echo $mainmenu;
?>
</div>
</div>
<div class="sixteen columns border-separation"></div>			
</div>
<div id="blockimages" class="container">
<ul id="projects-carousel" class="jcarousel-skin-tango" >
<?php
echo $bildcarousel;
?>
</ul>
</div>
<div id="footer">
<div class="container">
<div class=" copyright">
<p class="last">@ <?php echo date("Y"); ?> <?php echo $websitetitle; ?></p>
</div>
</div>
</div>
<div id="store"></div>
<div id="append"></div>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="/js/jquery.easing.1.3.js"></script>	
<script type="text/javascript" src="/js/custom.js"></script>
<script>
//Toggle menu
<?php
echo $myjs;
?>
//we assign the total number of filters to each category
$.each($('.count'), function() {
var content = $(this).html();
var filterx = $(this).attr("data-id");
$('[data-id="'+filterx+'"]').html(content);
});

</script>
<?php
if($enablega==1)
{
?>
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

ga('create', '<?php echo $ua; ?>', 'auto');
ga('send', 'pageview');

</script>
<?php
}
?>
</body>
</html>