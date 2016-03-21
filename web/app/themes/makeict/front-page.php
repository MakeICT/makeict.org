<?php get_header(); ?>

<!-- THE LOOOOOOOOOOOP -->
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>

  <?php $custom_fields = get_post_custom(get_the_ID()); ?>

  <!-- Main jumbotron for a primary marketing message or call to action -->
  <div class="jumbotron feature">
    <div class="container">
      <?php the_content(); ?>
    </div>
  </div>

<?php endwhile; ?>
<?php endif; ?>


<?php get_footer(); ?>
