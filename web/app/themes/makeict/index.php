<?php get_header(); ?>

<div class="jumbotron jumbotron-main">
	<div class="container">
		<h1><?php single_cat_title(); ?></h1>
	</div>
</div>
<div class="jumbotron-spacer"></div>

<div class="container">
  <!-- Example row of columns -->
  <div class="row">
    <div class="col-md-12">
      
      <!-- THE LOOOOOOOOOOOP -->
      <?php if (have_posts()) : ?>
      <?php while (have_posts()) : the_post(); ?>
        <h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
            <?php the_title(); ?></a>
        </h2>
        <div class="blog-date">
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
