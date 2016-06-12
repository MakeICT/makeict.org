<?php get_header(); ?>

<div class="jumbotron jumbotron-main">
	<div class="container">
		<h2><?php single_cat_title(); ?></h2>
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
		<h2><?php the_title(); ?></h2>
        <?php echo the_content(); ?>

      <?php endwhile; ?>
      <?php endif; ?>

    </div>
  </div>
</div>

<?php get_footer(); ?>
