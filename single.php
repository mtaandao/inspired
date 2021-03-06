<?php
/**
 * The Template for displaying all single posts.
 */

get_header(); ?>

    <main id="main" class="site-main container-fluid" role="main">

        <?php while ( have_posts() ) : the_post(); ?>

            <?php get_template_part( 'content', 'single' ); ?>


            <?php if (option::get('post_comments') == 'on') : ?>

                <?php comments_template(); ?>

            <?php endif; ?>

        <?php endwhile; // end of the loop. ?>

    </main><!-- #main -->

<?php get_footer(); ?>