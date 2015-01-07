<?php Themewrangler::setup_page();get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<div class="page-header twelve columns alpha text-center">
<h1><?php the_title(); ?></h1>
<div class="page-content"><?php the_content(); ?></div>
</div>

<?php endwhile; endif; ?>

<?php get_footer(); ?>