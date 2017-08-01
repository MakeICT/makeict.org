<?php get_header(); ?>

<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron jumbotron-main">
	<div class="container">
		<h1><?php the_title(); ?></h1>
	</div>
</div>
<div class="jumbotron-spacer"></div>

<div class="container">
  <!-- Example row of columns -->
  <div class="row">
    <div class="col-md-12">
      
      <?php if (have_posts()) : ?>
      <?php while (have_posts()) : the_post(); ?>

        <div class="blog-date">
          Posted: 
          <span class="date"><?php the_date(get_option('date_format')); ?></span>
	  <span class="time"><?php the_time(get_option('time_format')); ?></span>
	</div>

        <?php echo the_content(); ?>

      <?php endwhile; ?>
      <?php endif; ?>

    </div>
  </div>
</div>

<?php get_footer(); ?>
