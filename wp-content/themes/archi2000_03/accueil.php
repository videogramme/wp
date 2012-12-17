<?php
/*
Template Name: Accueil
*/
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Accueil</title>

	<meta name="viewport" content="width=device-width">

    <link rel="canonical" href="http://www.archi2000.be">
  
	<link href='http://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="<?php  echo(get_template_directory_uri() . '/css/normalize.min.css'); ?>">
	<link rel="stylesheet" href="<?php  echo(get_template_directory_uri() . '/style.css'); ?>">
	
	<style type="text/css">

		body{

		}
		#wrapper-home{

			width: 300px;
			height: 50px;
			position: absolute;
			top: 50%; 
			left: 50%; 
			margin: -25px 0 0 -150px;
			line-height: 50px;
		
			background-color: #000;
			opacity: 0.75;
			font-family: 'Raleway', "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif; 
   			font-weight: 100;
			font-size: 2em;
			color: #b7b2b2;
			text-align: center;
			

		}
		a{
			color: #b7b2b2;
			margin: 0 20px 0 20px;
		}



	</style>

</head>
<body>
	<!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
    <![endif]-->
	<div id="wrapper-home">
		
		<a href="http://localhost:8888/archi2000/wp/news">FR</a>
		<a href="http://localhost:8888/archi2000/wp/en/news">EN</a>
		<a href="http://localhost:8888/archi2000/wp/nl/news">NL</a>		

	</div>

        <!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if offline -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="http://localhost:8888/archi2000/wp/wp-content/themes/archi2000_03/js/vendor/jquery-1.8.3.min.js"><\/script>')</script>
       
        <script src="<?php  echo(get_template_directory_uri() . '/js/vendor/jquery.backstretch.min.js'); ?>"></script>
        <script src="<?php  echo(get_template_directory_uri() . '/js/vendor/jquery.isotope.min.js'); ?>"></script>
        <script src="<?php  echo(get_template_directory_uri() . '/js/vendor/jquery.ba-bbq.min.js'); ?>"></script>
        <script src="<?php  echo(get_template_directory_uri() . '/js/vendor/jquery.history.js'); ?>"></script>
        <script src="<?php  echo(get_template_directory_uri() . '/js/vendor/jquery.flexslider-min.js'); ?>"></script>

        <script type="text/javascript">

        // Preload the images
        var images = [
              "http://localhost:8888/archi2000/wp/wp-content/themes/archi2000_03/images/platinium.jpg"
            , "http://localhost:8888/archi2000/wp/wp-content/themes/archi2000_03/images/tour_et_taxis.jpg"
            , "http://localhost:8888/archi2000/wp/wp-content/themes/archi2000_03/images/colonies.jpg"
          ];

        // A little script for preloading all of the images
        // It"s not necessary, but generally a good idea
        $(images).each(function(){
            $("<img/>")[0].src = this;
        });

		 $.backstretch([

		"http://localhost:8888/archi2000/wp/wp-content/themes/archi2000_03/images/platinium.jpg"

		, "http://localhost:8888/archi2000/wp/wp-content/themes/archi2000_03/images/tour_et_taxis.jpg"

		, "http://localhost:8888/archi2000/wp/wp-content/themes/archi2000_03/images/colonies.jpg"

		], {duration: 3000, fade: 750});

        </script>

</body>
</html>