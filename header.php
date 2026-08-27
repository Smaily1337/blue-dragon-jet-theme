<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5, viewport-fit=cover">
    <meta name="theme-color" content="#1E425D" media="(prefers-color-scheme: light)">
    <meta name="theme-color" content="#0E1E2B" media="(prefers-color-scheme: dark)">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="apple-mobile-web-app-title" content="Blue Dragon Jet">
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="manifest" href="<?php echo esc_url( home_url( '/manifest.json' ) ); ?>">
    <link rel="apple-touch-icon" href="<?php echo esc_url( get_theme_file_uri( 'assets/img/logo.svg' ) ); ?>">
    <?php
    // ── Basic SEO & Open Graph ────────────────────────────────────────────────
    $og_title = wp_get_document_title();
    $og_url   = ( is_singular() ) ? get_permalink() : home_url( strtok( $_SERVER['REQUEST_URI'] ?? '/', '?' ) );

    // Meta description — unikalna per strona
    $_page_descs = [
        'o-nas'                => 'Poznaj GAMM-BUD / Blue Dragon Jet — polskiego producenta maszyn do wdmuchiwania kabli i mikrokanalizacji FTTH. Działamy od 2001 roku w ponad 60 krajach.',
        'serwis'               => 'Serwis maszyn Blue Dragon Jet: gwarancja, naprawy, kalibracja i przeglądy. Oryginalne części, szybki czas reakcji. Zgłoś usterkę online.',
        'szkolenia'            => 'Profesjonalne szkolenia z wdmuchiwania kabli FTTH prowadzone przez certyfikowanych inżynierów BDJ. Certyfikat ukończenia, małe grupy, praktyka na maszynie.',
        'kontakt'              => 'Skontaktuj się z Blue Dragon Jet — dobierzemy maszynę do Twoich potrzeb. Odpowiedź w ciągu 24h. Formularz, telefon, e-mail.',
        'akademia'             => 'BDJ Academy — kursy online z obsługi maszyn do wdmuchiwania kabli. Szkolenia dla operatorów i instalatorów sieci FTTH.',
        'polityka-prywatnosci' => 'Polityka prywatności Blue Dragon Jet — informacje o przetwarzaniu danych osobowych zgodnie z RODO.',
    ];
    global $post;
    $_slug   = $post->post_name ?? '';
    $_hdr_lang = function_exists( 'bdj_current_lang' ) ? bdj_current_lang() : 'pl';

    // Opisy strony głównej per język
    $_front_descs = [
        'pl' => 'Blue Dragon Jet — europejski producent maszyn do wdmuchiwania kabli światłowodowych FTTH. Ponad 20 lat doświadczenia, 60+ krajów, gwarancja 36 miesięcy.',
        'en' => 'Blue Dragon Jet — European manufacturer of fibre optic cable blowing machines. Over 20 years of experience, 60+ countries, 36-month warranty.',
        'de' => 'Blue Dragon Jet — Europäischer Hersteller von Glasfaser-Kabeleinblasmaschinen. Über 20 Jahre Erfahrung, 60+ Länder, 36 Monate Garantie.',
    ];
    // Fallback opisy dla stron per język
    $_machine_fallbacks = [
        'pl' => 'Maszyna do wdmuchiwania kabli %s — Blue Dragon Jet. Europejska jakość, 36 mies. gwarancji, szybka dostawa.',
        'en' => '%s cable blowing machine — Blue Dragon Jet. European quality, 36-month warranty, fast delivery.',
        'de' => 'Kabeleinblasmaschine %s — Blue Dragon Jet. Europäische Qualität, 36 Monate Garantie, schnelle Lieferung.',
    ];

    $og_desc = '';
    if ( is_front_page() ) {
        $og_desc = $_front_descs[ $_hdr_lang ] ?? $_front_descs['pl'];
    } elseif ( is_singular( 'machine' ) ) {
        $og_desc = wp_strip_all_tags( get_the_excerpt() );
        if ( ! $og_desc ) {
            $og_desc = sprintf( $_machine_fallbacks[ $_hdr_lang ] ?? $_machine_fallbacks['pl'], get_the_title() );
        }
    } elseif ( isset( $_page_descs[ $_slug ] ) ) {
        $og_desc = $_page_descs[ $_slug ];
    }
    if ( ! $og_desc ) {
        $og_desc = get_bloginfo( 'description' ) ?: 'Europejski producent maszyn do wdmuchiwania kabli i mikrokabli światłowodowych FTTH. Blue Dragon Jet — jakość, gwarancja, globalny zasięg.';
    }

    // og:image — featured image strony lub motywu
    $og_image = '';
    if ( is_singular() && has_post_thumbnail() ) {
        $og_image = get_the_post_thumbnail_url( null, 'large' );
    }
    if ( ! $og_image ) {
        // Użyj site icon lub fallback z uploadsów
        $site_icon_id = get_option( 'site_icon' );
        if ( $site_icon_id ) {
            $og_image = wp_get_attachment_image_url( $site_icon_id, 'large' );
        }
    }
    if ( ! $og_image ) {
        $og_image = get_template_directory_uri() . '/assets/img/og-default.jpg';
    }
    ?>
    <meta name="description" content="<?php echo esc_attr( $og_desc ); ?>">
    <meta property="og:type"        content="website">
    <meta property="og:title"       content="<?php echo esc_attr( $og_title ); ?>">
    <meta property="og:description" content="<?php echo esc_attr( $og_desc ); ?>">
    <meta property="og:url"         content="<?php echo esc_url( $og_url ); ?>">
    <meta property="og:image"       content="<?php echo esc_url( $og_image ); ?>">
    <meta property="og:site_name"   content="<?php bloginfo('name'); ?>">
    <meta name="twitter:card"       content="summary_large_image">
    <meta name="twitter:title"      content="<?php echo esc_attr( $og_title ); ?>">
    <meta name="twitter:description" content="<?php echo esc_attr( $og_desc ); ?>">
    <meta name="twitter:image"      content="<?php echo esc_url( $og_image ); ?>">
    <?php
    // Preconnect dla Google Fonts — przyspiesza ładowanie czcionek
    ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <?php
    // hreflang — informuje Google o wersjach językowych
    $hreflang_urls = [
        'pl' => function_exists( 'bdj_lang_url' ) ? bdj_lang_url( 'pl' ) : home_url( '/' ),
        'en' => function_exists( 'bdj_lang_url' ) ? bdj_lang_url( 'en' ) : home_url( '/en/' ),
        'de' => function_exists( 'bdj_lang_url' ) ? bdj_lang_url( 'de' ) : home_url( '/de/' ),
    ];
    foreach ( $hreflang_urls as $lang_code => $lang_url ) :
    ?>
    <link rel="alternate" hreflang="<?php echo esc_attr( $lang_code ); ?>" href="<?php echo esc_url( $lang_url ); ?>">
    <?php endforeach; ?>
    <link rel="alternate" hreflang="x-default" href="<?php echo esc_url( $hreflang_urls['pl'] ); ?>">
    <?php
    // Canonical URL
    $cur_lang = function_exists( 'bdj_current_lang' ) ? bdj_current_lang() : 'pl';
    $canonical = function_exists( 'bdj_lang_url' ) ? bdj_lang_url( $cur_lang ) : home_url( strtok( $_SERVER['REQUEST_URI'] ?? '/', '?' ) );
    ?>
    <link rel="canonical" href="<?php echo esc_url( $canonical ); ?>">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header id="site-header" class="site-header">
    <div class="site-header__inner container">

        <div class="site-header__logo">
            <?php if ( has_custom_logo() ) : ?>
                <?php the_custom_logo(); ?>
            <?php else : ?>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-header__name" rel="home">
                    <?php bloginfo( 'name' ); ?>
                </a>
            <?php endif; ?>
        </div>

        <?php
        $cur_lang = function_exists( 'bdj_current_lang' ) ? bdj_current_lang() : 'pl';
        $tpl_uri  = get_template_directory_uri();
        $langs    = [
            'pl' => [ 'label' => 'PL', 'flag' => 'flag-pl.svg', 'hreflang' => 'pl', 'aria' => 'Polski'  ],
            'en' => [ 'label' => 'EN', 'flag' => 'flag-en.svg', 'hreflang' => 'en', 'aria' => 'English' ],
            'de' => [ 'label' => 'DE', 'flag' => 'flag-de.svg', 'hreflang' => 'de', 'aria' => 'Deutsch' ],
        ];
        $_ht = [
            'pl' => [ 'nav_aria' => 'Nawigacja główna', 'machines' => 'Maszyny', 'about' => 'O nas', 'training' => 'Szkolenia', 'academy' => 'Akademia', 'service' => 'Serwis', 'distributors' => 'Dystrybutorzy', 'cta' => 'Zapytaj o ofertę', 'toggle' => 'Przełącz menu' ],
            'en' => [ 'nav_aria' => 'Primary navigation', 'machines' => 'Machines', 'about' => 'About us', 'training' => 'Training', 'academy' => 'Academy', 'service' => 'Service', 'distributors' => 'Distributors', 'cta' => 'Request a quote', 'toggle' => 'Toggle menu' ],
            'de' => [ 'nav_aria' => 'Hauptnavigation', 'machines' => 'Maschinen', 'about' => 'Über uns', 'training' => 'Schulungen', 'academy' => 'Akademie', 'service' => 'Service', 'distributors' => 'Händler', 'cta' => 'Angebot anfragen', 'toggle' => 'Menü umschalten' ],
        ];
        $_ht = $_ht[ $cur_lang ] ?? $_ht['pl'];
        ?>
        <nav id="primary-nav" class="primary-nav" aria-label="<?php echo esc_attr( $_ht['nav_aria'] ); ?>">
            <?php
            $rendered = wp_nav_menu( [
                'theme_location' => 'primary',
                'container'      => false,
                'menu_class'     => 'primary-nav__list',
                'echo'           => false,
                'fallback_cb'    => false,
            ] );
            if ( $rendered ) {
                echo $rendered; // phpcs:ignore WordPress.Security.EscapeOutput
            } else {
                // Fallback: hardcoded links when no WP menu is assigned yet
                ?>
                <ul class="primary-nav__list">
                    <li><a href="<?php echo esc_url( get_term_link( 'wdmuchiwarki', 'machine_category' ) ?: ( get_post_type_archive_link( 'machine' ) ?: home_url( '/machines/' ) ) ); ?>"><?php echo esc_html( $_ht['machines'] ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/o-nas/' ) ); ?>"><?php echo esc_html( $_ht['about'] ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/szkolenia/' ) ); ?>"><?php echo esc_html( $_ht['training'] ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/akademia/' ) ); ?>"><?php echo esc_html( $_ht['academy'] ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/serwis/' ) ); ?>"><?php echo esc_html( $_ht['service'] ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/#dystrybutorzy' ) ); ?>"><?php echo esc_html( $_ht['distributors'] ); ?></a></li>
                </ul>
                <?php
            }
            ?>
            <?php /* Lang switcher widoczny tylko w menu mobilnym */ ?>
            <div class="lang-switcher lang-switcher--mobile" aria-label="Language switcher">
                <?php foreach ( $langs as $code => $l ) :
                    $url = function_exists( 'bdj_lang_url' ) ? bdj_lang_url( $code ) : esc_url( home_url( $code === 'pl' ? '/' : "/$code/" ) );
                ?>
                <a href="<?php echo esc_url( $url ); ?>"
                   class="lang-switcher__btn <?php echo $cur_lang === $code ? 'lang-switcher__btn--active' : ''; ?>"
                   hreflang="<?php echo esc_attr( $l['hreflang'] ); ?>"
                   aria-label="<?php echo esc_attr( $l['aria'] ); ?>">
                    <img src="<?php echo esc_url( "$tpl_uri/assets/img/{$l['flag']}" ); ?>" alt="<?php echo esc_attr( $l['label'] ); ?>" width="20" height="14" loading="lazy">
                    <span><?php echo esc_html( $l['label'] ); ?></span>
                </a>
                <?php if ( $code !== 'de' ) : ?><span class="lang-switcher__sep" aria-hidden="true">|</span><?php endif; ?>
                <?php endforeach; ?>
            </div>
        </nav>

        <a href="<?php echo esc_url( home_url( '/#kontakt' ) ); ?>" class="header-cta">
            <?php echo esc_html( $_ht['cta'] ); ?>
        </a>

        <div class="lang-switcher" aria-label="Language switcher">
            <?php foreach ( $langs as $code => $l ) :
                $url = function_exists( 'bdj_lang_url' ) ? bdj_lang_url( $code ) : esc_url( home_url( $code === 'pl' ? '/' : "/$code/" ) );
            ?>
            <a href="<?php echo esc_url( $url ); ?>"
               class="lang-switcher__btn <?php echo $cur_lang === $code ? 'lang-switcher__btn--active' : ''; ?>"
               hreflang="<?php echo esc_attr( $l['hreflang'] ); ?>"
               aria-label="<?php echo esc_attr( $l['aria'] ); ?>">
                <img src="<?php echo esc_url( "$tpl_uri/assets/img/{$l['flag']}" ); ?>" alt="<?php echo esc_attr( $l['label'] ); ?>" width="20" height="14" loading="lazy">
                <span><?php echo esc_html( $l['label'] ); ?></span>
            </a>
            <?php if ( $code !== 'de' ) : ?><span class="lang-switcher__sep" aria-hidden="true">|</span><?php endif; ?>
            <?php endforeach; ?>
        </div>

        <button class="hamburger" aria-label="<?php echo esc_attr( $_ht['toggle'] ); ?>" aria-expanded="false">
            <span class="hamburger__line"></span>
            <span class="hamburger__line"></span>
            <span class="hamburger__line"></span>
        </button>

    </div>
</header>
