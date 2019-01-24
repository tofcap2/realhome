<?php get_header();?>

<?php if(have_posts()) :?>
    <?php while (have_posts()) : the_post(); ?>
        <div class="front-title">
            <?php if ( has_post_thumbnail() ) : ?>
                <img class="main-picture" src="<?php the_post_thumbnail_url('full'); ?>" />
            <?php endif; ?>
            <div class="front-content">
                <?php the_content() ;?>
            </div>
        </div>
        <div class="front-presentation">

            <?php the_field('presentation') ;?>

                <?php the_field('textepresentation') ;?>
        </div>

        <div class="sav">
            <?php  while ( have_rows('sav') ) : the_row();?>
                <div class="sav-content">
                    <i class="<?php  the_sub_field('logo');?>"></i>
                    <h3><?php the_sub_field('titre') ;?></h3>
                    <?php the_sub_field('texte') ;?>
                </div>
            <?php  endwhile;?>
        </div>
    <?php endwhile;?>
<?php endif;?>

<div class="front-property">

    <h2>Nos propriétés</h2>
    <hr class="front-hr">
    <p><?php the_field('proprietes') ;?></p>

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
    <div class="front-property-container">
        <?php if ( $the_query->have_posts() ) : ?>
            <div>
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
                <div class="link-toutes">
                    <a href="<?php echo site_url()?>/nos-proprietes/">Voir toutes..</a>
                </div>
            </div>
        <?php endif; ?>
    </div>

</div>
<?php if(have_posts()) :?>
<div class="front-agent">
    <?php while (have_posts()) : the_post(); ?>
        <div class="front-agent-image">
            <?php $frontimage = get_field('agent_image') ;?>
            <img src="<?php echo $frontimage['url'];?>" alt="<?php echo $frontimage['alt'] ;?>">
        </div>
        <div class="front-agent-rens">
            <h2>Nos agents</h2>
            <hr>
            <h3><?php the_field('agent_nom') ;?></h3>
            <?php the_field('agent_texte') ;?>
        </div>
    <?php endwhile;?>
</div>
<?php endif;?>

<div class="partenaire">
    <h2>Our parteners</h2>
    <?php  while ( have_rows('partenaire') ) : the_row();?>
        <div class="partenaire-content">
            <?php $sponsor = get_sub_field('sponsor') ;?>
            <img src="<?php echo $sponsor['url'];?>" alt="<?php echo $sponsor['alt'] ;?>">
        </div>
    <?php  endwhile;?>
</div>


<?php get_footer(); ?>

