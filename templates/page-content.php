<?php while (have_posts()) : the_post(); ?>
<div class="eight columns omega">
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
<?php endwhile; ?>
