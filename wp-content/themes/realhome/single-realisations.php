<?php get_header();?>
<div class="single-container">
<?php if(have_posts()) :?>
    <div class="single-real">
        <?php while (have_posts()) : the_post(); ?>

                <h2><?php the_title() ;?></h2>
            <div class="single-rens">
                    <?php if ( has_post_thumbnail() ) : ?>
                        <img class="single-image" src="<?php the_post_thumbnail_url('full'); ?>" />
                    <?php endif; ?>
                <div class="single-right">
                    <div class="single-right-rens">
                        <p class="single-price fas fa-bookmark">  <?php the_field('prix') ;?> €</p>
                        <hr>
                        <p class="single-city">Ville: <?php the_field('ville') ;?></p>
                        <p class="single-room">Nombre de pièces: <?php the_field('chambre') ;?></p>
                        <p class="single-info">Info: <?php the_field('info') ;?></p>
                        <hr>
                    </div>
                    <?php the_content() ;?>
                </div>
            </div>
            <hr>
        <?php endwhile;?>
    </div>
<?php endif;?>
</div>

<div class="single-demo">
    <h2>Nos propriétés</h2>
    <?php $Posts = get_the_ID()?>
    <?php
    $args = array(
        'post_type' => 'realisations',
        'posts_per_page' => 4,
        'orderby' => 'RAND',
        'post__not_in' => array($Posts),
    );
    ?>

    <!--The Query-->
    <?php $the_query = new WP_Query($args);?>
    <!--The Loop-->
    <div class="single-container">
        <?php if ( $the_query->have_posts() ) : ?>
            <div class="single-news">
                <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                    <div class="single-singlecard">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <img class="single-img" src="<?php the_post_thumbnail_url('full'); ?>" />
                        <?php endif; ?>
                        <a href="<?php the_permalink() ?>">
                            <p><?php the_field('titresmallcard') ;?></p>
                        </a>
                        <p><?php the_field('ville') ;?></p>

                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>
