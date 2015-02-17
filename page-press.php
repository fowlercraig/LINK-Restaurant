<?php Themewrangler::setup_page();get_header(/***Template Name: Press */); ?>

<div class="page-header">
<h1>Press</h1>
</div>

<?php $images = get_field('press_gallery');

if( $images ): ?>
<div id="press-links">
<?php foreach( $images as $image ): ?>
<div class="press-item">
<a href="<?php echo $image['caption']; ?>"><img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>" /></a>
</div>
<?php endforeach; ?>
</div>
<?php endif; ?>

<?php get_footer(); ?>