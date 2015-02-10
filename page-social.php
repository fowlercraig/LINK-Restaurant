<?php Themewrangler::setup_page();get_header(/***Template Name: Social */); ?>


<div id="instagram-feed" class="six-columns">
  <?php 
  $temp = $wp_query; 
  $wp_query = null; 
  $wp_query = new WP_Query(); 
  $wp_query->query('showposts=20&post_type=instagram'.'&paged='.$paged); 

  while ($wp_query->have_posts()) : $wp_query->the_post(); 
?>

<div class="insta-item"><?php the_content(); ?></div>

<?php endwhile; ?>


<?php 
  $wp_query = null; 
  $wp_query = $temp;  // Reset
?>
</div>
<div id="twitter-feed" class="two-columns">
  <div class="wrapper">
    <a class="twitter-timeline" href="https://twitter.com/EatAtLink" data-widget-id="565203856384995328">Tweets by @EatAtLink</a>
    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
  </div>
</div>



<?php get_footer(); ?>