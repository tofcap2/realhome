<?php get_header();?>

<?php if(have_posts()) :?>
    <div class="bloc-top">
        <?php while (have_posts()) : the_post(); ?>
            <h1 class="property-title"><?php the_title() ;?></h1>
        <?php endwhile;?>
        <div class="gabarit-ville">
            <?php $villes = get_terms( 'ville', array(
                'hide empty'=> false
            )); ?>
            <a href="<?php echo site_url() ;?>/nos-proprietes/">Tous</a>
            <?php foreach ($villes as $ville){?>
                <li><a href="<?php echo get_term_link($ville->slug, 'ville') ;?>"><?php echo $ville->name ;?></a></li>
            <?php } ;?>
        </div>
    </div>
<?php endif;?>

<?php wp_reset_postdata() ;?>

<!--The Loop-->
<div class="property-container">
    <?php if ( have_posts() ) : ?>
        <div class="property">
            <?php while (have_posts() ) : the_post(); ?>
                <a class="property-link" href="<?php the_permalink() ?>">

                    <div class="property-singlecard">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <img class="property-picture" src="<?php the_post_thumbnail_url('full'); ?>" />
                        <?php endif; ?>

                        <h2 class="property-house"><?php the_field('adresse') ?></h2>
                        <p class="property-city"><?php the_field('ville') ?></p>
                        <p class="property-price"><?php the_field('prix') ?> €</p>
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
