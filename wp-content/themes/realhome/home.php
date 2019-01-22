<?php get_header();?>
<?php $title = get_the_title(get_option('page_for_posts', true)) ;?>

<div class="home-bloc-top" style="background-image:url(<?php echo $img[0];?>)">
    <h1><?php echo $title ;?>
    </h1>

</div>
<div class="container">
    <?php if(have_posts()) :?>
        <div class="news">
            <?php while (have_posts()) : the_post(); ?>
                <div class="singlecard">
                    <h2><?php echo the_title() ;?></h2>
                    <div>
                        <?php if ( has_post_thumbnail() ) : ?>
                            <img class="main-picture" src="<?php the_post_thumbnail_url('full'); ?>" />
                        <?php endif; ?>
                    </div>
                        <?php echo the_excerpt() ;?>
                    <div class="homecta">
                        <a class="link-card" href="<?php the_permalink() ;?>">Lire la suite</a>
                    </div>
                </div>
            <?php endwhile;?>
        </div>
    <?php endif;?>
    <aside class="sidebar">
        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar') ) : ?>
        <?php endif; ?>
    </aside>
</div>

<?php get_footer(); ?>
