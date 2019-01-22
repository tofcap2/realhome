<?php get_header();?>

<?php $title = get_the_title(get_option('page_for_posts', true)) ;?>

<div class="singlehome-container">
    <?php if (have_posts()) : ?>
        <div class="singlehome-news">
            <?php while (have_posts()) : the_post(); ?>
                    <h2 class="singlehome-singlecard">
                        <?php the_title(); ?>
                    </h2>
                    <p><?php the_content() ;?></p>

                    <div class="singlehome-auteur">
                        <p><?php the_time('d F Y');?> / par <?php the_field('auteur') ;?></p>
                    </div>
            <?php comments_template();?>
        </div>
        <aside class="singlehome-sidebar">

            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar') ) : ?>
            <?php endif; ?>
        </aside>
</div>


    <?php endwhile;?>
<?php endif;?>
<?php get_footer();?>
