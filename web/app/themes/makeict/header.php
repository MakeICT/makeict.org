<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">

    <script src="<?php echo get_template_directory_uri(); ?>/assets/vendor/jquery-1.11.1.min.js"></script>

    <?php if (is_home()) { ?>
      <title><?php echo get_bloginfo('name'); ?></title>
    <?php } else { ?>
      <title><?php echo get_bloginfo('name'); ?><?php wp_title('|'); ?></title>
    <?php } ?>


    <!-- Bootstrap core CSS -->
    <link href="<?php echo get_template_directory_uri(); ?>/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo get_template_directory_uri(); ?>/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/"><?php echo bloginfo('name'); ?></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse pull-right">



  <ul class="nav navbar-nav">
	<li class="dropdown">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Membership<span class="caret"></span></a>
		<ul class="dropdown-menu">
			<li><a href="/join">How to join</a></li>
			<li><a href="/membership-benefits">Benefits</a></li>
			<li><a href="/rules-and-policies">Rules and policies</a></li>
			<li><a href="/membership">Manage my membership</a></li>
			<li><a href="/reservations">Reserve space</a></li>
			<li><a href="/wiki">The Wiki</a></li>
		</ul>
	</li>
	<li class="dropdown">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Events<span class="caret"></span></a>
		<ul class="dropdown-menu">
			<li><a href="/maker-mondays">Maker Mondays</a></li>
			<li><a href="/orientation">New member orientation</a></li>
			<li><a href="/calendar">Calendar and event list</a></li>
			<li><a href="/education">Suggest an event or workshop</a></li>
		</ul>
	</li>
	<li class="dropdown">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Facilities &amp; Programs<span class="caret"></span></a>
		<ul class="dropdown-menu">
			<li><a href="/makerspace-facilities">Makerspace</a></li>
			<li><a href="/devICT">devICT</a></li>
			<li><a href="/education">Education</a></li>
			<li><a href="/outreach">Outreach</a></li>
		</ul>
	</li>
	<li class="dropdown">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Contribute<span class="caret"></span></a>
		<ul class="dropdown-menu">
			<li><a href="/donate">Donate</a></li>
			<li><a href="/education">Teach</a></li>
			<li><a href="/volunteer">Volunteer</a></li>
		</ul>
	</li>
	<li class="dropdown">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Community<span class="caret"></span></a>
		<ul class="dropdown-menu">
			<li><a href="/forum">Forum</a></li>
			<li><a href="/featured-makers">Featured makers</a></li>
			<li><a href="/team-projects">Team Projects</a></li>
			<li><a href="/leadership">Leadership</a></li>
			<li><a href="/newsletter">Newsletter</a></li>
		</ul>
	</li>
</ul>


         


        </div><!--/.navbar-collapse -->
      </div>
    </nav>
