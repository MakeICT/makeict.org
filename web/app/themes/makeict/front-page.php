<?php get_header(); ?>

<!-- THE LOOOOOOOOOOOP -->
<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>

		<?php $custom_fields = get_post_custom(get_the_ID()); ?>

		<!-- Main jumbotron for a primary marketing message or call to action -->
		<div class="jumbotron feature">
			<div class="container">
				<div class="row">
					<div class="col-md-12">

						<div class="carousel slide" data-ride="carousel">
							<!-- Indicators -->
							<ol class="carousel-indicators">
								<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
								<li data-target="#carousel-example-generic" data-slide-to="1"></li>
								<li data-target="#carousel-example-generic" data-slide-to="2"></li>
								<li data-target="#carousel-example-generic" data-slide-to="3"></li>
							</ol>
							<!-- Wrapper for slides -->
							<div class="carousel-inner" role="listbox">
								<div class="item active">
									<img src="/app/themes/makeict/assets/images/feature-01.jpg" alt="...">
									<div class="carousel-caption">Feature 01</div>
								</div>
								<div class="item">
									<img src="/app/themes/makeict/assets/images/feature-02.jpg" alt="...">
									<div class="carousel-caption">Feature 02</div>
								</div>
								<div class="item">
									<img src="/app/themes/makeict/assets/images/feature-03.jpg" alt="...">
									<div class="carousel-caption">Feature 03</div>
								</div>
								<div class="item">
									<img src="/app/themes/makeict/assets/images/feature-04.jpg" alt="...">
									<div class="carousel-caption">Feature 04</div>
								</div>
							</div>

							<!-- Controls -->
							<!--
							<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
							<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
							</a>
							<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
							<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
							</a>
							-->
						</div>
					</div>
				</div>
			</div>
		</div>
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
