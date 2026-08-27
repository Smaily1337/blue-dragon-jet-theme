<?php
$_ft_lang = function_exists( 'bdj_current_lang' ) ? bdj_current_lang() : 'pl';
$_ft = [
    'pl' => [
        'company'   => 'Firma',
        'contact'   => 'Kontakt',
        'nav'       => 'Nawigacja',
        'home'      => 'Strona główna',
        'products'  => 'Produkty',
        'machines'  => 'Wszystkie maszyny',
        'about'     => 'O nas',
        'kontakt'   => 'Kontakt',
        'rights'    => 'Wszelkie prawa zastrzeżone.',
        'aria'      => 'Stopka strony',
    ],
    'en' => [
        'company'   => 'Company',
        'contact'   => 'Contact',
        'nav'       => 'Navigation',
        'home'      => 'Home',
        'products'  => 'Products',
        'machines'  => 'All machines',
        'about'     => 'About us',
        'kontakt'   => 'Contact',
        'rights'    => 'All rights reserved.',
        'aria'      => 'Site footer',
    ],
    'de' => [
        'company'   => 'Unternehmen',
        'contact'   => 'Kontakt',
        'nav'       => 'Navigation',
        'home'      => 'Startseite',
        'products'  => 'Produkte',
        'machines'  => 'Alle Maschinen',
        'about'     => 'Über uns',
        'kontakt'   => 'Kontakt',
        'rights'    => 'Alle Rechte vorbehalten.',
        'aria'      => 'Seitenfußzeile',
    ],
];
$_ft = $_ft[ $_ft_lang ] ?? $_ft['pl'];
?>
<footer class="site-footer" aria-label="<?php echo esc_attr( $_ft['aria'] ); ?>">
    <div class="site-footer__grid">

        <div class="footer-col">
            <h3 class="footer-col__heading"><?php echo esc_html( $_ft['company'] ); ?></h3>
            <p class="footer-col__text">
                GAMM-BUD Sp. z o.o.<br>
                Skarbimierzyce 22<br>
                72-002 Dołuje
            </p>
        </div>

        <div class="footer-col">
            <h3 class="footer-col__heading"><?php echo esc_html( $_ft['contact'] ); ?></h3>
            <ul class="footer-col__list">
                <li><a href="tel:+48914835011">+48 91 483 50 11</a></li>
                <li><a href="tel:+48914831157">+48 91 483 11 57</a></li>
                <li><a href="mailto:info@bluedragonjet.com">info@bluedragonjet.com</a></li>
            </ul>
        </div>

        <div class="footer-col">
            <h3 class="footer-col__heading"><?php echo esc_html( $_ft['nav'] ); ?></h3>
            <ul class="footer-col__list">
                <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html( $_ft['home'] ); ?></a></li>
                <li><a href="<?php echo esc_url( home_url( '/#maszyny' ) ); ?>"><?php echo esc_html( $_ft['products'] ); ?></a></li>
                <li><a href="<?php echo esc_url( get_post_type_archive_link( 'machine' ) ?: home_url( '/machines/' ) ); ?>"><?php echo esc_html( $_ft['machines'] ); ?></a></li>
                <li><a href="<?php echo esc_url( home_url( '/#o-nas' ) ); ?>"><?php echo esc_html( $_ft['about'] ); ?></a></li>
                <li><a href="<?php echo esc_url( home_url( '/#kontakt' ) ); ?>"><?php echo esc_html( $_ft['kontakt'] ); ?></a></li>
            </ul>
        </div>

    </div>

    <div class="site-footer__bottom">
        <span>&copy; <?php echo esc_html( date( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?></span>
        <span><?php echo esc_html( $_ft['rights'] ); ?></span>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
