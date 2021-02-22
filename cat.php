<?php
session_start();
include('inc/config.php');


/**/
function curPageURL() {
 $pageURL = 'http';
 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $pageURL;
}
/**/

$socialblock = '<span style="display: inline-block; float:right; margin-right:3px">
<a href="http://www.facebook.com/sharer.php?u='.curPageURL().'"  target="_blank"><img src="/images/social/f.png" alt="share on Facebook"></a>
<a href="http://twitter.com/share?url='.curPageURL().'&text='.$lang["twittertext"].' '.$pagetitle.'"  target="_blank"><img src="/images/social/t.png" alt="share on Twitter"></a>
<a href="https://plus.google.com/share?url='.curPageURL().'"  target="_blank"><img src="/images/social/g.png"></a>
</span>
';		

include('inc/config-cat.php');

?><!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="<?php echo $lang["langattribute"]; ?>"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="<?php echo $lang["langattribute"]; ?>"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="<?php echo $lang["langattribute"]; ?>"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="<?php echo $lang["langattribute"]; ?>"> <!--<![endif]-->
<head>
<title><?php echo $breadcrumbparentcategory; ?> | <?php echo $websitetitle; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $lang["charset"]; ?>" />
<meta http-equiv="Content-Language" content="<?php echo $lang["langcontent"]; ?>">
<meta name="keywords" content="<?php echo $displayname; ?>, <?php echo $lang["catkeywords"]; ?>">
<meta name="description" content="<?php echo $displayname; ?> <?php echo $lang["metacat"]; ?>">
<link rel="canonical" href="<?php echo curPageURL(); ?>">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="<?php echo $breadcrumbparentcategory; ?> | <?php echo $websitetitle; ?>">
<meta name="twitter:site" content="@<?php echo $websitetitle; ?>">
<meta name="twitter:description" content="<?php echo $displayname; ?> <?php echo $lang["metacat"]; ?>">
<meta name="twitter:creator" content="@<?php echo $websitetitle; ?>">
<meta name="twitter:image" content="http://<?php echo $_SERVER["SERVER_NAME"]; ?>/fotoedita.jpg">
<meta name="twitter:url" content="<?php echo curPageURL(); ?>">
<meta property='og:locale' content="<?php echo $lang["langcontent"]; ?>"/>
<meta property="og:title" content="<?php echo $breadcrumbparentcategory; ?> | <?php echo $websitetitle; ?>" />
<meta property="og:type" content="website" />
<meta property="og:url" content="<?php echo curPageURL(); ?>" />
<meta property="og:image" content="http://<?php echo $_SERVER["SERVER_NAME"]; ?>/fotoedita.jpg" />
<meta property="og:description" content="<?php echo $displayname; ?> <?php echo $lang["metacat"]; ?>" />
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
<a href="/"><img src="/images/logo.png" alt="<?php echo $websitetitle; ?>" /></a>
</div>
</div>
<div class="twelve columns navigation">
<div class="ad">
<?php echo $adcode; ?>
</div>
</div>
</div>
</div>
<div id="breadcrumbs">
<div class="container">
<div class="sixteen columns">
<ul class="secondary-menu">
<li itemtype="http://data-vocabulary.org/Breadcrumb" itemscope=""> 
<a itemprop="url" href="/"><span itemprop="title"><?php echo $websitetitle; ?></span></a>
<span> » </span>
</li>
<li itemtype="http://data-vocabulary.org/Breadcrumb" itemscope=""> 
<span itemprop="title"><?php echo $breadcrumbparentcategory; ?></span>
</li>
</ul>
</div>
</div>
</div>
<div class="container main-wrapper">
<div id="main-content" class="twelve columns clearfix">
<?php
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
<div class="copyright">
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