<?php Themewrangler::setup_page();get_header(/***Template Name: Home Page */); ?>

<div id="daily-column" class="four columns alpha">

  <div id="sausage-time" class="widget">
    <h3 class="seriftime">Sausage of<br>the day</h3>
    <div class="small divider"></div>

    <?php if(get_field('sausage_of_the_day')): ?>
    <?php while(has_sub_field('sausage_of_the_day')): ?>
    <div class="sausage">
      <h1 class="title"><?php the_sub_field('sotd_name'); ?></h1>
      <?php the_sub_field('sotd_description'); ?>
      <span class="price"><?php the_sub_field('sotd_price'); ?></span>
    </div>
    <?php endwhile; ?>
    <?php endif; ?>

  </div><!-- Sausage of the Day! -->

  <div class="angled divider"></div>

  <div id="daily-taps" class="widget">
    <h3 class="seriftime">Daily<br>Taps</h3>
    <div class="small divider"></div>

    <?php if(get_field('daily_taps')): ?>
    <?php while(has_sub_field('daily_taps')): ?>
    <div class="beer">
      <h1 class="title"><?php the_sub_field('dt_beer_name'); ?></h1>
      <span class="co"><?php the_sub_field('dt_beer_co'); ?></span>
    </div>
    <?php endwhile; ?>
    <?php endif; ?>

  </div><!-- Daily Taps! -->

</div><!-- Daily Column-->

<div id="gallery-column" class="eight columns omega">
  <div id="royalslider" class="royalslider rsMinW">

    <?php $images = get_field('photo_gallery'); if( $images ): ?>
    <?php foreach( $images as $image ): ?>

    <div class="slide rsContent">
      <img class="rsImg" src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>" />
      <div class="meta"><p><?php echo $image['caption']; ?></p></div>
    </div>

    <?php endforeach; ?>
    <?php endif; ?>

  </div>
</div><!-- Gallery Column -->

<?php get_footer(); ?>