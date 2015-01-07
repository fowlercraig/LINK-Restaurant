<?php Themewrangler::setup_page();get_header(/***Template Name: Front Page */); ?>
<?php get_template_part('templates/page', 'header'); ?>
<?php get_template_part('templates/page', 'content'); ?>
<?php include('templates/flex-content.php'); ?>
<?php get_footer(); ?>