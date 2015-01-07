<div class="page-header four columns alpha text-center">
<h1><?php the_field('alternate_title'); ?></h1>
<?php while (have_posts()) : the_post(); ?>
<div class="page-content"><?php the_content(); ?></div>
<?php endwhile; ?>
</div>