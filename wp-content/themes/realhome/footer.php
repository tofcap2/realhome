<?php wp_footer() ?>
<footer>
    <div class="footer">
        <div class="footer-left">
            <div>
                <img src="<?php echo bloginfo('template_url') ;?>/image/logo-2.png" alt="Logo" >
            </div>
            <div class="footer-menu-sociaux">
                <nav><?php  wp_nav_menu(array('theme_location' => 'menu-secondaire'));?></nav>
            </div>
        </div>
        <div class="footer-menu">
            <h3>Menu</h3>
            <nav><?php  wp_nav_menu(array('theme_location' => 'menu-principal'));?></nav>
        </div>
        <div class="footer-right">
            <h3>Contact</h3>
            <p><?php the_field('adresse_footer','option') ;?></p>
            <p><?php the_field('freephone_footer','option') ;?></p>
            <p><?php the_field('telephone_footer','option') ;?></p>
            <p><?php the_field('fax_footer','option') ;?></p>
            <p><?php the_field('mail_footer','option') ;?></p>


        </div>
    </div>

</footer>
</body>
</html>
