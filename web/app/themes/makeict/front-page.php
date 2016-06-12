<?php get_header(); ?>

<!-- THE LOOOOOOOOOOOP -->
<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>

		<?php $custom_fields = get_post_custom(get_the_ID()); ?>

		<!-- Main jumbotron for a primary marketing message or call to action -->
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<!-- THE LOOOOOOOOOOOP -->
					<?php echo the_content(); ?>
				</div>
			</div>
		</div>
	<?php endwhile; ?>
<?php endif; ?>


<?php get_footer(); ?>
