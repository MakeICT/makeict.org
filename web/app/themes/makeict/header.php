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
    
	<?php wp_head(); ?>
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
          <a href="/"><div class="navbar-brand"><?php echo bloginfo('name'); ?></div></a>
        </div>
        
		<?php
			$args = array(
				'theme_location' => 'header-menu',
				'menu_class' => 'nav navbar-nav',
				'container_class' => 'navbar-collapse collapse pull-right',
				'walker' => new MakeICT_menu_walker()
			);
			wp_nav_menu($args); 
		?>
      </div>
    </nav>
	<div class="navbar-backing"></div>
