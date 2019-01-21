<?php $category = get_the_category();?>
<?php get_header();?>

<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
        <div class="head-body">
            <div class="text-head-body">
                <h1>
                    <?php the_title(); ?>
                </h1>
                <h3>Catégorie :
                    <a class="cat-link" href="<?php bloginfo('url');?>/category/<?= $category[0]->slug;?>">
                        <?php  echo $category[0]->slug;?>
                    </a>
                </h3>
                <p>
                    <?php the_time('l d F Y');?>
                </p>
                <p>
                    <?= get_the_time();?>
                </p>
            </div>
            <div>
                <?php if ( has_post_thumbnail() ) : ?>
                    <img class="main-picture" src="<?php the_post_thumbnail_url('full'); ?>" />
                <?php endif; ?>
            </div>
        </div>
        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar') ) : ?>
        <?php endif; ?>
        <?php the_content();?>
        <?php comments_template();?>
    <?php endwhile;?>
<?php endif;?>
<?php get_footer();?>
