<?php /* Template Name: Gabarit apropos */?>

<?php get_header();?>

<?php if(have_posts()) :?>

    <div class="apropos">
        <h1 class="apropos-title"><?php the_title() ;?></h1>
        <?php while (have_posts()) : the_post(); ?>
        <div class="apropos-rens">
            <?php if ( has_post_thumbnail() ) : ?>
                <img class="main-picture" src="<?php the_post_thumbnail_url('full'); ?>" />
            <?php endif; ?>
            <div class="apropos-content">
                <?php the_content() ;?>
            </div>
        </div>
        <div class="sav">
            <?php  while ( have_rows('sav_copie') ) : the_row();?>
                <div class="sav-content">
                    <i class="<?php  the_sub_field('logo');?>"></i>
                    <h3><?php the_sub_field('titre') ;?></h3>
                    <?php the_sub_field('texte') ;?>
                </div>
            <?php  endwhile;?>
        </div>
            <div class="equipe">
                <?php  while ( have_rows('equipe') ) : the_row();?>
                    <div class="equipe-content">
                        <?php $image = get_sub_field('photo') ;?>
                        <img src="<?php echo $image['url'];?>" alt="<?php echo $image['alt'] ;?>">
                        <h3><?php the_sub_field('nom') ;?></h3>
                        <?php the_sub_field('poste') ;?>
                    </div>
                <?php  endwhile;?>
            </div>
        <?php endwhile;?>
    </div>
<?php endif;?>

<?php get_footer(); ?>
