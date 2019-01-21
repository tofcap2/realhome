<?php /* Template Name: Gabarit realisations */?>

<?php get_header();?>

<?php if(have_posts()) :?>
    <div class="bloc-top">
        <?php while (have_posts()) : the_post(); ?>
            <h1 class="property-title"><?php the_title() ;?></h1>
        <?php endwhile;?>
    </div>
    <?php the_content() ;?>
<?php endif;?>

<?php $Posts = get_the_ID()?>
<?php
    $args = array(
        'post_type' => 'realisations',
        'posts_per_page' => 9,
        'orderby' => 'ASC',
        'post__not_in' => array($Posts),
);
?>

<!--The Query-->
<?php $the_query = new WP_Query($args);?>
<!--The Loop-->
    <div class="property-container">
        <?php if ( $the_query->have_posts() ) : ?>
            <div class="property">
                <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                <a class="property-link" href="<?php the_permalink() ?>">

                    <div class="property-singlecard">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <img class="property-picture" src="<?php the_post_thumbnail_url('full'); ?>" />
                        <?php endif; ?>

                        <h2 class="property-house"><?php the_field('adresse') ?></h2>
                        <p><?php the_field('ville') ?></p>
                        <p class="property-price"><?php the_field('prix') ?> €</p>
                        <hr>
                        <div class="property-info">
                            <p><?php the_field('surface') ?> m²</p>
                            <p><?php the_field('chambre') ?> chambres</p>
                            <p><?php the_field('salle_de_bain') ?> salle de bain</p>
                        </div>
                        <?php $id=get_the_ID() ;?>

                        <?php $terms = get_the_terms( $id, 'ville' ); ?>
                    </div>
                </a>

                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>


<?php get_footer(); ?>
