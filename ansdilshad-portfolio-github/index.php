<?php get_header(); ?>
<main class="wrap" style="padding:96px 24px;min-height:60vh">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<article><h1><?php the_title(); ?></h1><div><?php the_content(); ?></div></article>
<?php endwhile; endif; ?>
</main>
<?php get_footer(); ?>
