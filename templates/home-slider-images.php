<?php $images = get_field('header_images', 'option'); if( $images ): ?>
<?php foreach( $images as $image ): ?>

<div class="slide rsContent">
  <img class="rsImg" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
</div>

<?php endforeach; ?>
<?php endif; ?>