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

<!-- ═══ MOBILE APP BOTTOM NAVIGATION BAR (Dla telefonów komórkowych) ═══════ -->
<?php
$_mob_lang = function_exists( 'bdj_current_lang' ) ? bdj_current_lang() : 'pl';
$_mob_labels = [
    'pl' => [ 'home' => 'Start', 'machines' => 'Maszyny', 'ai' => 'Doradca AI', 'call' => 'Zadzwoń', 'lang' => 'Język' ],
    'en' => [ 'home' => 'Home',  'machines' => 'Machines', 'ai' => 'AI Advisor', 'call' => 'Call Us', 'lang' => 'Language' ],
    'de' => [ 'home' => 'Start', 'machines' => 'Maschinen','ai' => 'KI-Berater', 'call' => 'Anrufen', 'lang' => 'Sprache' ],
];
$_ml = $_mob_labels[ $_mob_lang ] ?? $_mob_labels['pl'];

$home_url_lang = function_exists( 'bdj_lang_url' ) ? bdj_lang_url( $_mob_lang, home_url( '/' ) ) : home_url( '/' );
$mach_url_lang = function_exists( 'bdj_lang_url' ) ? bdj_lang_url( $_mob_lang, get_post_type_archive_link( 'machine' ) ?: home_url( '/machines/' ) ) : home_url( '/machines/' );
?>
<nav class="bdj-mobile-bottom-bar" aria-label="Nawigacja mobilna">
    <a href="<?php echo esc_url( $home_url_lang ); ?>" class="bdj-mob-tab<?php echo ( is_front_page() ) ? ' is-active' : ''; ?>">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="20" height="20" aria-hidden="true"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
        <span><?php echo esc_html( $_ml['home'] ); ?></span>
    </a>

    <a href="<?php echo esc_url( $mach_url_lang ); ?>" class="bdj-mob-tab<?php echo ( is_post_type_archive( 'machine' ) || is_tax( 'machine_category' ) || is_singular( 'machine' ) ) ? ' is-active' : ''; ?>">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="20" height="20" aria-hidden="true"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg>
        <span><?php echo esc_html( $_ml['machines'] ); ?></span>
    </a>

    <button type="button" class="bdj-mob-tab bdj-mob-tab--ai" id="bdj-mob-ai-btn" aria-label="<?php echo esc_attr( $_ml['ai'] ); ?>" onclick="if(window.__bdjOpenChat){window.__bdjOpenChat();}else{var f=document.getElementById('bdj-ai-fab');if(f)f.click();}">
        <div class="bdj-mob-tab__ai-badge">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" width="22" height="22" aria-hidden="true"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/><circle cx="8.5" cy="10.5" r="1" fill="currentColor"/><circle cx="12" cy="10.5" r="1" fill="currentColor"/><circle cx="15.5" cy="10.5" r="1" fill="currentColor"/></svg>
        </div>
        <span><?php echo esc_html( $_ml['ai'] ); ?></span>
    </button>

    <a href="tel:+48695881783" class="bdj-mob-tab">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="20" height="20" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
        <span><?php echo esc_html( $_ml['call'] ); ?></span>
    </a>

    <div class="bdj-mob-tab bdj-mob-tab--lang" id="bdj-mob-lang-btn" onclick="var m=document.getElementById('bdj-mob-lang-menu');if(m)m.style.display=(m.style.display==='none'?'flex':'none');">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="20" height="20" aria-hidden="true"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>
        <span><?php echo strtoupper( esc_html( $_mob_lang ) ); ?></span>
        <div class="bdj-mob-lang-menu" id="bdj-mob-lang-menu" style="display:none;">
            <a href="<?php echo esc_url( bdj_lang_url( 'pl' ) ); ?>" class="<?php echo $_mob_lang === 'pl' ? 'is-active' : ''; ?>">🇵🇱 PL</a>
            <a href="<?php echo esc_url( bdj_lang_url( 'en' ) ); ?>" class="<?php echo $_mob_lang === 'en' ? 'is-active' : ''; ?>">🇬🇧 EN</a>
            <a href="<?php echo esc_url( bdj_lang_url( 'de' ) ); ?>" class="<?php echo $_mob_lang === 'de' ? 'is-active' : ''; ?>">🇩🇪 DE</a>
        </div>
    </div>
</nav>

<?php wp_footer(); ?>
</body>
</html>
