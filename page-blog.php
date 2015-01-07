<?php Themewrangler::setup_page();get_header(/***Template Name: Blog */); ?>

<div class="page-header">
<h1>News & Updates</h1>
</div>

<?php 
  
  $args = array(
    'post_type'         => array('post','instagram'), 
    'posts_per_page'    => 10, 
    'paged'             => $paged,
    //'order'             => (get_query_var('sort')),
    //'orderby'           => 'date',
  );

  $temp = $wp_query; 
  $wp_query = null; 
  $wp_query = new WP_Query(); 
  $wp_query->query($args); 

  while ($wp_query->have_posts()) : $wp_query->the_post(); 
?>

<div <?php post_class('item'); ?> >
  <div class="six columns alpha">
    <p class="posted"><?php the_time( get_option( 'date_format' ) ); ?></p>
    <h3 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></h3>
  </div>
  <div class="six columns omega"><?php the_content(); ?></div>
</div>

<hr>

<?php endwhile; ?>

<nav class="pagination desktop-12">
    <?php previous_posts_link('&laquo; Newer' ) ?>
    <?php next_posts_link('Older &raquo;') ?>
</nav>

</div>

<?php 
  $wp_query = null; 
  $wp_query = $temp;  // Reset
?>

<?php get_footer(); ?>