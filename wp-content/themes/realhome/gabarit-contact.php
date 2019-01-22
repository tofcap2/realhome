<?php /* Template Name: Gabarit contact */?>

<?php get_header();?>

<?php if(have_posts()) :?>
<div class="contact">
    <?php while (have_posts()) : the_post(); ?>
        <h1 class="contact-title">
            <?php the_title() ;?>
        </h1>
        <div class="contact-image">
            <?php if ( has_post_thumbnail() ) : ?>
                <img class="main-picture" src="<?php the_post_thumbnail_url('full'); ?>" />
            <?php endif; ?>
        </div>
        <div class="contact-info">
            <div class="contact-coor">
                <h2><?php the_field('titre') ;?></h2>
                <div class="contact-coor-texte"><?php the_field('texte') ;?></div>
                <?php the_field('adresse') ;?>
                <?php the_field('contact') ;?>
            </div>
            <div class="contact-message">
                <?php the_content() ;?>
            </div>
        </div>
    <?php endwhile;?>
</div>
<?php endif;?>

<?php get_footer(); ?>
