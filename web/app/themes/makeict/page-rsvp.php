<?php
/**
 * Template Name: RSVP
 *
 * @package MakeICT
 */
?>
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
      
      <!-- THE LOOOOOOOOOOOP -->
      <?php if (have_posts()) : ?>
      <?php while (have_posts()) : the_post(); ?>

        <?php echo the_content(); ?>
        <?php 
          if(!empty($_GET['event'])){
        ?>
	    <iframe width='750px' height='600px' frameborder='no' src='http://makeict.wildapricot.org/widget/event-<?php echo $_GET['event']; ?>'  onload='tryToEnableWACookies("http://makeict.wildapricot.org");' ></iframe><script  type="text/javascript" language="javascript" src="http://makeict.wildapricot.org/Common/EnableCookies.js" ></script>
        <?php
          }else{
            echo "No event specified :(";
          }
        ?>
      <?php endwhile; ?>
      <?php endif; ?>

    </div>
  </div>
</div>

<?php get_footer(); ?>
