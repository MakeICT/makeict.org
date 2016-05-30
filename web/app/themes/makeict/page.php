<?php get_header(); ?>

<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
	<div class="container">
		<h2><?php the_title(); ?></h2>
	</div>
</div>

<div class="container">
  <!-- Example row of columns -->
  <div class="row">
    <div class="col-md-12">
      
      <!-- THE LOOOOOOOOOOOP -->
      <?php if (have_posts()) : ?>
      <?php while (have_posts()) : the_post(); ?>

        <?php echo the_content(); ?>

      <?php endwhile; ?>
      <?php endif; ?>

    </div>
  </div>
</div>

<?php get_footer(); ?>
